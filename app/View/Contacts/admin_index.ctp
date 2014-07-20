<div class="span12">
	<?= $this->Session->flash(); ?>
	<div class="pull-right"><?php echo $this->Html->image('contacts.png'); ?></div>
	    <div class="hero-unit">
			<h1>Contacts</h1>
			<p>In this section you can manage contacts that are signed up for your mailing list.</p>
        </div>
        <!--
        <div class="alert alert-info">
			<strong>Tip: </strong>
			You can reorder the contacts by dragging and dropping them. Changes are made automatically!
		</div>
		-->

	<table id="contacts" class="table table-bordered table-striped <!--table-hover -->">
		<thead>
			<? $paginator = $this->Paginator; ?>
			<th><?= $paginator->sort('id', 'Id'); ?></th>
			<!--<th><?= $paginator->sort('sort_order', 'Order'); ?></th>-->
			<th><?= $paginator->sort('name', 'Name'); ?></th>
			<!--<th><?= $paginator->sort('body', 'Body'); ?></th>-->
			<th><?= $paginator->sort('email', 'Email'); ?></th>
			<th><?= $paginator->sort('message', 'Message'); ?></th>
			<th>Actions</th>
		</thead>
		<tbody id="sort">
		<?php foreach ($contacts as $contact): ?>
		<tr id='Contact_<?= $contact['Contact']['id']?>'>
			<!--<td style="width:1px;"><?= $contact['Contact']['id']; ?></td>-->
			<td style="width:20px;"><?= $contact['Contact']['id']; ?>
			</td>
			<td>
				<? if(!empty($contact['Contact']['name'])): ?>
				<?= $contact['Contact']['name']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<!--
			<td>
				<? if(!empty($contact['Contact']['body'])): ?>
				<?= $this->Text->truncate($contact['Contact']['body'],
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
				<? if(!empty($contact['Contact']['email'])): ?>
				<a href="mailto:<?= $contact['Contact']['email']; ?>"><?= $contact['Contact']['email']; ?></a>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<td>
				<? if(!empty($contact['Contact']['message'])): ?>
				<?= $contact['Contact']['message']; ?>
				<?php else: ?>
				<?= '--'; ?>
				<? endif; ?>
			</td>
			<!--
			<td style="width:1px;">
				<?= $this->Html->link(
				'View',
				array(
					'controller' => 'contacts',
					'action' => 'view',
					$contact['Contact']['id']),
				array(
						'class' => 'btn btn-small btn-info'
				));?>
			</td>
			<td style="width:1px;">
				<?= $this->Html->link(
				'Edit',
				array(
					'controller' => 'contacts',
					'action' => 'edit',
					$contact['Contact']['id']),
				array(
						'class' => 'btn btn-small btn-warning'
				));?>
			</td>-->
			<td style="width:1px;">
				<?= $this->Form->postLink(
				'Delete',
				array(
					'controller' => 'contacts',
					'action' => 'delete',
					$contact['Contact']['id']),
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



