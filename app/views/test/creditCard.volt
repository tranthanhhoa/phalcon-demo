{{ form('test/creditCard','role':'form')}}

<div class="form-group {{ form.getErrorClassFor('card-number')}}">
	<label for="card-number">Card number</label>
	{{ form.render('card-number',['class':'form-control'])}}
</div>
<div class="form-group {{ form.getErrorClassFor('card-expiry')}}">
	<label for="card-expiry">Card expiry</label>
	{{ form.render('card-expiry',['class':'form-control'])}}
</div>
<div class="form-group {{ form.getErrorClassFor('card-cvv')}}">
	<label for="card-cvv">Card number</label>
	{{ form.render('card-cvv',['class':'form-control'])}}
</div>
<button class="btn btn-default">Check</button>
{{ form.render('csrf', ['value': security.getToken()]) }}
{{ endform()}}