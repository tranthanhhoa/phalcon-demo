<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon PHP Framework</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<style>
			.has-error input{
				border: 1px solid red;
			}
		</style>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	</head>
	<body>
		{{ content() }}
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			var year,month;
			$('#birthMonth').change(function(event) {
				month = $(this).val();
				year = $('#birthYear').val();
				if(year === ''){
					alert('Xin vui long chon nam');
				}else{
					$.ajax({
						url: 'http://localhost/phalcon-demo/test/showDays',
						type: 'POST',
						data: { month: month,year: year},
						success: function(response){
							
							$('#birthDay option').not(':first').remove();
							var parsed = $.parseJSON(response);
							$.each(parsed, function(key, value) {
								 $("#birthDay")
		                        .append($("<option></option>")
		                        .attr("value",value)
		                        .text(value));
							});
						}
					})
				}				
				
			});
		});
		</script>
	</body>
</html>