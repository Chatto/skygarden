<div class="hero-unit">
	<h1><?= $category['Category']['name']; ?></h1>
	<p><?= $category['Category']['description']; ?></p>
</div>
<section>
	<?php echo $this->element('products'); ?>
</section>
