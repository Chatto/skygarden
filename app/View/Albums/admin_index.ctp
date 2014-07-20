<div class="span12">
	<?= $this->Session->flash(); ?>
	<div class="pull-right"><?php echo $this->Html->image('albums.png'); ?></div>
	    <div class="hero-unit">
			<h1>Albums</h1>
			<p>In this section you can manage Skygarden's Music Library!</p>
        </div>

	<table id="albums" class="table table-bordered table-striped table-hover">
		<thead>
			<? $paginator = $this->Paginator; ?>
			<th><?= $paginator->sort('id', 'Id'); ?></th>
			<th><?= $paginator->sort('name', 'Name'); ?></th>
			<th><?= $paginator->sort('product_id', 'Product'); ?></th>
			<th colspan="5">Actions</th>
		</thead>
		<tbody id="sort">
		<?php foreach ($albums as $album): ?>
		<tr id='Category_<?= $album['Album']['id']?>'>
			<td style="width:1px;"><?= $album['Album']['id']; ?></td>
			<td>
				<? if(!empty($album['Album']['name'])): ?>
				<?= $album['Album']['name']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($album['Album']['parent_id'])): ?>
				<?= $album['Album']['parent_id']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($album['Album']['description'])): ?>
				<?= $album['Album']['description']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'▲',
				array(
					'controller' => 'albums',
					'action' => 'moveup',
					$album['Album']['id']),
				array(
						'class' => 'btn btn-small btn-success'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'▼',
				array(
					'controller' => 'albums',
					'action' => 'movedown',
					$album['Album']['id']),
				array(
						'class' => 'btn btn-small btn-success'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'View',
				array(
					'controller' => 'albums',
					'action' => 'view',
					$album['Album']['id']),
				array(
						'class' => 'btn btn-small btn-info'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Edit',
				array(
					'controller' => 'albums',
					'action' => 'edit',
					$album['Album']['id']),
				array(
						'class' => 'btn btn-small btn-warning'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Delete',
				array(
					'controller' => 'albums',
					'action' => 'delete',
					$album['Album']['id']),
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
	'complete' => '$.post("/albums/reorder", $("#sort").sortable("serialize"))',
	'revert' => true,
	'distance' => '15',
	'containment' => '#albums'
	
	));
?>
</div>



