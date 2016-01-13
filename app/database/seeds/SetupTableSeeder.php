<?php

class SetupTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
        	'email' => 'admin@tsel.com',
        	'password' => Hash::make('12345'),
        	'nama' => 'Admin Network App',
        	'jabatan' => 'System Administrator',
            'level_jabatan' => 'manager',
            'is_manager_utama' => false,
            'can_be_poh' => true,
        	  'role' => 'admin',
            'lokasi_kerja_id' => 1
        ));

        User::create(array(
        	'email' => 'habibimt@tsel.com',
        	'password' => Hash::make('12345'),
        	'nama' => 'Habibi M. Tau',
        	'jabatan' => 'Mgr. Network Service Palu',
          'level_jabatan' => 'manager',
          'is_manager_utama' => true,
          'can_be_poh' => false,
        	'role' => 'no',
          'lokasi_kerja_id' => 1,
          'nik' => '78022',
          'bank' => 'Mandiri Cab. Sorong',
          'no_rekening' => '154-000-528-6053',
          'no_hp' => '0811400005'
        ));

        User::create(array(
        	'email' => 'joni@tsel.com',
        	'password' => Hash::make('12345'),
        	'nama' => 'Joni A. Lembang',
        	'jabatan' => 'Spv. Core Network Operation Palu',
          'level_jabatan' => 'spv',
          'is_manager_utama' => false,
          'can_be_poh' => true,
        	'role' => 'no',
          'lokasi_kerja_id' => 1,
          'nik' => '83022',
          'bank' => 'BNI',
          'no_rekening' => '0085638331',
          'no_hp' => '0811470000'
        ));

        User::create(array(
        	'email' => 'santhy@tsel.com',
        	'password' => Hash::make('12345'),
        	'nama' => 'Prasanthy Ganty',
        	'jabatan' => 'Spv. RTP Operation Palu',
          'level_jabatan' => 'spv',
          'is_manager_utama' => false,
          'can_be_poh' => true,
        	'role' => 'no',
          'lokasi_kerja_id' => 1,
          'nik' => '79023',
          'bank' => 'BNI Cab. Palu',
          'no_rekening' => '0081771773',
          'no_hp' => '0811451007'
        ));

        User::create(array(
        	'email' => 'nathaniel@tsel.com',
        	'password' => Hash::make('12345'),
        	'nama' => 'Nathaniel Rombo',
        	'jabatan' => 'Spv. RTP Operation Tolitoli',
          'level_jabatan' => 'spv',
          'is_manager_utama' => false,
          'can_be_poh' => false,
        	'role' => 'no',
          'lokasi_kerja_id' => 2,
          'nik' => '82018',
          'bank' => 'BNI 46 Cab. Makassar',
          'no_rekening' => '0085639196',
          'no_hp' => '0811468458'
        ));

        User::create(array(
        	'email' => 'faizal@tsel.com',
        	'password' => Hash::make('12345'),
        	'nama' => 'Mochamad Faizal',
        	'jabatan' => 'Staff RTP Operation Palu',
          'level_jabatan' => 'staff',
          'is_manager_utama' => false,
          'can_be_poh' => false,
        	'role' => 'no',
          'lokasi_kerja_id' => 1,
          'nik' => '90085',
          'bank' => 'BNI Cab. Surabaya',
          'no_rekening' => '0154733317',
          'no_hp' => '08114510154'
        ));

        User::create(array(
        	'email' => 'ginanjar@tsel.com',
        	'password' => Hash::make('12345'),
        	'nama' => 'Ginanjar Artanto',
        	'jabatan' => 'Staff RTP Operation Palu',
          'level_jabatan' => 'staff',
          'is_manager_utama' => false,
          'can_be_poh' => false,
        	'role' => 'no',
          'lokasi_kerja_id' => 1,
          'nik' => '90136',
          'bank' => 'BNI Cab. Perintis',
          'no_rekening' => '0266525334',
          'no_hp' => '08111818883'
        ));

        User::create(array(
        	'email' => 'fahri@tsel.com',
        	'password' => Hash::make('12345'),
        	'nama' => 'Fahri',
        	'jabatan' => 'Spv. RTP Operation Luwuk',
          'level_jabatan' => 'spv',
          'is_manager_utama' => false,
          'can_be_poh' => false,
        	'role' => 'no',
          'lokasi_kerja_id' => 3,
          'nik' => '82004',
          'bank' => 'BNI Cab. Palu',
          'no_rekening' => '0081984873',
          'no_hp' => '0811458880'
        ));

        User::create(array(
        	'email' => 'ataufik@tsel.com',
        	'password' => Hash::make('12345'),
        	'nama' => 'Ahmad Taufik',
        	'jabatan' => 'Spv. RTP Operation Poso',
          'level_jabatan' => 'spv',
          'is_manager_utama' => false,
          'can_be_poh' => false,
        	'role' => 'no',
          'lokasi_kerja_id' => 4,
          'nik' => '78013',
          'bank' => 'BNI Syariah Cab. Malang',
          'no_rekening' => '0159.4792.29',
          'no_hp' => '0811363111'
        ));

        User::create(array(
          'email' => 'ataufik@tsel.com',
          'password' => Hash::make('12345'),
          'nama' => 'Lutfi N Rachmad',
          'jabatan' => 'Staff Core Network Operation Palu',
          'level_jabatan' => 'spv',
          'is_manager_utama' => false,
          'can_be_poh' => false,
          'role' => 'no',
          'lokasi_kerja_id' => 1,
          'nik' => '92062',
          'bank' => '',
          'no_rekening' => '',
          'no_hp' => '08118035470'
        ));

        // user TTD

        User::create(array(
          'email' => 'aliimran@tsel.com',
          'password' => Hash::make('12345'),
          'nama' => 'Ali Imran',
          'jabatan' => 'VP ICT Network Management Area Pamasuka',
          'level_jabatan' => 'manager',
          'is_manager_utama' => true,
          'can_be_poh' => false,
          'role' => 'no',
          'lokasi_kerja_id' => 1,
          'nik' => '',
          'bank' => '',
          'no_rekening' => '',
          'no_hp' => ''
        ));

        User::create(array(
          'email' => 'noviandri@tsel.com',
          'password' => Hash::make('12345'),
          'nama' => 'Noviandri',
          'jabatan' => 'GM ICT Operation Region Sulawesi',
          'level_jabatan' => 'manager',
          'is_manager_utama' => true,
          'can_be_poh' => false,
          'role' => 'no',
          'lokasi_kerja_id' => 1,
          'nik' => '',
          'bank' => '',
          'no_rekening' => '',
          'no_hp' => ''
        ));

        User::create(array(
          'email' => 'edi@tsel.com',
          'password' => Hash::make('12345'),
          'nama' => 'Edi Sucipto',
          'jabatan' => 'Mgr. Network Operation Support Sulawesi',
          'level_jabatan' => 'manager',
          'is_manager_utama' => true,
          'can_be_poh' => false,
          'role' => 'no',
          'lokasi_kerja_id' => 1,
          'nik' => '',
          'bank' => '',
          'no_rekening' => '',
          'no_hp' => ''
        ));

        User::create(array(
          'email' => 'ronald@tsel.com',
          'password' => Hash::make('12345'),
          'nama' => 'Ronald Limoa',
          'jabatan' => 'Mgr. Core and Power Performance Assurance Sulawesi',
          'level_jabatan' => 'manager',
          'is_manager_utama' => true,
          'can_be_poh' => false,
          'role' => 'no',
          'lokasi_kerja_id' => 1,
          'nik' => '',
          'bank' => '',
          'no_rekening' => '',
          'no_hp' => ''
        ));

        User::create(array(
          'email' => 'mustafa@tsel.com',
          'password' => Hash::make('12345'),
          'nama' => 'Ma\'ruf Mustafa',
          'jabatan' => 'Mgr. RAN and Transport Performance Assurance Sulawesi',
          'level_jabatan' => 'manager',
          'is_manager_utama' => true,
          'can_be_poh' => false,
          'role' => 'no',
          'lokasi_kerja_id' => 1,
          'nik' => '',
          'bank' => '',
          'no_rekening' => '',
          'no_hp' => ''
        ));

        User::create(array(
          'email' => 'maruf@tsel.com',
          'password' => Hash::make('12345'),
          'nama' => 'Muhamad Ma\'ruf',
          'jabatan' => 'Mgr. Site Management Sulawesi',
          'level_jabatan' => 'manager',
          'is_manager_utama' => true,
          'can_be_poh' => false,
          'role' => 'no',
          'lokasi_kerja_id' => 1,
          'nik' => '',
          'bank' => '',
          'no_rekening' => '',
          'no_hp' => ''
        ));

        Mitra::create(array(
          'nama' => 'PT. Kisel',
          'cluster' => 'Palu_tolitoli_Santigi',
          'pic' => 'Basri Marhabang',
          'hp' => '082192622222',
          'no_rekening' => '0104200173',
          'nama_rekening' => 'Koperasi Telkomsel (Ki-SEL) Komisariat Wil. VIII',
          'bank' => 'BNI 46 Cab. SUDIRMAN MAKASSAR'
        ));

        Mitra::create(array(
          'nama' => 'PT. Primatama',
          'cluster' => 'Poso_Luwuk',
          'pic' => 'Hendra C. P.',
          'hp' => '082111477771',
          'no_rekening' => '',
          'nama_rekening' => '',
          'bank' => ''
        ));

        Mitra::create(array(
          'nama' => 'PT. DFA EKSPRES PALU',
          'cluster' => '',
          'pic' => 'Waryo',
          'hp' => '081341464070',
          'no_rekening' => '0119464006',
          'nama_rekening' => 'Waryo',
          'bank' => 'BNI 46 Cab. Palu'
        ));

        LokasiKerja::create(array(
        	'nama' => 'Palu'
        ));

        LokasiKerja::create(array(
        	'nama' => 'Tolitoli'
        ));

        LokasiKerja::create(array(
        	'nama' => 'Luwuk'
        ));

        LokasiKerja::create(array(
        	'nama' => 'Poso'
        ));

        VersheetType::create(array(
            'doc_name' => 'FPJP',
        ));

        VersheetType::create(array(
            'doc_name' => 'PO',
        ));

        VersheetType::create(array(
            'doc_name' => 'Invoice',
        ));

        VersheetType::create(array(
            'doc_name' => 'Kwitansi',
        ));

        VersheetType::create(array(
            'doc_name' => 'Faktur Pajak',
        ));

        VersheetType::create(array(
            'doc_name' => 'BAST',
        ));

        VersheetType::create(array(
            'doc_name' => 'Berita Acara',
        ));

        VersheetType::create(array(
            'doc_name' => 'PKS / BAK / BAN',
        ));

        VersheetType::create(array(
            'doc_name' => 'Rekapitulasi',
        ));



    }

}

?>
