<div class="span9">
<?php echo $this->Session->flash(); ?>
<h1>Add Product</h1>
<?php
echo $this->Form->create('Product', array('enctype' => 'multipart/form-data'));
echo $this->Form->input('name');
echo $this->Form->input('price');
?>
<div class="input">
<label>
Image
</label>
<?= $this->Form->file('Product.image');?>
</div>
<div class="input">
<label>
Preview
</label>
<?= $this->Form->file('Product.preview');?>
</div>
<?
echo $this->Form->input('category_id', array('type' => 'select', 'options' => $categories));
echo $this->Form->input('type_id', array('options' => $types));
echo $this->Form->input('description');
echo $this->Form->end('Add Product');
?>
</div>
