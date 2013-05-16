<?php foreach($strings as $string):?>
	
	<div class="string-container" data-id="<?php echo $string->id; ?>">
		<?php if($string->unread_pages > 0): ?>
			<div class="string-unread-tag">
				<i class="icon icon-tag"></i>
				<span><?php echo $string->unread_pages; ?></span>
			</div>
		<?php endif; ?>
		<div class="string-info">
			<a>
				<div class="text">
					<h3><?php echo $string->title; ?></h3>
					<p><?php // echo $string->description; ?></p>
				</div>
				<div class="arrow"><img src="<?php echo base_url('public_html/images/browser/string-arrow.png') ?>" /></div>
			</a>
		</div>
		<div class="pages-content" style="display:none;">
			<div class="loader-gif"><img src="<?php echo base_url(); ?>public_html/images/loader.gif" /></div>
		</div>
	</div>
	
<?php endforeach; ?>


<div class="pages">
	<ul>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>