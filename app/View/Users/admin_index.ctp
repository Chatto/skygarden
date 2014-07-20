<div class="span12">
	<?= $this->Session->flash(); ?>
	<div class="pull-right"><?php echo $this->Html->image('admin_icons/users.png'); ?></div>
	    <div class="hero-unit">
			<h1>Users</h1>
			<p>In this section you can manage users.</p>
        </div>
        <!--
        <div class="alert alert-info">
			<strong>Tip: </strong>
			You can reorder the users by dragging and dropping them. Changes are made automatically!
		</div>
		-->

	<table id="users" class="table table-bordered table-striped <!--table-hover -->">
		<thead>
			<? $paginator = $this->Paginator; ?>
			<th><?= $paginator->sort('id', 'Id'); ?></th>
			<!--<th><?= $paginator->sort('sort_order', 'Order'); ?></th>-->
			<th><?= $paginator->sort('username', 'Username'); ?></th>
			<!--<th><?= $paginator->sort('display_name', 'Display Name'); ?></th>-->
			<th><?= $paginator->sort('email', 'Email'); ?></th>
			<th><?= $paginator->sort('role', 'Role'); ?></th>
			<th colspan="3">Actions</th>
		</thead>
		<tbody id="sort">
		<?php foreach ($users as $user): ?>
		<tr id='User_<?= $user['User']['id']?>'>
			<!--<td style="width:1px;"><?= $user['User']['id']; ?></td>-->
			<td style="width:20px;"><?= $user['User']['id']; ?>
			</td>
			<td>
				<? if(!empty($user['User']['username'])): ?>
				<?= $user['User']['username']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<!--
			<td>
				<? if(!empty($user['User']['display_name'])): ?>
				<?= $this->Text->truncate($user['User']['display_name'],
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
				<? if(!empty($user['User']['email'])): ?>
				<?= $user['User']['email']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($user['User']['role'])): ?>
				<?= $user['User']['role']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'View',
				array(
					'controller' => 'users',
					'action' => 'view',
					$user['User']['id']),
				array(
						'class' => 'btn btn-small btn-info'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Edit',
				array(
					'controller' => 'users',
					'action' => 'edit',
					$user['User']['id']),
				array(
						'class' => 'btn btn-small btn-warning'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'Delete',
				array(
					'controller' => 'users',
					'action' => 'delete',
					$user['User']['id']),
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



