<div class="span12">
	<?= $this->Session->flash(); ?>
	<div class="pull-right"><?php echo $this->Html->image('products.png'); ?></div>
	    <div class="hero-unit">
			<h1>Products</h1>
			<p>In this section you can manage products in the storefront!</p>
        </div>


	<table id="products" class="table table-bordered table-striped <!--table-hover -->">
		<thead>
			<? $paginator = $this->Paginator; ?>
			<th><?= $paginator->sort('id', 'Id'); ?></th>
			<th><?= $paginator->sort('name', 'Name'); ?></th>
			<th><?= $paginator->sort('price', 'Price'); ?></th>
			<th><?= $paginator->sort('type', 'Type'); ?></th>
			<th><?= $paginator->sort('category_id', 'Category'); ?></th>
			<th colspan="3">Actions</th>
		</thead>
		<tbody id="sort">
		<?php foreach ($products as $product): ?>
		<tr id='Product_<?= $product['Product']['id']?>'>
			<td style="width:20px;"><?= $product['Product']['id']; ?>
			</td>
			<td>
				<? if(!empty($product['Product']['name'])): ?>
				<?= $product['Product']['name']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($product['Product']['price'])): ?>
				$<?= $product['Product']['price']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($product['Product']['type_id'])): ?>
				<?= $types[$product['Product']['type_id']]; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($product['Product']['category_id'])): ?>
				<?= $categories[$product['Product']['category_id']] ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'View',
				array(
					'controller' => 'products',
					'action' => 'view',
					$product['Product']['id']),
				array(
						'class' => 'btn btn-small btn-info'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'Edit',
				array(
					'controller' => 'products',
					'action' => 'edit',
					$product['Product']['id']),
				array(
						'class' => 'btn btn-small btn-warning'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Delete',
				array(
					'controller' => 'products',
					'action' => 'delete',
					$product['Product']['id']),
				array(
						'class' => 'btn btn-small btn-danger',
						' "Are you sure you wish to delete this?"'
				));?>
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

</div>



