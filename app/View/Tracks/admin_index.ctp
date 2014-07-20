<div class="span12">
	<?= $this->Session->flash(); ?>
	<div class="pull-right"><?php echo $this->Html->image('tracks.png'); ?></div>
	    <div class="hero-unit">
			<h1>Tracks</h1>
			<p>In this section you can manage your track collection!</p>
        </div>

	<table id="trackss" class="table table-bordered table-striped table-hover">
		<thead>
			<? $paginator = $this->Paginator; ?>
			<th><?= $paginator->sort('id', 'Id'); ?></th>
			<th><?= $paginator->sort('name', 'Name'); ?></th>
			<th><?= $paginator->sort('genre', 'Genre'); ?></th>
			<th><?= $paginator->sort('album_id', 'Album'); ?></th>
			<th colspan="5">Actions</th>
		</thead>
		<tbody id="sort">
		<?php foreach ($tracks as $track): ?>
		<tr id='Track_<?= $track['Track']['id']?>'>
			<td style="width:1px;"><?= $track['Track']['id']; ?></td>
			<td>
				<? if(!empty($track['Track']['name'])): ?>
				<?= $track['Track']['name']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($track['Track']['genre'])): ?>
				<?= $track['Track']['genre']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($track['Track']['album_id'])): ?>
				<?= $track['Track']['album_id']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'View',
				array(
					'controller' => 'tracks',
					'action' => 'view',
					$track['Track']['id']),
				array(
						'class' => 'btn btn-small btn-info'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Edit',
				array(
					'controller' => 'tracks',
					'action' => 'edit',
					$track['Track']['id']),
				array(
						'class' => 'btn btn-small btn-warning'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Delete',
				array(
					'controller' => 'tracks',
					'action' => 'delete',
					$track['Track']['id']),
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



