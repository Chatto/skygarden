<div class="span10">
		<table class="table table-bordered table-striped">
			
			<tr>
				<td colspan=2>
				<?
				echo $this->Html->image('../' . $user['User']['avatar'], array(
							'style' => 'padding:10px;padding-left:0px;width:150px;height:150px;float:left;'
							)
						);
				?>
				<h3 style="padding:0px;line-height:20px;">
				<?php echo $user['User']['display_name'];?>
				</h3>
				<div class="label label-info" style="height:20px;line-height:15px;"><?php echo $user['User']['role']; ?></div>
				</td>
			</tr>
			<tr>
				<td>User ID: </td>
				<td><?php echo $user['User']['id']; ?></td>
			</tr>
			<tr>
				<td>Username: </td>
				<td><?php echo $user['User']['username']; ?></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><?php echo $user['User']['email']; ?></td>
			</tr>
			<tr>
				<td>Password Hash: </td>
				<td><?php echo $user['User']['password']; ?></td>
			</tr>
			<tr>
				<td>Role: </td>
				<td><?php echo $user['User']['role']; ?></td>
			</tr>
			<tr>
				<td>Created: </td>
				<td><?php echo $user['User']['created']; ?></td>
			</tr>
			<tr>
				<td>Modified: </td>
				<td><?php echo $user['User']['modified']; ?></td>
			</tr>
		</table>
		
		<div class="clearfix"></div>
</div>
