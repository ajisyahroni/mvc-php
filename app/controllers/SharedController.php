<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * peserta_uks_NISN_option_list Model Action
     * @return array
     */
	function peserta_uks_NISN_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT NISN AS value , NISN AS label FROM kunjungan_uks ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * user_user_role_id_option_list Model Action
     * @return array
     */
	function user_user_role_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT role_id AS value, role_name AS label FROM roles";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * user_Username_value_exist Model Action
     * @return array
     */
	function user_Username_value_exist($val){
		$db = $this->GetModel();
		$db->where("Username", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_Email_value_exist Model Action
     * @return array
     */
	function user_Email_value_exist($val){
		$db = $this->GetModel();
		$db->where("Email", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * mcu_tahunan_NISN_option_list Model Action
     * @return array
     */
	function mcu_tahunan_NISN_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT NISN AS value , NISN AS label FROM kunjungan_uks ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * kunjungan_uks_NISN_option_list Model Action
     * @return array
     */
	function kunjungan_uks_NISN_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT NISN AS value , NISN AS label FROM mcu_tahunan ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * peserta_smp_NISN_option_list Model Action
     * @return array
     */
	function peserta_smp_NISN_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT NISN AS value , NISN AS label FROM kunjungan_uks ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * peserta_sma_NISN_option_list Model Action
     * @return array
     */
	function peserta_sma_NISN_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT NISN AS value , NISN AS label FROM kunjungan_uks ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_kunjunganuks Model Action
     * @return Value
     */
	function getcount_kunjunganuks(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM kunjungan_uks";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
	* doughnutchart_kunjunganuksberdasarkangender Model Action
	* @return array
	*/
	function doughnutchart_kunjunganuksberdasarkangender(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  COUNT(ku.Kelas) AS count_of_Kelas, ku.Jenis_Kelamin FROM kunjungan_uks AS ku GROUP BY ku.Jenis_Kelamin";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_Kelas');
		$dataset_labels =  array_column($dataset1, 'Jenis_Kelamin');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* piechart_kunjunganuksberdasarkankelompok Model Action
	* @return array
	*/
	function piechart_kunjunganuksberdasarkankelompok(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  COUNT(ku.NISN) AS count_of_NISN, ku.Tingkat FROM kunjungan_uks AS ku GROUP BY ku.Tingkat";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_NISN');
		$dataset_labels =  array_column($dataset1, 'Tingkat');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* barchart_kunjunganpertanggal Model Action
	* @return array
	*/
	function barchart_kunjunganpertanggal(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  COUNT(ku.NISN) AS count_of_NISN, DAY(ku.Tanggal) AS date_of_Tanggal FROM kunjungan_uks AS ku GROUP BY date_of_Tanggal";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_NISN');
		$dataset_labels =  array_column($dataset1, 'date_of_Tanggal');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* piechart_keluhan Model Action
	* @return array
	*/
	function piechart_keluhan(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  COUNT(ku.NISN) AS count_of_NISN, ku.Subjective FROM kunjungan_uks AS ku GROUP BY ku.Subjective";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_NISN');
		$dataset_labels =  array_column($dataset1, 'Subjective');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
     * peserta_smp_NISN_option_list Model Action
     * @return array
     */
	function distinct_nisn(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT  'SMA' AS scope, NISN AS value , NISN AS label, Kelas AS homebase, Nama AS nama FROM peserta_sma ORDER BY scope, label, homebase, Nama";
		$sqltext2 = "SELECT DISTINCT 'SMP' AS scope, NISN AS value , NISN AS label, Kelas AS homebase, Nama AS nama FROM peserta_smp ORDER BY scope, label, homebase, Nama";
		$sqltext3 = "SELECT DISTINCT 'Karyawan' AS scope, NISN AS value , NISN AS label, Jabatan AS homebase, Nama AS nama FROM peserta_karyawan ORDER BY scope, label, homebase, Nama";
		$queryparams = null;
		$arr = array_merge(
			$db->rawQuery($sqltext, $queryparams),
			$db->rawQuery($sqltext2, $queryparams),
			$db->rawQuery($sqltext3, $queryparams)
		);
		return $arr;
	}

	function cek_nisn($nisn){
		$db = $this->GetModel();
		
		return [
			'peserta_uks' => $db->rawQuery("SELECT NISN, Nama, Jenis_Kelamin as 'Jenis Kelamin', Kelas, TTL, Alergi, Alamat FROM peserta_uks WHERE NISN = " . "'$nisn'"), 
			'peserta_smp' => $db->rawQuery("SELECT NISN, Nama, Jenis_Kelamin as 'Jenis Kelamin', Kelas, TTL, Alergi, Alamat, Inklusi, SA FROM peserta_smp WHERE NISN = " . "'$nisn'"), 
			'peserta_sma' => $db->rawQuery("SELECT NISN, Nama, Jenis_Kelamin as 'Jenis Kelamin', Kelas, TTL, Alergi, Alamat, SA FROM peserta_sma WHERE NISN = " . "'$nisn'"), 
			'mcu_tahunan' => $db->rawQuery("SELECT Tanggal, TB, BB, Goldar, Kepala, Thorax, Abdomen, Extremitas, Luka_terbuka as 'Luka terbuka', Patah_tulang as 'Patah tulang', Riwayat_kesehatan as 'Riwayat kesehatan', Masalah, Hasil_penunjang as 'Hasil penunjang' FROM mcu_tahunan WHERE NISN = " . "'$nisn'" . " ORDER BY Tanggal DESC"), 
			'kunjungan_uks' => $db->rawQuery("SELECT Tanggal, Subjective, Objective, Assesment, Plan FROM kunjungan_uks WHERE NISN = " . "'$nisn'" . " ORDER BY Tanggal DESC"), 
		];
	}

}
