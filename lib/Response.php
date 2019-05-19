<?php

class body {

	function __construct($protocol, $bodyCode, $bodyMessage, $header = array(), $body = NULL) {
		$this->protocol = $protocol;
		$this->bodyCode = $bodyCode;
		$this->bodyMessage = $bodyMessage;
		$this->header = $header;
		$this->body = $body;
		$this->process();
	}

	function process() {
		header("$this->protocol $this->bodyCode $this->bodyMessage");
		foreach ($this->header as $key => $value) {
			header("$key: $value");
		}
		if ($this->body) {
			print $this->body;
		}
	}

	public static function newbody(BaseRequest $request) {

	}
}