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
<div class="hero-unit">
	<?= $this->Session->flash(); ?>
	<h1>Skygarden Central Control!</h1>
	<p>Click one of the icons below or use the above navigation to get started.</p>
</div>
	
		<?php foreach ($admin_categories as $admin_category): ?>
		<h3 style="border-radius:10px;margin:10px;padding:0px;width:auto;position:relative;left:-20px;"><?= $admin_category['AdminCategory']['name']; ?></h3>
		<ul style="margin:5px;padding:0px;">
		<? foreach ($admin_links as $admin_link): ?>
			<? if ($admin_link['AdminLink']['admin_category_id'] == $admin_category['AdminCategory']['id']): ?>
			<li style="width:190px;margin:5px;padding:0px;"><?php echo $this->Html->image('admin_icons/' . strToLower($admin_link['AdminLink']['name']) . '.png', array('url' => array('controller' => $admin_link['AdminLink']['controller'], 'action' => $admin_link['AdminLink']['action']), 'style' => 'width:52px;height:52px;')); ?>
			<? echo $this->Html->link($admin_link['AdminLink']['name'], array('controller' => $admin_link['AdminLink']['controller'], 'action' => $admin_link['AdminLink']['action']), array('class' => 'btn btn-warning', 'style' => 'width:40%;'));?>
			</li>
			<? endif;?>
		<? endforeach;?>
			</ul><br/>
			
		<? endforeach; ?>

