<?php

class loader {

	function __construct() {
		$this->_CONFIG = get_config("configuration.php");
		$this->db = new mysqldb($this->_CONFIG);
	}

	function execute($model, $param = array(), $function = 'getData') {

		$param = $_POST;

		if ($model == null) {
			return null;
		}

		if (!method_exists($model, $function)) {
			return null;
		}
		return $model->{$function}($param);
	}

	function model($modelname) {
		if (file_exists($this->_CONFIG['MODEL_PATH'] . "/" . $modelname . ".php")) {
			if (!class_exists($modelname)) {
				include $this->_CONFIG['MODEL_PATH'] . "/" . $modelname . ".php";
			}
			return new $modelname();
		}
		return null;
	}

	function view($template, $prm = array()) {
		if (file_exists($this->_CONFIG['TEMPLATE_PATH'] . "/" . $template . ".php")) {
			extract($prm);
			include_once $this->_CONFIG['TEMPLATE_PATH'] . "/" . $template . ".php";
		}
	}

	function sql($SQLFile, $parameter) {
		if (is_object($parameter)) {
			$parameter = (array) $parameter;
		}
		if (!is_array($parameter)) {
			die("Parameter must be array");
		}
		$filename = $SQLFile . ".php";
		$sqlPath = __DIR__ . $this->_CONFIG['sqlfiles'] . "/" . $filename;

		if (file_exists($sqlPath)) {
			extract($parameter);
			include $sqlPath;
			if (!isset($SQL)) {
				die("Error, SQL Not Found");
			}

			return $SQL;
		} else {
			die("Error, File SQL Not Found");
		}

	}

	function file($file) {
		$filePath = $this->_CONFIG['UTILS_PATH'] . "/" . $file . ".php";
		include_once $filePath;
	}
}