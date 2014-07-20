<div class="hero-unit">
	<h1>Contact us</h1>
<p>Thank you for your interest in Skygarden. Please use the form below to get in touch!</p>
</div>
<section id="contact">
	<?= $this->Form->create('Contact', array('action' => 'send', 'class' => "inverse")); ?>
	
		<?= $this->Form->input('Contact.name', array(
			'label' => 'Name', 'maxlength' => 100, 'size' => 40, 'style'=>'width:200px;')); ?>
			
		<?= $this->Form->input('Contact.email', array(
			'label' => 'E-mail', 'maxlength' => 100, 'size' => 40, 'style'=>'width:200px;')); ?>
			
		<?= $this->Form->input('Contact.message', array(
			'label' => 'Message', 'cols' => 50, 'rows' => 10, 'style'=>'width:380px;')); ?>
			
	<? echo $this->Form->submit(
			'Send Message', array(
				'class' => 'btn btn-primary btn-large',
				'title' => 'Send Message'));?>
</section>
