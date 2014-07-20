	<div class="navbar">
			<ul class="nav">
				<li><?= $this->Html->image('badge-mini.png');?></li>
			<? if (!isset($menus) || empty($menus)) :
					$menus = $this->requestAction('/menus/index');
				endif; 
				foreach($menus as $menu) : 
			?>
				<li<?= ($menu['Menu']['controller'] == $this->request['controller'])&&($menu['Menu']['action'] == $this->request['action'])?' class="active"':' class="inactive"'; ?>>
				<?="<a href='".DS.$menu['Menu']['controller'].DS.$menu['Menu']['action']."'>".$menu['Menu']['name']."</a>"; ?>
				</li>
			<? endforeach; ?>
			</ul>
	</div>
