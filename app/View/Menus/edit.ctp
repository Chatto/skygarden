<div class="span9">
<?php echo $this->Session->flash(); ?>
<h1>Edit Menu</h1>
<?php
echo $this->Form->create('Menu');
echo $this->Form->input('sort_order');
echo $this->Form->input('name');
echo $this->Form->input('controller');
echo $this->Form->input('action');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
</div>
