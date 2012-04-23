<script data-main="<?php echo Yii::app()->request->baseUrl; ?>/js/main" src="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/require.js"></script>
<?php
$name = !empty($profile["username"]) ? $profile["username"] : $profile["name"];
?>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#">Quaero</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
				<p class="navbar-text pull-right">Logged in as <a target="_blank" href="<?= $profile["link"] || "Unnamed" ?>"><?= $name ?></a></p>
			</div>
		</div>
	</div>
</div> <!-- end navbar -->

<style>

	li {
		list-style: none;
	}

	.pad-sm {
		padding: 3px;
	}

	.pad-med {
		padding: 5px;
	}

	.pad-large {
		padding: 10px;
	}

	.blk {
		display:block;
		clear: left;
	}

	.round-corners {
		border-radius: 5px; 
		-moz-border-radius: 5px; 
		-webkit-border-radius: 5px; 
	}

	.clearfix:after {
		content: ".";
		display: block;
		clear: both;
		visibility: hidden;
		line-height: 0;
		height: 0;
	}
	 
	.clearfix {
		display: inline-block;
	}
	 
	html[xmlns] .clearfix {
		display: block;
	}
	 
	* html .clearfix {
		height: 1%;
	}


	body {
		background-color: #AAA;
	}

	.search-results {
		border: solid 1px #EEE;
		width: 800px;
	}

	.search-results li{
		width: inherit;
		border-bottom: 1px solid #EEE;
		background-color: #FFF;
	}

	.search-results li .sn-icon {
		background: url("img/small_facebook_icon.png") no-repeat scroll 0 0 transparent;
		display: block;
		float: left;
		height: 16px;
		position: absolute;
		text-indent: -999px;
		width: 16px;
		z-index: 50;
	}

</style>

<div class="container">

	<div class="row">
		<div class="span12 contact-search">
			<form class="well form-search">
				<input type="text" class="input-medium search-query">
				<button type="submit" class="btn">Search</button>
			</form>
			<ul class="search-results round-corners clearfix"></ul>
		</div>
	</div>

</div> <!-- end container -->
