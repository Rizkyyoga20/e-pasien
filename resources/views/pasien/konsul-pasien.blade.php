@extends('route-tamplate')
@section('title', 'Klinik Bersama')
@section('container')

	<h3>Konsul Pasien</h3>

<a href="{{ url('/pasien') }}" class="btn btn-primary" style="float:right;"><< Pasien</a><br><br>

   @foreach( $pasien as $p)
     <p class="text-success"> Data pasien atas nama <b>{{ $p->name }}</b> dengan No. KTP. <b>{{ $p->no_ktp }}</b>, Usia. <b>{{ $p->usia }}</b>, pekerjaan. <b>{{ $p->status }}</b>, kontak. email : <b>{{ $p->email }}</b> | nomor telepon. <b>{{ $p->no_telepon }} </b>, alamat. <b>{{ $p->alamat}}</b>, created at. <b>{{ $p->created_at }}</b></p>



   @endforeach

   @foreach( $konsul as $k)

        <div class="card border-success mb-3 link-success">
          <div class="card-header bg-transparent border-success">
            <b> ID Konsul : </b> {{ $k->id_konsul }} 
          </div>
          <div class="card-body text-success">
            <p class="card-text">
                <b> Catatan : </b> <br> {{ $k->catatan_konsul }} <br>
                <b> Created at : </b><br> {{ $k->created_at }} <br>
            </p>
          </div>
 

          <div class="card-footer bg-transparent border-success" style="text-align:right;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $k->id }}" style="float:right;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-up-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M9.636 13.5a.5.5 0 0 1-.5.5H2.5A1.5 1.5 0 0 1 1 12.5v-10A1.5 1.5 0 0 1 2.5 1h10A1.5 1.5 0 0 1 14 2.5v6.636a.5.5 0 0 1-1 0V2.5a.5.5 0 0 0-.5-.5h-10a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h6.636a.5.5 0 0 1 .5.5z"/>
                      <path fill-rule="evenodd" d="M5 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H6.707l8.147 8.146a.5.5 0 0 1-.708.708L6 6.707V10.5a.5.5 0 0 1-1 0v-5z"/>
                    </svg> Resep
                </button>
         </div>

    </div><br>




       <!-- Modal -->
        <div class="modal fade" id="staticBackdrop{{ $k->id; }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Konsul</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                    <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
                  </svg>      
                </button>
              </div>
              <div class="modal-body">
                <b> ID Konsul : </b> <br> {{ $k->id_konsul }} <br>
                <b> Catatan : </b> <br> {{ $k->catatan_konsul }} <br>
                <b> Created at : </b><br> {{ $k->created_at }} <br>     
              </div>
                  <p style="padding:0px 15px; margin:0px;"><b>Resep Pasien :</b></p>
                  <div class="modal-footer"></div>                   
                   @foreach( $resep as $r)
                   
                     @if($r->konsul_id == $k->id_konsul)
                     <p style="padding:0px 10px;">  
                      @foreach( $obats as $o)
                     @if($r->obat_id == $o->id_obat)
                      <img src="{{ asset('storage/' . $o->gambar_obat)}}" style="height:200px; width:100%; margin:0px; padding:0px;"> 
                      <b>Nama Obat :</b> <br>  {{ $o->nama_obat }} <br> 
                      <b>Harga Obat :</b> <br>  {{ $o->harga_obat }} <br> 
                      <b>Keterangan Obat :</b> <br>  {{ $o->kategori_obat }} | {{ $o->keterangan_obat }} <br> 
                    @else 
                    @endif
                     @endforeach
                         <b>Keterangan Resep : </b> <br> {{ $r->keterangan_resep }}
                         <div class="modal-footer"></div>
                         </p>
                     @else 
                     @endif
                    
                    
                   @endforeach
            </div>
          </div>
        </div>
        <!-- akhir dari model----->







    @endforeach









@endsection