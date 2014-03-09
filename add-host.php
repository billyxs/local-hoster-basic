<?php

if(isset($_REQUEST['data']) ) {
	// File paths
	$hostsFile = '/etc/hosts';
	$vhostsFile = '/etc/apache2/extra/httpd-vhosts.conf';

	// REQUEST configuration
	$docRoot = $_REQUEST['data']['document-root'];
	$serverName = $_REQUEST['data']['server-name'];

	// Add new domain to hosts file
	$addHost = "127.0.0.1\t$serverName\n";
	$hostHandle = fopen($hostsFile, 'a');
	fwrite($hostHandle, $addHost);
	fclose($hostHandle);

	// Add domain to vhosts file
	$addVhost = "<VirtualHost *:80>\n"
    					. "\tDocumentRoot $docRoot\n"
    					. "\tServerName $serverName\n"
							. "</VirtualHost>\n"
							;

	$vhostsHandle = fopen($vhostsFile, 'a');
	fwrite($vhostsHandle, $addVhost);
	fclose($vhostsHandle);

	// Restart Apache to take on new configuration
	exec("sudo apachectl restart");
}

$content = 'includes/add-host.php';
include('includes/layout.php');
