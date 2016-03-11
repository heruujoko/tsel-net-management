<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>SPPH</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
    body {
      font-family: Tahoma;
      margin: 0;
    }
    table {
      background-color: transparent;
    }
    .container {
      background-color: white;
      min-height: 900px;
    }
    .text-justify {
      text-align: justify;
    }
    .text-uppercase {
      text-transform: uppercase;
    }
    .penutup {
      margin-top: 50px;
    }

    .content {
      margin-left: 30px;
      margin-right: 30px;
      margin-top: 100px;
    }
    .indent {
      text-indent: 50px;
    }
    p.indent {
      line-height: 2px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="content">
      <table>
        <tr>
          <td>Nomor</td>
          <td>:</td>
          <td>{{ $spph->no_surat }}</td>
        </tr>
        <tr>
          <td>Tempat/tanggal</td>
          <td>:</td>
          <td>{{ $spph->tempat_tanggal }}</td>
        </tr>
      </table>
      <div class="row">
        <br>
        Kepada Yth.<br>
        {{ $spph->kepada }}<br>
        Di<br>
        <p class="indent">Makassar</p>

        Perihal : <span class="text-uppercase"><b>{{ $spph->kegiatan }}</b></span>
        <br><br>
        <div class="isi">
        Dengan Hormat,
        <p class="text-justify">Mengawali surat ini, kami mengucapkan terima kasih atas kerjasamanya selama ini. Sehubungan dengan adanya <strong>{{ $spph->kegiatan }}</strong>, kami mohon kepada Bapak untuk mengirimkan Surat Penawaran Harga (SPH).
          <p>
            Surat Penawaran Harga (SPH) kami harapkan sudah diterima selambat-lambatnya 1 hari setelah SPPH ini diterbitkan dan ditujukan kepada :
          </p>
          <p>
            <strong>
              PT Telkomsel GraPARI Palu<br>
              Jl. Dewi Sartika No. 96<br>
              Palu<br>
              Up : Habibi M. Tau<br>
            </strong>
          </p>
          </div>
          <div class="penutup">
            <p>Demikian disampaikan dan atas kerjasamanya kami ucapkan Terima Kasih.</p>
            <p>Hormat kami</p>
            <p>PT.TELKOMSEL</p>
            <br><br><br><br>  
            <u>Habibi M. Tau</u><br>
            Mgr. Network Service Palu
        </div>
    </div><!-- /.content -->
  </div><!-- /.container -->
</body>
</html>
