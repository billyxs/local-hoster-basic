<?php

if(isset($_REQUEST['data']) ) {
	// File path
	$hostsFile = '/etc/hosts';
	$vhostsFile = '/etc/apache2/extra/httpd-vhosts.conf';

	$docRoot = $_REQUEST['data']['document-root'];
	$serverName = $_REQUEST['data']['server-name'];

	$addHost = "\n127.0.0.1\t$serverName";

	$hostHandle = fopen($hostsFile, 'a');
	fwrite($hostHandle, $addHost);
	fclose($hostHandle);

	$addVhost = <<<HEREDOC

<VirtualHost *:80>
    DocumentRoot $docRoot
    ServerName $serverName
</VirtualHost>
HEREDOC;

	$vhostsHandle = fopen($vhostsFile, 'a');
	fwrite($vhostsHandle, $addVhost);
	fclose($vhostsHandle);
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
		<h2>Add Project</h2>
		<blockquote class="active">
	    <p>Update your hosts and apache vhosts file by entering in the domain name and file path you would like to use to access your project.</p>
	  </blockquote>
		<form role="form" method="GET">
		  <div class="form-group">
		    <label>Host Name</label>
		    <input type="text" name="data[server-name]" class="form-control" placeholder="local.project.com">
		  </div>

		  <div class="form-group">
		    <label>Project Path</label>
		    <input type="text" class="form-control" value="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>" name="data[document-root]" />
		  </div>

			<button type="submit" name="data[submit]" class="btn btn-default">Add Project</button>
		</form>
	</div>
</body>
</html>

