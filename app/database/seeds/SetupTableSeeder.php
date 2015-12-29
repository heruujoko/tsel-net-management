<?php 

class SetupTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
        	'email' => 'admin@tsel-no.com',
        	'password' => Hash::make('12345'),
        	'nama' => 'Admin Network App',
        	'jabatan' => 'admin',
            'level_jabatan' => 'manager',
            'is_manager_utama' => false,
            'can_be_poh' => true,
        	'role' => 'admin',
            'lokasi_kerja_id' => 1
        ));

        User::create(array(
            'email' => 'heruujoko@yahoo.com',
            'password' => Hash::make('12345'),
            'nama' => 'Heru Joko',
            'jabatan' => 'SPV NO',
            'level_jabatan' => 'spv',
            'is_manager_utama' => false,
            'can_be_poh' => true,
            'role' => 'no',
            'lokasi_kerja_id' => 1
        ));

        User::create(array(
            'email' => 'heruujoko@tsel-no.com',
            'password' => Hash::make('12345'),
            'nama' => 'Joko',
            'jabatan' => 'Operational NO',
            'level_jabatan' => 'staff',
            'is_manager_utama' => false,
            'can_be_poh' => false,
            'role' => 'no',
            'lokasi_kerja_id' => 2
        ));

        LokasiKerja::create(array(
        	'nama' => 'Palu'
        ));

        LokasiKerja::create(array(
        	'nama' => 'Toli-toli'
        ));

        Mastertp::create(array(
            'sitelocation' => 'Palu',
            'btsname' => 'PLW-01'
        ));
        
    }

}

?>