<?php

class simpanan extends model {
	function __construct() {
		parent::__construct();
		$this->TableName = "simpanan";
		$this->SQLFile = "simpanan.sql";
	}

	function putData($parameter) {
		$this->load->file('cr4');

		if ($parameter->kd_simpanan) {
			foreach ($parameter as $key => $value) {
				if ($key == 'kd_js') {
					continue;
				}
				$parameter->{$key} = urlencode(rc4('1234567', $value));
			}

			$this->setData($parameter);
			$detail_simpanan = $this->load->model('detail_simpanan');
			return $detail_simpanan->putData($parameter);
		}

		$kd_simpanan = $this->getTable(array('fields' => ' kd_simpanan ', 'orderBy' => ' `ID` DESC ', 'limit' => '1'))['kd_simpanan'];
		$kd_simpanan = rc4('1234567', urldecode($kd_simpanan));

		if ($kd_simpanan) {
			$hh = substr($kd_simpanan, 1, 7);
			$hh++;
			$nn = sprintf("%06s", $hh);
			$parameter->kd_simpanan = 'S' . $nn;
		} else {
			$parameter->kd_simpanan = 'S000001';
		}
		// var_dump($parameter);

		foreach ($parameter as $key => $value) {
			if ($key == 'kd_js') {
				continue;
			}
			$parameter->{$key} = urlencode(rc4('1234567', $value));
		}
		// var_dump($parameter);
		// die;
		parent::putData($parameter);
		$detail_simpanan = $this->load->model('detail_simpanan');
		return $detail_simpanan->putData($parameter);
	}

	function deleteData($parameter) {
		$this->load->file('cr4');

		foreach ($parameter as $key => $value) {
			$parameter->{$key} = urlencode(rc4('1234567', $value));
		}
		parent::deleteData($parameter);
		$detail_simpanan = $this->load->model('detail_simpanan');
		return $detail_simpanan->deleteData($parameter);
	}

}
