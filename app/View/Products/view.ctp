<div id="breadcrumb">
		<!--
		<?= $this->Element('breadcrumb');?>
		-->
</div>
<section class="blog-post" class="clearfix">
			
	<div style="float:left;margin-right:20px;margin-bottom:10px;width:300px;height:300px;display:inline-block;position:relative;background:url('../../<?= $product['Product']['image'];?>');background-size:contain;background-repeat: no-repeat;">
		<? if(!empty($product['Product']['preview'])):?>
				<audio controls style="border-radius:none;margin:0px;position:absolute;bottom:0px;width:300px;display:block;" preload='auto' src="/<?php echo $product['Product']['preview']; ?>"></audio>
		<? endif; ?>
	</div>
	<div style="position:relative;top:-40px;display:inline;width:auto;padding:20px;padding-left:340px;">
		<h3><?php echo $product['Product']['name'];?> </h3>
		<ul>
			<li style="display:block;"><strong>Type: </strong><?php echo $types[$product['Product']['type_id']]; ?></li>
			<li style="display:block;"><strong>Price: </strong><?php echo $product['Product']['price']; ?></li>
			<li style="display:block;"><strong>Purchases: </strong><?php echo $product['Product']['purchases']; ?></li>
			<li style="display:block;"><strong>Added on: </strong>
			<?php echo $this->Time->format(
			  'F jS, Y h:i A',
			  $product['Product']['created'],
			  null,
			  6
			); ?>
			</li><br/>
			<li style="display:block;"><strong>About this: </strong><article><?php echo $product['Product']['description'];?></article></li>
			
		</ul>
	</div>
	<div class="clearfix"></div><br/>
		<table class="table table-bordered table-striped">
			<thead class="table-header">
					<th style="width:50px;">Track</th>
					<th>Name</th>
					<th style="width:1px;">Play</th>
					<th style="width:90px;">Add to Cart</th>
			</thead>
			<tbody>
				<tr>
					<td>Track 1</td>
					<td>Kawaii Time</td>
					<td>[Play]</td>
					<td>[Add to Cart]</td>
				</tr>
				<tr>
					<td>Track 2</td>
					<td>Welcome to Kastle Kawaii</td>
					<td>[Play]</td>
					<td>[Add to Cart]</td>
				</tr>
				<tr>
					<td>Track 3</td>
					<td>Goodbye Moon</td>
					<td>[Play]</td>
					<td>[Add to Cart]</td>
				</tr>
			</tbody>
			
		</table>
</section>
