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
        	'role' => 'admin'
        ));

        LokasiKerja::create(array(
        	'nama' => 'Palu'
        ));

        LokasiKerja::create(array(
        	'nama' => 'Toli-toli'
        ));
    }

}

?>