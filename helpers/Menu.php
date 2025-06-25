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
			'label' => 'Peserta UKS', 
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
		),
		
		array(
			'path' => 'peserta_karyawan', 
			'label' => 'Peserta Guru dan Karyawan', 
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
			'label' => 'Pembinaan Lingkungan Sehat', 
			'icon' => ''
		)
	)
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
			'path' => 'cek_nisn', 
			'label' => 'Cek NISN', 
			'icon' => '<i class="fa fa-key "></i>'
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
		
			public static $Kepala = array(
		array(
			"value" => "DBN", 
			"label" => "DBN", 
		),
		array(
			"value" => "Abnormal", 
			"label" => "Abnormal", 
		),);
		
			public static $Luka_terbuka = array(
		array(
			"value" => "-", 
			"label" => "-", 
		),
		array(
			"value" => "+", 
			"label" => "+", 
		),);
		
			public static $Tingkat = array(
		array(
			"value" => "SMP", 
			"label" => "SMP", 
		),
		array(
			"value" => "SMA", 
			"label" => "SMA", 
		),
		array(
			"value" => "Karyawan", 
			"label" => "Karyawan", 
		),);
		
			public static $Jenis_Kelamin2 = array(
		array(
			"value" => "Laki-Laki", 
			"label" => "Laki-Laki", 
		),
		array(
			"value" => "Perempuan", 
			"label" => "Perempuan", 
		),);
		
			public static $Materi = array(
		array(
			"value" => "Pendidikan Kesehatan Reproduksi", 
			"label" => "Pendidikan Kesehatan Reproduksi", 
		),
		array(
			"value" => "Pendidikan  Gizi", 
			"label" => "Pendidikan  Gizi", 
		),
		array(
			"value" => "Kebersihan Diri", 
			"label" => "Kebersihan Diri", 
		),
		array(
			"value" => "Pembiasaan Aktivitas Fisik", 
			"label" => "Pembiasaan Aktivitas Fisik", 
		),
		array(
			"value" => "Pendidikan Keterampilan Hidup Sehat (PKHS)", 
			"label" => "Pendidikan Keterampilan Hidup Sehat (PKHS)", 
		),
		array(
			"value" => "Pembinaan Kader Kesehatan Sekolah", 
			"label" => "Pembinaan Kader Kesehatan Sekolah", 
		),
		array(
			"value" => "Pendidikan Sanitasi", 
			"label" => "Pendidikan Sanitasi", 
		),
		array(
			"value" => "Kesehatan Mental", 
			"label" => "Kesehatan Mental", 
		),
		array(
			"value" => "Bahaya NAPZA", 
			"label" => "Bahaya NAPZA", 
		),
		array(
			"value" => "Kekerasan dan Kecelakaan", 
			"label" => "Kekerasan dan Kecelakaan", 
		),
		array(
			"value" => "IMS dan HIV AIDS", 
			"label" => "IMS dan HIV AIDS", 
		),
		array(
			"value" => "Penyakit Menular", 
			"label" => "Penyakit Menular", 
		),
		array(
			"value" => "Penyakit Tidak Menular", 
			"label" => "Penyakit Tidak Menular", 
		),);
		
			public static $Kegiatan = array(
		array(
			"value" => "Pemeriksaan Kesehatan", 
			"label" => "Pemeriksaan Kesehatan", 
		),
		array(
			"value" => "Pemeriksaan Anemia", 
			"label" => "Pemeriksaan Anemia", 
		),
		array(
			"value" => "Pemeriksaan Fisik, Glukosa, Kolestrol, Asam Urat", 
			"label" => "Pemeriksaan Fisik, Glukosa, Kolestrol, Asam Urat", 
		),
		array(
			"value" => "Pemberian Tablet Tambah Darah (TTD)", 
			"label" => "Pemberian Tablet Tambah Darah (TTD)", 
		),
		array(
			"value" => "P3K", 
			"label" => "P3K", 
		),
		array(
			"value" => "Konseling Kesehatan", 
			"label" => "Konseling Kesehatan", 
		),);
		
			public static $Jenis_kegiatan = array(
		array(
			"value" => "Pengelolaan Sanitasi Sekolah", 
			"label" => "Pengelolaan Sanitasi Sekolah", 
		),
		array(
			"value" => "Pemanfaatan Perkarangan Sekolah", 
			"label" => "Pemanfaatan Perkarangan Sekolah", 
		),
		array(
			"value" => "Pemberantasan Sarang Nyamuk", 
			"label" => "Pemberantasan Sarang Nyamuk", 
		),
		array(
			"value" => "Pembinaan Kantin dan PKL Sekitar Sekolah", 
			"label" => "Pembinaan Kantin dan PKL Sekitar Sekolah", 
		),
		array(
			"value" => "Penerapan Kawasan Tanpa Rokok, Narkoba, Kekerasan, dan Pornografi", 
			"label" => "Penerapan Kawasan Tanpa Rokok, Narkoba, Kekerasan, dan Pornografi", 
		),);
		
}