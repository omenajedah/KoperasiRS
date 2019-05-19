<?php

class pinjaman extends model {
	function __construct() {
		parent::__construct();
		$this->TableName = "pinjaman";
		$this->SQLFile = "pinjaman.sql";
	}

	function putData($parameter) {
		$this->load->file('cr4');

		if ($parameter->kd_pinjaman) {
			foreach ($parameter as $key => $value) {
				if ($key == 'kd_jp') {
					continue;
				}
				$parameter->{$key} = urlencode(rc4('1234567', $value));
			}

			$this->setData($parameter);
			$detail_pinjaman = $this->load->model('detail_pinjaman');
			return $detail_pinjaman->putData($parameter);
		}

		$kd_pinjaman = $this->getTable(array('fields' => ' kd_pinjaman ', 'orderBy' => ' `ID` DESC ', 'limit' => '1'))['kd_pinjaman'];
		$kd_pinjaman = rc4('1234567', urldecode($kd_pinjaman));

		if ($kd_pinjaman) {
			$hh = substr($kd_pinjaman, 1, 7);
			$hh++;
			$nn = sprintf("%06s", $hh);
			$parameter->kd_pinjaman = 'P' . $nn;
		} else {
			$parameter->kd_pinjaman = 'P000001';
		}
		// var_dump($parameter);

		foreach ($parameter as $key => $value) {
			if ($key == 'kd_jp') {
				continue;
			}
			$parameter->{$key} = urlencode(rc4('1234567', $value));
		}
		// var_dump($parameter);
		// die;
		parent::putData($parameter);
		$detail_pinjaman = $this->load->model('detail_pinjaman');
		return $detail_pinjaman->putData($parameter);
	}

	function deleteData($parameter) {
		$this->load->file('cr4');

		foreach ($parameter as $key => $value) {
			$parameter->{$key} = urlencode(rc4('1234567', $value));
		}
		parent::deleteData($parameter);
		$detail_pinjaman = $this->load->model('detail_pinjaman');
		return $detail_pinjaman->deleteData($parameter);
	}

}