<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $oss->no_oss }}</title>
	 <style type="text/css">
		.wrap {
			margin:0 auto;
			max-width:720px;
			min-height:700px;
			margin-top:0px;
			margin-bottom:0px;
		}
		.border {
			border:solid 2px black;
			width: 100%;
			height: auto;
		}
		.kop {
			 height:70px;
		}
		.kop-kiri {
			height:100px;
			background-size:contain;
			width:300px;
			background-repeat:no-repeat;
			background-image:url('{{ URL::to('/surat/tsel.jpg')}}');
		}
		.kop-kanan {
			position: fixed;
			top: 8px;
			height:20px;
			margin-left: 400px;
			background-size:contain;
			width:285px;
			border:solid 1px #000000;
			color: black;
			padding: 7px;
		}

		.head {
			font-weight: bold;
			margin:0;
			padding:0;
			font-size: 20px;
			text-align: center;
			color:white;
			background-color: black;
			width: 100%;
			min-height: 75px;
		}
		.isinya {
			text-align: justify;
			padding: 5px;
			width:100%;
			height:auto;
		}
		.tbl {
			margin:0 auto;
		}
		.tbl tr {
			line-height: 10px;
		}
		.tbl td {
			padding:4px;
		}
		.tbl-2 {
			width:95%;
			margin:0 auto;
			margin-top: 10px;
		}
		.tbl-2 th {
			text-align: center !important;
		}
		.tbl-2 td {
			padding: 5px;
		}
		.tbl-2 > tbody > tr > td {
			padding:2px !important;
		}
		.keterangan {
			margin-left: 30px;
			width:100%;
			min-height: 100px;
		}

		/* ===== signature css ===== */

		.signature {
			width: 100%;
			min-height: 100px;
			@if(count($oss->shoplists) < 4)
				padding-top: 20px;
				page-break-after: always;
			@else
			@endif

		}
		.pbreak {
			@if(count($oss->shoplists) >= 5)
				page-break-after: always;
			@else
			@endif
		}
		.tsel {
			width: 450px;
			float: left;
		}
		.tbl-signature {
			width: 480px;
		}
		.tbl-signature th {
			background-color: black;
			color: white;
			text-align: center;
		}

		.tbl-signature td{
			padding:10px;
		}

		.content-signature {
			text-align: center;
			border:solid 2px black;
			width: 480px;
			height: auto;
		}

		.oleh {
			margin-left: 50px;
			width: 100px;
			float: left;
		}

		.tbl-signature-oleh {
			width: 200px;
		}
		.tbl-signature-oleh th {
			background-color: black;
			color: white;
			text-align: center;
		}

		.tbl-signature-oleh td{
			padding:10px;
		}

		.content-signature-oleh {
			text-align: center;
			border:solid 2px black;
			width: 200px;
			height: auto;
		}
		.confirm-signature {
			margin-top:5px;
			width: 100%;
			border: 2px solid black;
		}
		.confirm-signature table{
			width: 100%;
			text-align: center;
		}
		.confirm-signature table tr td p {
			font-weight: bold;
			padding:0 !important;
			margin:0 !important;
		}
		.confirm-wrapper{
			width: 450px;
		}
		.confirm {
			width: 478px;
			float: left;
		}
		.blank-confirm{
			float: left;
			margin-left: 50px;
			width: 200px;
		}
		label {
		    display: block;
		    padding-left: 15px;
		}
		input {
		    width: 13px;
		    height: 13px;
		    padding-right: 10px;
		    padding-top: -5px;
		    margin:0;
		    vertical-align: bottom;
		    position: relative;
		    top: -1px;
		    *overflow: hidden;
		}

		.black-bg {
			background: black;
			color: white;
		}
		.center {
			text-align: center;
		}
		.small-txt {
			font-size: 11px;
		}
		#telkomsel-sign1 {
			border: 2px solid black;
			border-spacing: 0px;
			padding-bottom: 8px;
		}
		#telkomsel-sign2 {
			border: 2px solid black;
			border-spacing: 0px;
			padding-bottom: 8px;
		}
		#mitra-sign1 {
			border: 2px solid black;
			border-spacing: 0px;
			padding-bottom: 8px;	
		}
		#mitra-sign2 {
			border: 2px solid black;
			border-spacing: 0px;
			padding-bottom: 8px;	
		}
		#signature-wrapper {
			/*border: 1px solid black;*/
			margin-left: -4px;
		}
	</style>
	<title>OSS MATERIAL</title>
</head>
<body>
	<div class="wrap">
		<div class="kop">
			<div class="kop-kiri pull-left"></div>
			@if($oss->request->mitranya->id == 1)
				<div class="kop-kanan pull-right"> No. OSS : {{ $oss->id }}/KISEL-TLI/{{ $roman }}/{{ $year }} </div>
			@else
				<div class="kop-kanan pull-right"> No. OSS : {{ $oss->id }}/PRIMATAMA-LWK/{{ $roman }}/{{ $year }} </div>
			@endif
		</div>
		<div class="border">
			<div class="head">
				<span class="text-center">FORM REQUEST</span><br>
				<span class="text-center">CORRECTIVE - ON SITE SUPPORT (OSS)</span>
			</div>
			<div class="isinya">
				Pada hari ini <b>{{ $hari }}</b> tanggal <b>{{ $tanggal }}</b> bulan <b>{{ $bulan }}</b> tahun <b>{{ $tahun }}</b> ({{ $day }})
				<b>PT.Telkomsel</b> memberikan perintah kepada <b>{{$oss->request->mitranya->nama}}</b> untuk melakukan  pekerjaan On Site
				Support dengan rincian sebagai berikut :
			</div>
			<div class"row">
				<table class="tbl">
					<tr>
						<td width="130">Nama Site</td>
						<td width="3">:</td>
						<td width="195">{{ $sites->sitelocation }}</td>
						<td width="100">ID Site  </td>
						<td width="132">: {{ $sites->btsname }}</td>
					</tr>
					<tr>
						<td>Request Dari</td>
						<td>:</td>
						<td colspan="3">{{ $oss->request->nama }}</td>
					</tr>
					<tr>
						<td>Jam Request</td>
						<td>:</td>
						<td>&nbsp;</td>
						<td>Waktu Tempuh</td>
						<td>:</td>
					</tr>
					<tr>
						<td>Jam Mulai (Tiba di site</td>
						<td>:</td>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td>Jam Selesai Pekerjaan</td>
						<td>:</td>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td>Lama Pekerjaan /MTTR</td>
						<td>:</td>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td>Status Penagihan</td>
						<td>:</td>
						<td>
							<span class=""><input type="checkbox" value="">Charge</span>
							<span class=""><input type="checkbox" value="">Tidak di charge</span>
						</td>
						<td colspan="2">(Perlu Persetujuan Telkomsel)</td>
					</tr>
					<tr>
						<td>PIC Pekerjaan</td>
						<td>:</td>
						<td>{{ $oss->request->mitranya->pic }}</td>
						<td colspan="2">HP : {{ $oss->request->mitranya->hp }}</td>
					</tr>
					<tr>
						<td>Type Gangguan</td>
						<td>:</td>
						<td colspan="3">
							<span class=""><input type="checkbox" value="">Power</span>
							<span class=""><input type="checkbox" value="">Transmission</span>
							<span class=""><input type="checkbox" value="">BBS</span>
							<span class=""><input type="checkbox" value="">Sarpen</span>
							<span class=""><input type="checkbox" value="">Community</span>
							<span class=""><input type="checkbox" value="">Others</span>
						</td>
					</tr>
				</table><!-- /.tbl  -->
			</div><!-- /.row -->
			<div class="row">
				<table class="tbl-2" border="1" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th width="20%">Permasalahan</th>
							<th width="30%">Action</th>
							<th width="20%">Rincian Jasa / Material</th>
							<th>Kode Shopping List / RKS</th>
							<th width="15%">Harga</th>
						</tr>
					</thead>
					<tbody>
						@for($i=0;$i<count($oss->shoplists);$i++)
							@if($i == 0)
								<tr>
								<td rowspan="{{ count($oss->shoplists) }}">{{ $oss->permasalahan }}</td>
								<td rowspan="{{ count($oss->shoplists) }}">{{ $oss->action }}</td>
								<td>{{ $oss->shoplists[$i]->deskripsi }}</td>
								<td>{{ $oss->shoplists[$i]->kode }}</td>
								<td>Rp. {{ number_format($oss->shoplists[$i]->harga) }}</td>
								</tr>
							@else
								<tr>
									<td>{{ $oss->shoplists[$i]->deskripsi }}</td>
									<td>{{ $oss->shoplists[$i]->kode }}</td>
									<td>Rp. {{ number_format($oss->shoplists[$i]->harga) }}</td>
								</tr>
							@endif
						@endfor
						<tr>
							<td colspan="4">Jumlah</td>
							<td>Rp. {{ number_format($sum) }}</td>
						</tr>
					</tbody>
				</table>
				<p class="keterangan">	Status/Kondisi Akhir : OK/NOK     Ket. :</p>
			</div><!-- /.row -->
		</div><!-- /.border -->
		<div class="pbreak"></div>
		<div id="signature-wrapper" class="signatur">
				
				<table>
					<tr>
						<td>
							<table id="telkomsel-sign1">
								<tr>
									<td width="350" colspan="3" class="center black-bg">PT. TELKOMSEL</td>
								</tr>
								<tr>
									<td class="center">Direquest Oleh</td>
									<td></td>
									<td class="center">Diketahui</td>
								</tr>
								<tr>
									@if($oss->mengetahui->need_signature)
										<td align="center" height="55"> 	
											<img src="{{ URL::to($oss->mengetahui->sign->signature_pic) }}" width="50" height="50">
										</td>	
									@else
										<td height="55"></td>
									@endif
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td class="center"><b><u>{{ $oss->dikerjakan->nama }}</u></b></td>
									<td></td>
									<td class="center"><b><u>{{ $oss->mengetahui->nama }}</u></b></td>
								</tr>
								<tr>
									<td class="center small-txt">{{ $oss->dikerjakan->jabatan }}</td>
									<td></td>
									<td class="center small-txt">{{ $oss->mengetahui->jabatan }}</td>
								</tr>
							</table>
						</td>
						<td></td>
						<td>
							<table id="mitra-sign1">
								<tr>
									<td class="black-bg center" width="163">{{ $oss->request->mitranya->nama }}</td>
								</tr>
								<tr>
									<td class="center">Dikerjakan Oleh</td>
								</tr>
								<tr>
									<td height="55"></td>
								</tr>
								<tr>
									<td class="center"><u><b>{{ $oss->request->mitranya->pic  }}</b></u></td>
								</tr>
								<tr>
									<td class="center small-txt">Koordinator</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table id="telkomsel-sign2">
								<tr>
									@if(count($oss->menyetujui) == 1)
										<td class="center" width="350">Disetujui</td>
									@else
										<td class="center" colspan="3" width="350">Disetujui</td>
									@endif
								</tr>
								<tr>
									@if(count($oss->menyetujui) == 1)
										@if($oss->menyetujui[0]->need_signature)
											<td>
												<img src="{{ URL::to($oss->menyetujui[0]->sign->signature_pic) }}" width="50" height="50">
											</td>
										@else
											<td height="60"></td>
										@endif
									@else
										@if($oss->menyetujui[0]->need_signature && $oss->menyetujui[1]->need_signature)
											<td height="60" align="center">
												<img src="{{ URL::to($oss->menyetujui[0]->sign->signature_pic) }}" width="50" height="50">
											</td>
											<td></td>
											<td align="center">
												<img src="{{ URL::to($oss->menyetujui[1]->sign->signature_pic) }}" width="50" height="50">
											</td>
										@elseif(!$oss->menyetujui[0]->need_signature && $oss->menyetujui[1]->need_signature)
											<td height="60"></td>
											<td></td>
											<td align="center">
												<img src="{{ URL::to($oss->menyetujui[1]->sign->signature_pic) }}" width="50" height="50">
											</td>
										@elseif($oss->menyetujui[0]->need_signature && !$oss->menyetujui[1]->need_signature)
											<td height="60" align="center">
												<img src="{{ URL::to($oss->menyetujui[0]->sign->signature_pic) }}" width="50" height="50">
											</td>
											<td></td>
											<td></td>
										@else
											<td height="60"></td>
											<td></td>
											<td></td>
										@endif
									@endif
								</tr>
								<tr>
									@if(count($oss->menyetujui) == 1)
										<td class="center"><b><u>{{ $oss->menyetujui[0]->nama}}</u></b></td>
									@else
										<td class="center"><b><u>{{ $oss->menyetujui[0]->nama}}</u></b></td>
										<td></td>
										<td class="center"><b><u>{{ $oss->menyetujui[1]->nama}}</u></b></td>
									@endif
								</tr>
								<tr>
									@if(count($oss->menyetujui) == 1)
										<td class="center small-txt">{{ $oss->menyetujui[0]->jabatan}}</td>
									@else
										<td class="center small-txt">{{ $oss->menyetujui[0]->jabatan}}</td>
										<td></td>
										<td class="center small-txt">{{ $oss->menyetujui[1]->jabatan}}</td>
									@endif
								</tr>
							</table>
						</td>
						<td></td>
						<td>
							<table id="mitra-sign2">
								<tr>
									<td class="center" width="163">Diketahui</td>
								</tr>
								<tr>
									<td height="87"></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>		

			</div>
	</div><!-- /.wrap -->
</body>
</html>
