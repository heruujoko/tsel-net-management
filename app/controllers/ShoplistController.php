<?php
	
	class ShoplistController extends \BaseController {

		public function storefromajax(){
			$shoplist = new Shoplist;
			$shoplist->kode = Input::get('kode');
			$shoplist->deskripsi = Input::get('deskripsi');
			$shoplist->satuan = Input::get('satuan');
			$shoplist->harga = Input::get('harga');
			$shoplist->save();
			return Response::json($shoplist);
		}

	}

?>