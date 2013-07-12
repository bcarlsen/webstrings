<?php foreach($pages as $page):?>
	
	<div class="page-container" data-id="<?php echo $page->id; ?>">
		<?php if($page->unread) echo '<div class="page-unread-marker"></div>'; ?>
		<?php if(!$page->iframe_allowed) echo '<div class="opens-in-new-window"></div>'; ?>
		<div class="page-info">
			<a target="<?php if($page->iframe_allowed) echo 'iframe'; else echo '_blank'; ?>" href="<?php echo $page->url; ?>" class="page-link">
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

	<div class="add-page">
		<a target="iframe" href="javascript:buildModal('<?php echo site_url('modals/add_page/'.$string_id); ?>', 'modal-new-page')">
			<h3>Add Page</h3>
		</a>
	</div>