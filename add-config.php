<?php
require_once('Classes/Config.class.php');

$Config = new Config();

if( isset($_REQUEST['data']) ) {
	$Config->save( $_REQUEST['data']['Config'] );
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
		<form role="form" method="POST">
		  <div class="form-group">
		    <label>Hosts File Path</label>
		    <input type="text" name="data[Config][hosts-path]" value="/etc/hosts" placeholder="/etc/hosts" class="form-control">
		  </div>

		  <div class="form-group">
		    <label>VHost File Path</label>
		    <input type="text" class="form-control" value="/etc/apache/extra/httpd-vhosts.conf" placeholder="/etc/apache/extra/httpd-vhosts.conf" name="data[Config][vhost-path]" />
		  </div>

			<div class="form-group">
		    <label>Projects Folder</label>
		    <input type="text" class="form-control" value="/Projects" placeholder="/Projects"  name="data[Config][projects-path][0]" />
		  </div>

			<button type="submit" name="data[submit]" class="btn btn-default">Save Config</button>
		</form>
	</div>
</body>
</html>
