<?php
// $uri = 'http://localhost/koperasi/anggota?action=tambah';
// $queryString = 'action=save';

// echo substr($uri, strrpos($uri, '/') + 1);
// echo "<br>";
// print_r($_SERVER);
// die;
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

ini_set("session.gc_maxlifetime", 1800);
// Set the session cookie to timout
ini_set("session.cookie_lifetime", 1800);

include 'core/includes.php';

include 'core/core.php';

//include('application/'.DEFAULT_CONTROLLER.'.php');
require_once 'lib/XmlRequest.php';
require_once 'lib/JsonRequest.php';
require_once 'lib/FormDataRequest.php';
require_once 'lib/FormUrlEncodedRequest.php';

// var_dump( $app);
//$app = new $app();
$app->addRequestHandler('application/xml', new XmlRequest);
$app->addRequestHandler('application/json', new JsonRequest);
$app->addRequestHandler('multipart/form-data', new FormDataRequest);
$app->addRequestHandler('application/x-www-form-urlencoded', new FormUrlEncodedRequest);

$app->get('/', function ($request) use ($app) {
	if ($_SESSION['isLogin']) {
		$param['menu'] = 'anggota';
	} else {
		$param['menu'] = 'home';
	}
	$app->Render($param);
});
$app->get('/font/*', function ($request) use ($app) {
	// echo __DIR__.'/'.$app->_CONFIG["CSS_PATH"].substr($request->requestUri, strrpos($request->requestUri, '/') + 1, strlen($request->requestUri)-1);
	$path = __DIR__ . '/' . $app->_CONFIG["FONT_PATH"] . '/' . substr($request->requestUri, strrpos($request->requestUri, '/') + 1, strlen($request->requestUri) - 1);

	$path = str_replace('?' . $request->queryString, "", $path);
	header('Content-Type: ' . file_get_content_type($path));
	return file_get_contents($path);
});

$app->get('/css/*', function ($request) use ($app) {
	$path = __DIR__ . '/' . $app->_CONFIG["CSS_PATH"] . '/' . substr($request->requestUri, strrpos($request->requestUri, '/') + 1, strlen($request->requestUri) - 1);
	$path = str_replace('?' . $request->queryString, "", $path);

	header('Content-Type: ' . file_get_content_type($path));
	return file_get_contents($path);
});

$app->get('/js/*', function ($request) use ($app) {
	$path = __DIR__ . '/' . $app->_CONFIG["JS_PATH"] . '/' . substr($request->requestUri, strrpos($request->requestUri, '/') + 1, strlen($request->requestUri) - 1);
	$path = str_replace('?' . $request->queryString, "", $path);

	header('Content-Type: ' . file_get_content_type($path));
	return file_get_contents($path);
});

$app->get('/img/*', function ($request) use ($app) {
	$path = __DIR__ . '/' . $app->_CONFIG["IMG_PATH"] . '/' . substr($request->requestUri, strrpos($request->requestUri, '/') + 1, strlen($request->requestUri) - 1);
	$path = str_replace('?' . $request->queryString, "", $path);

	header('Content-Type: ' . file_get_content_type($path));
	return file_get_contents($path);
});

$app->get('/login', function ($request) use ($app) {
	$param['menu'] = 'login';
	$app->Render($param);
});

$app->get('/tambah/*', function ($request) use ($app) {
	$param['menu'] = substr($request->requestUri, strrpos($request->requestUri, '/') + 1);
	$param['sub_menu'] = 'tambah';
	$app->Render($param);
});

$app->get('/anggota', function ($request) use ($app) {
	$param['menu'] = 'anggota';
	$app->Render($param);
});

$app->get('/anggota/*', function ($request) use ($app) {
	$requestUri = str_replace('?' . $request->queryString, '', $request->requestUri);

	$param['menu'] = 'anggota';
	$param['sub_menu'] = 'edit';
	$param['kd'] = substr($requestUri, strrpos($requestUri, '/') + 1);
	$app->Render($param);
});

$app->get('/simpanan', function ($request) use ($app) {
	$param['menu'] = 'simpanan';
	$app->Render($param);
});

$app->get('/simpanan/*', function ($request) use ($app) {
	$requestUri = str_replace('?' . $request->queryString, '', $request->requestUri);

	$param['menu'] = 'simpanan';
	$param['sub_menu'] = 'edit';
	$param['kd'] = substr($requestUri, strrpos($requestUri, '/') + 1);
	$app->Render($param);
});

$app->get('/pinjaman', function ($request) use ($app) {
	$param['menu'] = 'pinjaman';
	$app->Render($param);
});

$app->get('/pinjaman/*', function ($request) use ($app) {
	$requestUri = str_replace('?' . $request->queryString, '', $request->requestUri);

	$param['menu'] = 'pinjaman';
	$param['sub_menu'] = 'edit';
	$param['kd'] = substr($requestUri, strrpos($requestUri, '/') + 1);
	$app->Render($param);
});

$app->get('/angsuran', function ($request) use ($app) {
	$param['menu'] = 'angsuran';
	$app->Render($param);
});

$app->get('/angsuran/*', function ($request) use ($app) {
	$requestUri = str_replace('?' . $request->queryString, '', $request->requestUri);

	$param['menu'] = 'angsuran';
	$param['sub_menu'] = 'edit';
	$param['kd'] = substr($requestUri, strrpos($requestUri, '/') + 1);
	$app->Render($param);
});

$app->get('/kwitansi', function ($request) use ($app) {
	$param['menu'] = 'kwitansi';
	$app->Render($param);
});

$app->get('/help', function ($request) use ($app) {
	$param['menu'] = 'help';
	$app->Render($param);
});

$app->post('/login', function ($request) use ($app) {
	if (!isset($request->body->username) || !isset($request->body->password)) {
		return array('success' => false, 'reason' => 'Username And Password cannot be empty');
	}
	$model = $app->load->model('login');
	$request->body->Fields = '*';
	$request->body->query = '';

	$app->load->file('cr4');
	$request->body->password = urlencode(rc4('1234567', $request->body->password));
	// print($request->body->password);

	$retData = $model->getData($request->body);
	if (!$retData->RowCount) {
		return array('success' => false, 'reason' => 'Wrong username or password');
	}

	$_SESSION['isLogin'] = true;
	$_SESSION['username'] = $request->body->username;
	$_SESSION['password'] = $request->body->password;
	$_SESSION['nama_anggota'] = $retData->DataRow[0]->nama_anggota;
	$_SESSION['kd_anggota'] = $retData->DataRow[0]->kd_anggota;
	$_SESSION['hak_akses'] = $retData->DataRow[0]->hak_akses;

	return array('success' => true, 'profile' => $retData->DataRow[0]);
});

$app->post('/logout', function ($request) use ($app) {
	session_destroy();
	$app->Render();
});

$app->post('/tambah/*', function ($request) use ($app) {
	$requestUri = str_replace('?' . $request->queryString, '', $request->requestUri);
	$modelName = substr($requestUri, strrpos($requestUri, '/') + 1);
	$model = $app->load->model($modelName);
	$body = $request->body;

	if ($request->query->action == 'delete') {
		$result = $model->deleteData($body);
	} else {
		if ($body->tgl) {
			$body->{'tgl_' . $modelName} = $body->thn . '-' . $body->bln . '-' . $body->tgl;
			unset($body->tgl);
			unset($body->bln);
			unset($body->thn);
		}

		if ($body->tglT) {
			$body->{'tgl_transaksi'} = $body->thnT . '-' . $body->blnT . '-' . $body->tglT;
			unset($body->tglT);
			unset($body->blnT);
			unset($body->thnT);
		}

		// var_dump($request->body);
		$result = $model->putData($request->body);
	}

	if ($result->success) {
		$redirectPath = str_replace('tambah/', '', $requestUri);
		echo "<script type='text/javascript'>window.location = '{$redirectPath}';</script>";
	}
});

$app->run();
