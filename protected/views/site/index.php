<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '<?php echo Yii::app()->params["fbAppId"] ?>',
			status     : true, 
			cookie     : true,
			xfbml      : true,
			oauth      : true,
		});
	};
	(function(d){
		var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
		js = d.createElement('script'); js.id = id; js.async = true;
		js.src = "//connect.facebook.net/en_US/all.js";
		d.getElementsByTagName('head')[0].appendChild(js);
	}(document));
</script>

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
			</div>
		</div>
	</div>
</div> <!-- end navbar -->

<div class="container">
	<div class="row hero-unit">
		<div class="span12">
			<h1>Quaero</h1>
			<h2>Friends in Facebook.. Followers and Following in Twitter.. Organized in Quaero. </h2>
			<p>A very cool way of finding friends from Facebook and Twitter.</p>
			<p>
				<div class="fb-login-button">Login with Facebook</div>
			</p>
		</div>
	</div>

	<!-- Example row of columns -->
	<div class="row">

		<div class="span6">
			<h2>Heading</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			<p><a class="btn" href="#">View details &raquo;</a></p>
		</div>

		<div class="span6">
			<h2>Heading</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			<p><a class="btn" href="#">View details &raquo;</a></p>
		</div>

	</div>

	<!--div class="row">
		<div class="user-search">
			<form class="well form-search">
				<input type="text" class="input-medium search-query">
				<button type="submit" class="btn">Search</button>
			</form>
			<ul class="search-results"></ul>
		</div>
	</div-->

</div> <!-- end container -->
