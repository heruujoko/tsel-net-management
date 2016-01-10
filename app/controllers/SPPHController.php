<?php
	
	class SPPHController extends \BaseController {

		public function index(){	
			$data['active'] = 'spph';
			$data['spph'] = SPPH::all();
			return View::make('admin.spph.list' , $data);
		}

		public function store(){
			$spph = new SPPH;
			$now = Carbon::now();
			$bulan = '';
			switch ($now->month) {
				case 1:
					$bulan = 'Januari';
					break;
				case 2:
					$bulan = 'Februari';
					break;
				case 3:
					$bulan = 'Maret';
					break;	
				case 4:
					$bulan = 'April';
					break;
				case 5:
					$bulan = 'Mei';
					break;
				case 6:
					$bulan = 'Juni';
					break;
				case 7:
					$bulan = 'Juli';
					break;
				case 8:
					$bulan = 'Agustus';
					break;
				case 9:
					$bulan = 'September';
					break;
				case 10:
					$bulan = 'Oktober';
					break;
				case 11:
					$bulan = 'November';
					break;
				case 12:
					$bulan = 'Desember';
					break;									
				default:
					$bulan = '';
					break;
			}
			$spph->no_surat = ' / TC.01 / RO-43 / X / '.$now->year;
			$spph->tempat_tanggal = 'Palu, '.$now->day.' '.$bulan.' '.$now->year;
			$spph->kepada = Input::get('kepada');
			$spph->perihal = Input::get('perihal');
			$spph->kegiatan = Input::get('kegiatan');
			$spph->jangka_waktu = Input::get('jangka_waktu');
			$spph->save();
			$spph->no_surat = $spph->id.$spph->no_surat;
			$spph->save();

			Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/admin/spph');
		}

		public function edit($id){
			$data['spph'] = SPPH::find($id);
			$data['active'] = 'spph';
			return View::make('admin.spph.edit' , $data);
		}

		public function update($id){
			$spph = SPPH::find($id);
			$spph->kepada = Input::get('kepada');
			$spph->perihal = Input::get('perihal');
			$spph->kegiatan = Input::get('kegiatan');
			$spph->jangka_waktu = Input::get('jangka_waktu');
			$spph->save();	

			Session::flash('success' , 'Data telah update.');
			return Redirect::to('/admin/spph');
		}

		public function destroy($id){
			$spph = SPPH::find($id)->delete();

			Session::flash('success' , 'Data telah dihapus.');
			return Redirect::to('/admin/spph');	
		}

		public function detail($id) {
			$spph = SPPH::find($id);
			$data['active'] = 'spph';
			$data['spph'] = $spph;
			return View::make('admin.spph.detail', $data);
		}

		public function print($id){
			$spph = SPPH::find($id);
			$data['no'] = 1;
			$data['spph'] = $spph;
			$pdf = PDF::loadView('templatesurat.spph' , $data);
			return $pdf->setPaper('a4')->stream();
		}

	}

?>