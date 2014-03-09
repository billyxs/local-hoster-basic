<?php
/**
 * Config Class
 * Configuration settings for Local Hoster
 *
 */
class Config extends LocalHosterFile {

	// Config file name
	const CONFIG_FILE_PATH ='config.json';

	// hosts file path
	protected $hostsPath = '';

	// vhosts file path
	protected $vhostPath = '';

	// projects folder path
	protected $projectsPath = array();

	// public function __construct () {
	// 	parent::__construct();

	// }

	public function getConfigFile() {

		if( $this->exists() ) {
			$this->setConfig();
		}

	}

	public function exists() {
		$configFile = $this->getConfigFilePath();
		return file_exists($configFile);
	}

	public function getConfigFilePath () {
		return $_SERVER['DOCUMENT_ROOT'] . '/' . self::CONFIG_FILE_PATH;
	}

	private function setConfig() {
		$file = fopen($this->getConfigFilePath() );
	}

}