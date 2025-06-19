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

			$peserta = null;
			$asal_tabel = '';

			// 1. Cari di peserta_sma dulu
			$stmt = $pdo->prepare("SELECT * FROM peserta_sma WHERE NISN = :nisn LIMIT 1");
			$stmt->execute(['nisn' => $nisn]);
			$result = $stmt->fetch();

			if ($result) {
				$peserta = $result;
				$asal_tabel = 'peserta_sma';
			} else {
				// 2. Kalau gak ketemu, cari di peserta_smp
				$stmt = $pdo->prepare("SELECT * FROM peserta_smp WHERE NISN = :nisn LIMIT 1");
				$stmt->execute(['nisn' => $nisn]);
				$result = $stmt->fetch();

				if ($result) {
					$peserta = $result;
					$asal_tabel = 'peserta_smp';
				}
			}

			// 3. Return hasilnya
			if ($peserta) {
				// Tambahkan info asal tabel
				$peserta['asal_tabel'] = $asal_tabel;
			}

			render_json([
				'status' => 'success',
				'data' => $peserta ?: [],
			]);

		} catch (PDOException $e) {
			render_json([
				'status' => 'error',
				'message' => 'Koneksi ke database gagal: ' . $e->getMessage()
			]);
		}
	}


}
