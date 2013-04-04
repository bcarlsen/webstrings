<div id="pageContainer">
	<div id="browser">
		
		<div id="header">
			<h1>Webstrings</h1>
		</div>
		
		<div id="ribbon">
			<a href="<?php echo site_url('test'); ?>">&laquo; Table of Contents</a>
		</div>
		
		<div id="browserContent">
			<a href="javascript:navigate('http://www.uncrate.com')">Uncrate</a> <br />
			<a href="javascript:navigate('http://www.singularityuniverse.com')">Singularity Universe</a> <br />
			<a href="javascript:navigate('http://www.rockwoodannals.com')">Rockwood Annals</a> <br />
		</div>
		
	</div>
	<a id="hideMe"><span>Hide Bar</span></a>
	<div id="content">
		
		<iframe src="http://www.uncrate.com/">Your browser does not support iframes, homey.</iframe>
	</div>
</div>



<style type="text/css">

	@font-face {
	    font-family: "OstrichSansBlack";
	    src: url(/WS/public_html/fonts/ostrich-black.ttf) format("truetype");
	}

	*{
		margin:0;
		padding:0;
	}
	
	html{
		height:100%;
	}
	
	body{
		height:100%;
		overflow:hidden;
	}
	
	#pageContainer{
		width:100%;
		height:100%;
	}
	
	#browser {
		width:400px;
		height:100%;
		float:left;
		position:relative;
		z-index:999;
		
		box-shadow: 5px 0 15px #888888;
	}
	
	#header{
		width:100%;
		height: 110px;
		padding: 25px 15px;
		padding-bottom:0;
		font-family: "OstrichSansBlack", Helvetica, Arial;
	}
	
	#ribbon{
		width:100%;
		overflow: hidden;
		height: 50px;
		
		border-top: 1px solid #4490d0;
		border-bottom: 1px solid #4490d0;
		background-color: #d1ebfa;
	}
	
	#ribbon a{
		display:block;
		padding: 8px;
		
		color: #959595;
		font-family: "OstrichSansBlack", Helvetica, Arial;
		text-decoration:none;
	}
	
	#hideMe{
		z-index:999;
		position: absolute;
		top:-5px;
		left:405px;
		
		display:block;
		
		writing-mode:tb-rl;
		-webkit-transform:rotate(90deg);
		-webkit-transform-origin: bottom left;
		-moz-transform:rotate(90deg);
		-o-transform: rotate(90deg);
		white-space:nowrap;
		
		cursor: pointer;
	}
	
	#hideMe span {
		padding:6px 15px;
		
		border: 2px solid #959595;
		border-top-right-radius: 4px;
		border-top-left-radius: 4px;
		
		text-transform:uppercase;
		
		color:#959595;
		font-family: "OstrichSansBlack", Helvetica, Arial;
		background-color:#FFFFFF;
		
		opacity: .4;
	}
	
	#hideMe span:hover {
		opacity:.8;
	}
	
	#content {
		height:100%;
		overflow:hidden;
		position:relative;
	}
	
	#content iframe{
		width:100%;
		height:100%;
		z-index:-1;
		border:none;
	}
</style>

<script type="text/javascript">
	$(document).ready(function() {
		$("#hideMe").toggle(function() {
			$(this).animate({ left: 4 }, "slow");
			$("#browser").animate({ "margin-left": "-400px", "box-shadow": "toggle" }, "slow");
		}, function () {
			$(this).animate({ left: 405 }, "slow");
			$("#browser").animate({ "margin-left": "0px", "box-shadow": "toggle" }, "slow");
		});
	});
	
	function navigate(url){
		$("#content iframe").attr('src', url);
	}
</script>