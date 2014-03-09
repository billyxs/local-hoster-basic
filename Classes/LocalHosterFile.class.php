<?php
abstract class LocalHosterFile {

	// System OS
	protected $OS = null;

	protected $filePath = '';

	protected $fileHandle = null;

	public function __construct ( $values = array('filePath'=>'') ) {
		$os = php_uname();
		if( strstr($os, 'MacBook') )
			$this->OS = "OSX";

	}

	public function setFilePath($filePath) {
		$this->filePath = $filePath;
	}

	public function exists() {
		$bool = self::fileExists( $this->$filePath );
		if(!$bool)
			$this->filePath = '';

		return $bool;
	}

	public static function fileExists($filePath) {
		return file_exists( $filePath );
	}

	private function getSystemDefaultFilePath() {}

}