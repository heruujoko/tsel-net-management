<?php

	class VersheetController extends \BaseController {

		public function index(){
			$data['active'] = 'versheet';
			$data['doc_type'] = VersheetType::all();
			$data['vs'] = Versheet::all();
			$data['user_no'] = User::where('role','=','no')->get();
			return View::make('admin.versheet.list',$data);
		}

		public function store(){
			$vs = new Versheet;
			$vs->no_invoice = Input::get('invoice');
			$vs->user_id = Input::get('supplier');
			$vs->untuk_pembayaran = Input::get('pembayaran');
			$vs->jumlah_pembayaran = Input::get('jumlah');
			$vs->trxid == Input::get('trxid');
			$vs->cost_centre = Input::get('cost_centre');
			$vs->budget_account = Input::get('budget_account');
			$vs->activity_code = Input::get('activity_code');
			$vs->user_menyetujui = Input::get('menyetujui');
			$vs->kepada_nama = Input::get('kepada_nama');
			$vs->kepada_bank = Input::get('kepada_bank');
			$vs->kepada_rekening = Input::get('kepada_rekening');
			$vs->save();

			foreach (Input::get('docs') as $doc) {
				$vd = new VersheetDocs;
				$vd->versheet_id = $vs->id;
				$vd->docs = $doc;
				$vd->save();
			}

			Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/admin/versheet');
		}

		public function edit($id){
			$data['active'] = 'versheet';
			$data['vs'] = Versheet::find($id);
			$data['doc_type'] = VersheetType::all();
			$data['user_no'] = User::where('role','=','no')->get();
			return View::make('admin.versheet.edit',$data);
		}

		public function update($id){
			$vs = Versheet::find($id);
			$vs->no_invoice = Input::get('invoice');
			$vs->user_id = Input::get('supplier');
			$vs->untuk_pembayaran = Input::get('pembayaran');
			$vs->jumlah_pembayaran = Input::get('jumlah');
			$vs->trxid == Input::get('trxid');
			$vs->cost_centre = Input::get('cost_centre');
			$vs->budget_account = Input::get('budget_account');
			$vs->activity_code = Input::get('activity_code');
			$vs->user_menyetujui = Input::get('menyetujui');
			$vs->kepada_nama = Input::get('kepada_nama');
			$vs->kepada_bank = Input::get('kepada_bank');
			$vs->kepada_rekening = Input::get('kepada_rekening');
			$vs->save();
			VersheetDocs::where('versheet_id','=',$id)->delete();
			foreach (Input::get('docs') as $doc) {
				$vd = new VersheetDocs;
				$vd->versheet_id = $vs->id;
				$vd->docs = $doc;
				$vd->save();
			}

			Session::flash('success' , 'Data telah dibuat.');
			return Redirect::to('/admin/versheet');
		}

		public function details($id){
			$data['vs'] = Versheet::find($id);
			$data['active'] = 'versheet';
			return View::make('admin.versheet.details' , $data);
		}

		public function printpdf($id){
			$data['active'] = 'versheet';
			$data['vs'] = Versheet::find($id);
			$day = Carbon::parse($data['vs']->tanggal);
			$data['day'] = $day;
			$pdf = PDF::loadView('templatesurat.verification' , $data);
			return $pdf->stream();
		}

		public function destroy($id){
			Versheet::find($id)->delete();
			VersheetDocs::where('versheet_id','=',$id)->delete();
		}

	}

?>
