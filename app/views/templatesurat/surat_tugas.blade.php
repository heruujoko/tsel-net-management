<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>SURAT TUGAS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
      body {
        font-family: "Times New Roman";
        font-size: 16px;
      }
      .container {
        margin-top:50px;
        width: 700px;
        min-height: 900px;
      }
      .no {
        margin: 0 auto;
        text-align: center;
        font-size: 20px;
        border-bottom: 2px solid black;
        padding-bottom: 20px;
        margin-bottom: 20px;
      }
      .content {
        background-color: white;
        width: 650px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 130px;
      }
      .indent {
        text-indent: 50px;
      }
      .tbl {
        font-weight: bold;
        width: 550px;
        margin: 0 auto;
        margin-bottom: 20px;
      }
      .tbl-2 {
        width: 100%;
        border: 1px solid black;
        margin-bottom: 20px;
      }
      .tbl-2 thead tr th {
        border: 1px solid black;
        text-align: center;

      }
      .tbl-2 tr td, .tbl tr th{
        text-align: center;
        padding: 3px;
        border: 1px solid black;
      }
      .disetuju {
        @if(count($surat->activities) > 9))
        page-break-before: always;
        @else
        margin-top:250px;
        @endif
      }
  </style>
</head>
<body>
  <div class="container">
      <div class="no">
        <span class="text-center"><b>SURAT TUGAS</b></span><br>
        <span class="text-center"><b>NOMOR  : {{ $surat->no_surat }}</b></span>
      </div>
      <div class="isine">
      <p>Sehubungan dengan adanya pekerjaan dibawah ini, maka kami menugaskan saudara :</p>
      <table class="tbl" border="0">
       @foreach($surat->banteks as $srt)
       <tr>
         <td>{{ $srt->nama }} ({{ $srt->hp }})</td>
         <td>{{ $srt->perusahaan }}</td>
       </tr>
       @endforeach
      </table>
      <p>Untuk dapat mengerjakan pekerjaan berikut sesuai dengan jadwal yang telah ditentukan sebagai berikut:</p>
      <table class="tbl-2" cellspacing="0">
        <thead>
          <tr>
            <th width="30">No.</th>
            <th>Site</th>
            <th>Time</th>
            <th>Activity</th>
          </tr>
        </thead>
        <tbody>
          @for( $i=0; $i < count($surat->activities); $i++ )
            @if($i == 0)
              <?php $row1 = 1; ?>
              @for( $j=0; $j < count($surat->activities)-1; $j++ )
                @if(($surat->activities[0]->selesai == $surat->activities[$j+1]->selesai) && ($surat->activities[0]->mulai == $surat->activities[$j+1]->mulai) )
                  <?php $row1++; ?>
                @else
                @endif
              @endfor
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $surat->activities[$i]->sites->sitelocation }}</td>
                <td rowspan="{{ $row1; }}">{{ Carbon::parse($surat->activities[0]->mulai)->toFormattedDateString() }} s/d {{ Carbon::parse($surat->activities[0]->selesai)->toFormattedDateString() }}</td>
                <td>{{ $surat->activities[$i]->activity }}</td>
              </tr>
            @else
              @if(($surat->activities[$i]->mulai == $surat->activities[$i-1]->mulai) && ($surat->activities[$i]->selesai == $surat->activities[$i-1]->selesai))
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $surat->activities[$i]->sites->sitelocation }}</td>
                  <td>{{ $surat->activities[$i]->activity }}</td>
                </tr>
              @else
                <?php $row2= 1;?>
                @for($k = $i+1 ; $k < count($surat->activities);$k++)
                  @if(($surat->activities[$k]->mulai == $surat->activities[$k-1]->mulai) && ($surat->activities[$k]->selesai == $surat->activities[$k-1]->selesai))
                    <?php $row2++; ?>
                  @else
                  @endif
                @endfor
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $surat->activities[$i]->sites->sitelocation }}</td>
                  <td rowspan="{{ $row2; }}">{{ Carbon::parse($surat->activities[$i]->mulai)->toFormattedDateString() }} s/d {{ Carbon::parse($surat->activities[$i]->selesai)->toFormattedDateString() }}</td>
                  <td>{{ $surat->activities[$i]->activity }}</td>
                </tr>
              @endif
            @endif
          @endfor
        </tbody>
      </table>
      </div>
      <div class="disetuju">
        <p>Demikian surat tugas ini dibuat sebagaimana mestinya.</p>
        <p>
          Palu, {{ Carbon::parse($surat->tempat_tanggal)->toFormattedDateString() }} <br>
          Hormat kami
        </p>
        <img src="{{ URL::to($surat->setuju->sign->signature_pic) }}" width="80" height="80">
        <br>
        <strong><u>{{ $surat->setuju->nama }}</u></strong><br>
        <strong>{{ $surat->setuju->jabatan }}</strong>
      </div>
  </div>
</body>
</html>
