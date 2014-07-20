<div class="clearfix">
<?php foreach ($latest as $product):?>
<div style="float:left; position:relative;width:180px;height:180px; margin:10px;">
	<div style="float:left;margin:10px;width:180px;height:180px;display:inline-block;position:absolute;background:url('../../<?= $product['Product']['image'];?>');background-size:contain;background-repeat: no-repeat;">
		<div style="background:rgba(0,0,0,0.5);padding:5px;">
		<strong><?php echo $this->Html->link($product['Product']['name'], array('controller' => 'products', 'action' => 'view', $product['Product']['id']), array('style' => 'color:#FFF;')); ?></strong><br/>
		

		<?= $this->Html->link(
				'Details',
				array(
					'controller' => 'products',
					'action' => 'view',
					$product['Product']['id']),
				array(
						'class' => 'btn btn-mini btn-inverse'
				));?>
		<?= $this->Html->link(
				'Add to Cart',
				array(
					'controller' => 'products',
					'action' => 'add_to_cart',
					$product['Product']['id']),
				array(
						'class' => 'btn btn-mini btn-info'
				));?>
				<h3 style="margin:0px;padding:0px;line-height:30px;color:#FFF;"><?= $this->Number->currency($product['Product']['price'], 'USD'); ?></h3>
		</div>
		

	</div>			
		<? if(!empty($product['Product']['preview'])):?>
		<audio controls style="margin:10px;position:absolute;bottom:-20px;width:180px;display:block;" preload='auto' src="/<?php echo $product['Product']['preview']; ?>"></audio>
		<? endif; ?>
</div>
<?php endforeach; ?>
</div>
