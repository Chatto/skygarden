<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = "Skygarden";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $settings['site_name']; ?>:
		<?php if($content[0]['Page']['title']) echo $content[0]['Page']['title']; ?>
	</title>
	<?= $this->Html->meta(
    'keywords',
    $settings['site_keywords']
); ?>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');
		echo $this->Html->css('chatto');
		echo $this->Html->script('bootsrtap');
        echo $this->Html->script('jquery-1.2.6');
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
			<?php echo $this->fetch('content'); ?>
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
</body>
</html>
