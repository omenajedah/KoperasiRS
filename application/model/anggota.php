<?php

class anggota extends model {
	function __construct() {
		parent::__construct();
		$this->TableName = "anggota";
		$this->SQLFile = "anggota.sql";
	}

	function putData($parameter) {
		$this->load->file('cr4');

		$parameter->tgl_lahir = $parameter->tgl_anggota;
		unset($parameter->tgl_anggota);

		if ($parameter->kd_anggota) {
			foreach ($parameter as $key => $value) {
				if ($key == 'username') {
					continue;
				}
				$parameter->{$key} = urlencode(rc4('1234567', $value));
			}

			$this->setData($parameter);
			$login = $this->load->model('login');
			return $login->setData($parameter);
		}

		$kd_anggota = $this->getTable(array('fields' => ' kd_anggota ', 'orderBy' => ' `ID` DESC ', 'limit' => '1'))['kd_anggota'];
		$kd_anggota = rc4('1234567', urldecode($kd_anggota));

		if ($kd_anggota) {
			$hh = substr($kd_anggota, 1, 3);
			$hh++;
			$nn = sprintf("%03s", $hh);
			$parameter->kd_anggota = 'A' . $nn . 'KWL';
		} else {
			$parameter->kd_anggota = 'A001KWL';
		}
		// var_dump($parameter);

		foreach ($parameter as $key => $value) {
			if ($key == 'username') {
				continue;
			}
			$parameter->{$key} = urlencode(rc4('1234567', $value));
		}
		// var_dump($parameter);
		// die;
		parent::putData($parameter);
		$login = $this->load->model('login');
		return $login->putData($parameter);
	}

	function deleteData($parameter) {
		$this->load->file('cr4');

		foreach ($parameter as $key => $value) {
			$parameter->{$key} = urlencode(rc4('1234567', $value));
		}
		parent::deleteData($parameter);
		$login = $this->load->model('login');
		return $login->deleteData($parameter);
	}

}