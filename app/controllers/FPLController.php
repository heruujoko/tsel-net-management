<?php
	
	class FPLController extends \BaseController {

		public function index(){
			$data['active'] = 'fpl';
			$data['user_no'] = User::where('role' , '=', 'no')->get();
			$data['fpl'] = FPL::all();
			return View::make('admin.fpl.list' , $data);
		}
		public function store(){
			
			$fpl = new FPL;
			$fpl->id_pemohon = Auth::user()->id;
			$fpl->tanggal_permintaan = Carbon::parse(Input::get('tanggal_permintaan'));
			$fpl->jenis_permintaan = Input::get('jenis_permintaan');
			$fpl->no_ref_ga = Input::get('ref_ga');
			$fpl->pic = Input::get('pic');
			$fpl->trx_id = Input::get('trx_id');
			$fpl->periode_trx_id = Input::get('periode_trx_id');
			$fpl->no_acc = Input::get('no_acc');
			$fpl->jumlah_dan_estimasi = Input::get('jumlah_estimasi');
			$fpl->save();

			$listperbaikan = Input::get('ids_perbaikan');
			if($listperbaikan != ''){
				$listperbaikan = substr($listperbaikan, 0, -1);
				$perbaikan = explode(",",$listperbaikan);
				if(count($perbaikan > 0)){
					for ($i=0; $i < count($perbaikan) ; $i++) { 
						$fplperbaikan = FPLPerbaikan::find($perbaikan[$i]);
						$fplperbaikan->fpl_id = $fpl->id;
						$fplperbaikan->save();
					}
				}
			}	

			$listpembelian = Input::get('ids_pembelian');
			if($listpembelian != ''){
				$listpembelian = substr($listpembelian, 0, -1);
				$pembelian = explode(",",$listpembelian);
				if(count($pembelian) > 0){
					for ($k=0; $k < count($pembelian) ; $k++) { 
						$fplpembelian = FPLPembelian::find($pembelian[$k]);
						$fplpembelian->fpl_id = $fpl->id;
						$fplpembelian->save();
					}
				}
			}

			$listkebutuhan = Input::get('ids_kebutuhan');
			if($listkebutuhan != ''){
				$listkebutuhan = substr($listkebutuhan, 0, -1);
				$kebutuhan = explode(",",$listkebutuhan);
				if(count($kebutuhan) > 0){
					for ($l=0; $l < count($kebutuhan) ; $l++) { 
						$fplkebutuhan = FPLKebutuhan::find($kebutuhan[$l]);
						$fplkebutuhan->fpl_id = $fpl->id;
						$fplkebutuhan->save();
					}
				}
			}

			$listspec = Input::get('ids_spec');
			if($listspec != ''){
				$listspec = substr($listspec, 0, -1);
				$spec = explode(",",$listspec);
				if(count($spec) > 0){
					for ($m=0; $m < count($spec) ; $m++) { 
						$fplspec = FPLSpec::find($spec[$m]);
						$fplspec->fpl_id = $fpl->id;
						$fplspec->save();
					}
				}
			}

			$mengetahui = Input::get('mengetahui');
			
			for ($j=0; $j < count($mengetahui); $j++) { 
				$stj = new MengetahuiFPL;
				$stj->fpl_id = $fpl->id;
				$stj->user_id = $mengetahui[$j];
				$stj->save();	
			}
			Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/admin/fpl');
		}
		public function edit($id){
			$data['active'] = 'fpl';
			$data['user_no'] = User::where('role' , '=', 'no')->get();
			$data['fpl'] = FPL::find($id);
			return View::make('admin.fpl.edit' , $data);
		}
		public function update($id){
		

		}
		public function destroy($id){
		
		}

	}

?>