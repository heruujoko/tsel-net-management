<?php

	class FPJPController extends \BaseController {

		public function index(){
			$data['active'] = 'fpjp';
			$data['user_no'] = User::where('role','=','no')->get();
			$data['fpjp'] = FPJP::all();
			return View::make('admin.fpjp.list',$data);
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
			return Redirect::to('/admin/fpjp');
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

		public function destroy($id){
			FPJPUraian::where('fpjp_id','=',$id)->delete();
			FPJP::find($id)->delete();
			Session::flash('success' , 'Data telah dihapus.');
			return Redirect::to('/admin/fpjp');
		}

	}

?>
