<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
			background-image:url('/surat/tsel.jpg');
		}
		.kop-kanan {
			position: fixed;
			top: 8px;
			height:40px;
			margin-left: 400px;
			background-size:contain;
			width:320px;
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
			@if(count($oss->shoplists) < 5)
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
	</style>
	<title>OSS MATERIAL</title>
</head>
<body>
	<div class="wrap">
		<div class="kop">
			<div class="kop-kiri pull-left"></div>
			@if($oss->request->mitranya->id == 1)
				<div class="kop-kanan pull-right"> No. OSS : 222/KISEL-TLI/VII/2015 </div>
			@else
				<div class="kop-kanan pull-right"> No. OSS : 222/PRIMATAMA-LWK/VII/2015 </div>
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
						<td>{{ $oss->dikerjakan->nama }}</td>
						<td colspan="2">HP : 082192622222</td>
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
				<table class="tbl-2" border="1" cellpadding="0">
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
			<div class="signature">
				<div class="row">
				<div class="col-lg-8 tsel">
					<table class="tbl-signature" border="1">
						<thead>
							<tr>
								<th colspan="2">PT. TELKOMSEL</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<table width="100%" class="content-signature">
									<tr>
										<td><b>Direquest Oleh</b></td>
										<td><b>Diketahui</b></td>
									</tr>
									<tr>
										<td height="25"><img src="" height="100%"></td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td height="0"><b><u>{{ $oss->dikerjakan->nama }}</u></b></td>
										<td><b><u>{{ $oss->mengetahui->nama }}</u></b></td>
									</tr>
									<tr>
										<td height="0">{{ $oss->dikerjakan->jabatan }}</td>
										<td>{{ $oss->mengetahui->jabatan }}</td>
									</tr>
								</table>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg-4 oleh">
					<table class="tbl-signature-oleh" border="1">
						<thead>
							<tr>
								<th colspan="2">{{ $oss->request->mitranya->nama }}</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<table width="100%" class="content-signature-oleh">
									<tr>
										<td>Direquest Oleh</td>
									</tr>
									<tr>
										<td height="25">&nbsp;</td>
									</tr>
									<tr>
										<td height=""><u><b>{{ $oss->dikerjakan->nama }}</b></u></td>
									</tr>
									<tr>
										<td height="">{{ $oss->dikerjakan->jabatan }}</td>
									</tr>
								</table>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div><!-- /.signature -->
		<div class="row" style="clear:both;">
			<div class="col-lg-8 confirm-wrapper">
					<div class="confirm-signature confirm">
						<table border="0">
							<tr>
								<td valign="top" height="80" colspan="{{count($oss->menyetujui)}}">Disetujui</td>
							</tr>
							<tr>
								@if(count($oss->menyetujui) == 2)
								<td class="text-left">
									<p class="text-capitalize"><u>{{ $oss->menyetujui[0]->nama }}</u></p>
									<p class="text-capitalize">{{ $oss->menyetujui[0]->jabatan }}</p>
								</td>
								<td class="text-left">
									<p class="text-capitalize"><u>{{ $oss->menyetujui[1]->nama }}</u></p>
									<p class="text-capitalize">{{ $oss->menyetujui[1]->jabatan }}</p>
								</td>
								@else
								<td class="text-left" style="">
									<p class="text-capitalize"><u>{{ $oss->menyetujui[0]->nama }}</u></p>
									<p class="text-capitalize">{{ $oss->menyetujui[0]->jabatan }}</p>
								</td>
								@endif
							</tr>
						</table>
					</div>
				</div>
				<div class="col-lg-4 blank-confirm">
					<div class="confirm-signature">
						<table border="0">
							<tr>
								<td valign="top" height="112">Diketahui</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
	</div><!-- /.wrap -->
</body>
</html>
