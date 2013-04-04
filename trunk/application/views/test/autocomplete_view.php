<div id="header">
	<a href="<?php echo site_url('test'); ?>">&laquo; Table of Contents</a>
	
	<div id="loginResultCont">
		<?php if(isset($logged_in)): ?>
			Current user: <?php echo $cur_user->f_name.' '.$cur_user->l_name; ?>
		<?php endif; ?>
	</div>
</div>

<div id="content">
	<span></span>
	
	<div class="input-wrapper">
		<input id="ac" />
	</div>
	
	<div class="selectedItems">
		<ul>
			
		</ul>
	</div>
</div>

<style type="text/css">
	
	#header{
		width:100%;
		margin-bottom:15px;
		overflow: hidden;
		
		border-top: 1px solid #4490d0;
		border-bottom: 1px solid #4490d0;
		background-color: #d1ebfa;
	}
	
	#header a{
		display:block;
		padding: 8px;
		
		color: #959595;
		font-family: "OstrichSansBlack", Helvetica, Arial;
		text-decoration:none;
	}
	
	label{
		width:100%;
	}
	
	input, select{
		width:100%;
		margin-bottom:15px;
	}
	
	input[type=submit]{
		width: 100px;
		display:block;
		float:right;
	}
	
	#content{
		width: 400px;
		margin: auto;
	}
	
	.input-wrapper {
		padding-right: 4px;
		padding-left: 1px;
		margin-right: 2px;
	}
	
	.selectedItems {
		width: 200px;
		min-height: 40px;
		background: #c0c0c0;
	}
	
	.ui-autocomplete {
		position: absolute; 
		cursor: default;
		list-style: none;
		
		font-size: 1.1em
		border: 1px solid #dddddd; 
		background: #ffffff;
		color: #333333;
	}
	
	.ui-menu {
		list-style:none;
		padding: 2px;
		margin: 0;
		display:block;
		float: left;
	}
	
	.ui-menu .ui-menu {
		margin-top: -3px;
	}
	
	.ui-menu .ui-menu-item {
		margin:0;
		padding: 0;
		zoom: 1;
		float: left;
		clear: left;
		width: 100%;
	}
	
	.ui-menu .ui-menu-item a {
		text-decoration:none;
		display:block;
		padding:.2em .4em;
		line-height:1.5;
		zoom:1;
		cursor: pointer;
	}
	
	.ui-menu .ui-menu-item a.ui-state-hover,
	.ui-menu .ui-menu-item a.ui-state-active {
		font-weight: normal;
		margin: -1px;
	}
	
</style>

<script type="text/javascript">
	
	$(function() {
		
		$("#ac").autocomplete({
			source: siteURL + "test/search",
			minLength: 2,
			focus: function( event, ui ) {
				$( "#ac" ).val( ui.item.label );
				return false;
			},
			select: function( event, ui ) {
				$("#ac").val('');
				$(".selectedItems ul").append("<li>" + ui.item.label + "</li>");
			   return false;
			}
		});
		
	});
	
	
</script>