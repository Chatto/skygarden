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
	<h1><?= $category['AdminCategory']['name']; ?></h1>
	<p><?= $category['AdminCategory']['description']; ?></p>
	<section>
	<ul>
		<? foreach ($admin_links as $admin_link): ?>
			<? if ($admin_link['AdminLink']['admin_category_id'] == $category['AdminCategory']['id']): ?>
			<li style="width:350px;margin:10px;">
				<?php echo $this->Html->image('admin_icons/' . strToLower($admin_link['AdminLink']['name']) . '.png', array('url' => array('controller' => $admin_link['AdminLink']['controller'], 'action' => $admin_link['AdminLink']['action']))); ?>
				
			<? echo $this->Html->link($admin_link['AdminLink']['name'], array('controller' => $admin_link['AdminLink']['controller'], 'action' => $admin_link['AdminLink']['action']), array('class' => 'btn btn-info btn-large', 'style' => 'width:160px;'));?>
			</li>
			<? endif;?>
		<? endforeach;?>
	</ul>
	</section>
</div>
