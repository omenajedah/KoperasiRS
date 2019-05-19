<?php

class angsuran extends model {
	function __construct() {
		parent::__construct();
		$this->TableName = "angsuran";
		$this->SQLFile = "angsuran.sql";
	}

	function putData($parameter) {
		$this->load->file('cr4');


		$parameter->jatuh_tempo = $parameter->tgl_transaksi;
		unset($parameter->tgl_transaksi);

		if ($parameter->kd_angsuran) {
			foreach ($parameter as $key => $value) {
				$parameter->{$key} = urlencode(rc4('1234567', $value));
			}

			return $this->setData($parameter);
		}

		$kd_angsuran = $this->getTable(array('fields' => ' kd_angsuran ', 'orderBy' => ' `ID` DESC ', 'limit' => '1'))['kd_angsuran'];
		$kd_angsuran = rc4('1234567', urldecode($kd_angsuran));

		if ($kd_angsuran) {
			$hh = substr($kd_angsuran, 1, 7);
			$hh++;
			$nn = sprintf("%06s", $hh);
			$parameter->kd_angsuran = 'A' . $nn;
		} else {
			$parameter->kd_angsuran = 'A000001';
		}
		// var_dump($parameter);

		foreach ($parameter as $key => $value) {
			$parameter->{$key} = urlencode(rc4('1234567', $value));
		}
		// var_dump($parameter);
		// die;
		return parent::putData($parameter);
	}

	function deleteData($parameter) {
		$this->load->file('cr4');

		foreach ($parameter as $key => $value) {
			$parameter->{$key} = urlencode(rc4('1234567', $value));
		}
		return parent::deleteData($parameter);
	}

}