<?php

	class FPJPController extends \BaseController {

				public function convert_number_to_words($number){

			// $hyphen      = '-';
			$hyphen = " ";
		    // $conjunction = ' and ';
		    $conjunction = '';
		    $separator   = '';
		    $negative    = 'negative ';
		    $decimal     = ' point ';
		    $dictionary  = array(
		        0                   => 'nol',
		        1                   => 'Satu',		        
		        2                   => 'Dua',		        
		        3                   => 'tiga',		        
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
		        14                  => 'Tmpat Belas',
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
		        1000000000000       => 'Triliun ',
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

		public function index(){
			$data['active'] = 'fpjp';
			$data['user_no'] = User::where('role','=','no')->get();
			$data['fpjp'] = FPJP::all();
			return View::make(Auth::user()->role.'.fpjp.list',$data);
		}

		public function store(){
			$fpjp = new FPJP;
			$fpjp->user_id = Input::get('user');
			$fpjp->tanggal = Carbon::parse(Input::get('tanggal'));
			$fpjp->user_mengetahui = Input::get('mengetahui');
			$fpjp->save();
			$jumlah = 0;
			$listuraian = Input::get('ids_uraian');
			if($listuraian != ''){
				$listuraian = substr($listuraian, 0, -1);
				$uraian = explode(",",$listuraian);
				if(count($uraian > 0)){
					for ($i=0; $i < count($uraian) ; $i++) {
						$fpjpuraian = FPJPUraian::find($uraian[$i]);
						$fpjpuraian->fpjp_id = $fpjp->id;
						$jumlah += $fpjpuraian->jumlah;
						$fpjpuraian->save();
					}
				}
			}
			$fpjp->total = $jumlah;
			$fpjp->save();
			Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/'.Auth::user()->role.'/fpjp');
		}

		public function edit($id){
			$data['active'] = 'fpjp';
			$data['user_no'] = User::where('role','=','no')->get();
			$data['fpjp'] = FPJP::find($id);
			$uraianids = '';
			foreach ($data['fpjp']->uraians as $key) {
				$uraianids .= $key->id.',';
			}
			$data['uraians'] = $uraianids;
			return View::make('admin.fpjp.edit',$data);
		}

		public function update($id){
			$fpjp = FPJP::find($id);
			$fpjp->user_id = Input::get('user');
			$fpjp->tanggal = Carbon::parse(Input::get('tanggal'));
			$fpjp->user_mengetahui = Input::get('mengetahui');
			$fpjp->save();
			$jumlah = 0;
			$listuraian = Input::get('ids_uraian');
			if($listuraian != ''){
				$listuraian = substr($listuraian, 0, -1);
				$uraian = explode(",",$listuraian);
				if(count($uraian > 0)){
					for ($i=0; $i < count($uraian) ; $i++) {
						$fpjpuraian = FPJPUraian::find($uraian[$i]);
						$fpjpuraian->fpjp_id = $fpjp->id;
						$jumlah += $fpjpuraian->jumlah;
						$fpjpuraian->save();
					}
				}
			}
			$fpjp->total = $jumlah;
			$fpjp->save();
			//delete unused
			$nowuraian = array();
			foreach ($fpjp->uraians as $key) {
				array_push($nowuraian , $key->id);
			}
			$uraian = explode(",",$listuraian);
			$kurang = 0;
			$diff_uraian = array_diff($nowuraian , $uraian);
			if(count($diff_uraian) > 0){
				foreach ($diff_uraian as $key) {
					$nu = FPJPUraian::find($key);
					$kurang += $nu->jumlah;
					FPJPUraian::where('id','=',$key)->delete();
				}
			}

			// $fpjp->total = $fpjp->total - $kurang;
			// $fpjp->save();
			Session::flash('success' , 'Data telah diubah.');
			return Redirect::to('/admin/fpjp');
		}

		public function details($id){
			$data['active'] = 'fpjp';
			$data['fpjp'] = FPJP::find($id);
			return View::make(Auth::user()->role.'.fpjp.details',$data);
		}

		public function printpdf($id){
			$data['active'] = 'fpjp';
			$data['fpjp'] = FPJP::find($id);
			$day = Carbon::parse($data['fpjp']->tanggal);
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
			$data['day'] = $day;
			$data['huruf'] = $this->convert_number_to_words($data['fpjp']->total);
			$pdf = PDF::loadView('templatesurat.fpjp' , $data);
			return $pdf->stream();
		}

		public function destroy($id){
			FPJPUraian::where('fpjp_id','=',$id)->delete();
			FPJP::find($id)->delete();
			Session::flash('success' , 'Data telah dihapus.');
			return Redirect::to('/admin/fpjp');
		}

	}

?>
