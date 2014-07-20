<div class="span12">
	<?= $this->Session->flash(); ?>
	<div class="pull-right"><?php echo $this->Html->image('posts.png'); ?></div>
	    <div class="hero-unit">
			<h1>Posts</h1>
			<p>In this section you can manage blog posts!</p>
        </div>
        <!--
        <div class="alert alert-info">
			<strong>Tip: </strong>
			You can reorder the posts by dragging and dropping them. Changes are made automatically!
		</div>
		-->

	<table id="posts" class="table table-bordered table-striped <!--table-hover -->">
		<thead>
			<? $paginator = $this->Paginator; ?>
			<th><?= $paginator->sort('id', 'Id'); ?></th>
			<!--<th><?= $paginator->sort('sort_order', 'Order'); ?></th>-->
			<th><?= $paginator->sort('title', 'Title'); ?></th>
			<!--<th><?= $paginator->sort('body', 'Body'); ?></th>-->
			<th><?= $paginator->sort('created', 'Created'); ?></th>
			<th><?= $paginator->sort('modified', 'Modified'); ?></th>
			<th colspan="3">Actions</th>
		</thead>
		<tbody id="sort">
		<?php foreach ($posts as $post): ?>
		<tr id='Post_<?= $post['Post']['id']?>'>
			<!--<td style="width:1px;"><?= $post['Post']['id']; ?></td>-->
			<td style="width:20px;"><?= $post['Post']['id']; ?>
			</td>
			<td>
				<? if(!empty($post['Post']['title'])): ?>
				<?= $post['Post']['title']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<!--
			<td>
				<? if(!empty($post['Post']['body'])): ?>
				<?= $this->Text->truncate($post['Post']['body'],
				200,
				array(
					'ellipsis' => '...',
					'exact' => false,
					'html' => true)); ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			-->
			<td>
				<? if(!empty($post['Post']['created'])): ?>
				<?= $post['Post']['created']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($post['Post']['modified'])): ?>
				<?= $post['Post']['modified']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'View',
				array(
					'controller' => 'posts',
					'action' => 'view',
					$post['Post']['id']),
				array(
						'class' => 'btn btn-small btn-info'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'Edit',
				array(
					'controller' => 'posts',
					'action' => 'edit',
					$post['Post']['id']),
				array(
						'class' => 'btn btn-small btn-warning'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Delete',
				array(
					'controller' => 'posts',
					'action' => 'delete',
					$post['Post']['id']),
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



