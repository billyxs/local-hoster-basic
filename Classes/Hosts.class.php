<?php
require_once('LocalHosterFile.class.php');

class Hosts extends LocalHosterFile {
	// File path of system hosts file
	protected $filePath = '';

	protected $templateFilename = 'hosts.txt';

	protected $defaultIP = '127.0.0.1';

	protected $fileHandle = null;

	public function __construct( $values=array() ) {
		parent::__construct();

		if(isset($values['filePath']))
			$this->filePath = $values['filePath'];
	}

	public function addHost( $values=array() ) {
		$ip = (!isset($values['ip'])) ? $this->defaultIP : $values['ip'];

	}

	private function getSystemDefaultFilePath() {

		switch ($this->OS) {
			case "OSX":
				return '/etc/hosts';
				break;
			default:
				break;
		}

		return null;
	}


}