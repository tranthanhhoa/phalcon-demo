{{ form('test/signup','role':'form')}}
<div class="form-group {{ form.getErrorClassFor('birthMonth')}}">
{{ form.label('birthMonth')}}
{{ form.render('birthMonth')}}
</div>
<div class="form-group {{ form.getErrorClassFor('birthDay')}}">
{{ form.label('birthDay')}}
{{ form.render('birthDay')}}
</div>
<div class="form-group {{ form.getErrorClassFor('birthYear')}}">
{{ form.label('birthYear')}}
{{ form.render('birthYear')}}
</div>

<button class="btn btn-default">Check</button>

{{ endform()}}