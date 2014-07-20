				

<ul class="nav nav-list blog-nav">
					<?= $this->Element('cart');?><br /><br />
				<?php echo $this->Html->image('/img/store/departments.png', array('url' => array('controller' => 'cart', 'action' => 'view')), array('style' => 'padding-left:15px;')); ?>
	<strong>Departments</strong><br/><br/>
	<?
	foreach($categories as $category){
	 echo '<li style="padding-left:15px;">';
	 		 if(!empty($category['Category']['parent_id']))
	 {
		echo '<span> ⇢ </span>';
	 }
	 echo '<span>';
	 echo $this->Html->link(
			$category['Category']['name'],
			array('controller' => 'categories', 'action' => 'view', $category['Category']['id'])
		);
		echo '</span>';
		echo '</li>';
	}
	
	?>
	
</ul>
