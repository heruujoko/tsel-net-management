<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-size: 13px;
    }

    .wrap {
      width:770px;
      min-height: 1200px;
      margin: 0 auto;
      margin-top: 10px;
      margin-bottom: 100px;
      padding-left:5px;
      padding-right: 5px;
    }
    .logo {
      height: 70px;
      width: auto;
      background-repeat: no-repeat;
      background-image:url('/surat/tsel.jpg');
    }

    .headings {
      text-align: center;
      width:auto;
      height:auto;
    }
    .headings h4{
      margin-bottom:0px;
    }
    .content {
      text-align: left;
    }

    .title-head{
      text-transform: uppercase;
      font-size: 10px;
    }

    .tbl {
      font-weight: bold;
      margin-top: 10px;
      margin-bottom: 10px;
      font-size: 10px;
      width: 700px;
      border: 2px solid black;
    }
    .tbl tbody tr {
      text-align: center;
      border: 1px solid black;
    }
    .tbl thead tr {
      border: 2px solid black;
    }
    .tbl thead tr th{
      border-right: 2px solid black;
      text-align: center;
      font-style: bold;
      padding: 2px 2px;
      background-color: #cccccc;
    }
    .tbl tbody tr td {
      padding: 2px 2px;
    }
    .tbl tbody tr,
    .tbl tbody td {
      border: 1px solid black;
    }
    .no-border {
      border: 0;
    }

    .right {
      text-align: right;
    }
    .left {
      text-align: left;
    }
  </style>
  <title>STPD</title>
</head>
<body>
  <div class="container">
    <div class="wrap">
      <div class="logo"></div>
      <div class="headings">
        <h4 class="text-uppercase"><b>SURAT TUGAS PERJALANAN DINAS ( STPD )</b></h4><br>
        Nomor STPD : .........<br/>
        Nomor ID Transaksi : .........
      </div>
      <div class="content">
        <br>
        <p class="title-head"><b>pimpinan pt telkomsel dengan ini menyatakan kepada :</b></p>
        <table>
          <tr>
            <td width="130" class="text-uppercase">Nama</td>
            <td width="10">:</td>
            <td>{{ $stpd->user->nama }}</td>
          </tr>
          <tr>
            <td width="130" class="text-uppercase">NIK</td>
            <td width="10">:</td>
            <td>{{ $stpd->user->nik }}</td>
          </tr>
          <tr>
            <td width="130" class="text-uppercase">Jabatan</td>
            <td width="10">:</td>
            <td>{{ $stpd->user->jabatan }}</td>
          </tr>
          <tr>
            <td width="130" class="text-uppercase">Lokasi Kerja</td>
            <td width="10">:</td>
            <td>{{ $stpd->user->lokasi->nama }}</td>
          </tr>
          <tr>
            <td width="130" class="text-uppercase">cost center</td>
            <td width="10">:</td>
            <td></td>
          </tr>
          <tr>
            <td width="130" class="text-uppercase">budget account</td>
            <td width="10">:</td>
            <td></td>
          </tr>
          <tr>
            <td width="130" class="text-uppercase">activity code</td>
            <td width="10">:</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <table class="tbl">
          <thead>
            <tr>
              <th width="20">No</th>
              <th width="65">Lokasi Tujuan Penugasan</th>
              <th width="65">Berangkat / Mulai</th>
              <th width="65">Kembali / Selesai</th>
              <th width="65">Kendaraan / Kelas</th>
              <th width="65">Uraian / Tugas</th>
              <th width="65">Konfirmasi Kedatangan</th>
              <th width="65">Konfirmasi Kepulangan</th>
            </tr>
          </thead>
          <tbody>
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
          </tbody>
        </table>
        <p>HARAP DILAKSANAKAN DAN SEGERA MELAPORKAN SETELAH KEMBALI</p>
        <table class="tbl" width="100%">
          <thead>
            <tr>
              <th width="33.3%">Bantuan Biaya Perjalanan Dinas</th>
              <th width="33.3%">Perhitungan</th>
              <th width="33.3%">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Uang Harian Perjalanan Dinas (UHPD)	</td>
              @if($stpd->user->level_jabatan == 'manager')
                @if($stpd->jenis_uhpd == 'darat')
                  <td>UHPD 1 = 4 hari x Rp {{ number_format('290000') }}</td>
                @elseif($stpd->jenis_uhpd == 'udara')
                  <td>UHPD 1 = 4 hari x Rp {{ number_format('420000') }}</td>
                @else
                  <td>UHPD 1 = 4 hari x Rp {{ number_format('230000') }}</td>
                @endif
              @elseif($stpd->user->level_jabatan == 'spv')
                @if($stpd->jenis_uhpd == 'darat')
                  <td>UHPD 1 = 4 hari x Rp {{ number_format('275000') }}</td>
                @elseif($stpd->jenis_uhpd == 'udara')
                  <td>UHPD 1 = 4 hari x Rp {{ number_format('395000') }}</td>
                @else
                  <td>UHPD 1 = 4 hari x Rp {{ number_format('215000') }}</td>
                @endif
              @elseif($stpd->user->level_jabatan == 'staff')
                @if($stpd->jenis_uhpd == 'darat')
                  <td>UHPD 1 = 4 hari x Rp {{ number_format('260000') }}</td>
                @elseif($stpd->jenis_uhpd == 'udara')
                  <td>UHPD 1 = 4 hari x Rp {{ number_format('370000') }}</td>
                @else
                  <td>UHPD 1 = 4 hari x Rp {{ number_format('200000') }}</td>
                @endif
              @else
              @endif
              <td>
                <div class="text-right">Rp {{ number_format( $stpd->jumlah )}}</div>
              </td>
            </tr>

            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>
                <div class="col-md-7">&nbsp;</div>
                <div class="text-right">&nbsp;</div>
              </td>
            </tr>

            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>
                <div class="col-md-7">&nbsp;</div>
                <div class="text-right">&nbsp;</div>
              </td>
            </tr>

            <tr>
              <td>Bantuan Transportasi Bandara</td>
              <td>&nbsp;</td>
              <td>
                <div class="text-right">Rp {{ number_format($stpd->trans_bandara) }}</div>
              </td>
            </tr>

            <tr>
              <td>Bantuan Pajak Bandara / Airport Tax	</td>
              <td>&nbsp;</td>
              <td>
                <div class="col-md-7">&nbsp;</div>
                <div class="text-right">&nbsp;</div>
              </td>
            </tr>

            <tr>
              <td>Bantuan Transportasi Bandara</td>
              <td>&nbsp;</td>
              <td>
                <div class="col-md-7">&nbsp;</div>
                <div class="text-right">&nbsp;</div>
              </td>
            </tr>

            <tr>
              <td colspan="2">JUMLAH</td>
              <td>
                <div class="text-right">Rp {{ number_format( $stpd->jumlah )}}</div>
              </td>
            </tr>
          </tbody>
        </table>

        <p><b>Transportasi & Akomodasi</b></p>

        <table class="tbl" width="100%">
          <thead>
            <tr>
              <th width="25%">&nbsp;</th>
              <th width="50%" colspan="2">&nbsp;</th>
              <th colspan="2">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-left">Transportasi</td>
              <td colspan="2">&nbsp;</td>
              <td>Nomor PR</td>
              <td>Status tiket / hotel </td>
            </tr>

            <tr>
              <td class="text-left">Tiket</td>
              <td colspan="2">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>

            <tr>
              <td class="text-left">Tujuan</td>
              <td colspan="2">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="text-left">Berangkat</td>
              <td class="text-left">Tgl : </td>
              <td class="text-left">Jam : </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="text-left">Pulang</td>
              <td class="text-left">Tgl : </td>
              <td class="text-left">Jam : </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="text-left">Akomodasi</td>
              <td colspan="2">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="text-left">Nama Hotel</td>
              <td colspan="2">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="text-left">Kota</td>
              <td colspan="2">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="text-left">Check In</td>
              <td colspan="2">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="text-left">Check Out</td>
              <td colspan="2">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>

          </tbody>
          <tfoot>
            <tr>
              <th class="text-right" colspan="5">Pengisian Kolom ini dapat dilakukan melalui sistem otmatisasi yang ada</th>
            </tr>
          </tfoot>
        </table>
        <p><b>KETERANGAN ( apabila ada hal yang tidak tercover dalam formulir ini )</b></p>
        <table class="tbl" width="100%">
          <tbody>
            <tr>
              <td rowspan="3" class="text-left">
                <br><br><br><br><br><br>
              </td>
              <td width="20%">Verifikator UHPD</td>
            </tr>
            <tr>
              <td height="70">&nbsp;</td>
            </tr>
            <tr>
              <td>HR / Sekretaris Divisi</td>
            </tr>
          </tbody>
        </table>
        <div class="col-md-8">
        Dikeluarkan di Palu<br>
        Pada Tanggal : <b>&nbsp;</b>	<br>
        <br><br>
        <table>
          <tr>
            <td>Yang Menugaskan</td>
            <td width="300">&nbsp;</td>
            <td>Yang Mengetahui</td>
          </tr>
          <tr>
            <td height="100">
              <img src="{{ URL::to($stpd->menugaskan->sign->signature_pic) }}" width="100">
            </td>
            <td></td>
            <td>
              <img src="{{ URL::to($stpd->mengetahui->sign->signature_pic) }}" width="100">
            </td>
          </tr>
          <tr>
            <td><b><u>{{ $stpd->menugaskan->nama }}</u></b></td>
            <td></td>
            <td><b><u>{{ $stpd->mengetahui->nama }}</u></b></td>
          </tr>
          <tr>
            <td><b><u><b>NIK : {{ $stpd->menugaskan->nik }}</b></u></b></td>
            <td></td>
            <td><b><u><b>NIK : {{ $stpd->mengetahui->nik }}</b></u></b></td>
          </tr>
        </table>
        <br>
        </div>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
  </div><!-- /.container -->
</div>
</body>
</html>
