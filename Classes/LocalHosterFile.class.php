<?php
class LocalHosterFile {

	// System OS
	protected $OS = '';

	public function __construct () {
		$os = php_uname();
		if( strstr($os, 'MacBook') )
			$this->OS = "OSX";

	}

	private function getPathDefaults() {
		$paths = array(
				"hostsPath" => "",
				"vhostsPath" => "",
			);

		switch ($this->OS) {
			case "OSX":
				$paths["hostsPath"] = '/etc/hosts';
				$paths["vhostsPath"] = '/etc/apache2/extra/httpd-vhosts.conf';
				break;
			default:
				break;
		}

		return $paths;
	}

}