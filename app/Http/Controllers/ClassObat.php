<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Obat;


class ClassObat extends Controller
{
    public function obat()
    {
        $obats = Obat::all();
        return view('obat.index',compact(['obats']));
    }

    public function tambah()
    {
        return view('obat.tambah');
    }

    public function simpan(Request $request)
    {
        $data = $request->validate([
            'nama_obat' => 'required',
            'gambar_obat' => 'required|image|file|max:1024',
            'stok_obat' => 'required',
            'harga_obat' => 'required',
            'kategori_obat' => 'required',
            'keterangan_obat' => 'required',
        ]);       

        $id = Obat::all()->max('id_obat'); 
        $noUrut = (int) substr($id, 3, 3);
        $noUrut++;
        $p = 'P-';
        $id_obat = $p . sprintf("%03s",$noUrut);




        $list = ([ 
            'id_obat' => $id_obat, 
            'nama_obat' => $request->nama_obat,
            'gambar_obat' => $request->file('gambar_obat'),
            'stok_obat' => $request->stok_obat,
            'harga_obat' => $request->harga_obat,
            'kategori_obat' => $request->kategori_obat,
            'keterangan_obat' => $request->keterangan_obat,
        ]);


        $list['gambar_obat'] = time().'.'.$request->gambar_obat->getClientOriginalExtension();
        $request->gambar_obat->move(public_path('obats'), $list['gambar_obat']);  


        Obat::create($list);
        return redirect('obat')->with('berhasil', 'Data obat berhasil ditambah');
    }

    public function edit($id)
    {   
        $obats = Obat::find($id);
        return view('obat.edit',compact(['obats']));
    }

    public function edit_img($id)
    {   
        $obats = Obat::find($id);
        return view('obat.edit-gambar',compact(['obats']));
    }


    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'nama_obat' => 'required',
            'stok_obat' => 'required',
            'harga_obat' => 'required',
            'kategori_obat' => 'required',
            'keterangan_obat' => 'required',
        ]);

        $obats = Obat::find($id);
        $obats->update($data);
        return redirect('obat')->with('berhasil', 'Data obat berhasil update');
    }

    public function update_img(Request $request,$id)
    {
        
        $data = $request->validate([
                'gambar_obat' => 'required|image|file|max:1024',
        ]);

        \File::delete('obats/'.$request->old_gambar);

        $data['gambar_obat'] = time().'.'.$request->gambar_obat->getClientOriginalExtension();
        $request->gambar_obat->move(public_path('obats'), $data['gambar_obat']);  


        $obats = Obat::find($id);
        $obats->update($data);
        return redirect('obat')->with('berhasil', 'Gambar obat berhasil diupdate');

    }


    public function delete(Request $request,$id)
    {
        \File::delete('obats/'.$request->old_gambar);
        $obats = Obat::find($id);
        $obats->delete($request->all());
        return redirect('obat')->with('berhasil', 'Data obat berhasil di hapus');
    }
}
