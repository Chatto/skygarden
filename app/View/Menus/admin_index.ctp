<div class="span12">
	<?= $this->Session->flash(); ?>
	<div class="pull-right"><?php echo $this->Html->image('menus.png'); ?></div>
	    <div class="hero-unit">
			<h1>Menus</h1>
			<p>In this section you can manage the top navigation links</p>
        </div>
        <div class="alert alert-info">
			<strong>Tip: </strong>
			You can reorder the menus by dragging and dropping them. Changes are made automatically!
			</div>

	<table id="menus" class="table table-bordered table-striped table-hover">
		<thead>
			<? $paginator = $this->Paginator; ?>
			<!--<th><?= $paginator->sort('id', 'Id'); ?></th>-->
			<th><?= $paginator->sort('sort_order', 'Order'); ?></th>
			<th><?= $paginator->sort('name', 'Name'); ?></th>
			<th><?= $paginator->sort('controller', 'Controller'); ?></th>
			<th><?= $paginator->sort('action', 'Action'); ?></th>
			<th colspan="3">Actions</th>
		</thead>
		<tbody id="sort">
		<?php foreach ($menus as $menu): ?>
		<tr id='Menu_<?= $menu['Menu']['id']?>'>
			<!--<td style="width:1px;"><?= $menu['Menu']['id']; ?></td>-->
			<td style="width:20px;"><i id="#move" class="icon-list icon-white"></i> <?= $menu['Menu']['sort_order']; ?>
			</td>
			<td>
				<? if(!empty($menu['Menu']['name'])): ?>
				<?= $menu['Menu']['name']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($menu['Menu']['controller'])): ?>
				<?= $menu['Menu']['controller']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($menu['Menu']['action'])): ?>
				<?= $menu['Menu']['action']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'View',
				array(
					'controller' => 'menus',
					'action' => 'view',
					$menu['Menu']['id']),
				array(
						'class' => 'btn btn-small btn-info'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Edit',
				array(
					'controller' => 'menus',
					'action' => 'edit',
					$menu['Menu']['id']),
				array(
						'class' => 'btn btn-small btn-warning'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Delete',
				array(
					'controller' => 'menus',
					'action' => 'delete',
					$menu['Menu']['id']),
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
	'complete' => '$.post("/menus/reorder", $("#sort").sortable("serialize"))',
	'revert' => true,
	'distance' => '15',
	'containment' => '#menus'
	
	));
?>
</div>



