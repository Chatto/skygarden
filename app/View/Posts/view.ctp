<div id="breadcrumb">
		<!--
		<?= $this->Element('breadcrumb');?>
		-->
</div>
<section class="blog-post">
			<?= $this->Html->image(
		'perma.png', array(
			'url' => array(
				'controller'=>'posts',
				'action'=>'view',
				$post['Post']['id']
				),
			'style' => 'float:right;'
			)
		) ?>
	<h2><?php echo $post['Post']['title'];?> </h2>
	<small><?php echo $post['Post']['created']; ?></small>
	<hr style="clear:both;"/><br/>
	<article><?php echo $post['Post']['body'];?></article>
</section>
