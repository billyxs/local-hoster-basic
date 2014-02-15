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
		<form method="GET">
			<h2>Add Hosts</h2>
			<label>Host Name</label>
			<br />
			<input type="text" name="data[server-name]" />
			<br />
			<br />

			<label>Project Path</label>
			<br />
			<input type="text" value="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>" name="data[document-root]" />
			<br />
			<br />

			<input type="submit" name="data['submit']" />
		</form>
	</div>
</body>
</html>

