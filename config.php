<?php
require_once('Classes/Config.class.php');

$Config = new Config();
if(!$Config->exists()) {
	header('Location: add-config.php');
}


?>

<html>
<head>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" />
	<style>
	a {
		font-size: 20px;
	}
	</style>
</head>
<body>

	<div class="container">
		<h2>Local Hoster</h2>
		<form role="form" method="GET">
		  <div class="form-group">
		    <label>Host File Path</label>
		    <input type="text" name="data[hosts-path]" class="form-control" placeholder="/etc/hosts">
		  </div>

		  <div class="form-group">
		    <label>VHost File Path</label>
		    <input type="text" class="form-control" value="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>" name="data[vhost-path]" />
		  </div>

			<button type="submit" name="data[submit]" class="btn btn-default"></button>
		</form>
	</div>
</body>
</html>
