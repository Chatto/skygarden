<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<h1><span style="color:#ff0000;">G</span><span style="color:#ff2000;">U</span><span style="color:#ff4000;">E</span><span style="color:#ff5f00;">S</span><span style="color:#ff7f00;">S</span><span style="color:#ff9f00;"> </span><span style="color:#ffbf00;">W</span><span style="color:#ffdf00;">H</span><span style="color:#ffff00;">A</span><span style="color:#bfff00;">T</span><span style="color:#80ff00;"> </span><span style="color:#40ff00;">C</span><span style="color:#00ff00;">H</span><span style="color:#00ff55;">I</span><span style="color:#00ffaa;">C</span><span style="color:#00ffff;">K</span><span style="color:#00bfff;">E</span><span style="color:#0080ff;">N</span><span style="color:#0040ff;"> </span><span style="color:#0000ff;">B</span><span style="color:#2300ff;">U</span><span style="color:#4600ff;">T</span><span style="color:#6800ff;">T</span><span style="color:#8b00ff;">!</span></h1>
<h2><?php echo $name; ?></h2>
<p class="error">
	<strong><?php echo __d('cake', 'Error'); ?>: </strong>
	<?php printf(
		__d('cake', 'The requested address %s was not found on this server.'),
		"<strong>'{$url}'</strong>"
	); ?>
</p>
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>
