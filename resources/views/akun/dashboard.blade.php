@extends('route-tamplate')
@section('title', 'Klinik Bersmam')
@section('container')

<center>
  <img src="{{ asset('icon/dashboard.gif')}}" width="300px"> 
  <h5>User Login</h5>
  <h5>{{ auth()->user()->name }} | {{ auth()->user()->status_akses }} </h5>  
</center>
 

	@if(session('berhasil'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ session('berhasil') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif


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

<div class="row">

  @if (auth()->user()->status_akses == "Admin") 
  
  <div class="col-sm-4 mb-1">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pegawai</h5>
        <hr class="dropdown-divider">
        <div id="isi">
        	<p class="card-text">Pegawai merupakan staff yang bertugas dalam sebuah instansi, dalam instansi ini terdapat pegawai yang bertugas yaitu admin dan dokter.</p>
        </div>
        <hr class="dropdown-divider">
        <a href="{{ url('/akun') }}" class="btn btn-primary">Pegawai</a>
      </div>
    </div>
  </div>

  <div class="col-sm-4 mb-1">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Obat</h5>
        <hr class="dropdown-divider">
        <div id="isi">
        	<p class="card-text">Obat merupakan halaman yang harus di kelola oleh admin instansi, contohnya seperti melakukan entri data resep yang di dapat pasien seteleh konsul dengan dokter, melakukan entri data obat masuk, mengelola stok obat yang ada.</p>
        </div>
        <hr class="dropdown-divider">
        <a href="{{ url('/obat') }}" class="btn btn-primary">Obat</a>
      </div>
    </div>
  </div>

  <div class="col-sm-4 mb-1">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pasien</h5>
        <hr class="dropdown-divider">
        <div id="isi">
          <p class="card-text">From konsul merupakan hasil konsul dari pasien, yang di daftarkan oleh admin dan akan diisi oleh dokter. calon pasien wajib lapor ke admin.</p>
        </div>
        <hr class="dropdown-divider">
        <a href="{{ url('/pasien') }}" class="btn btn-primary">Pasien</a>
      </div>
    </div>
  </div>

  @elseif(auth()->user()->status_akses == "Dokter") 

  <div class="col-sm-4 mb-1">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Daftar Obat</h5>
        <hr class="dropdown-divider">
        <div id="isi">
          <p class="card-text">Daftar oabt merupakan data obat yang ada pada kelinik.</p>
        </div>
        <hr class="dropdown-divider">
        <a href="{{ url('/obat') }}" class="btn btn-primary">Obat</a>
      </div>
    </div>
  </div>

  <div class="col-sm-4 mb-1">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Daftar Pasien</h5>
        <hr class="dropdown-divider">
        <div id="isi">
          <p class="card-text">Daftar pasien merupakan data pasien yang berobat baik dengan doktor terkait atau keseluruan.</p>
        </div>
        <hr class="dropdown-divider">
        <a href="{{ url('/pasien') }}" class="btn btn-primary">Pasien</a>
      </div>
    </div>
  </div>

  <div class="col-sm-4 mb-1">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Laporan</h5>
        <hr class="dropdown-divider">
        <div id="isi">
          <p class="card-text">Laporan merupakan rekap laporan yang berupa data dan grafik, yang terkait tantang pasien, obat.</p>
        </div>
        <hr class="dropdown-divider">
        <a href="{{ url('/laporan') }}" class="btn btn-primary">Laporan</a>
      </div>
    </div>
  </div>

  @elseif(auth()->user()->status_akses == "Pasien")

  <div class="col-sm-4 mb-1">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Konsul</h5>
        <hr class="dropdown-divider">
        <div id="isi">
          <p class="card-text">Konsul merupakan infomasi yang harus yang didapatkan oleh pasien setelah berobat.</p>
        </div>
        <hr class="dropdown-divider">
        <a href="{{ url('/pasien/info_konsul') }}" class="btn btn-primary">Info Konsul</a>
      </div>
    </div>
  </div>

  @endif


  <div class="col-sm-4 mb-1">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">SOP</h5>
        <hr class="dropdown-divider">
        <div id="isi">
          <p class="card-text">SOP (Standar Oprasional Prosedur) merupakan sebuah panduan yang bertujuan memastikan pekerjaan dan kegiatan operasional organisasi atau perusahaan berjalan dengan lancar.</p>
        </div>
        <hr class="dropdown-divider">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sop">Info SOP</a>
      </div>
    </div>
  </div>


</div>

      <!-- Modal -->
        <div class="modal fade" id="sop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">SOP Aplikasi</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                    <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
                  </svg>      
                </button>
              </div>
              <div class="modal-body">

                  <p>SOP (Standar Oprasional Prosedur) merupakan sebuah panduan yang bertujuan memastikan pekerjaan dan kegiatan operasional organisasi atau perusahaan berjalan dengan lancar. Adapun SOP pada kelinik bersama ini adalah sebagai berikut ;</p>

                  <img src="{{ asset('icon/sistem-layanan-pasien.jpg')}}" width="100%">

                  <p>Pada gambar di atas di jelaskan bahwa sistem ini berjalan diawali dari seorang pasien yang melakukan pendaftaran di klinik bersama ke admin, dimana setiap pasien yang baru datang harus di data dan memberikan informasi sakit yang di derita, lalu mendapatkan nomor antrian, setelah nomor antrian di panggil pasien baru bisa konsul dengan dokter yang telah terdata oleh admin, setelah melakukan konsul dokter melakukan pencatatan data obat, resep dan informasi konsul setelah itu selesai.</p>

                  <h3>Fungsi dan tugas</h3>
                  <h4>Pasien</h4>
                  <ul>
                    <li>Melapor ke admin yang bertugas.</li>
                    <li>Melihat data resep dan hasil konsul.</li>
                  </ul>
                  <h4>Admin</h4>
                  <ul>
                    <li>kelola data pasien (dari melakukan pencatatan keluhan konsul pasien, pengambilan nomor antrian serta melakukan input, update dan delete data pasien).</li>
                    <li>kelola data Akun (dari melakukan input, update dan delete data akun dokter dan admin baru).</li>
                    <li>kelola data obat (dari melakukan input, update dan delete data obat).</li>
                    <li>Meyiapkan resep pasien dari hasil konsul pasien dan mengelola data stok obat yang ada.</li>
                  </ul>
                  <h4>Dokter</h4>
                  <ul>
                    <li>Melakukan pencatatan data konsul</li>
                    <li>mengelola resep pasien (dari memilih obat dan memberi resep pasien dan memberikan catatan konsul pasien).</li>
                    <li>Mengecek obat data obat yang ada.</li>
                    <li>Melihat laporan hasil konsul pasien.</li>
                  </ul>
                                    

              </div>

              <div class="modal-footer">
                <h5 style="width:100%; text-align:center;">~ Klinik Bersama ~</h5>
              </div>


            </div>
          </div>
        </div>
        <!-- akhir dari model----->

@endsection