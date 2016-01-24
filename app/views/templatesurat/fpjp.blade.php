<!DOCTYPE html>
<html>
<head>
	<title>FPJP</title>
	<style type="text/css">
		.titlebar{
			text-align: center;
		}
		.paper {

		}
		.header-logo {
			height:85px;
			background-size:contain;
			width:300px;
			background-repeat:no-repeat;
			background-image:url('/surat/tsel.jpg');
		}
		.out-wrapper {
			padding: 8px;
			border: solid 2px;
		}
		.tbl {
			border-collapse: collapse;
			width: 100%;
		}
		.tbl th {
			border-left: solid 1px;
			border-right: solid 1px;
			border-top: solid 1px;
			border-bottom: solid 1px;
			border-spacing: 0px;
			padding: 3px;
		}
		.tbl td {
			border-right: solid 1px;
			border-left: solid 1px;
			border-top: solid 1px;
			border-bottom: solid 1px;
			border-spacing: 0px;
			padding: 3px;
		}
		.tbl-outer tr {
			border-right: solid 1px;
			border-left: solid 1px;
			border-top: solid 1px;
			border-bottom: solid 1px;
		}
		.tbl-outer {
			border-collapse: collapse;
		}
		.tbl-outer th {
			border-left: solid 1px;
			border-right: solid 1px;
			border-top: solid 1px;
			border-bottom: solid 1px;
			border-spacing: 0px;
			padding: 3px;
		}
		.tbl-outer td {
			border-spacing: 0px;
			padding: 3px;
		}
		.section3 {
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="paper">
		<div class="header-logo">

		</div>
		<div class="titlebar">
			<h4>FORMULIR PENANGGUNGJAWABAN PENGELUARAN</h4>
			<h5>(FPJP)</h5>
		</div>
		<div class="out-wrapper">
			<div class="section1">
				<table>
					<tr>
						<td>Nama / NIK </td><td width="220">: {{ $fpjp->user->nama }}</td>
						<td>Tanggal </td><td>: {{ $day->day }} {{ $bulan }} {{ $day->year }}</td>
					</tr>
					<tr>
						<td>Departemen </td><td>: Network Operation Palu</td>
						<td>Jabatan </td><td>: {{ $fpjp->user->jabatan }}</td>
					</tr>
				</table>
			</div>
			<br>
			<div class="section2">
				<table class="tbl">
					<tr>
						<th width="20">No</th>
						<th width="20">Cost Centre</th>
						<th width="20">No.Akun</th>
						<th width="20">Activity Code</th>
						<th width="140">Uraian</th>
						<th width="50">Jumlah (Rp.)</th>
					</tr>
					@foreach($fpjp->uraians as $urai)
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>{{ $urai->uraian }}</td>
							<td>Rp. {{ number_format($urai->jumlah) }}</td>
						</tr>
					@endforeach
					<tr>
						<td colspan="5" style="text-align:center">Jumlah</td>
						<td>Rp. {{ number_format($fpjp->total) }}</td>
					</tr>
				</table>
			</div>
			<div class="section3">
				<table>
					<tr>
						<td>Dengan Huruf</td>
						<td colspan="2">: {{ $huruf }} Rupiah</td>
					</tr>
					<tr>
						<td rowspan="3">Cara Bayar</td>
						<td rowspan="3" width="190">: Tunai / Cek / Transfer</td>
						<td>
							<table class="tbl-outer">
								<tr>
									<td>Nama</td> <td>: {{ $fpjp->user->nama }}</td>
								</tr>
								<tr>
									<td>No Rekening</td> <td>: {{ $fpjp->user->no_rekening }}</td>
								</tr>
								<tr>
									<td>Bank / Cabang</td> <td>: {{ $fpjp->user->bank }}</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="section4">
				<table class="tbl">
					<tr>
						<td style="border-bottom:none;text-align:center;" width="123">Diajukan Oleh</td>
						<td style="border-bottom:none;text-align:center;" width="123">Diperiksa Oleh</td>
						<td style="border-bottom:none;text-align:center;" width="123">Diketahui Oleh</td>
						<td style="border-bottom:none;text-align:center;" width="123" rowspan="2">Diterima Oleh</td>
					</tr>
					<tr>
						<td style="border-top:none;text-align:center;" width="123">{{ $fpjp->user->jabatan }}</td>
						<td style="border-top:none;text-align:center;" width="123">SPV FA Branch Palu</td>
						<td style="border-top:none;text-align:center;" width="123">{{ $fpjp->mengetahui->jabatan }}</td>
					</tr>
					<tr>
						<td height="100" style="border-bottom:none;text-align:center;"></td>
						<td style="border-bottom:none;text-align:center;"></td>
						<td style="border-bottom:none;text-align:center;">
							<img src="{{ URL::to($fpjp->mengetahui->sign->signature_pic) }}" width="100" height="100">
						</td>
						<td rowspan="3"></td>
					</tr>
					<tr>
						<td style="border-top:none;text-align:center;">{{ $fpjp->user->nama }}</td>
						<td style="border-top:none;text-align:center;">Asep Awalludin</td>
						<td style="border-top:none;text-align:center;">{{ $fpjp->mengetahui->nama }}</td>
					</tr>
					<tr>
						<td style="text-align:center;">NIK. 78022</td>
						<td style="text-align:center;">NIK. 78022</td>
						<td style="text-align:center;">NIK. 78022</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
