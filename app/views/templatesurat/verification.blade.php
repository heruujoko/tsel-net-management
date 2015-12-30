<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Verification Sheet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ URL::to('/') }}/surat/verif.css" rel="stylesheet">
</head>
<body>
  <div class="wrap">
    <div class="row">
      <div class="logo"></div>
      <h3 class="text-center">VERIFICATION SHEET BRANCH</h3>
      <div class="col-md-5">
        <table class="tbl">
          <tr>
            <td>NO. INVOICE/KWT</td>
            <td width="5">:</td>
            <td class="underline"></td>
          </tr>
          <tr>
            <td>NO. PO/KONTRAK/SPK</td>
            <td width="5">:</td>
            <td class="underline"></td>
          </tr>
          <tr>
            <td>SUPPLIER NAME</td>
            <td width="5">:</td>
            <td class="underline"><b>HABIBI M.TAU</b></td>
          </tr>
          <tr>
            <td>Total Amount</td>
            <td width="5">:</td>
            <td class="underline bg-black"><b>Rp 3,085,623.00</b></td>
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
            <td width="5%">1.</td>
            <td width="60%">FPJP / Form GA</td>
            <td><div class="kotak-x"></div></td>
          </tr>
          <tr>
            <td width="5%">2.</td>
            <td width="60%">PO</td>
            <td><div class="kotak"></div></td>
          </tr>
          <tr>
            <td width="5%">3.</td>
            <td width="60%">Invoice</td>
            <td><div class="kotak"></div></td>
          </tr>
          <tr>
            <td width="5%">4.</td>
            <td width="60%">Kwitansi</td>
            <td><div class="kotak"></div></td>
          </tr>
          <tr>
            <td width="5%">5.</td>
            <td width="60%">Faktur Pajak</td>
            <td><div class="kotak"></div></td>
          </tr>
          <tr>
            <td width="5%">6.</td>
            <td width="60%">BAST / Delivery Order</td>
            <td><div class="kotak"></div></td>
          </tr>
          <tr>
            <td width="5%">7.</td>
            <td width="60%">Berita Acara / Delivery Order</td>
            <td><div class="kotak"></div></td>
          </tr>
          <tr>
            <td width="5%">8.</td>
            <td width="60%">PKS / BAK / BAN</td>
            <td><div class="kotak"></div></td>
          </tr>
          <tr>
            <td width="5%">9.</td>
            <td width="60%">Rekapitulasi</td>
            <td><div class="kotak"></div></td>
          </tr>
          <tr>
            <td width="5%">10.</td>
            <td width="60%">Dokumen pendukung lainnya</td>
            <td><div class="kotak"></div></td>
          </tr>
        </table>
      </div>
      <div class="clearfix"></div>
      <br>
      <div class="col-md-2">Untuk Pembayaran :</div>
      <label class="underline">BPD ke Makassar dalam rangka Pra-Join Planning Program 2016</label>
    </div><!-- /.row -->
    <div class="row">
      B. VERIFIKASI PEMBAYARAN
      <br><br>
      <div class="col-md-6">
        <table class="tbl">
          <tr>
            <td>a. DPP  PPN</td>
            <td>=</td>
            <td><span class="pull-left">Rp</span> <span class="pull-right">3.085.623</span></td>
          </tr>
          <tr>
            <td>b. PPN</td>
            <td>=</td>
            <td class="underline"><span class="pull-left">Rp</span> <span class="pull-right">-</span></td>
          </tr>
          <tr>
            <td>c. Sub Total</td>
            <td>=</td>
            <td><span class="pull-left">Rp</span> <span class="pull-right">3.085.623</span></td>
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
            <td class="underline"><span class="pull-left">Rp</span> <span class="pull-right">3.085.623</span></td>
          </tr>
        </table>
      </div>

      <div class="col-md-6">
        <table class="tbl" border="1">
          <thead>
            <tr>
              <th class="text-center">Cost Centre</th>
              <th class="text-center">Badget Account</th>
              <th class="text-center">Activity Code</th>
              <th class="text-center">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td> Rp 3.085.623 </td>
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
  <table class="wrap2">
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
          <img src="" width="90" height="90" alt="Image"><br>
          <b><u>ARIEYANTI_GAU</u></b><br>
          Finance & Adm Palu Staff
        </td>
        <td class="sign">
          <img src="" width="90" height="90" alt="Image"><br>
          <b><u>ASEP AWALUDIN</u></b><br>
          Spv. FA Branch Palu
        </td>
        <td class="sign">
          <img src="" width="90" height="90" alt="Image"><br>
          <b><u>HABIBI M. TAU</u></b><br>
          Mgr. Network Service Palu
        </td>
        <td class="sign">
          <img src="" width="90" height="90" alt="Image"><br>
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
        <td class="text-right">Tunai</td>
        <td><div class="kotak-2"></div></td>
      </tr>
      <tr>
        <td class="text-right" width="200">Nama</td>
        <td width="1">:</td>
        <td class="underline" width="200"><b>Habibi M TAU</b></td>
        <td class="text-right">Check</td>
        <td><div class="kotak-2"></div></td>
      </tr>
      <tr>
        <td class="text-right">Nama Bank / Cabang</td>
        <td>:</td>
        <td class="underline"><b>Mandiri Cab. Sorong</b></td>
        <td class="text-right">Transfer</td>
        <td><div class="kotak-x-2"></div></td>
      </tr>
      <tr>
        <td class="text-right">Nomer Rekening</td>
        <td>:</td>
        <td class="underline"><b>154-000 528 6053</b></td>
        <td class="text-right">EFT</td>
        <td><div class="kotak-2"></div></td>
      </tr>
    </tbody>
  </table>
  <table class="wrap2">
    <tr>
      <td rowspan="2" valign="top" align="left" width="200">Catatan :</td>
      <td class="underline text-left">&nbsp;</td>
    </tr>
    <tr>
      <td class="underline text-left">&nbsp;</td>
    </tr>
  </table>
</body>
</html>
