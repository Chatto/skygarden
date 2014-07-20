<div class="span9">
<?php echo $this->Session->flash(); ?>
<h1>Edit User</h1>
<?php
echo $this->Form->create('User', array('enctype' => 'multipart/form-data'));
echo $this->Form->input('display_name');
?>

<div class="input">
<label>
Avatar
</label>
<?
echo $this->Html->image('../' . $user['User']['avatar'], array(
			'style' => 'padding:10px;padding-left:0px;width:100px;height:100px;'
			)
		);
?>
<div style="margin-left:100px;">
<? echo $this->Form->file('User.avatar');?>
</div>
</div>
<?
echo $this->Form->input('username');
echo $this->Form->input('password_update', array('value'=>'','label'=>'Update Password'));
echo $this->Form->input('password_confirm_update', array('label' => 'Retype Password', 'maxLength' => 255, 'title' => 'Confirm Password', 'type'=>'password'));
echo $this->Form->input('email_update');
echo $this->Form->input('role', array('options' => array('admin' => 'Admin', 'writer' => 'Writer', 'artist' => 'Artist', 'merchant' => 'Merchant')));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save User');
?>
</div>
