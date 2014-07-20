<div id="header">
	<div class="navbar">
		<ul class="nav">
			<li><?= $this->Html->link('Admin', array('controller' => 'admin', 'action' => 'admin_index'));?></li>
			<?php foreach ($admin_categories as $admin_category): ?>
				<li<?php 
				$request = $admin_category['AdminCategory']['controller'].$admin_category['AdminCategory']['action'].$admin_category['AdminCategory']['params'];
				$requesturl = $this->request['url'];
				if($request == $requesturl) 
				{
					echo ' class="active"';
				}
				else{
					echo ' class="inactive"';
					} ?>>
				<?= $this->Html->link($admin_category['AdminCategory']['name'], array('controller' => $admin_category['AdminCategory']['controller'], 'action' => $admin_category['AdminCategory']['action'], $admin_category['AdminCategory']['id']));?></li>
			<?php endforeach; ?>
			<li>			
			<?= $this->element('search');?>
			</li>
			<li class="home"><?php echo $this->Html->image('home.png', array('url' => '/', 'class' => 'home')); ?></li>
			<li class="logout"><?php echo $this->Html->image('logout.png', array('url' => '/users/logout', 'class' => 'logout')); ?></li>
		</ul>
	</div>
</div>
