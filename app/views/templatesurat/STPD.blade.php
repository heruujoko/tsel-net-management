<!DOCTYPE html>
<html>
<head>
	<title>STPD</title>
	<style type="text/css">
		#wrapper {
			margin-top: -25px;
			margin-left: -25px;
		}
		#firstsection {
			width: 103%;
			font-size: 12px;
		}
		#secondsection {
			width: 103%;
			font-size: 12px;	
		}
		#thirdsection {
			margin-top: 20px;
			text-align: center;
			border: 1px solid black;
			border-spacing: 0px;
			width: 103%;
			font-size: 12px;	
		}
		#thirdsection td {
			border: 1px solid black;
		}
		#fourthsection {
			margin-top: 20px;
			text-align: center;
			border: 1px solid black;
			border-spacing: 0px;
			width: 103%;
			font-size: 12px;	
			margin-bottom: 20px;
		}
		#fourthsection td {
			border: 1px solid black;
		}
		#fifthsection {
			border: 1px solid black;
			border-spacing: 0px;
			width: 103%;
			font-size: 12px;	
		}
		#fifthsection td {
			border: 1px solid black;
		}
		#sixthsection {
			border: 1px solid black;
			border-spacing: 0px;
			width: 103%;
			font-size: 12px;	
			page-break-after: always;
		}
		#clearb {
			border : 1px solid white !important;	
		}	
		#sixthsection td {
			border : 1px solid black;
		}
		#seventhsection{
			width: 103%;
			font-size: 12px;
		}
		.center {
			text-align: center;
		}
		.grey{
			background: #aaa;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		<table id="firstsection">
			<tr>
				<td>
					<img src="{{ URL::to('/surat/tsel.jpg') }}">
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="8" class="center">
					<h2><b>SURAT TUGAS PERJALANAN DINAS (STPD)</b></h2>
				</td>
			</tr>
			<tr>
				<td colspan="8" class="center">
					Nomor STPD:......
				</td>
			</tr>
			<tr>
				<td colspan="8" class="center">
					Nomor ID Transaksi:......
				</td>
			</tr>
			</table>
			<table id="secondsection">
			<tr>
				<td colspan="8">
					<b>PIMPINAN TELKOMSEL DENGAN INI MENYATAKAN KEPADA :</b>
				</td>
			</tr>
			<tr>
				<td colspan="2" width="80">NAMA</td>
				<td>: {{ $stpd->user->nama }}</td>
			</tr>
			<tr>
				<td colspan="2" width="30">NIK</td>
				<td>: {{ $stpd->user->nik }}</td>
			</tr>
			<tr>
				<td colspan="2" width="30">JABATAN</td>
				<td>: {{ $stpd->user->jabatan }}</td>
			</tr>
			<tr>
				<td colspan="2" width="30">LOKASI KERJA</td>
				<td>: {{ $stpd->user->lokasi->nama }}</td>
			</tr>
			<tr>
				<td colspan="2" width="30">COST CENTER</td>
				<td>: </td>
			</tr>
			<tr>
				<td colspan="2" width="30">BUDGET ACCOUNT</td>
				<td>: 	</td>
			</tr>
			<tr>
				<td colspan="2" width="30">ACTIVITY CODE</td>
				<td>: 	</td>
			</tr>
		</table>
		<table id="thirdsection">
			<tr>
				<td class="grey">No</td>
				<td class="grey">Lokasi Tujuan Penugasan</td>
				<td class="grey">Berangkat / Mulai</td>
				<td class="grey">Kembali / Selesai</td>
				<td class="grey">Kendaraan / Kelas</td>
				<td class="grey">Uraian Tugas</td>
				<td class="grey">Konfirmasi Kedatangan</td>
				<td class="grey">Konfirmasi Kepulangan</td>
			</tr>	
			<tr>
              <td>1</td>
              <td>{{ $stpd->tujuan_penugasan }}</td>
              <td>{{ $stpd->tanggal_berangkat }}</td>
              <td>{{ $stpd->tanggal_kembali }}</td>
              <td>{{ $stpd->kendaraan }}</td>
              <td>{{ $stpd->kegiatan }}</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
		</table>
		<table style="margin-top: 15px;margin-bottom: 15px;">
			<tr>
				<td style="font-size: 12px;"><b>HARAP DILAKSANAKAN DAN SEGERA MELAPORKAN SETELAH KEMBALI</b></td>
			</tr>
		</table>
		<table id="fourthsection">
			<tr>
				<td class="grey" width="200">Bantuan Biaya Perjalanan Dinas</td>
				<td class="grey">Perhitungan</td>
				<td class="grey">Jumlah</td>
			</tr>	
			<tr>
				<td>Uang Harian Perjalanan Dinas (UHPD)	</td>
				@if($stpd->user->level_jabatan == 'manager')
                @if($stpd->jenis_uhpd == 'darat')
                  <td>UHPD  {{ $hari }} hari x Rp {{ number_format('290000') }}</td>
                @elseif($stpd->jenis_uhpd == 'udara')
                  <td>UHPD  {{ $hari }} hari x Rp {{ number_format('420000') }}</td>
                @else
                  <td>UHPD  {{ $hari }} hari x Rp {{ number_format('230000') }}</td>
                @endif
              @elseif($stpd->user->level_jabatan == 'spv')
                @if($stpd->jenis_uhpd == 'darat')
                  <td>UHPD  {{ $hari }} hari x Rp {{ number_format('275000') }}</td>
                @elseif($stpd->jenis_uhpd == 'udara')
                  <td>UHPD  {{ $hari }} hari x Rp {{ number_format('395000') }}</td>
                @else
                  <td>UHPD  {{ $hari }} hari x Rp {{ number_format('215000') }}</td>
                @endif
              @elseif($stpd->user->level_jabatan == 'staff')
                @if($stpd->jenis_uhpd == 'darat')
                  <td>UHPD  {{ $hari }} hari x Rp {{ number_format('260000') }}</td>
                @elseif($stpd->jenis_uhpd == 'udara')
                  <td>UHPD  {{ $hari }} hari x Rp {{ number_format('370000') }}</td>
                @else
                  <td>UHPD  {{ $hari }} hari x Rp {{ number_format('200000') }}</td>
                @endif
              @else
              @endif
              <td>
                <div class="text-right">Rp {{ number_format( $stpd->jumlah )}}</div>
              </td>
			</tr>
			<tr height="12">
				<td>&nbsp;</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Bantuan Transportasi Bandara</td>
				<td></td>
				<td>Rp {{ number_format($stpd->trans_bandara) }}</td>
			</tr>
			<tr>
				<td>Bantuan Pajak Bandara / Airport Tax</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Bantuan Sambungan Kartu Halo (LN)</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2">Jumlah</td>
				<td>Rp {{ number_format( $stpd->jumlah+$stpd->trans_bandara )}}</td>
			</tr>	
		</table>
		<table>
			<tr>
				<td style="font-size: 12px;"><b>Transportasi & Akomodasi</b></td>
			</tr>
		</table>
		<table id="fifthsection">
			<tr>
				<td height="12" class="grey" colspan="2"></td>
				<td class="grey" colspan="3"></td>
				<td class="grey" colspan="2"></td>
			</tr>
			<tr>
				<td colspan="2"><b>Transportasi</b></td>
				<td width="80">&nbsp;</td>
				<td width="80">&nbsp;</td>
				<td width="80">&nbsp;</td>
				<td>Nomor PR</td>
				<td>Status Tiket/hotel :</td>
			</tr>
			<tr>
				<td colspan="2">Tiket :</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2">Tujuan :</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2">Berangkat :</td>
				<td colspan="2">Tgl :</td>
				<td>Jam :</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2">Pulang :</td>
				<td colspan="2">Tgl :</td>
				<td>Jam :</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2"><b>Akomodasi</b></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2">Nama Kota :</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2">Check In :</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2">Out :</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<table style="margin-top: 20px;font-size: 12px;">
			<tr>
				<td><b>KETRANGAN (apabila ada hal yang tidak tercover dalam formulir ini)</b></td>
			</tr>
		</table>
		<table id="sixthsection">
			<tr>
				<td height="50" width="480">&nbsp;</td>
				<td>
					<span>Verifikator UHPD</span>
					<br><br><br>	
					<span>HR / Sekertaris Divisi</span>
				</td>
			</tr>
		</table>
		<table id="seventhsection">
			<tr>
				<td width="80">Di Keluarkan di Palu</td>
			</tr>
			<tr>
				<td>Pada Tanggal :</td>
				<td>{{ $stpd->tanggal_berangkat }}</td>
			</tr>
			<tr>
				<td>Yang Menugaskan</td>
				<td></td>
				<td></td>
				<td></td>
				<td>Mengetahui</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>{{ $stpd->mengetahui->jabatan }}</td>
			</tr>
			<tr>
				@if($stpd->menugaskan->need_signature)
					<td><img src="{{ URL::to($stpd->menugaskan->sign->signature_pic) }}" width="100"></td>
				@else
					<td height="100">&nbsp;</td>
				@endif
			</tr>
			<tr>
				<td><b style="text-decoration: underline;">{{ $stpd->menugaskan->nama }}<b></td>
				<td></td>
				<td></td>
				<td></td>
				<td><b style="text-decoration: underline;">{{ $stpd->mengetahui->nama }}<b></td>
			</tr>
			<tr>
				<td><b>NIK : {{ $stpd->menugaskan->nik }}<b></td>
				<td></td>
				<td></td>
				<td></td>
				<td><b>NIK : {{ $stpd->mengetahui->nik }}<b></td>
			</tr>
		</table>
	</div>
</body>
</html>