<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Quaero</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Facebook, Twitter, Search">
		<meta name="author" content="">

		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/skin.css" rel="stylesheet">
		<style>
			body {
				padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
		</style>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<link rel="shortcut icon" href="ico/favicon.ico">

	</head>

	<body>

		<?php echo $content; ?>

	</body>
</html>
