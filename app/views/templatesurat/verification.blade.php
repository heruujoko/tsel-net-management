<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Verification Sheet</title>
    <style>
      #wrapper {
        margin-top: -30px;
        margin-left: -30px;
        border-top: 2px solid;
        border-right: 2px solid;
        border-left: 2px solid;
        border-bottom: 1px solid;
        width: 105%;
        padding-left: 20px;
      }
      #section1{
        font-size: 12px;
        margin-top: 30px;
      }
      #secondwrapper{
        margin-left: -30px;
        border-top: 1px solid;
        border-right: 2px solid;
        border-left: 2px solid;
        border-bottom: 1px solid;
        width: 105%;
        padding-left: 20px;
        font-size: 12px;
      }
      #thirdwrapper{
        margin-left: -30px;
        border-top: 1px solid;
        border-right: 2px solid;
        border-left: 2px solid;
        border-bottom: 1px solid;
        width: 105%;
        padding-left: 20px;
        font-size: 12px;
      }
      #fourthwrapper{
        margin-left: -30px;
        border-top: 1px solid;
        border-right: 2px solid;
        border-left: 2px solid;
        border-bottom: 1px solid;
        width: 105%;
        font-size: 12px;
        padding-left: 8px;
        border-spacing: 0px;
      }
      #fourthwrapper td{
        border-left: 2px solid;
      }
      #fifthwrapper {
        margin-left: -30px;
        border-top: 1px solid;
        border-right: 2px solid;
        border-left: 2px solid;
        border-bottom: 1px solid;
        width: 105%;
        padding-left: 20px;
        font-size: 12px;
        padding-top: 10px;
        padding-bottom: 10px;
      }
      #sixthwrapper {
        margin-left: -30px;
        border-top: 1px solid;
        border-right: 2px solid;
        border-left: 2px solid;
        border-bottom: 1px solid;
        width: 105%;
        padding-left: 20px;
        font-size: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
      }
      .tbl {
  			border-spacing: 0px;
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
      .bg-black {
        background-color: black;
        color: white;
      }
      .center {
        text-align: center;
      }
      .bold {
        font-weight: bold;
      }
      .logo {
        background-size:contain;
  			width:300px;
        height: 70px;
  			background-repeat:no-repeat;
  			background-image:url('{{ URL::to('/surat/tsel.jpg')}}');
      }
      .kotak-x {
        font-weight: bold;
        width: 10px;
        height: 15px;
        text-align: center;
        border: 1px solid black;
        padding: 2px;
      }
      .underline {
        border-bottom: 1px solid;
      }
      .underline-text {
        text-decoration: underline;
      }
      .alignright{
        text-align: right;
      }
      .kotak-2 {
        border: 1px solid black;
      }
    </style>
  </head>
  <body>
    <table id="wrapper">
      <tr>
        <td class="logo">&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4" class="center bold">VERIFICATION SHEET BRANCH</td>
      </tr>
      <tr>
        <td colspan="4">
          <table id="section1">
            <tr>
              <td width="150">NO.INVOICE/KWT</td>
              <td>: </td>
              <td>_______________________</td>
            </tr>
            <tr>
              <td>NO.PO/KONTRAK/SPK</td>
              <td>: </td>
              <td>_______________________</td>
            </tr>
            <tr>
              <td>SUPPLIER NAME</td>
              <td>: </td>
              <td><b>{{ $vs->user->nama }}</b></td>
            </tr>
            <tr>
              <td>TOTAL AMOUNT</td>
              <td>: </td>
              <td class="bg-black"><b>Rp {{ number_format($vs->jumlah_pembayaran) }}</b></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <table id="secondwrapper">
      <tr>
        <td><b>A.KELENGKAPAN DOKUMEN</b></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td width="150">1. FPJP / Form GA</td>
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
        <td width="150">2.PO</td>
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
        <td width="150">3.Invoice</td>
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
        <td width="150">4.Kwitansi</td>
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
        <td width="150">5.Faktur Pajak</td>
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
        <td width="150">6.BAST / Delivery Order</td>
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
        <td width="150">7.Berita Acara / Delivery Order</td>
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
        <td width="150">8.PKS / BAK / BAN</td>
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
        <td width="150">9.Rekapitulasi</td>
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
        <td width="150">10.Dokumen pendukung lainnya</td>
        <td><div class="kotak"></div></td>
      </tr>
      <tr>
        <td><b>untuk pembayaran </b></td>
        <td colspan="3" class="underline">: {{ $vs->untuk_pembayaran }} </td>
      </tr>
      <tr>
        <td></td>
        <td height="12" colspan="3" class="underline"></td>
      </tr>
      <tr>
        <td height="20"></td>
      </tr>
    </table>
    <table id="thirdwrapper">
      <tr>
        <td colspan="2"><b>B. VERIFIKASI PEMBAYARAN</b></td>
      </tr>
      <tr>
        <td>
          <table>
            <tr>
              <td>a.</td>
              <td width="100">DPP PPN</td>
              <td>=</td>
              <td><b>Rp. {{ number_format($vs->jumlah_pembayaran) }}</b></td>
            </tr>
            <tr>
              <td>b.</td>
              <td>PPN</td>
              <td>=</td>
              <td><b>Rp. -</b></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td class="underline"></td>
            </tr>
            <tr>
              <td>c.</td>
              <td>SUB TOTAL</td>
              <td>=</td>
              <td><b>Rp. {{ number_format($vs->jumlah_pembayaran) }}</b></td>
            </tr>
            <tr>
              <td>d.</td>
              <td>DP PPH</td>
              <td>=</td>
              <td><b>Rp. -</b></td>
            </tr>
            <tr>
              <td>e.</td>
              <td>PPH 23 2%</td>
              <td>=</td>
              <td><b>Rp. -</b></td>
            </tr>
            <tr>
              <td>f.</td>
              <td>By. Materai</td>
              <td>=</td>
              <td><b>Rp. -</b></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td class="underline"></td>
            </tr>
            <tr>
              <td>g.</td>
              <td>TOTAL BAYAR</td>
              <td>=</td>
              <td><b>Rp. {{ number_format($vs->jumlah_pembayaran) }}</b></td>
            </tr>
          </table>
        </td>
        <td colspan="">
          <table class="tbl">
            <tr>
              <th>Cost Centre</th>
              <th>Budget Account</th>
              <th>Activity Code</th>
              <th>Jumlah</th>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><b>Rp. {{ number_format($vs->jumlah_pembayaran) }}</b></td>
            </tr>
            <tr>
              <td height="12"></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td height="12"></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td height="12"></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
          </table>
        </td>
      </tr>
    </table>
    <table id="fourthwrapper">
      <tr>
        <td class="center" width="140">
          Dibuat Oleh,
        </td>
        <td class="center">
          Diperiksa Oleh,
        </td>
        <td class="center">
          Disetujui Oleh,
        </td>
        <td class="center">
          Diperiksa Oleh,
        </td>
      </tr>
      <tr>
        <td height="60" class="center" width="140"></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="center" width="140" class="underline-text bold center">ARIEYANTI GAU</td>
        <td class="underline-text bold center">ASEP AWALLUDIN</td>
        <td class="underline-text bold center">HABIBI M TAU</td>
        <td class="underline-text bold center">DUANDI D. WIDJAJA</td>
      </tr>
      <tr>
        <td class="center" width="140" class="center">Finance & Adm Palu Staff</td>
        <td class="center">Spv. FA Branch Palu</td>
        <td class="center">Mgr. Network Service Palu</td>
        <td class="center">Spv. A/P Management Pamasuka</td>
      </tr>
    </table>
    <table id="fifthwrapper">
      <tr>
        <td width="100" class="underline-text">Dibayarkan kepada : &nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td></td>
        <td></td>
        <td width="35">Tunai</td>
        <td width="40" class="kotak-2">&nbsp;</td>
        <td></td>
      </tr>
      <tr>
        <td class="alignright">Nama :</td>
        <td class="underline-text"><b>{{ $vs->user->nama }}</b></td>
        <td></td>
        <td>Check</td>
        <td class="kotak-2">&nbsp;</td>
        <td></td>
      </tr>
      <tr>
        <td class="alignright">Nama Bank / Cabang :</td>
        <td class="underline-text"><b>{{ $vs->user->bank }}</b></td>
        <td></td>
        <td>Transfer</td>
        <td class="kotak-2">&nbsp;</td>
        <td></td>
      </tr>
      <tr>
        <td class="alignright">Nomer Rekening</td>
        <td class="underline-text"><b>{{ $vs->user->no_rekening }}</b></td>
        <td></td>
        <td>EFT</td>
        <td class="kotak-2">&nbsp;</td>
        <td></td>
      </tr>
    </table>
    <table id="sixthwrapper">
      <tr>
        <td width="60" height="12"><b>Catatan : </b></td>
        <td class="underline"></td>
      </tr>
      <tr>
        <td width="60" height="12"><b></b></td>
        <td class="underline"></td>
      </tr>
      <tr>
        <td width="60" height="12"><b></b></td>
        <td class="underline"></td>
      </tr>
    </table>
  </body>
</html>
