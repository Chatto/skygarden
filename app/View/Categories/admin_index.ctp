<div class="span12">
	<?= $this->Session->flash(); ?>
	<div class="pull-right"><?php echo $this->Html->image('categories.png'); ?></div>
	    <div class="hero-unit">
			<h1>Categories</h1>
			<p>In this section you can manage the categories for the storefront</p>
        </div>
        <div class="alert alert-info">
			<strong>Tip: </strong>
			You can reorder the categories by dragging and dropping them. Changes are made automatically!
			</div>

	<table id="categories" class="table table-bordered table-striped table-hover">
		<thead>
			<? $paginator = $this->Paginator; ?>
			<th><?= $paginator->sort('id', 'Id'); ?></th>
			<th><?= $paginator->sort('name', 'Name'); ?></th>
			<th><?= $paginator->sort('parent_id', 'Parent'); ?></th>
			<th><?= $paginator->sort('description', 'Description'); ?></th>
			<th colspan="5">Actions</th>
		</thead>
		<tbody id="sort">
		<?php foreach ($categories as $category): ?>
		<tr id='Category_<?= $category['Category']['id']?>'>
			<!--<td style="width:1px;"><?= $category['Category']['id']; ?></td>-->
			<td style="width:20px;"><i id="#move" class="icon-list icon-white"></i> <?= $category['Category']['id']; ?>
			</td>
			<td>
				<? if(!empty($category['Category']['name'])): ?>
				<?= $category['Category']['name']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($category['Category']['parent_id'])): ?>
				<?= $category['Category']['parent_id']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($category['Category']['description'])): ?>
				<?= $category['Category']['description']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'▲',
				array(
					'controller' => 'categories',
					'action' => 'moveup',
					$category['Category']['id']),
				array(
						'class' => 'btn btn-small btn-success'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'▼',
				array(
					'controller' => 'categories',
					'action' => 'movedown',
					$category['Category']['id']),
				array(
						'class' => 'btn btn-small btn-success'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'View',
				array(
					'controller' => 'categories',
					'action' => 'view',
					$category['Category']['id']),
				array(
						'class' => 'btn btn-small btn-info'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Edit',
				array(
					'controller' => 'categories',
					'action' => 'edit',
					$category['Category']['id']),
				array(
						'class' => 'btn btn-small btn-warning'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Delete',
				array(
					'controller' => 'categories',
					'action' => 'delete',
					$category['Category']['id']),
				array(
						'class' => 'btn btn-small btn-danger',
						' "Are you sure you wish to delete this?"'
				));?>
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php
$this->Js->get('#sort');
$this->Js->sortable(array(
	'complete' => '$.post("/categories/reorder", $("#sort").sortable("serialize"))',
	'revert' => true,
	'distance' => '15',
	'containment' => '#categories'
	
	));
?>
</div>



