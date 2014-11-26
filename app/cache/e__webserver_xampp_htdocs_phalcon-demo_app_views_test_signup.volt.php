<?php echo $this->tag->form(array('test/signup', 'role' => 'form')); ?>
<div class="form-group <?php echo $form->getErrorClassFor('birthMonth'); ?>">
<?php echo $form->label('birthMonth'); ?>
<?php echo $form->render('birthMonth'); ?>
</div>
<div class="form-group <?php echo $form->getErrorClassFor('birthDay'); ?>">
<?php echo $form->label('birthDay'); ?>
<?php echo $form->render('birthDay'); ?>
</div>
<div class="form-group <?php echo $form->getErrorClassFor('birthYear'); ?>">
<?php echo $form->label('birthYear'); ?>
<?php echo $form->render('birthYear'); ?>
</div>

<button class="btn btn-default">Check</button>

<?php echo $this->tag->endform(); ?>