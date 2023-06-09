@extends('route-tamplate')
@section('title', 'Klinik Bersama')
@section('container')




	<h3>Resep Pasien</h3>

    @if(session('berhasil'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('berhasil') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

@foreach( $pasien as $p)
  @if($p->no_ktp == $konsul->no_ktp)
     <p class="text-success"> 
      Data pasien atas nama <b> {{ $p->name }} </b> 
      dengan No. KTP. <b>{{ $p->no_ktp }} </b>, Usia. <b>{{ $p->usia }}</b>, 
      pekerjaan. <b> {{ $p->status }} </b>, 
      kontak. email : <b> {{ $p->email }} </b> | nomor telepon. <b> {{ $p->no_telepon }} </b>,
      alamat. <b> {{ $p->alamat}} </b>, 
      created at. <b> {{ $p->created_at }}</b><br><br> 
      <b>Catatan Konsul Pasien : </b> {{ $konsul->catatan_konsul }} 

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-konsul" style="font-size: 12px; padding:1px 3px; border-radius:0px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-up-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M9.636 13.5a.5.5 0 0 1-.5.5H2.5A1.5 1.5 0 0 1 1 12.5v-10A1.5 1.5 0 0 1 2.5 1h10A1.5 1.5 0 0 1 14 2.5v6.636a.5.5 0 0 1-1 0V2.5a.5.5 0 0 0-.5-.5h-10a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h6.636a.5.5 0 0 1 .5.5z"/>
              <path fill-rule="evenodd" d="M5 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H6.707l8.147 8.146a.5.5 0 0 1-.708.708L6 6.707V10.5a.5.5 0 0 1-1 0v-5z"/>
            </svg> Konsul
        </button>
      
      <br>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#info" style="width:auto;">Obat Pasien</button>

      <a href="{{ url('/pasien') }}" style="text-decoration:none;">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
          << Pasien   
        </button>
      </a>



     </p>
  @endif
@endforeach







<style type="text/css">
	body{
		box-sizing:border-box;
		overflow-x:hidden;
	}
	#isi{
		height:100px;
		overflow-y:scroll;
	}
</style>



  <input type="text" class="form-control" id="myDataa" onkeyup="ListData()" placeholder="Search Obat">



<div id="myData" style="margin-top:10px;">
<div class="row">
@foreach( $obats as $obat)
<data class="col-sm-4 mb-2">

    <div class="card sm-3">
      <div class="card-body">
        <h5 class="card-title">
          <img src="{{ asset('obats/' . $obat->gambar_obat)}}" width="100%" height="150px"> 
        </h5>
        <hr class="dropdown-divider">
        <div id="isi">

          <p class="card-text">
              <b> ID Obat : </b> <br> {{ $obat->id_obat; }} <br>
                  <b> Nama Obat : </b> <br> {{ $obat->nama_obat; }} <br>
                  <b> Stok Obat : </b> <br> {{ $obat->stok_obat; }} <br>
                  <b> Harga : </b> <br> {{ $obat->harga_obat; }} <br>
                  <b> Kategori Obat : </b> <br> {{ $obat->kategori_obat; }} <br>
                  <b> Keterangan Obat : </b> <br> {{ $obat->keterangan_obat; }} <br><br>
          </p>
        </div>
        <hr class="dropdown-divider">

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $obat->id_obat; }}" style="float:right;">Pilih Obat</button>

      </div>
    </div>

</data>


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop{{ $obat->id_obat; }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST" action="{{ url('pasien/save_resep') }}">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Buat keterangan resep</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                    <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
                  </svg>      
                </button>
              </div>

                @csrf

                <input type="hidden" name="obat_id" value="{{ $obat->id_obat }}">
                <input type="hidden" name="konsul_id" value="{{ $konsul->id_konsul }}">

                <div class="p-3">

                  <div class="form-floating mb-2">
                    <textarea name="keterangan_resep" class="form-control @error('keterangan_resep') is-invalid @enderror" placeholder="Keterangan Resep" value="{{ old('keterangan_resep') }}">{{ old('keterangan_resep') }}</textarea> 
                    <label for="floatingInput">Keterangan Resep</label>
                    @error('keterangan_resep')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror

                </div>

              </div>
              

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" style="float:right;">
                    Save
                  </button>        
                </div>

            </form>
            </div>
          </div>
        </div>
        <!-- akhir dari model----->


@endforeach
</div>
</div>


       <!-- Modal -->
        <div class="modal fade" id="info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">List Resep Pasien</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                    <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
                  </svg>      
                </button>
              </div>


                    @foreach( $resep as $r)
                    @if($r->konsul_id == $konsul->id_konsul)

                      @foreach( $obats as $obat)
                      @if($obat->id_obat == $r->obat_id)
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">
                            <img src="{{ asset('obats/' . $obat->gambar_obat)}}" width="100%" height="150px"> 
                          </h5>

                            <p class="card-text">
                                <b> ID Obat : </b> <br> {{ $obat->id_obat; }} <br>
                                    <b> Nama Obat : </b> <br> {{ $obat->nama_obat; }} <br>
                                    <b> Harga : </b> <br> {{ $obat->harga_obat; }} <br>
                                    <b> Kategori Obat : </b> <br> {{ $obat->kategori_obat; }} <br>
                                    <b> Keterangan Obat : </b> <br> {{ $obat->keterangan_obat; }}<br>
                                    <b>Note : </b> <br> {{ $r->keterangan_resep }}


                                    <form method="POST" action="{{ url('/pasien/delete_resep',$r->id ) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal" style="margin-left:2px;" onclick="return confirm('Are you sure..??');">
                                          <a href="" style="color:#fff;">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                              </svg>
                                          </a>
                                        </button>
                                    </form>


                            </p>

                            
                          </div>
                        </div>

                      @endif
                      @endforeach


                    @endif
                  @endforeach

            

            </div>
          </div>
        </div>

        <!-- akhir dari model----->


      <!-- Modal -->
        <div class="modal fade" id="edit-konsul" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST" action="{{ url('pasien/edit_konsul', $konsul->id) }}">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Catatan Konsul Pasien</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                    <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
                  </svg>      
                </button>
              </div>

                @csrf
                @method('PUT')

                <div class="p-3">

                  <div class="form-floating mb-2">
                    <textarea name="catatan_konsul" class="form-control @error('catatan_konsul') is-invalid @enderror" placeholder="Catatan Konsul" value="{{ old('catatan_konsul') }}">{{ $konsul->catatan_konsul }}</textarea> 
                    <label for="floatingInput">Catatan Konsul</label>
                    @error('catatan_konsul')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror

                </div>

              </div>
              

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" style="float:right;">
                    Save
                  </button>        
                </div>

            </form>
            </div>
          </div>
        </div>
        <!-- akhir dari model----->

</div>

<script type="text/javascript">
  function ListData() {
    let input, filter, div, data, p, i;
    input = document.getElementById("myDataa");
    filter = input.value.toUpperCase();
    div = document.getElementById("myData");
    data = div.getElementsByTagName("data");
    for (i = 0; i < data.length; i++) {
      p = data[i].getElementsByTagName("p")[0];
      if (p.innerHTML.toUpperCase().indexOf(filter) > -1) {
        data[i].style.display = "";
      } else {
        data[i].style.display = "none";
      }
    }
  }
</script>





@endsection