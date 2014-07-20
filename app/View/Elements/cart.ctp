<?php echo $this->Html->image('/img/store/cart.png', array('url' => array('controller' => 'cart', 'action' => 'view')), array('style' => 'padding-left:15px;')); ?>
<strong> My Cart</strong><br/>
				<h4>
					<? if(!empty($amount)):?>
					<?=  $amount; ?> Items Total
					<? else: ?>
					0 Items Total
					<? endif; ?>
				</h4>
				
				<?= $this->Html->link(
				'Update Cart',
				array(
					'controller' => 'products',
					'action' => 'index'),
				array(
						'class' => 'btn btn-mini btn-info'
				));?>
				<?= $this->Html->link(
				'Checkout',
				array(
					'controller' => 'cart',
					'action' => 'checkout'),
				array(
						'class' => 'btn btn-mini btn-success'
				));?>
