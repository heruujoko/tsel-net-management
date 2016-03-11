<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">

    body {
      font-size: 13px;
      font-family: Arial;
    }
    table {
      background-color: #d9d9d9;
      border-spacing: 0;
      border-collapse: collapse;
    }
    .tbl {
      border: 1px solid black;
    }
    .tbl tr td {
      border:1px dashed black;
      padding:5px;
    }
    .logo {
      float:left;
      height:90px;
      width:300px;
      background-repeat:no-repeat;
      background-image:url('{{ URL::to('/surat/tsel.jpg')}}');
    }
    .cap {
      padding-top: 40px;
      height: 40px;
      font-weight: bold;
      font-size: 19px;
    }
    .bg-white {
      background-color: white;
    }
    .clearfix {
      clear: both;
    }
  </style>
  <title>Rekapan FPL</title>
</head>
<body>
  <div class="wrap">
    <table class="tbl">
      <tr>
        <td colspan="4">
          <div class="logo"></div>
          <div class="cap">
            Formulir Pengadaan Langsung Barang / Jasa
          </div>
          <div class="clearfix"></div>
          </td>
      </tr>
      <tr>
        <td>Nama Pemohon</td>
        <td width="133" class="bg-white">{{ $fpl->pemohon->nama }}</td>
        <td>Tanggal Permintaan</td>
        <td width="118" class="bg-white">{{ $fpl->tanggal_permintaan }}</td>
      </tr>
      <tr>
        <td>NIK</td>
        <td class="bg-white">{{ $fpl->pemohon->nik }}</td>
        <td>No. Referensi GA</td>
        <td class="bg-white">{{ $fpl->no_ref_ga }}</td>
      </tr>
      <tr>
        <td>Lokasi Kerja</td>
        <td class="bg-white">{{ $fpl->pemohon->lokasi->nama }}</td>
        <td>PIC</td>
        <td class="bg-white">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4"><strong>Jenis Permintaan : {{ $fpl->jenis_permintaan }}</strong></td>
      </tr>
      <tr>
        <td height="" colspan="2" valign="top" class="bg-white">
          Perbaikan &amp; Pemeliharaan<br />
          <ol>
            @foreach($fpl->perbaikans as $pb)
              <li>{{ $pb->details }}</li>
            @endforeach
          </ol>
        </td>
        <td colspan="2" valign="top" class="bg-white">
          <p>Pembelian</p>
          <ol>
            @foreach($fpl->pembelians as $bl)
              <li>{{ $bl->details }}</li>
            @endforeach
          </ol>
        </td>
      </tr>
      <tr>
        <td colspan="2">Ref : No. TRX ID : {{ $fpl->trx_id }}</td>
        <td colspan="2">Ref : No. Acc : {{ $fpl->no_acc }}</td>
      </tr>
      <tr>
        <td height="" colspan="4" valign="top" class="bg-white">
          <p>Alasan Kebutuhan  &amp; Spesifikasi Pekerjaan : <br />
          </p>
          <ol type="a">
            @foreach($fpl->kebutuhans as $keb)
              <li>{{ $keb->details }}</li>
            @endforeach
            @foreach($fpl->specs as $sp)
              <li>{{ $sp->details }}</li>
            @endforeach
          </ol>
          <p>&nbsp; </p>
        </td>
      </tr>
      <tr>
        <td><strong>Dibuat Oleh/ Jabatan</strong></td>
        <td colspan="3" class="bg-white"><strong>{{ $fpl->pemohon->nama }}/{{ $fpl->pemohon->jabatan }}</strong></td>
      </tr>
      <tr>
        <td><strong>Tandatangan</strong></td>
        <td colspan="3" height="50" class="bg-white">&nbsp;</td>
      </tr>
      @foreach($fpl->mengetahui as $tahu)
        <tr>
          <td><strong>Diketahui Oleh/ Jabatan</strong></td>
          <td colspan="3" class="bg-white"><strong>{{ $tahu->nama }}/{{ $tahu->jabatan }}</strong></td>
        </tr>
        <tr>
          <td><strong>Tandatangan</strong></td>
          <!-- <td colspan="3" height="50" class="bg-white">&nbsp;</td> -->
          @if($tahu->need_signature)  
          <td class="bg-white" colspan="3">
            <img src="{{ URL::to($tahu->sign->signature_pic )}}" width="50" height="50">
          </td>
          @else
          <td class="bg-white" colspan="3" height="50">
          </td>
          @endif
        </tr>
      @endforeach
      <tr>
        <td><strong>Disetujui Oleh Fungi Pengadaan</strong></td>
        <td colspan="3" class="bg-white"><strong>ASEP AWALUDIN / SPV. FINANCE AND ADMINISTRATION BRANCH  PALU</strong></td>
      </tr>
      <tr>
        <td><strong>Tandatangan</strong></td>
        <td colspan="3" height="50" class="bg-white">&nbsp;</td>
      </tr>
    </table>
  </div>
</body>
</html>
