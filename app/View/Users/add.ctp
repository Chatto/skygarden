<div class="span9">
<?php echo $this->Session->flash(); ?>
<h1>Add User</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('display_name');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('password_confirm', array('label' => 'Confirm Password', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
echo $this->Form->input('email');
echo $this->Form->input('role', array('options' => array('admin' => 'Admin', 'writer' => 'Writer', 'artist' => 'Artist', 'merchant' => 'Merchant')));
echo $this->Form->end('Save User');
?>
</div>
