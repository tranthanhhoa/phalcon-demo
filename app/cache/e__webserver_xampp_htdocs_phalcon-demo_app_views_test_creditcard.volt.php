<?php echo $this->tag->form(array('test/creditCard', 'role' => 'form')); ?>

<div class="form-group <?php echo $form->getErrorClassFor('card-number'); ?>">
	<label for="card-number">Card number</label>
	<?php echo $form->render('card-number', array('class' => 'form-control')); ?>
</div>
<div class="form-group <?php echo $form->getErrorClassFor('card-expiry'); ?>">
	<label for="card-expiry">Card expiry</label>
	<?php echo $form->render('card-expiry', array('class' => 'form-control')); ?>
</div>
<div class="form-group <?php echo $form->getErrorClassFor('card-cvv'); ?>">
	<label for="card-cvv">Card number</label>
	<?php echo $form->render('card-cvv', array('class' => 'form-control')); ?>
</div>
<button class="btn btn-default">Check</button>
<?php echo $form->render('csrf', array('value' => $this->security->getToken())); ?>
<?php echo $this->tag->endform(); ?>