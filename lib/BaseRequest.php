<?php
abstract class BaseRequest {

	public function prepare() {
		foreach ($_SERVER as $key => $value) {
			$this->{$this->toCamelCase($key)} = $value;
		}
		unset($_SERVER);
		// $this->query = new stdClass();
		foreach ($_GET as $key => $value) {
			$this->query->{$this->toCamelCase($key)} = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
		}
		unset($_GET);
		// var_dump($this);
		// die;

		if ($this->requestMethod == 'POST') {
			$this->body = $this->parseBody(trim(file_get_contents('php://input')));
			if (is_array($this->body)) {
				$this->body = (object) $this->body;
			}
		}

		// var_dump($this);
	}

	protected final function toCamelCase($string) {
		$result = strtolower($string);

		preg_match_all('/_[a-z]/', $result, $matches);

		foreach ($matches[0] as $match) {
			$c = str_replace('_', '', strtoupper($match));
			$result = str_replace($match, $c, $result);
		}
		return $result;
	}

	protected abstract function parseBody($input);
}
