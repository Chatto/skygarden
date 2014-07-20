<div class="span9">
<?php echo $this->Session->flash(); ?>
<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3','style'=>'width:600px;height:400px;'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
</div>
