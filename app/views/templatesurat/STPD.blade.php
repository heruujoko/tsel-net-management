<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ URL::to('/') }}/surat/stpd.css" rel="stylesheet" type="text/css">
  <title>STPD</title>
</head>
<body>
  <div class="container">
    <div class="wrap">
      <div class="logo"></div>
      <div class="headings">
        <h4 class="text-uppercase"><b>surat tugas perjalanan dinas ( stpd )</b></h4><br>
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
            <td>Habibi M Tau</td>
          </tr>
          <tr>
            <td width="130" class="text-uppercase">NIK</td>
            <td width="10">:</td>
            <td>78022</td>
          </tr>
          <tr>
            <td width="130" class="text-uppercase">Jabatan</td>
            <td width="10">:</td>
            <td>Mgr. Network Service Palu</td>
          </tr>
          <tr>
            <td width="130" class="text-uppercase">Lokasi Kerja</td>
            <td width="10">:</td>
            <td>GraPARI Palu</td>
          </tr>
          <tr>
            <td width="130" class="text-uppercase">cost center</td>
            <td width="10">:</td>
            <td>602-696</td>
          </tr>
          <tr>
            <td width="130" class="text-uppercase">budget account</td>
            <td width="10">:</td>
            <td>550201</td>
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
              <th width="90">Lokasi Tujuan Penugasan</th>
              <th width="90">Berangkat / Mulai</th>
              <th width="90">Kembali / Selesai</th>
              <th width="70">Kendaraan / Kelas</th>
              <th width="300">Uraian / Tugas</th>
              <th width="100">Konfirmasi Kedatangan</th>
              <th width="100">Konfirmasi Kepulangan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Malang</td>
              <td>14-Nov-15</td>
              <td>7-Nov-15</td>
              <td>Udara</td>
              <td>Kick Off Siaga NARU 2016 ICT Operation Region Sulawesi</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            @for($i=1 ; $i<=6 ; $i++)
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
            @endfor
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
              <td>UHPD 1 = 4 hari x Rp 230.000</td>
              <td>
                <div class="col-md-7">Rp</div>
                <div class="text-right">920.000,00</div>
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
                <div class="col-md-7">Rp</div>
                <div class="text-right">360.000,00</div>
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
                <div class="col-md-7">Rp</div>
                <div class="text-right">1.280.000,00</div>
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
              <td rowspan="3" class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
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
        Yang Menugaskan	<br><br><br><br><br><br>
        <b><u>Noviandri</u></b><br>
        <b>NIK : 67002</b>
        </div>
        <div>
        Mengetahui<br>
        VP ICT Network Management Area Pamasuka	<br><br><br><br><br><br>
        <b><u>Ali Imran</u></b><br>
        <b>NIK : 66034</b>
        </div>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
  </div><!-- /.container -->
</div>
</body>
</html>
