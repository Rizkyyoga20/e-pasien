<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="text/css" href="{{ asset('icon/logo-kelinik-bersama.jpg')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <title>@yield('title', 'klinik Bersama')</title>
  </head>

<script type="text/javascript">
  function isNumber(evt)
    {
      var charCode = (evt.width) ? evt.width : event.keyCode
      if(charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
      return true;
    }
</script>

<style type="text/css">
    ::-webkit-scrollbar {
        width:5px;
        background:#fff;
        -webkit-border-radius:0px;
        border-radius:10px;
        overflow-x:hidden; 
    }

    ::-webkit-scrollbar-thumb {
        background:#1E90FF;
        -webkit-border-radius:0px;
        border-radius:10px;
    }


    ::placeholder {
        color: #000;
        opacity: 1; /* Firefox */
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: #000;
    }

    ::-ms-input-placeholder { /* Microsoft Edge */
        color: #000;
    }
</style>


  <body class="bg-success" style="--bs-bg-opacity: .25;">

  <div class="p-3">
  <a href="{{ url('/dashboard') }}" class="btn btn-primary" style="float:right;"><< Dashboard</a><br><br>

    @foreach( $pasiens as $pasien)


        <div class="card border-success mb-3 link-success">
          <div class="card-header bg-transparent border-success"><b>No. KTP : {{ $pasien->no_ktp; }}</b></div>
          <div class="card-body text-success">
            <p class="card-text">
                      <b> No. KTP : </b> <br> {{ $pasien->no_ktp; }} <br>
                      <b> Nama Akun : </b> <br> {{ $pasien->name; }} <br>
                      <b> Status Akses : </b> <br> {{ $pasien->status_akses; }} <br>
                      <b> Jenis Kelamin : </b> <br> {{ $pasien->jenis_kelamin; }} <br>
                      <b> Nomor Telepon : </b> <br> {{ $pasien->no_telepon; }} <br>
                      <b> Alamat : </b> <br> {{ $pasien->alamat; }} <br>
                      <b> Usia : </b> <br> {{ $pasien->usia; }} Tahun<br>
                      <b> Email : </b> <br> {{ $pasien->email; }} <br>
                      <b> Pekerjaan : </b> <br> {{ $pasien->status; }} <br>
                      <b> Tanggal Terdaftaar : </b> <br> {{ $pasien->created_at }} <br>
            </p>
          </div>
          <div class="card-footer bg-transparent border-success" style="text-align:left;">
          <b>Daftar Konsul Pasien</b><br><br>


                  @foreach( $konsuls as $konsul)

                  @if($konsul->no_ktp == $pasien->no_ktp)
                    <b>No. Antrian :</b> <br>  {{ $konsul->no_antrian }}<br>
                    <b>Catatan konsul :</b> <br>  {{ $konsul->catatan_konsul }}<br>
                    @foreach( $reseps as $resep)
                   
                     @if($resep->konsul_id == $konsul->id_konsul)
                      
                      @foreach( $obats as $obat)
                     @if($resep->obat_id == $obat->id_obat)
                      <img src="{{ asset('obats/' . $obat->gambar_obat)}}" style="height:150px; width:150px; margin:0px; padding:0px;"><br><br>
                      <b>Nama Obat :</b> <br>  {{ $obat->nama_obat }} <br> 
                      <b>Harga Obat :</b> <br>  {{ $obat->harga_obat }} <br> 
                      <b>Keterangan Obat :</b> <br>  {{ $obat->kategori_obat }} | {{ $obat->keterangan_obat }} <br> 
                    @else 
                    @endif
                     @endforeach
                         <b>Keterangan Resep : </b> <br> {{ $resep->keterangan_resep }}
                         <div class="modal-footer"></div>
                        
                     @else 
                     @endif

                    
                    
                   @endforeach

                     @else 
                     @endif


                   @endforeach
        </div>
    </div>

    @endforeach

</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>