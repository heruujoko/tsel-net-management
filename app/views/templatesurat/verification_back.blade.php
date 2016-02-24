<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Verification Sheet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="{{ URL::to('/') }}/surat/verif.css" rel="stylesheet"> -->
  <style>
    body {
      font-family: Tahoma;
    }
    .wrap {
      margin-left: auto;
      margin-right: auto;
      width:700px;
      min-height: 300px;
    }
    .wrap .row {
      margin:0;
      padding:10px;
      border: 2px solid black;
    }
    .logo {
      height:85px;
			background-size:contain;
			width:300px;
			background-repeat:no-repeat;
			background-image:url('{{ URL::to('/surat/tsel.jpg')}}');
    }
    .tbl, .tbl-2 {
      width: 100%;
      line-height: 10px;
    }
    .tbl tr td,
    .tbl-2 tr td,
    .tbl thead tr th {
      padding: 4px;
    }
    .no-padding{
      padding:0 !important;
    }
    .no-margin {
      margin:0 !important;
    }
    .underline {
      border-bottom: 2px solid black;
    }
    .no-border {
      border: 0px !important;
    }
    .bg-black {
      background-color: black;
      color: white;
    }
    .border-left {
      border-left: 2px solid black;
    }
    .kotak {
      width: 30px;
      height: 20px;
      text-align: center;
      border: 2px solid black;
    }
    .kotak-x {
      font-weight: bold;
      width: 30px;
      height: 20px;
      text-align: center;
      border: 2px solid black;
      padding-top: 8px;
    }
    .kotak-x::before {
      content: "X";
    }

    .kotak-2 {
      width: 110px;
      height: 25px;
      text-align: center;
      border: 2px solid black;
    }
    .kotak-x-2 {
      font-weight: bold;
      width: 110px;
      height: 25px;
      text-align: center;
      border: 2px solid black;
    }
    .kotak-x-2::before {
      content: "X";
    }

    .tengah {
      text-align: center !important;
    }
    .wrap2 {
      width:698px;
      margin-left: 1px;
      margin-right: -3px;
      height: auto;
      border-bottom: 2px solid black;
      border-left: 2px solid black;
      border-right: 2px solid black;
      text-align: center;
    }
    .wrap2 thead tr th {
      padding-top: 5px;
      padding-bottom: 5px;
      text-align: center;
      border-left: 2px solid black;
      border-bottom: 2px solid black;

    }
    .wrap2 tbody tr td {
      padding:5px;
    }

    .wrap2x {
      width:698px;
      margin-left: 1px;
      margin-right: -3px;
      height: auto;
      border-bottom: 2px solid black;
      border-left: 2px solid black;
      border-right: 2px solid black;
      text-align: center;
    }
    .wrap2x thead tr th {
      padding-top: 5px;
      padding-bottom: 5px;
      text-align: center;
      border-left: 2px solid black;
      border-bottom: 2px solid black;
      margin-top: 10px;
    }
    .wrap2x tbody tr td {
      padding:0px;
    }

    tr td.sign {
      width: 20%;
      vertical-align: top !important;
      border:2px solid black;
      text-align: center;
      height: auto;
    }
  </style>
</head>
<body>
  <div class="wrap">
    <div class="row">
      <div class="logo"></div>
      <h3 class="tengah">VERIFICATION SHEET BRANCH</h3>
      <div class="col-md-5">
        <table class="tbl">
          <tr>
            <td width="200">NO. INVOICE/KWT</td>
            <td width="3">:</td>
            <td class="underline" ></td>
          </tr>
          <tr>
            <td>NO. PO/KONTRAK/SPK</td>
            <td width="3">:</td>
            <td class="underline"></td>
          </tr>
          <tr>
            <td>SUPPLIER NAME</td>
            <td width="3">:</td>
            <td class="underline"><b>{{ $vs->user->nama }}</b></td>
          </tr>
          <tr>
            <td>Total Amount</td>
            <td width="3">:</td>
            <td class="underline bg-black"><b>Rp {{ number_format($vs->jumlah_pembayaran) }}</b></td>
          </tr>
        </table>
      </div>
    </div><!-- /.row -->
    <div class="row">
      A. VERIFIKASI KELENGKAPAN DOKUMEN
      <br><br>
      <div class="col-md-6">
        <table class="tbl-2">
          <tr>
            <td width="13px">1.</td>
            <td width="180">FPJP / Form GA</td>
            <?php $sel = false; ?>
            @for($i=0;$i<count($vs->docs);$i++)
              @if($vs->docs[$i]->docs == 'FPJP' )
                <td><div class="kotak-x">x</div></td>
                <?php $sel = true; ?>
              @else
                @if($i == count($vs->docs)-1 && $sel == false)
                  <td><div class="kotak-x"></div></td>
                @else
                @endif
              @endif
            @endfor
          </tr>
          <tr>
            <td width="13px">2.</td>
            <td width="180">PO</td>
            <?php $sel = false; ?>
            @for($i=0;$i<count($vs->docs);$i++)
              @if($vs->docs[$i]->docs == 'PO' )
                <td><div class="kotak-x">x</div></td>
                <?php $sel = true; ?>
              @else
                @if($i == count($vs->docs)-1 && $sel == false)
                  <td><div class="kotak-x"></div></td>
                @else
                @endif
              @endif
            @endfor
          </tr>
          <tr>
            <td width="13px">3.</td>
            <td width="180">Invoice</td>
            <?php $sel = false; ?>
            @for($i=0;$i<count($vs->docs);$i++)
              @if($vs->docs[$i]->docs == 'Invoice' )
                <td><div class="kotak-x">x</div></td>
                <?php $sel = true; ?>
              @else
                @if($i == count($vs->docs)-1 && $sel == false)
                  <td><div class="kotak-x"></div></td>
                @else
                @endif
              @endif
            @endfor
          </tr>
          <tr>
            <td width="13px">4.</td>
            <td width="180">Kwitansi</td>
            <?php $sel = false; ?>
            @for($i=0;$i<count($vs->docs);$i++)
              @if($vs->docs[$i]->docs == 'Kwitansi' )
                <td><div class="kotak-x">x</div></td>
                <?php $sel = true; ?>
              @else
                @if($i == count($vs->docs)-1 && $sel == false)
                  <td><div class="kotak-x"></div></td>
                @else
                @endif
              @endif
            @endfor
          </tr>
          <tr>
            <td width="13px">5.</td>
            <td width="180">Faktur Pajak</td>
            <?php $sel = false; ?>
            @for($i=0;$i<count($vs->docs);$i++)
              @if($vs->docs[$i]->docs == 'Faktur Pajak' )
                <td><div class="kotak-x">x</div></td>
                <?php $sel = true; ?>
              @else
                @if($i == count($vs->docs)-1 && $sel == false)
                  <td><div class="kotak-x"></div></td>
                @else
                @endif
              @endif
            @endfor
          </tr>
          <tr>
            <td width="13px">6.</td>
            <td width="180">BAST / Delivery Order</td>
            <?php $sel = false; ?>
            @for($i=0;$i<count($vs->docs);$i++)
              @if($vs->docs[$i]->docs == 'BAST' )
                <td><div class="kotak-x">x</div></td>
                <?php $sel = true; ?>
              @else
                @if($i == count($vs->docs)-1 && $sel == false)
                  <td><div class="kotak-x"></div></td>
                @else
                @endif
              @endif
            @endfor
          </tr>
          <tr>
            <td width="13px">7.</td>
            <td width="180">Berita Acara / Delivery Order</td>
            <?php $sel = false; ?>
            @for($i=0;$i<count($vs->docs);$i++)
              @if($vs->docs[$i]->docs == 'Berita Acara' )
                <td><div class="kotak-x">x</div></td>
                <?php $sel = true; ?>
              @else
                @if($i == count($vs->docs)-1 && $sel == false)
                  <td><div class="kotak-x"></div></td>
                @else
                @endif
              @endif
            @endfor
          </tr>
          <tr>
            <td width="13px">8.</td>
            <td width="180">PKS / BAK / BAN</td>
            <?php $sel = false; ?>
            @for($i=0;$i<count($vs->docs);$i++)
              @if($vs->docs[$i]->docs == 'PKS / BAK / BAN' )
                <td><div class="kotak-x">x</div></td>
                <?php $sel = true; ?>
              @else
                @if($i == count($vs->docs)-1 && $sel == false)
                  <td><div class="kotak-x"></div></td>
                @else
                @endif
              @endif
            @endfor
          </tr>
          <tr>
            <td width="13px">9.</td>
            <td width="180">Rekapitulasi</td>
            <?php $sel = false; ?>
            @for($i=0;$i<count($vs->docs);$i++)
              @if($vs->docs[$i]->docs == 'Rekapitulasi' )
                <td><div class="kotak-x">x</div></td>
                <?php $sel = true; ?>
              @else
                @if($i == count($vs->docs)-1 && $sel == false)
                  <td><div class="kotak-x"></div></td>
                @else
                @endif
              @endif
            @endfor
          </tr>
          <tr>
            <td width="5%">10.</td>
            <td width="180">Dokumen pendukung lainnya</td>
            <td><div class="kotak"></div></td>
          </tr>
        </table>
      </div>
      <div class="clearfix"></div>
      <br>
      <div class="col-md-2">Untuk Pembayaran :</div>
      <label class="underline">{{ $vs->untuk_pembayaran }}</label>
    </div><!-- /.row -->
    <div class="row">
      B. VERIFIKASI PEMBAYARAN
      <br><br>
      <div class="col-md-6">
        <table class="tbl">
          <tr>
            <td>a. DPP  PPN</td>
            <td>=</td>
            <td><span class="pull-left">Rp</span> <span class="pull-right">{{ number_format($vs->jumlah_pembayaran) }}</span></td>
          </tr>
          <tr>
            <td>b. PPN</td>
            <td>=</td>
            <td class="underline"><span class="pull-left">Rp</span> <span class="pull-right">-</span></td>
          </tr>
          <tr>
            <td>c. Sub Total</td>
            <td>=</td>
            <td><span class="pull-left">Rp</span> <span class="pull-right"></span></td>
          </tr>
          <tr>
            <td>d. DPP PPH</td>
            <td>=</td>
            <td><span class="pull-left">Rp</span> <span class="pull-right">-</span></td>
          </tr>
          <tr>
            <td>e. PPH 23 2%</td>
            <td>=</td>
            <td><span class="pull-left">Rp</span> <span class="pull-right">-</span></td>
          </tr>
          <tr>
            <td>e. By. Material</td>
            <td>=</td>
            <td class="underline"><span class="pull-left">Rp</span> <span class="pull-right">-</span></td>
          </tr>
          <tr>
            <td>g. Total Bayar</td>
            <td>=</td>
            <td class="underline"><span class="pull-left">Rp</span> <span class="pull-right"></span></td>
          </tr>
        </table>
      </div>
      <div class="col-md-6">
        <br><br>
        <table class="tbl" border="1">
          <thead>
            <tr>
              <th class="text-center">Cost Centre</th>
              <th class="text-center">Budget Account</th>
              <th class="text-center">Activity Code</th>
              <th class="text-center">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $vs->cost_centre }}</td>
              <td>{{ $vs->budget_account }}</td>
              <td>{{ $vs->activity_code }}</td>
              <td> Rp {{ number_format($vs->jumlah_pembayaran) }} </td>
            </tr>
            @for($i=1; $i <= 5; $i++ )
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div><!-- /.row -->
  </div><!-- /.wrap -->
  <table class="wrap2x" style="">
    <thead>
      <tr>
        <th>Dibuat Oleh,</th>
        <th>Diperiksa Oleh,</th>
        <th>Disetujui Oleh,</th>
        <th>Diperiksa Oleh,</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="sign">
          <img src="" width="90" height="90" alt="Image"><br><br><br>
          <b><u>ARIEYANTI_GAU</u></b><br>
          Finance & Adm Palu Staff
        </td>
        <td class="sign">
          <img src="" width="90" height="90" alt="Image"><br><br><br>
          <b><u>ASEP AWALUDIN</u></b><br>
          Spv. FA Branch Palu
        </td>
        <td class="sign">
          <img src="" width="90" height="90"><br><br><br>
          <b><u>HABIBI M. TAU</u></b><br>
          Mgr. Network Service Palu
        </td>
        <td class="sign">
          <img src="" width="90" height="90" alt="Image"><br><br><br>
          <b><u>DUANDI J. WIDJAJA</u></b><br>
          Spv. A/P Management Pamasuka
        </td>
      </tr>
    </tbody>
  </table>

  <table class="wrap2">
    <tbody>
      <tr>
        <td colspan="3" class="text-left"><u>Dibayarkan Kepada :</u></td>
        <td class="text-right" width="90">Tunai</td>
        <td><div class="kotak-2"></div></td>
      </tr>
      <tr>
        <td class="text-right" width="90">Nama</td>
        <td width="1">:</td>
        <td class="underline" width="140"><b>{{ $vs->user->nama }}</b></td>
        <td class="text-right">Check</td>
        <td><div class="kotak-2"></div></td>
      </tr>
      <tr>
        <td class="text-right">Nama Bank / Cabang</td>
        <td>:</td>
        <td class="underline"><b>{{ $vs->user->bank }}</b></td>
        <td class="text-right">Transfer</td>
        <td><div class="kotak-x-2"></div></td>
      </tr>
      <tr>
        <td class="text-right">Nomer Rekening</td>
        <td>:</td>
        <td class="underline"><b>{{ $vs->user->no_rekening }}</b></td>
        <td class="text-right">EFT</td>
        <td><div class="kotak-2"></div></td>
      </tr>
    </tbody>
  </table>
  <table class="wrap2">
    <tr>
      <td rowspan="2" valign="top" align="left" width="70">Catatan :</td>
      <td class="underline text-left">&nbsp;</td>
    </tr>
    <tr>
      <td class="underline text-left">&nbsp;</td>
    </tr>
  </table>
</body>
</html>
