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
			$fpl->periode_trx_id = Carbon::parse("01-".Input::get('periode_trx_id'));
			$fpl->no_acc = Input::get('no_acc');
			$fpl->jumlah_dan_estimasi = Input::get('jumlah_estimasi');
			$fpl->user_menyetujui = Input::get('menyetujui');
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
			$perbaikanids = '';
			foreach ($data['fpl']->perbaikans as $key) {
				$perbaikanids .= $key->id.',';	
			}
			$data['perbaikanids'] = $perbaikanids;
			$pembelianids = '';
			foreach ($data['fpl']->pembelians as $key) {
				$pembelianids .= $key->id.',';	
			}
			$data['pembelianids'] = $pembelianids;
			$kebutuhanids = '';
			foreach ($data['fpl']->kebutuhans as $key) {
				$kebutuhanids .= $key->id.',';	
			}
			$data['kebutuhanids'] = $kebutuhanids;
			$specids = '';
			foreach ($data['fpl']->specs as $key) {
				$specids .= $key->id.',';	
			}
			$data['specids'] = $specids;
			return View::make('admin.fpl.edit' , $data);
		}
		public function update($id){

			$fpl = FPL::find($id);
			$fpl->id_pemohon = Auth::user()->id;
			$fpl->tanggal_permintaan = Carbon::parse(Input::get('tanggal_permintaan'));
			$fpl->jenis_permintaan = Input::get('jenis_permintaan');
			$fpl->no_ref_ga = Input::get('ref_ga');
			$fpl->pic = Input::get('pic');
			$fpl->trx_id = Input::get('trx_id');
			$fpl->periode_trx_id = Carbon::parse("01-".Input::get('periode_trx_id'));
			$fpl->no_acc = Input::get('no_acc');
			$fpl->jumlah_dan_estimasi = Input::get('jumlah_estimasi');
			$fpl->user_menyetujui = Input::get('menyetujui');
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

			//delete unused
			$nowperbaikan = array();
			foreach ($fpl->perbaikans as $key) {
				array_push($nowperbaikan , $key->id);
			}
			$perbaikan = explode(",",$listperbaikan);

			$diff_perbaikan = array_diff($nowperbaikan , $perbaikan);
			foreach ($diff_perbaikan as $key) {
				FPLPerbaikan::where('id','=',$key)->delete();
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

			//delete unused
			$nowpembelian = array();
			foreach ($fpl->pembelians as $key) {
				array_push($nowpembelian , $key->id);
			}
			$pembelian = explode(",",$listpembelian);

			$diff_pembelian = array_diff($nowpembelian , $pembelian);
			foreach ($diff_pembelian as $key) {
				FPLPembelian::where('id','=',$key)->delete();
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

			//delete unused
			$nowkebutuhan = array();
			foreach ($fpl->kebutuhans as $key) {
				array_push($nowkebutuhan , $key->id);
			}
			$kebutuhan = explode(",",$listkebutuhan);

			$diff_kebutuhan = array_diff($nowkebutuhan , $kebutuhan);
			foreach ($diff_kebutuhan as $key) {
				FPLKebutuhan::where('id','=',$key)->delete();
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

			//delete unused
			$nowspec = array();
			foreach ($fpl->specs as $key) {
				array_push($nowspec , $key->id);
			}
			$spec = explode(",",$listspec);

			$diff_spec = array_diff($nowspec , $spec);
			foreach ($diff_spec as $key) {
				FPLSpec::where('id','=',$key)->delete();
			}

			$mengetahui = Input::get('mengetahui');
			MengetahuiFPL::where('fpl_id','=',$id)->delete();
			for ($j=0; $j < count($mengetahui); $j++) { 
				$stj = new MengetahuiFPL;
				$stj->fpl_id = $fpl->id;
				$stj->user_id = $mengetahui[$j];
				$stj->save();	
			}

			// FPLSpec::where('fpl_id','=','')->delete();
			// FPLKebutuhan::where('fpl_id','=','')->delete();
			// FPLPembelian::where('fpl_id','=','')->delete();
			// FPLPerbaikan::where('fpl_id' , '=' , '')->delete();

			Session::flash('success' , 'Data telah diubah.');
			return Redirect::to('/admin/fpl');
		}
		
		public function destroy($id){
			FPL::where('id' , '=' ,$id)->delete();
			MengetahuiFPL::where('fpl_id','=',$id)->delete();
			FPLSpec::where('fpl_id','=',$id)->delete();
			FPLKebutuhan::where('fpl_id','=',$id)->delete();
			FPLPembelian::where('fpl_id','=',$id)->delete();
			FPLPerbaikan::where('fpl_id' , '=' , $id)->delete();
			Session::flash('success' , 'Data telah dihapus.');
			return Redirect::to('/admin/fpl');
		}

	}

?>