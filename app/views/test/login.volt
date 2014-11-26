<h2>Login</h2>

{{ form('test/login','role':'form')}}
<div class="form-group {{ login_form.getErrorClassFor('email')}}">
	<label for="email">Email</label>
	{{ login_form.render('email')}}
</div>
<div class="form-group {{ login_form.getErrorClassFor('pin')}}">
	<label for="pin">Pin</label>
	{{ login_form.render('pin')}}
</div>
<button class="btn btn-default">Login</button>
{{ login_form.render('csrf', ['value': security.getToken()]) }}
{{ endform()}}