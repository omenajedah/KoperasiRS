<?php

class login extends model {
	function __construct() {
		parent::__construct();
		$this->TableName = "login";
		$this->SQLFile = "login.sql";	
	}




}