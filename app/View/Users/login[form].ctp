
<section id="login">
<?= $this->Session->flash('auth');?>
<?= $this->Form->create('Users');?>
<div class="hero-unit">
<?= $this->Html->link(
				'Register',array(
				'action' => 'add'), array(
					'class' => 'btn btn-success'
				));?>
    <?= $this->Html->link(
				'Reset Password',array(
				'action' => 'password_reset'), array(
					'class' => 'btn btn-info'
				));?>
<h2>Skygarden Login</h2>
<p>Please Login to access this page.</p>
</div>
	<?= $this->Form->input('username');?>  
	<?= $this->Form->input('password');?>

	<?= $this->Form->submit('Login', array('class' => 'btn btn-primary',  'title' => 'Login', 'style'=>"display:inline;") )?>
	<?= $this->Form->end();?>
</section>
