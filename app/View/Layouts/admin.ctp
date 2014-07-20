<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin - <?= $this->request['controller'] ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/css/bootstrap.css" rel="stylesheet">
        <!--<link href="/css/bootstrap-responsive.css" rel="stylesheet">-->
        <link href="/css/chatto.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
        <?php echo $this->Html->meta('icon'); ?>

    </head>
    <body>
		<div style="position:fixed;z-index:-10;width:100%; height:100%;">
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="auto" height="auto">
<param name="movie" value=".chatto2.swf" />
<param name="quality" value="low" />
<param name="wmode" value="transparent" />
<embed src="/chatto2.swf" wmode="transparent" quality="low" type="application/x-shockwave-flash" width="100%" height="100%" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
</div>
<div id="header">
    <?= $this->element('header'); ?>
</div>
<div class="container">
	<div class="row-fluid">
					<div class="span2" style="position:relative; top:12px;">
						<?= $this->Element('actions');?>
					</div>
					<div class="span10">
						<?php echo $this->fetch('content'); ?>
					</div>
	</div>
</div>
		<!--
		<div id="footer">

				<div class="row-fluid">
					<?php echo str_replace('class="cake-sql-log"', 'class="table table-bordered table-striped"', $this->element('sql_dump')); ?>
				</div>
				
        </div>
        -->
        <?php echo $this->Js->writeBuffer();?>
        <?php echo $this->Html->script('chatto'); ?>
   
    </body>
</html>
