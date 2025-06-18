<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="fa fa-home "></i>'
		),
		
		array(
			'path' => 'user', 
			'label' => 'User', 
			'icon' => '<i class="fa fa-user "></i>'
		),
		
		array(
			'path' => 'peserta_uks', 
			'label' => 'Peserta Uks', 
			'icon' => '<i class="fa fa-users "></i>','submenu' => array(
		array(
			'path' => 'peserta_smp', 
			'label' => 'Peserta SMP', 
			'icon' => ''
		),
		
		array(
			'path' => 'peserta_sma', 
			'label' => 'Peserta SMA', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'kegiatan', 
			'label' => 'Kegiatan', 
			'icon' => '<i class="fa fa-child "></i>','submenu' => array(
		array(
			'path' => 'pendidikan_kes', 
			'label' => 'Pendidikan Kesehatan', 
			'icon' => ''
		),
		
		array(
			'path' => 'pelayanan_kes', 
			'label' => 'Pelayanan Kesehatan', 
			'icon' => ''
		),
		
		array(
			'path' => 'sanitasi', 
			'label' => 'Sanitasi Lingkungan', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'obat', 
			'label' => 'Obat', 
			'icon' => '<i class="fa fa-medkit "></i>'
		),
		
		array(
			'path' => 'duta_uks', 
			'label' => 'Duta Uks', 
			'icon' => '<i class="fa fa-weixin "></i>'
		),
		
		array(
			'path' => 'kunjungan_uks', 
			'label' => 'Kunjungan UKS', 
			'icon' => '<i class="fa fa-book "></i>'
		),
		
		array(
			'path' => 'mcu_tahunan', 
			'label' => 'MCU Tahunan', 
			'icon' => '<i class="fa fa-heartbeat "></i>'
		),
		
		array(
			'path' => 'app/cari_nisn_new.php', 
			'label' => 'Cek NISN New', 
			'icon' => '<i class="fa fa-key "></i>'
		),
		
		array(
			'path' => 'role_permissions', 
			'label' => 'Role Permissions', 
			'icon' => ''
		),
		
		array(
			'path' => 'roles', 
			'label' => 'Roles', 
			'icon' => ''
		)
	);
		
	
	
			public static $Jenis_Kelamin = array(
		array(
			"value" => "Laki-laki", 
			"label" => "Laki-laki", 
		),
		array(
			"value" => "Perempuan", 
			"label" => "Perempuan", 
		),);
		
			public static $Materi = array(
		array(
			"value" => "Kesehatan Reproduksi", 
			"label" => "Kesehatan Reproduksi", 
		),
		array(
			"value" => "Gizi", 
			"label" => "Gizi", 
		),
		array(
			"value" => "Kebersihan Diri", 
			"label" => "Kebersihan Diri", 
		),
		array(
			"value" => "PHBS", 
			"label" => "PHBS", 
		),
		array(
			"value" => "Sanitasi", 
			"label" => "Sanitasi", 
		),
		array(
			"value" => "Kesehatan Mental", 
			"label" => "Kesehatan Mental", 
		),
		array(
			"value" => "NAPZA", 
			"label" => "NAPZA", 
		),
		array(
			"value" => "Kekerasan dan Kecelakaan", 
			"label" => "Kekerasan dan Kecelakaan", 
		),
		array(
			"value" => "IMS dan HHIV AIDS", 
			"label" => "IMS dan HHIV AIDS", 
		),
		array(
			"value" => "Penyakit Tidak Menular", 
			"label" => "Penyakit Tidak Menular", 
		),);
		
}