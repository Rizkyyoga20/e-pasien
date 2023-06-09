<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Obat;
use App\Models\Resep;
use App\Models\Konsul;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

		User::create([
	    	'no_ktp' => '2329039203920039',
            'name' => 'Encuy',
            'password' => hash::make('encuy12'),
            'status_akses' => 'Admin',
	        'no_telepon' => '0837283736273',
	        'email' => 'encuy12@gmail.com',
	        'alamat' => 'Jln. Merpati putih, lrg.Alir II',
	        'usia' => '35',
	        'status' => 'Kontrak',
	        'jenis_kelamin' => 'Laki-laki'
	    ]);

	    User::create([
	    	'no_ktp' => '3987987398473984',
            'name' => 'Dr. Rani Aprilia S.Spok',
            'password' => hash::make('rani12'),
            'status_akses' => 'Dokter',
	        'no_telepon' => '0832938293829',
	        'email' => 'rani12@gmail.com',
	        'alamat' => 'Jln. Merpati putih, lrg.Alir II',
	        'usia' => '39',
	        'status' => 'Kontrak',
	        'jenis_kelamin' => 'Perempuan'
	    ]);

	    User::create([
	    	'no_ktp' => '8394839483223312',
            'name' => 'Reno Renaldi',
            'password' => hash::make('reno12'),
            'status_akses' => 'Pasien',
	        'no_telepon' => '0321838837283',
	        'email' => 'reno12@gmail.com',
	        'alamat' => 'Jln. Sultan Muhammad Mansyur',
	        'usia' => '20',
	        'status' => 'Mahasiswa',
	        'jenis_kelamin' => 'Laki-laki'
	    ]);

	    User::create([
	    	'no_ktp' => '9434300434938490',
            'name' => 'Amaral Ardila',
            'password' => hash::make('amaral12'),
            'status_akses' => 'Pasien',
	        'no_telepon' => '0832328738273',
	        'email' => 'amaral12@gmail.com',
	        'alamat' => 'Jln. Merpati putih',
	        'usia' => '35',
	        'status' => 'Pegawai pabrik',
	        'jenis_kelamin' => 'Laki-laki'
	    ]);

	    Obat::create([
            'id_obat' => 'P-001',
            'nama_obat' => 'Fikang sunag',
            'gambar_obat' => 'R7GtI2NIA733AIhMM7vUihHqb0cR8eDzEHrsoTxo.jpg',
            'stok_obat' => '100',
            'harga_obat' => '15000',
            'kategori_obat' => 'Obat Luar',
            'keterangan_obat' => 'Dijual satuan'
        ]);

	    Obat::create([
            'id_obat' => 'P-002',
            'nama_obat' => 'Amoksilin',
            'gambar_obat' => 'zbJaK0cI3yc5HKy4hZzVVGO2pjlf0mp9nrS3w8xk.png',
            'stok_obat' => '50',
            'harga_obat' => '8000',
            'kategori_obat' => 'Obat Dalam',
            'keterangan_obat' => 'Obat cuci darah, dijual tablet, satu tablet isi 10 obat'
        ]);

	    Obat::create([
            'id_obat' => 'P-003',
            'nama_obat' => 'Kapsida',
            'gambar_obat' => 'DvoQ4zbkCGUk6bIvLqEl6yXyH5IK265x0RzVwlwU.jpg',
            'stok_obat' => '30',
            'harga_obat' => '6000',
            'kategori_obat' => 'Obat Dalam',
            'keterangan_obat' => 'Obat cuci darah, dijual tablet, satu tablet isi 10 obat'
        ]);

	    Obat::create([
            'id_obat' => 'P-004',
            'nama_obat' => 'Metromen HCI',
            'gambar_obat' => 'lK4A0LvmlyQd4tJmW9wWEYO27ehHlpNn4npm1fki.jpg',
            'stok_obat' => '50',
            'harga_obat' => '5000',
            'kategori_obat' => 'Obat Dalam',
            'keterangan_obat' => 'Harga obat pertamblet, satu tamlet isi 10 obat'
        ]);

	    Resep::create([
            'id_resep' => 'k-001',
	    	'obat_id' => 'P-003',
            'konsul_id' => 'K-001',
            'keterangan_resep' => 'Obat diminum 3 X 1 Perhari'
	    ]);

	    Resep::create([
            'id_resep' => 'k-002',
	    	'obat_id' => 'P-004',
            'konsul_id' => 'K-001',
            'keterangan_resep' => 'Obat diminum 1 X 1 Perhari, bagusnya diminum sebelum tidur'
	    ]);

	    Resep::create([
            'id_resep' => 'k-003',
	    	'obat_id' => 'P-001',
            'konsul_id' => 'K-002',
            'keterangan_resep' => 'Obat dioleskan 2 X 1 Perhari, bagusnya dipoleskan ketika ingin beraktifikas dan sebelum tidur'
	    ]);

	    Resep::create([
            'id_resep' => 'k-004',
	    	'obat_id' => 'P-002',
            'konsul_id' => 'K-002',
            'keterangan_resep' => 'Obat diminum 3 X 1 Perhari'
	    ]);

	    Konsul::create([
            'id_konsul' => 'K-001',
            'no_ktp' => '8394839483223312',
            'no_antrian' => '1',
            'catatan_konsul' => 'Gejala dara tinggi, kurangai makanan yang berminyak dan yang asin-asin'
	    ]);

	    Konsul::create([
            'id_konsul' => 'K-002',
            'no_ktp' => '9434300434938490',
            'no_antrian' => '2',
            'catatan_konsul' => 'Gejala galigato, jangan makan udang dulu'
	    ]);


    }
}
