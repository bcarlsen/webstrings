<div class="ribbon pageHeader">
	<h1>String It!</h1>
</div>

<div class="container">
	<form action="<?php site_url('bookmarklet/index.php'); ?>" method="post">
		
		<input type="hidden" name="url" value="<?php echo $url; ?>" />
		
		<div class="control-group">
			<label>Choose string:</label>
			<select name="string_id">
				<?php foreach($strings as $string): ?>
					<option value="<?php echo $string->id; ?>"><?php echo $string->title; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		
		<div class="control-group">
			<input type="text" name="title" placeholder="title" />
		</div>
		
		<div class="control-group">
			<input type="submit" name="submit" class="pull-right" />
		</div>
		
	</form>
</div>
