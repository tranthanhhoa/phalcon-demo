<h2>Login</h2>

<?php echo $this->tag->form(array('test/login', 'role' => 'form')); ?>
<div class="form-group <?php echo $login_form->getErrorClassFor('email'); ?>">
	<label for="email">Email</label>
	<?php echo $login_form->render('email'); ?>
</div>
<div class="form-group <?php echo $login_form->getErrorClassFor('pin'); ?>">
	<label for="pin">Pin</label>
	<?php echo $login_form->render('pin'); ?>
</div>
<button class="btn btn-default">Login</button>
<?php echo $login_form->render('csrf', array('value' => $this->security->getToken())); ?>
<?php echo $this->tag->endform(); ?>