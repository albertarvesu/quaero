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
				<p class="navbar-text pull-right">Logged in as <a target="_blank" href="<?= $profile["link"] ?>"><?= $name ?></a></p>
			</div>
		</div>
	</div>
</div> <!-- end navbar -->

<div class="container">

	<div class="row">
		<div class="user-search">
			<form class="well form-search">
				<input type="text" class="input-medium search-query">
				<button type="submit" class="btn">Search</button>
			</form>
			<ul class="search-results"></ul>
		</div>
	</div>

</div> <!-- end container -->
