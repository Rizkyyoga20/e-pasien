@extends('route-tamplate')
@section('title', 'Klinik Bersama')
@section('container')

<h3>SOP</h3> 

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

@endsection