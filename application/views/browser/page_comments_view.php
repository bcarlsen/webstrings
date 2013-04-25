<?php foreach($comments as $comment): ?>

<div class="comment-container">
	<div class="comment-pic">
	<!-- User Picture
		<div class="pic-cropper">
			<img src="<?php if($comment->fb) echo $comment->pic_url; else echo base_url()."public_html/images/default_avatar.png"; ?>" />
		</div>
	-->
		<div class="name">
			<span class="user_name">
				<?php echo $comment->fullname; ?>
			</span>
		</div>
	</div>
	<div class="comment-content">
		<p><?php echo $comment->comment; ?></p>
	</div>
</div>

<?php endforeach; ?>

<div class="comment-container template" style="display: none;">
	<div class="comment-pic">
		<div class="pic-cropper">
			<img src="" />
		</div>
	</div>
	<div class="comment-content">
		<p></p>
	</div>
</div>

<div class="comment-container add-comment">
	<form action="<?php echo site_url('browser/add_comment_for_page/'.$pid); ?>" method="post" onsubmit="return addComment();">
		<div class="control-group comments">
			<div class="comment-pic">
				<div class="pic-cropper">
					<img src="<?php if($cur_user->fb) echo $cur_user->pic_url; else echo base_url()."public_html/images/default_avatar.png"; ?>" />
				</div>
			</div>
			<span class="input-wrapper">
				<input type="text" name="comment_body" placeholder="Write a comment..." />
			</span>
		</div>
	</form>
</div>

<script type="text/javascript">
	
	var commentChannel = pusher.subscribe('private-comments-<?php echo $pid; ?>');
	
	commentChannel.bind('newComment', function(data) {
		var template = $(".comment-container.template").first().clone();
		template.removeAttr('style').removeClass('template');
		template.find(".pic-cropper img").attr('src', data.pic_url);
		template.find(".comment-content p").text(data.comment_body);
		$("#selectedPage .add-comment").before(template);
		//browserScroll.reinitialise();
	});
	
</script>