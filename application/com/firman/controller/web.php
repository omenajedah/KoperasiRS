<?php

class web extends application {

	function __construct() {
		parent::__construct();
		session_start();
	}

	function Index() {
		$this->load->view('index', $_SESSION);
		// echo "success"
	}

	function Render($parameter = array()) {
		// var_dump($parameter);
		// echo '<br>';
		$arr = array_merge($parameter, $_SESSION);
		// var_dump($arr);
		// echo '<br>';
		$this->load->view('index', $arr);
	}
}