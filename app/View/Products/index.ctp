<?= $this->Session->flash(); ?>
<div class="hero-unit">
	<h1>My Cart</h1>
	<p>Manage your cart here. Happy shopping!</p>
</div>
<? $totalPrice = 0; ?>
<? $itemQuantity = 0; ?>

<? if(!($cart == null)): ?>
<?= $this->Form->create('Product', array('action' => 'cart_update'));?>
	<table class="table table-bordered table-striped">
		<thead>
			<th style="width:50px;">Price</th>
			<th>Name</th>
			<th style="width:1px;">QTY</th>
			<th style="width:1px;">Remove</th>
		</thead>
		<tbody>
		<?php foreach ($cart as $item => $product): ?>
		<tr>
			<td><?= $this->Number->currency($product['Product']['price'], 'USD'); ?></td>
			<td><?= $this->Html->link($product['Product']['name'], array('action'=> 'view', $product['Product']['id'])); ?></td>
			<td><?= $this->Form->input($product['Product']['id'],array('label' => false,'div' => array('style'=>'margin-top:0px;'),'type'=>'number','style'=>'width:35px;height:20px;margin:0px;padding:0px;','default' => $this->Session->read('Quantity.' . $product['Product']['id']))); ?></td>
			<td>
				<?= $this->Html->link(
				'Remove',
				array(
					'controller' => 'products',
					'action' => 'remove_item',
					 $item)
					,
				array(
						'class' => 'btn btn-mini btn-danger'
				));?>
			</td>
		</tr>
		    <?php 
			//calculate total price of all products in a cart
			$totalPrice = $totalPrice + $product['Product']['price']*$this->Session->read('Quantity.' . $product['Product']['id']);
			$itemQuantity = $itemQuantity + $this->Session->read('Quantity.' . $product['Product']['id']);
			?>
		<? endforeach; ?>
		
		<thead>
			<th class="totals"><strong>Subtotal: </strong></th>
			<th class="totals"></th>
			<th class="totals"><?= $itemQuantity; ?></th>
			<th class="totals"><?= $this->Number->currency($totalPrice, 'USD'); ?></th>
		</thead>
		</tbody>
	</table>
				<?= $this->Html->link(
				'Clear Cart',
				array(
					'controller' => 'products',
					'action' => 'clear_cart'),
				array(
						'class' => 'btn btn-info'
				));?>
				<?= $this->Form->button('Update Quantities', array(
					'class' => 'btn btn-warning',
					'type' => 'submit'
					)
				);?>
				<?= $this->Html->link(
				'Checkout',
				array(
					'controller' => 'cart',
					'action' => 'checkout'),
				array(
						'class' => 'btn btn-success'
				));?>
<? else: ?>
	<h3>You Shopping Cart is empty.</h3>
<? endif; ?>
