<?php

/**
 * Info Contoller Class
 * @category  Controller
 */

class ApiController extends BaseController
{

	/**
	 * call model action to retrieve data
	 * @return json data
	 */

	function json($action, $arg1 = null, $arg2 = null)
	{
		$model = new SharedController;
		$args = array($arg1, $arg2);
		$data = call_user_func_array(array($model, $action), $args);
		render_json($data);
	}

	function simple_json(){
		$host = DB_HOST;
		$dbname = DB_NAME;
		$username = DB_USERNAME;
		$password = DB_PASSWORD;
		$nisn = isset($_GET['nisn']) ? trim($_GET['nisn']) : '';
		if (empty($nisn)) {
			render_json([
				'status' => 'error',
				'message' => 'NISN tidak boleh kosong'
			]);
		}

		try {
			$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			die("Koneksi gagal: " . $e->getMessage());
		}

		$stmt = $pdo->prepare("SELECT * FROM peserta_smp WHERE NISN = $nisn LIMIT 1");
		$stmt->execute();
		$peserta = $stmt->fetchAll();

		render_json([
			'status' => 'success',
			'data' => $peserta[0] ?? [],
		]);
	}
}
