<div class="span6">
<?php echo $this->Session->flash(); ?>
<h1>Edit Product</h1>
<?php
echo $this->Form->create('Product', array('enctype' => 'multipart/form-data'));
echo $this->Form->input('name');
echo $this->Form->input('price');
?>
<div class="input">
<label>
Image
</label>
<?
echo $this->Html->image('../' . $product['Product']['image'], array(
			'style' => 'padding:10px;padding-left:0px;width:100px;height:100px;'
			)
		);
?>
<div style="margin-left:100px;">
<? echo $this->Form->file('Product.image');?>
</div>
</div>
<div class="input">
	<label>
	Preview
	</label>
	<audio controls autobuffer preload='auto'>
		<source src="/<?= $product['Product']['preview'];?>">
	</audio>
	<div style="margin-left:100px;">
	<?
	echo $this->Form->file('Product.preview');
	?>
	</div>
</div>

<?
echo $this->Form->input('category_id', array('type' => 'select', 'options' => $categories, 'div' => array('style' => 'clear:both;')));
echo $this->Form->input('type_id', array('type' => 'select', 'options' => $types));
echo $this->Form->input('description');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Product');
?>
</div>
