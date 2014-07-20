
<? $paginator = $this->Paginator; ?>

<div class="hero-unit">
	<h1>Skygarden Blog</h1>
	<p>Get the latest news, events, thoughts, and ideas manifesting at our collective!</p>
</div>
	<!--
		<?= $this->Element('breadcrumb');?>
	-->
<div class="pagination">
	<ul>
				<?php
				if($paginator->hasPrev())
				{
					echo $paginator->prev("Prev");
				}

				echo $paginator->numbers(array('modulus' => 5));

				if($paginator->hasNext())
				{
					echo $paginator->next("Next");
				}
				?>
	</ul>
</div>
<?php foreach ($posts as $post): ?>
<section class="blog-post">
	<div class="pull-left" style="margin:5px;"><?= $this->Html->image('../'.$post['User']['avatar'], array('style' => 'width:100px;height:100px;border-radius:10px;')); ?></div>
	<div class="pull-right">
			<?= $this->html->link('Read More...', array(
			'controller'=>'posts',
			'action'=>'view',
			$post['Post']['id']),
			array(
			'class' => 'btn btn-small btn-primary',
			'style' => 'display:inline-block;')
			);?>
			
			<?= $this->html->link('Comments...', array(
			'controller'=>'posts',
			'action'=>'view',
			$post['Post']['id']),
			array(
			'class' => 'btn btn-small btn-success',
			'style' => 'display:inline-block;')
			);?><br/>
			<div class="pull-right" style="position:absolute;bottom:0px;">
				<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/">Share this</div>
			</div>
	</div>

	<div style="height:100px;float:left;">
	<h2 style="line-height:20px;"><?php echo $post['Post']['title'];?> </h2>
	<h5>by <?= $post['User']['display_name'];?></h5>
	<h5><?php echo $this->Time->timeAgoInWords($post['Post']['created']); ?></h5>
	</div>
	<div class="clearfix"></div>
	<hr/>
	<br/>
		<article>
			<?= $this->Text->truncate($post['Post']['body'], 1500, array('html'=>true, 'ellipsis' => '...')); ?><br/>
		</article>
	<div class="clearfix"></div>
	<div class="sharelinks">Share on Facebook. Tweet This.</div>
</section>
    <?php endforeach; ?>
    <?php unset($post); ?>
</div>
