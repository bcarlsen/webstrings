<div id="browser">
	<a id="hideMe"><span>Hide Bar</span></a>
	<div class="header">
		<?php if(!isset($string_info)): ?>
			<a href="<?php echo site_url('browser'); ?>"><h1>Webstrings</h1></a>
			
		<?php else: ?>
			<h1><?php echo $string_info->title; ?></h1>
			<h3><?php echo $string_info->description; ?></h3>
			
			
		<?php endif; ?>
	</div>
	
	<div class="ribbon">
		<div>
			<a class="ribbon-tool" href="javascript:buildModal('<?php echo site_url('modals/share'); ?>', 'modal-share')"><i class="icon icon-share"></i></a>
			<a class="ribbon-tool" href=""><i class="icon icon-my-strings"></i></a>
			<a class="ribbon-tool" href=""><i class="icon icon-shared-strings"></i></a>
		</div>
	</div>
	
	<div id="browserList">
		<?php if(isset($string_info)): ?>
		<div class="string-container">
			<input type="hidden" value="<?php echo $string_info->id; ?>" class="string-id" />
			<div class="string-info">
				<a>
					<div class="text">
						<p><?php echo $string_info->description; ?></p>
					</div>
				</a>
			</div>
			<div class="pages-content">
				<?php foreach($pages as $page):?>
	
					<div class="page-container">
						<input class="pid" type="hidden" value="<?php echo $page->id; ?>" />
						<div class="page-info">
							<a target="iframe" href="<?php echo $page->url; ?>">
								<h4><?php echo $page->title; ?></h4>
								<div class="page-delete">
									<i class="icon icon-trash"></i>
								</div>
							</a>
						</div>
						<div class="page-comments" style="display:none;">
							<div class="loader-gif"><img src="<?php echo base_url(); ?>public_html/images/loader.gif" /></div>
						</div>
					</div>
					
				<?php endforeach; ?>
				
			</div>
		</div>
		
		
		<?php else: ?>
			<p>This url is not properly attached to a string. Please check the address and try again, or contact the person who shared this string with you.</p>
		<?php endif; ?>
	</div>
	
</div>



<div id="content">
	<iframe name="iframe" src="">Your browser does not support iframes. In order to use WebStrings, you need to update to a modern browser.</iframe>
</div>