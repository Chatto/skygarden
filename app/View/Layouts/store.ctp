<?php
$cakeDescription = "Skygarden";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');
		echo $this->Html->css('chatto');

		echo $this->Html->script('bootsrtap');
		echo $this->Html->script('jquery-1.2.6');
		echo $this->Html->script('jquery.jplayer.min');
		echo $this->Html->script('ui.core');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<script language="javascript"> 
	function switchPage(thePage) { 
	  if(window.currentPage) { 
		if(thePage != window.currentPage) { 
		  new Effect.Fade(window.currentPage); 
		  window.currentPage = thePage; 
		  new Effect.Appear(thePage, {delay:0.5});     
		} 
	  } 
	} 
	</script> 
</head>
<body>
<div id="header">
    <?= $this->element('menus/main'); ?>
</div>
<div class="container">
	<div class="row-fluid">
		<div class="span2">
			<?= $this->Element('store-nav');?>
		</div>
		<div class="span10">
			<div class="blog-content">
				<?= $this->fetch('content'); ?>
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<?= $this->Html->image("facebook.png", array(
    "alt" => "Skygarden on Facebook",
    'url' => "https://www.facebook.com/SkygardenProductions"));?>
    
	<?= $this->Html->image("twitter.png", array(
    "alt" => "Skygarden on Twitter",
    'url' => "https://twitter.com/Skygarden"));?>
    
	<?= $this->Html->image("youtube.png", array(
    "alt" => "Skygarden on Youtube",
    'url' => "https://www.youtube.com/SkygardenProductions"));?>
    
	<?= $this->Html->image("livestream.png", array(
    "alt" => "Skygarden on Livestream",
    'url' => "https://www.livestream.com/SkygardenProductions"));?>
    
	<?= $this->Html->image("soundcloud.png", array(
    "alt" => "Skygarden on Soundcloud",
    'url' => "https://www.soundcloud.com/SkygardenProductions"));?>
</div>
<?php echo $this->Js->writeBuffer();?>
<?php echo $this->Html->script('chatto'); ?>
</body>
</html>
