<?php



/**
 * Elements
 *
 * Helps to check credit card
 */

class ValidationUtil
{
	
	public function initCards()
	{
        $defaultFormat = "/(\d{1,4})/g";
        $cards         = array(
            array(
                "type"      => "visaelectron",
                "pattern"   => "/^4(026|17500|405|508|844|91[37])/",
                "format"    => $defaultFormat,
                "length"    => 16,
                "cvvLength" => 3,
                "luhn"      => true
            ),
            array(
                "type"      => "maestro",
                "pattern"   => "/^(5(018|0[23]|[68])|6(39|7))/",
                "format"    => $defaultFormat,
                "length"    => [ 12, 13, 14, 15, 16, 17, 18, 19 ],
                "cvvLength" => 3,
                "luhn"      => true
            ),
            array(
                "type"      => "forbrugsforeningen",
                "pattern"   => "/^600/",
                "format"    => $defaultFormat,
                "length"    => 16,
                "cvvLength" => 3,
                "luhn"      => true
            ),
            array(
                "type"      => "dankort",
                "pattern"   => "/^5019/",
                "format"    => $defaultFormat,
                "length"    => 16,
                "cvvLength" => 3,
                "luhn"      => true
            ),
            array(
                "type"      => "visa",
                "pattern"   => "/^4/",
                "format"    => $defaultFormat,
                "length"    => [ 13, 16 ],
                "cvvLength" => 3,
                "luhn"      => true
            ),
            array(
                "type"      => "mastercard",
                "pattern"   => "/^5[0-5]/",
                "format"    => $defaultFormat,
                "length"    => 16,
                "cvvLength" => 3,
                "luhn"      => true
            ),
            array(
                "type"      => "amex",
                "pattern"   => "/^3[47]/",
                "format"    => "/(\d{1,4})(\d{1,6})?(\d{1,5})?/",
                "length"    => 15,
                "cvvLength" => [ 3, 4 ],
                "luhn"      => true
            ),
            array(
                "type"      => "dinersclub",
                "pattern"   => "/^3[0689]/",
                "format"    => $defaultFormat,
                "length"    => 14,
                "cvvLength" => 3,
                "luhn"      => true
            ),
            array(
                "type"      => "discover",
                "pattern"   => "/^6([045]|22)/",
                "format"    => $defaultFormat,
                "length"    => 16,
                "cvvLength" => 3,
                "luhn"      => true
            ),
            array(
                "type"      => "unionpay",
                "pattern"   => "/^(62|88)/",
                "format"    => $defaultFormat,
                "length"    => [ 16, 17, 18, 19 ],
                "cvvLength" => 3,
                "luhn"      => false
            ),
            array(
                "type"      => "jcb",
                "pattern"   => "/^35/",
                "format"    => $defaultFormat,
                "length"    => 16,
                "cvvLength" => 3,
                "luhn"      => true
            ),
        );

        return $cards;
	}

	// Card number
	public function validateCardNumber($num)
	{
        $isValid    = false;
        $num_length = strlen( $this->formatCardNumber( $num ) );
        $card       = $this->getCardByNumber($num );
        if ( ! isset( $card ) ) {
            $isValid = false;
        } else {
            if ( $this->luhnCheck( $num ) && ( $this->checkLength( $num_length, $card['length'] ) || $card['luhn'] == false ) ) {
                $isValid = true;
            } else {
                $isValid = false;
            }
        }

        return $isValid;

	}

	// Check Card CVV
	public function validateCardCVV($cvv,$type)
	{
        $isValid = false;
        return $isValid;
	}

	// Check card expiry
	public function validateExpiry($month,$year)
	{
        $isValid = false;
        return $isValid;
	}

    public function getCardByNumber($num)
    {
        $cards = $this->initCards();
        $_num  = $this->formatCardNumber( $num );
        for ( $i = 0; $i < count( $cards ); $i ++ ) {
            $card = $cards[ $i ];
            preg_match( $card['pattern'], $_num, $matches );
            if ( count( $matches ) > 0 ) {
                return $card;
            }
        }
    }

    public function luhnCheck( $num ) {
        $digit  = 0;
        $odd    = true;
        $sum    = 0;
        $digtis = str_split( strrev( $this->formatCardNumber( $num ) ) );
        $len    = count( $digtis );
        for ( $i = 0; $i < $len; $i ++ ) {
            $digit = (int) $digtis[ $i ];
            if ( ( $odd = ! $odd ) ) {
                $digit *= 2;
            }
            if ( $digit > 9 ) {
                $digit -= 9;
            }
            $sum += $digit;
        }

        return $sum % 10 === 0;
    }

    public function checkLength( $num_length, $card_length ) {
        if ( is_array( $card_length ) ) {
            return in_array( $num_length, $card_length );
        } else {
            return $num_length == $card_length;
        }
    }

    public function formatCardNumber( $num ) {
        $str_num = null;

        if ( ! is_numeric( $num ) ) {
            preg_match( "/\D/", trim( $num ), $matches );
            if ( count( $matches ) > 0 || $num == "" ) {
                $str_num = "0";
            } else {
                $str_num = trim( $num );
            }
        } else {
            $str_num = strval( number_format( $num, 0, '', '' ) );
        }

        return $str_num;
    }

    public function checkDate($month,$day,$year)
    {
        if(!is_numeric($month) || !is_numeric($day) || !is_numeric($year)){
            return false;
        }
        return checkdate((int)$month,(int)$day,(int)$year);
    }

}