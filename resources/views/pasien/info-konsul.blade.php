@extends('route-tamplate')
@section('title', 'Klinik Bersama')
@section('container')

	<h3>Konsul Pasien</h3>

 
     @foreach( $pasiens as $pasien)
     @if(auth()->user()->no_ktp == "$pasien->no_ktp")

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

    @endif
    @endforeach








@endsection