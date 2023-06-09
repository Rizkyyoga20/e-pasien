<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Konsul;
use App\Models\Obat;
use App\Models\User;
use App\Models\Resep;



class ClassPasien extends Controller
{


    public function pasien()
    {
        $konsuls = Konsul::all();
        $pasien = "Pasien"; 
        $pasiens = User::all()->where('status_akses',$pasien);
        return view('pasien.pasien',compact(['pasiens','konsuls']));
    }

    public function konsull()
    {   

        $pasien = "Pasien"; 
        $pasiens = User::all()->where('status_akses',$pasien);

        return view('pasien.konsul',compact(['pasiens']));
    }

    public function laporan()
    {   
        $p = "Pasien";
        $pasiens = User::all()->where('status_akses',$p);
        $konsuls = Konsul::all();
        $reseps = Resep::all();
        $obats = Obat::all();
        return view('pasien.laporan',compact(['pasiens','konsuls','reseps','obats']));
    }

    public function epasien()
    {
        return view('pasien.entri-pasien');
    }

    public function add_akun()
    {
        return view('pasien.add-akun');
    }

    public function save(Request $request)
    {

        $status_akses = "Pasien";

        $data = $request->validate([
            'no_ktp' => 'required',
            'password' => 'required',
            'name' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'usia' => 'required',
            'status' => 'required',
            'jenis_kelamin' => 'required',
            'status_akses' => '$status_akses',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect('pasien')->with('berhasil', 'Data pasian berhasil ditambah');
    }

    public function edit($id)
    {
        $pasiens = User::find($id);
        return view('pasien.edit-pasien',compact(['pasiens']));
    }

    public function update(Request $request,$id)
    {  

        $status_akses = "Pasien";

        $data = $request->validate([
            'name' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'usia' => 'required',
            'status' => 'required',
            'jenis_kelamin' => 'required',
            'status_akses' => '$status_akses',
        ]);

            $pasiens = User::find($id);
            $pasiens->update($data);
            return redirect('pasien')->with('berhasil', 'Data pasian berhasil update');
    }


    public function del(Request $request,$id)
    {
        $pasiens = User::find($id);
        $pasiens->delete($request->all());
        return redirect('pasien')->with('berhasil', 'Data pasian berhasil hapus');
    }


    public function list_konsul($id)
    {   
        $kon = Konsul::find($id);

        if($kon == ""){
            return redirect('pasien')->with('berhasil', 'List data konsul belum dibuat..!!');
        }

        $konsul = Konsul::all()->where('no_ktp',$kon->no_ktp);  
        $resep =  Resep::all();  
        $pasien = User::all()->where('no_ktp',$kon->no_ktp);  
        $obats = Obat::all();  

        return view('pasien.konsul-pasien', compact(['konsul','pasien','obats','resep'])); 

    }

    public function konsul($id)
    {   

        $pasien = User::find($id);    
        return view('pasien.add-konsul', compact(['pasien']));
    
    }

    public function edit_konsul(Request $request,$id)
    {


        $data = $request->validate([
            'catatan_konsul' => 'required',
        ]);


        $konsul = konsul::find($id);
        $konsul->update($data);
        return back()->with('berhasil', 'Berhasil update data konsul');
    }

    public function delete_resep(Request $request,$id)
    {
        $resep = resep::find($id);
        $resep->delete($request->all());
        return back()->with('berhasil', 'Data resep berhasil di hapus');
    }

    public function info_konsul()
    {   
        $pasiens = User::all();
        $konsuls = Konsul::all();
        $reseps = Resep::all();
        $obats = Obat::all();
        return view('pasien.info-konsul',compact(['pasiens','konsuls','reseps','obats']));
    }



    public function add_konsul(Request $request)
    {   
        $data = $request->validate([
            'id_pasien' => 'required',
            'no_antrian' => 'required',
            'catatan' => 'required',
        ]);


        $id = konsul::all()->max('id_konsul'); 
        $noUrut = (int) substr($id, 3, 3);
        $noUrut++;
        $k = 'K-';
        $id_konsul = $k . sprintf("%03s",$noUrut);

        $d = 
        ([
            'id_konsul' => $id_konsul, 
            'no_ktp' => $request->id_pasien, 
            'no_antrian' => $request->no_antrian, 
            'catatan_konsul' => $request->catatan, 
        ]);

        Konsul::create($d);
        return redirect('pasien')->with('berhasil', 'Data konsul pasian berhasil ditambah');
    }

    public function buat_resep($id)
    {   
        $konsul = Konsul::find($id);
        $resep = Resep::all();
        $pasien = User::all();
        $obats = Obat::all();
        return view('pasien.resep', compact(['obats','konsul','resep','pasien']));
    }

    public function simpan_resep(Request $request)
    {   
     
        $id = Resep::all()->max('id_resep'); 
        $noUrut = (int) substr($id, 3, 3);
        $noUrut++;
        $r = 'R-';
        $id_resep = $r . sprintf("%03s",$noUrut);

        $data = $request->validate([
            'obat_id' => 'required',
            'konsul_id' => 'required',
            'keterangan_resep' => 'required',
        ]);

        $d = ([
            'id_resep' => $id_resep,
            'obat_id' => $request->obat_id,
            'konsul_id' => $request->konsul_id,
            'keterangan_resep' => $request->keterangan_resep,
        ]);        


        Resep::create($d);
        return back()->with('berhasil', 'Data resep pasien berhasil disimpan');
    }



}