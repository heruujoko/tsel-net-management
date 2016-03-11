<?php

	class OSSController extends \BaseController {

		public function convert_number_to_words($number){

			// $hyphen      = '-';
			$hyphen = " ";
		    // $conjunction = ' and ';
		    $conjunction = '';
		    $separator   = ', ';
		    $negative    = 'negative ';
		    $decimal     = ' point ';
		    $dictionary  = array(
		        0                   => 'nol',
		        1                   => 'Satu',
		        2                   => 'Dua',
		        3                   => 'Tiga',
		        4                   => 'Empat',
		        5                   => 'Lima',
		        6                   => 'Enam',
		        7                   => 'Tujuh',
		        8                   => 'Delapan',
		        9                   => 'Sembilan',
		        10                  => 'Sepuluh',
		        11                  => 'Sebelas',
		        12                  => 'Dua Belas',
		        13                  => 'Tiga Belas',
		        14                  => 'Empat Belas',
		        15                  => 'Lima Belas',
		        16                  => 'Enam Belas',
		        17                  => 'Tujuh Belas',
		        18                  => 'Delapan Belas',
		        19                  => 'Sembilan Belas',
		        20                  => 'Dua Puluh',
		        30                  => 'Tiga Puluh',
		        40                  => 'Empat Puluh',
		        50                  => 'Lima Puluh',
		        60                  => 'Enam Puluh',
		        70                  => 'Tujuh Puluh',
		        80                  => 'Delapan Puluh',
		        90                  => 'Sembilan Puluh',
		        100                 => 'Ratus ',
		        1000                => 'Ribu ',
		        1000000             => 'Juta ',
		        1000000000          => 'Miliar ',
		        1000000000000       => 'Rriliun ',
		        1000000000000000    => 'Quadrillion ',
		        1000000000000000000 => 'Quintillion '
		    );

			if (!is_numeric($number)) {
		        return false;
		    }

		    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
		        // overflow
		        trigger_error(
		            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
		            E_USER_WARNING
		        );
		        return false;
		    }

		    if ($number < 0) {
		        return $negative . convert_number_to_words(abs($number));
		    }

		    $string = $fraction = null;

		    if (strpos($number, '.') !== false) {
		        list($number, $fraction) = explode('.', $number);
		    }

		    switch (true) {
		        case $number < 21:
		            $string = $dictionary[$number];
		            break;
		        case $number < 100:
		            $tens   = ((int) ($number / 10)) * 10;
		            $units  = $number % 10;
		            $string = $dictionary[$tens];
		            if ($units) {
		                $string .= $hyphen . $dictionary[$units];
		            }
		            break;
		        case $number < 1000:
		            $hundreds  = $number / 100;
		            $remainder = $number % 100;
		            if($hundreds < 2){
		            	$string = 'se'. $dictionary[100]." ";
		            } else {
		            	$string = $dictionary[$hundreds] . ' ' . $dictionary[100].' ';
		            }
		            if ($remainder) {
		                $string .= $conjunction . $this->convert_number_to_words($remainder);
		            }
		            break;
		        default:
		            $baseUnit = pow(1000, floor(log($number, 1000)));
		            $numBaseUnits = (int) ($number / $baseUnit);
		            $remainder = $number % $baseUnit;
		            $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
		            if ($remainder) {
		                $string .= $remainder < 100 ? $conjunction : $separator;
		                $string .= $this->convert_number_to_words($remainder);
		            }
		            break;
		    }

		    if (null !== $fraction && is_numeric($fraction)) {
		        $string .= $decimal;
		        $words = array();
		        foreach (str_split((string) $fraction) as $number) {
		            $words[] = $dictionary[$number];
		        }
		        $string .= implode(' ', $words);
		    }

			return $string;
		}

		public function showmaterial(){
			$data['active'] = 'oss';
			$data['material'] = true;
			$data['oss'] = OSS::where('oss_type','=','material')->get();
			$data['sites'] = DB::table('mastertp')->groupBy('sitelocation')->get();
			$data['shoplists'] = Shoplist::all();
			$data['userno'] = User::where('role' , '=' , 'no')->get();
			return View::make(Auth::user()->role.'.oss.showmaterial', $data);
		}

		public function storematerial(){
			$tanggal = Carbon::parse(Input::get('tanggal'));
			$oss = new OSS;
			$oss->user_id = Auth::user()->id;
			$oss->site = Input::get('namasite');
			$oss->oss_type = "material";
			$oss->tanggal = $tanggal;
			$oss->permasalahan = Input::get('permasalahan');
			$oss->action = Input::get('action');
			$oss->user_mengerjakan = Input::get('mengerjakan');
			$oss->user_mengetahui = Input::get('mengetahui');
			$oss->save();

			$shopping_list = Input::get('shoplist');
			$harga = 0;
			for ($i=0; $i < count($shopping_list); $i++) {
				$ss = new OSShop;
				$ss->oss_id = $oss->id;
				$ss->shoplist_id = $shopping_list[$i];
				$ss->save();
				$sl = Shoplist::find($shopping_list[$i]);
				$harga += $sl->harga;
			}

			$oss->harga = $harga;
			$oss->save();

			$menyetujui = Input::get('menyetujui');

			for ($j=0; $j < count($menyetujui); $j++) {
				$stj = new MenyetujuiOSS;
				$stj->oss_id = $oss->id;
				$stj->user_id = $menyetujui[$j];
				$stj->save();
			}

			//no OSS
			$day = Carbon::parse($oss->tanggal);
			$year = $day->year;
			$noss = '';

			$romans = array(
				0 => '',
				1 => 'I',
				2 => 'II',
				3 => 'III',
				4 => 'IV',
				5 => 'V',
				6 => 'VI',
				7 => 'VII',
				8 => 'VIII',
				9 => 'IX',
				10 => 'X',
				11 => 'XI',
				12 => 'XII'
			);

			if(Auth::user()->mitra == 1 ){
				$noss = $oss->id.'/KISEL-TLI/'.$romans[$day->month].'/'.$year;
			} else {
				$noss = $oss->id.'/PRIMATAMA-LWK/'.$romans[$day->month].'/'.$year;
			}
			$oss->no_oss = $noss;
			$oss->save();
			Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/'.Auth::user()->role.'/oss/material');
		}

		public function detailmaterial($id){
			$data['active'] = 'oss';
			$data['material'] = true;
			$data['oss'] = OSS::where('oss_type','=','material')->where('id','=',$id)->first();
			return View::make(Auth::user()->role.'.oss.detailmaterial' , $data);
		}

		public function printmaterial($id){
			$oss = OSS::find($id);
			$day = Carbon::parse($oss->tanggal);
			if($day->dayOfWeek == 0 ){
				$data['hari'] = 'Minggu';
			} elseif($day->dayOfWeek == 1){
				$data['hari'] = 'Senin';
			} elseif($day->dayOfWeek == 2){
				$data['hari'] = 'Selasa';
			} elseif($day->dayOfWeek == 3){
				$data['hari'] = 'Rabu';
			} elseif($day->dayOfWeek == 4){
				$data['hari'] = 'Kamis';
			} elseif($day->dayOfWeek == 5){
				$data['hari'] = 'Jum\'at';
			} elseif($day->dayOfWeek == 6){
				$data['hari'] = 'Sabtu';
			} else {}
			if($day->month == 1 ){
				$data['bulan'] = 'Januari';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'Februari';
			} elseif ($day->month == 3) {
				$data['bulan'] = 'Maret';
			} elseif ($day->month == 4) {
				$data['bulan'] = 'April';
			} elseif ($day->month == 5) {
				$data['bulan'] = 'Mei';
			} elseif ($day->month == 6) {
				$data['bulan'] = 'Juni';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'Juli';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'Agustus';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'September';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'Oktober';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'November';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'Desember';
			} else {}

			$romans = array(
				0 => '',
				1 => 'I',
				2 => 'II',
				3 => 'III',
				4 => 'IV',
				5 => 'V',
				6 => 'VI',
				7 => 'VII',
				8 => 'VIII',
				9 => 'IX',
				10 => 'X',
				11 => 'XI',
				12 => 'XII'
			);

			$sum = 0;
			foreach ($oss->shoplists as $sl) {
				$sum = $sum + $sl->harga;
			}
			$data['year'] = $day->year;
			$data['roman'] = $romans[$day->month];
			$data['sum'] = $sum;
			$data['day'] = $day->toDateString();
			$data['tanggal'] = $this->convert_number_to_words($day->day);
			$data['tahun'] = $this->convert_number_to_words($day->year);
			$data['oss'] = $oss;
			$data['sites'] = $oss->sites;
			$panjang = count($oss->shoplists);
			$br = 0;
			if($panjang > 2){
				$br = 160;
				if($panjang < 6){
					$sel = $panjang - 3;
					$br = $br - (30*$sel);
				} else {
					$br = 303;
					$sel = $panjang - 6;
					$br = $br - (30*$sel);
				}
			} else {

			}
			$data['br'] = $br;
			$pdf = PDF::loadView('templatesurat.oss_material' , $data);
			return $pdf->setPaper('a4')->stream();
		}

		public function editmaterial($id){
			$data['active'] = 'oss';
			$data['material'] = true;
			$data['oss'] = OSS::where('oss_type','=','material')->where('id','=',$id)->first();
			$data['sites'] = DB::table('mastertp')->groupBy('sitelocation')->get();
			$data['shoplists'] = Shoplist::all();
			$data['userno'] = User::where('role' , '=' , 'no')->get();
			return View::make('admin.oss.editmaterial' , $data);
		}

		public function updatematerial($id){
			$tanggal = Carbon::parse(Input::get('tanggal'));
			$oss = OSS::where('id','=',$id)->first();
			$oss->site = Input::get('namasite');
			$oss->oss_type = "material";
			$oss->tanggal = $tanggal;
			$oss->permasalahan = Input::get('permasalahan');
			$oss->action = Input::get('action');
			$oss->user_mengerjakan = Input::get('mengerjakan');
			$oss->user_mengetahui = Input::get('mengetahui');
			$oss->save();

			OSShop::where('oss_id' , '=' ,$id)->delete();

			$shopping_list = Input::get('shoplist');
			$harga = 0;
			for ($i=0; $i < count($shopping_list); $i++) {
				$ss = new OSShop;
				$ss->oss_id = $oss->id;
				$ss->shoplist_id = $shopping_list[$i];
				$ss->save();
				$sl = Shoplist::find($shopping_list[$i]);
				$harga += $sl->harga;
			}

			$oss->harga = $harga;
			$oss->save();
			MenyetujuiOSS::where('oss_id' , '=' , $id)->delete();
			$menyetujui = Input::get('menyetujui');

			for ($j=0; $j < count($menyetujui); $j++) {
				$stj = new MenyetujuiOSS;
				$stj->oss_id = $oss->id;
				$stj->user_id = $menyetujui[$j];
				$stj->save();
			}
			Session::flash('success' , 'Data telah diperbarui.');
			return Redirect::to('/admin/oss/material/');
		}

		public function deletematerial($id){
			$oss = OSS::find($id);
			$oss->delete();
			$sl = OSShop::where('oss_id' , '=', $id)->delete();

			$stj = MenyetujuiOSS::where('oss_id' , '=' , $id)->delete();

			Session::flash('success' , 'Data telah dihapus.');
			return Redirect::to('/admin/oss/material/');
		}


		public function showspj(){
			$data['active'] = 'oss';
			$data['spj'] = true;
			$data['oss'] = OSS::where('oss_type','=','spj')->get();
			$data['sites'] = DB::table('mastertp')->groupBy('sitelocation')->get();
			$data['shoplists'] = Shoplist::all();
			$data['bantek'] = Bantek::all();
			$data['userno'] = User::where('role' , '=' , 'no')->get();
			return View::make(Auth::user()->role.'.oss.showspj', $data);
		}

		public function printspj($id){
			$oss = OSS::find($id);
			$day = Carbon::parse($oss->tanggal);
			$data['oss'] = $oss;
			if($day->dayOfWeek == 0 ){
				$data['hari'] = 'Minggu';
			} elseif($day->dayOfWeek == 1){
				$data['hari'] = 'Senin';
			} elseif($day->dayOfWeek == 2){
				$data['hari'] = 'Selasa';
			} elseif($day->dayOfWeek == 3){
				$data['hari'] = 'Rabu';
			} elseif($day->dayOfWeek == 4){
				$data['hari'] = 'Kamis';
			} elseif($day->dayOfWeek == 5){
				$data['hari'] = 'Jum\'at';
			} elseif($day->dayOfWeek == 6){
				$data['hari'] = 'Sabtu';
			} else {}

			if($day->month == 1 ){
				$data['bulan'] = 'Januari';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'Februari';
			} elseif ($day->month == 3) {
				$data['bulan'] = 'Maret';
			} elseif ($day->month == 4) {
				$data['bulan'] = 'April';
			} elseif ($day->month == 5) {
				$data['bulan'] = 'Mei';
			} elseif ($day->month == 6) {
				$data['bulan'] = 'Juni';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'Juli';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'Agustus';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'September';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'Oktober';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'November';
			} elseif ($day->month == 2) {
				$data['bulan'] = 'Desember';
			} else {}

			$romans = array(
				0 => '',
				1 => 'I',
				2 => 'II',
				3 => 'III',
				4 => 'IV',
				5 => 'V',
				6 => 'VI',
				7 => 'VII',
				8 => 'VIII',
				9 => 'IX',
				10 => 'X',
				11 => 'XI',
				12 => 'XII'
			);

			$data['year'] = $day->year;
			$data['roman'] = $romans[$day->month];
			$data['day'] = $day->toDateString();
			$data['tanggal'] = $this->convert_number_to_words($day->day);
			$data['tahun'] = $this->convert_number_to_words($day->year);
			$panjang = count($oss->shoplists);
			$br = 0;
			if($panjang > 2){
				$br = 160;
				if($panjang < 6){
					$sel = $panjang - 3;
					$br = $br - (30*$sel);
				} else {
					$br = 303;
					$sel = $panjang - 6;
					$br = $br - (30*$sel);
				}
			} else {

			}
			$data['br'] = $br;
			$data['is_transport'] = false;
			foreach ($oss->shoplists as $shopl) {
				if($shopl->type == 'transport'){
					$data['is_transport'] = true;
				}
			}

			$pdf = PDF::loadView('templatesurat.oss_bantek_2' , $data);
			return $pdf->setPaper('a4')->stream();
		}

		public function storespj(){
			$oss = new OSS;
			$oss->oss_type = "spj";
			$oss->user_id = Auth::user()->id;
			$oss->tanggal = Carbon::parse(Input::get('tanggal'));
			$oss->bantek = Input::get('bantek');
			$oss->permasalahan = Input::get('permasalahan');
			$oss->action = Input::get('action');
			$oss->mulai = Carbon::parse(Input::get('mulai'));
			$oss->selesai = Carbon::parse(Input::get('selesai'));
			$oss->kode_rks = Input::get('kode_rks');
			$oss->deskripsi_rks = Input::get('deskripsi_rks');
			$oss->transport = Input::get('transport');
			$oss->user_mengerjakan = Input::get('mengerjakan');
			$oss->user_mengetahui = Input::get('mengetahui');
			$oss->save();

			$list_site = Input::get('namasite');

			for ($si=0; $si < count($list_site); $si++) { 
				$ns = new OSSBantekSite;
				$ns->oss_id = $oss->id;
				$ns->site_id = $list_site[$si];
				$ns->save();
			}

			$shopping_list = Input::get('shoplist');
			$harga = 0;
			for ($i=0; $i < count($shopping_list); $i++) {
				$ss = new OSShop;
				$ss->oss_id = $oss->id;
				$ss->shoplist_id = $shopping_list[$i];
				$ss->save();
				$sl = Shoplist::find($shopping_list[$i]);
				$harga += $sl->harga;
			}

			$oss->harga = $harga;
			$oss->save();

			$menyetujui = Input::get('menyetujui');

			for ($j=0; $j < count($menyetujui); $j++) {
				$stj = new MenyetujuiOSS;
				$stj->oss_id = $oss->id;
				$stj->user_id = $menyetujui[$j];
				$stj->save();
			}

			//perhitungan RKS
			$biaya_rks = 0;
			$st = new Carbon(Input::get('mulai'));
			$nd = new Carbon(Input::get('selesai'));
			$diff = $nd->diff($st)->days;

			if($diff > 1){
				$biaya_rks += 350000 * ( $diff -1 );
				$biaya_rks += 150000;
			} else if($diff == 1) {
				$biaya_rks = 350000;
			} else {
				$biaya_rks = 150000;
			}

			$oss->harga_rks = $biaya_rks;

			//biaya perjalanan
			$biayafee = 0;
			if(Input::get('transport') == 'no'){
				$oss->harga +=$biaya_rks;
			} else {
				$shopl = new Shoplist;
				$shopl->kode = Input::get('kode_sl_trans');
				$shopl->deskripsi = Input::get('deskripsi_sl_trans');
				$shopl->satuan = Input::get('satuan_sl_trans');
				$shopl->harga = Input::get('harga_sl_trans');
				$shopl->type = 'transport';
				$shopl->save();

				$ss = new OSShop;
				$ss->oss_id = $oss->id;
				$ss->shoplist_id = $shopl->id;
				$ss->save();

				if($shopl->harga <= 500000){
					$biayafee = (15/100)*$shopl->harga;
				} else {
					$biayafee = (10/100)*$shopl->harga;
				}

				$oss->harga +=$biaya_rks + $biayafee +$shopl->harga;
			}
			$oss->save();
			//no OSS
			$day = Carbon::parse($oss->tanggal);
			$year = $day->year;
			$noss = '';

			$romans = array(
				0 => '',
				1 => 'I',
				2 => 'II',
				3 => 'III',
				4 => 'IV',
				5 => 'V',
				6 => 'VI',
				7 => 'VII',
				8 => 'VIII',
				9 => 'IX',
				10 => 'X',
				11 => 'XI',
				12 => 'XII'
			);

			if(Auth::user()->mitra == 1 ){
				$noss = $oss->id.'/KISEL-TLI/'.$romans[$day->month].'/'.$year;
			} else {
				$noss = $oss->id.'/PRIMATAMA-LWK/'.$romans[$day->month].'/'.$year;
			}
			$oss->no_oss = $noss;
			$oss->save();
			Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/'.Auth::user()->role.'/oss/spj');
		}

		public function detailspj($id){
			$data['active'] = 'oss';
			$data['spj'] = true;
			$data['oss'] = OSS::where('oss_type','=','spj')->where('id','=',$id)->first();
			return View::make(Auth::user()->role.'.oss.detailspj' , $data);
		}

		public function editspj($id){
			$data['active'] = 'oss';
			$data['spj'] = true;
			$data['oss'] = OSS::where('oss_type','=','spj')->where('id','=',$id)->first();
			$data['sites'] = DB::table('mastertp')->groupBy('sitelocation')->get();
			$data['shoplists'] = Shoplist::whereNull('type')->get();
			$data['userno'] = User::where('role' , '=' , 'no')->get();
			$data['bantek'] = Bantek::all();
			foreach ($data['oss']->shoplists as $sl) {
				if($sl->type == 'transport'){
					$data['transport'] = $sl;
				}
			}
			return View::make('admin.oss.editspj' , $data);
		}

		public function updatespj($id){
			$oss = OSS::find($id);
			$oss->oss_type = "spj";
			$oss->tanggal = Carbon::parse(Input::get('tanggal'));
			$oss->bantek = Input::get('bantek');
			$oss->permasalahan = Input::get('permasalahan');
			$oss->action = Input::get('action');
			$oss->mulai = Carbon::parse(Input::get('mulai'));
			$oss->selesai = Carbon::parse(Input::get('selesai'));
			$oss->kode_rks = Input::get('kode_rks');
			$oss->deskripsi_rks = Input::get('deskripsi_rks');
			$oss->transport = Input::get('transport');
			$oss->user_mengerjakan = Input::get('mengerjakan');
			$oss->user_mengetahui = Input::get('mengetahui');
			$oss->save();

			$list_site = Input::get('namasite');

			$oldsites = OSSBantekSite::where('oss_id','=',$oss->id)->delete();

			for ($si=0; $si < count($list_site); $si++) { 
				$ns = new OSSBantekSite;
				$ns->oss_id = $oss->id;
				$ns->site_id = $list_site[$si];
				$ns->save();
			}

			$transport = '';
			foreach ($oss->shoplists as $sl) {
				if($sl->type == 'transport'){
					$transport = $sl;
				}
			}

			OSShop::where('oss_id','=' , $id)->delete();

			$shopping_list = Input::get('shoplist');
			$harga = 0;
			for ($i=0; $i < count($shopping_list); $i++) {
				$ss = new OSShop;
				$ss->oss_id = $oss->id;
				$ss->shoplist_id = $shopping_list[$i];
				$ss->save();
				$sl = Shoplist::find($shopping_list[$i]);
				$harga += $sl->harga;
			}

			$oss->harga = $harga;
			$oss->save();

			$menyetujui = Input::get('menyetujui');
			MenyetujuiOSS::where('oss_id' , '=' , $id)->delete();

			for ($j=0; $j < count($menyetujui); $j++) {
				$stj = new MenyetujuiOSS;
				$stj->oss_id = $oss->id;
				$stj->user_id = $menyetujui[$j];
				$stj->save();
			}

			//perhitungan RKS
			$biaya_rks = 0;
			$st = new Carbon(Input::get('mulai'));
			$nd = new Carbon(Input::get('selesai'));
			$diff = $nd->diff($st)->days;

			if($diff > 1){
				$biaya_rks += 350000 * ( $diff -1 );
				$biaya_rks += 150000;
			} else if($diff == 1) {
				$biaya_rks = 350000;
			} else {
				$biaya_rks = 150000;
			}

			$oss->harga_rks = $biaya_rks;

			//biaya perjalanan
			$biayafee = 0;
			if(Input::get('transport') == 'no'){
				$oss->harga +=$biaya_rks;
			} else {
				if($transport == ''){
					$shopl = new Shoplist;
				} else {
					$shopl = $transport;
				}
				$shopl->kode = Input::get('kode_sl_trans');
				$shopl->deskripsi = Input::get('deskripsi_sl_trans');
				$shopl->satuan = Input::get('satuan_sl_trans');
				$shopl->harga = Input::get('harga_sl_trans');
				$shopl->type = 'transport';
				$shopl->save();

				$ss = new OSShop;
				$ss->oss_id = $oss->id;
				$ss->shoplist_id = $shopl->id;
				$ss->save();

				if($shopl->harga <= 500000){
					$biayafee = (15/100)*$shopl->harga;
				} else {
					$biayafee = (10/100)*$shopl->harga;
				}

				$oss->harga +=$biaya_rks + $biayafee +$shopl->harga;
			}
			$oss->save();

			Session::flash('success' , 'Data telah diubah.');
			return Redirect::to('/admin/oss/spj');
		}

		public function deletespj($id){
			$oss = OSS::find($id)->delete();
			$rel = OSShop::where('oss_id','=',$id)->delete();
			Session::flash('success' , 'Data telah dihapus.');
			return Redirect::to('/admin/oss/spj');
		}

	}

?>
