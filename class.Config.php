<?php
class Config {
	const LOGGER_LEVEL = 75;
	const DEBUG_LEVEL = 100;
	const LOGGER_FILE = 'logEmployee.log';

	public static function getConfigLevel() {
		return SELF::LOGGER_LEVEL;
	}
		
	public static function getConfigFile() {
		return SELF::LOGGER_FILE;
	}

	public static function addConfig($constLog, $value) {
		
		if($constLog == 'LOGGER_LEVEL') {
			$LOGGER_LEVEL = $value;
		}
		else if ($constLog == 'DEBUG_LEVEL') {
			$DEBUG_LEVEL = $value;
		}
		else {
			$LOGGER_FILE = $value;
			echo 'save value final path.';
		}
	}
} 
?>