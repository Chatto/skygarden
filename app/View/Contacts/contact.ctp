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
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
if (Configure::read('debug') == 0):
	throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');
?>
<div class="page-header">
	<h1>Contact us</h1>
	<?php if (isset($success)) { ?>
    <p><?= $success?></p>
<?php } else { ?>
    <?php if (isset($error)) { ?>
        <p><?= $error?></p>
    <?}?>
    <?php echo $form->create(null,array('action' => 'contact', 'enctype' => 'multipart/form-data')); ?>
    <p>
        <?php echo $form->label('Page.name','Name: ',null); ?>
        <?php echo $form->text('Page.name', array('size' => '25'))?>
    </p>
    <p>
        <?php echo $form->label('Page.email','Email: ',null); ?>
        <?php echo $form->text('Page.email', array('size' => '25'))?>
    </p>
    <p>
        <?php echo $form->label('Page.message','Message: ',null); ?>
        <?php echo $form->textarea('Page.message', array('cols' => '40', 'rows' => '10'))?>
    </p>
    <p>
        <?php echo $form->submit('Send email')?>
    </p>
    <p>
        All fields are required!
    </p>
    <?php echo $form->end();?>
<?php }?>
</div>
