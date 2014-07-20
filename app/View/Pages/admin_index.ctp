
<div class="span12">
	<?= $this->Session->flash(); ?>
	<div class="pull-right"><?php echo $this->Html->image('/img/admin_icons/pages.png'); ?></div>
	    <div class="hero-unit">
			<h1>Pages</h1>
			<p>In this section you can manage your site's pages.</p>
        </div>
        
        <div class="alert alert-info">
			<strong>Tip: </strong>
			Pages are best used for serving static HTML pages.
		</div>
		

	<table id="pages" class="table table-bordered table-striped">
		<thead>
			<? $paginator = $this->Paginator; ?>
			<th><?= $paginator->sort('id', 'Id'); ?></th>
			<th><?= $paginator->sort('name', 'Name'); ?></th>
			<th><?= $paginator->sort('title', 'Title'); ?></th>
			<th><?= $paginator->sort('description', 'Description'); ?></th>
			<th colspan="3">Actions</th>
		</thead>
		<tbody id="sort">
		<?php foreach ($pages as $page): ?>
		<tr id='Page_<?= $page['Page']['id']?>'>
			<td style="width:20px;"><?= $page['Page']['id']; ?>
			</td>
			<td>
				<? if(!empty($page['Page']['name'])): ?>
				<?= $page['Page']['name']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($page['Page']['title'])): ?>
				<?= $page['Page']['title']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			
			<td>
				<? if(!empty($page['Page']['description'])): ?>
				<?= $this->Text->truncate($page['Page']['description'],
				200,
				array(
					'ellipsis' => '...',
					'exact' => false,
					'html' => true)); ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			
			<td style="width:1px;">
				<?= $this->Html->link(
				'View',
				array(
					'controller' => 'pages',
					'action' => $page['Page']['name']
					),
				array(
						'class' => 'btn btn-small btn-info'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'Edit',
				array(
					'controller' => 'pages',
					'action' => 'edit',
					$page['Page']['name']),
				array(
						'class' => 'btn btn-small btn-warning'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Delete',
				array(
					'controller' => 'pages',
					'action' => 'delete',
					$page['Page']['id']),
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



