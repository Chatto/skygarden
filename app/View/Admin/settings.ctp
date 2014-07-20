<?php
/**
 * Admin Index
 *
 * PHP 5
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the below copyright notice.
 *
 * @author     Robert Love <robert@pollenizer.com>
 * @copyright  Copyright 2012, Pollenizer Pty. Ltd. (http://pollenizer.com)
 * @license    MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @since      CakePHP(tm) v 2.1.1
 */
?>
<? //Debugger::dump($this->data); ?>
		<? $n = 0; ?>
<div class="hero-unit">
	<?= $this->Session->flash(); ?>
	<h1>Settings</h1>
	<p>The settings for the site live here!</p>
	<?php foreach ($admin_categories as $admin_category): ?>
	<h2><?= $admin_category['AdminCategory']['name']; ?></h2>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th style="width:150px;">Setting</th>
				<th>Description</th>
				<th style="width:120px;">Value</th>
			</tr>
		</thead>
		<tbody>
		<?= $this->Form->create('AdminSetting');?>
		<?php foreach ($admin_settings as $admin_setting): ?>
		
			<? if($admin_setting['AdminSetting']['admin_category_id'] == $admin_category['AdminCategory']['id']): ?>
			<tr>
				<td>
					<?= $admin_setting['AdminSetting']['name']; ?>
				</td>
				<td>
					<?= $admin_setting['AdminSetting']['description']; ?>
				</td>
				<td>
					<?= $this->Form->input($n.'.AdminSetting.id', array('type' => 'hidden'));?>
					<?= $this->Form->input($n.'.AdminSetting.key', array('type' => 'hidden'));?>
					<?= $this->Form->input($n.'.AdminSetting.value', array('div' => false, 'style' => 'margin:0px;', 'label' => false, 'type' => $admin_setting['AdminSetting']['value_type']));?>
				</td>
			</tr>
			<? $n++; ?>
			<?php endif; ?>
		<?php endforeach; ?>
		<tr>
			<td colspan="3">
			<?= $this->Form->end('Save', null, array('class' => 'btn btn-primary'));?>
			</td>
		</tr>
		</tbody>
	</table>
	<?php endforeach; ?>
</div>
