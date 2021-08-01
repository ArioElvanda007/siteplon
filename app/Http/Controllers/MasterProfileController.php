<?php

namespace App\Http\Controllers;

use App\Models\Master_Profile;
use Illuminate\Http\Request;

class MasterProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
            $master_profiles = Master_Profile::all()->first();
            // dd($master_companys);

            if ($master_profiles == null) {
                // dd("create");
                //menampilkan data ke halaman create
                return view('Master.Profile.Create.index', compact('master_profiles'));
            } else {
                // dd("edit");
                //menampilkan data ke halaman create
                return view('Master.Profile.Edit.index', compact('master_profiles'));
            }
        }else{
            return view('Dashboard.blank');//menampilkan ke halaman blokir user
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //simpan gambar baru
        if ($request->gambar != null) {//tambahkan apabila upload gambar
            //contoh single image
            $nm = $request->gambar;
            $namafile = time().rand(100,999).".".$nm->getClientOriginalExtension();

            // jika simpan ke folder public
            $nm->move(public_path().'/img', $namafile);
            // jika simpan ke folder storage
            // $request->filename_img->storeAs('img', $nm);
        } else {//jika tidak upload gambar maka insert dengan fie default no image.png
            $namafile = "no image.png";
        }

        $master_profiles = Master_Profile::create([
            'title' => $request['title'],
            'deskripsi_1' => $request['deskripsi_1'],
            'deskripsi_2' => $request['deskripsi_2'],
            'copyright' => $request['copyright'],
            'nomor_telp' => $request['nomor_telp'],
            'email' => $request['email'],
            'alamat' => $request['alamat'],
            'map_lokasi' => $request['map_lokasi'],
            'gambar' => $namafile,
        ]);

        return redirect('/profile/edit');//kembali ke link home
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
            $master_profiles = Master_Profile::all()->first();

            if ($master_profiles == null) {
                //menampilkan data ke halaman create
                return view('Master.Profile.Create.index', compact('master_profiles'));
            } else {
                //menampilkan data ke halaman create
                return view('Master.Profile.Edit.index', compact('master_profiles'));
            }
        }else{
            return view('Dashboard.blank');//menampilkan ke halaman blokir user
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //update data
    public function update(Request $request)
    {
        // dd($request->gambar);
       //simpan gambar baru
       if ($request->gambar != null) {//tambahkan apabila upload gambar
            //contoh single image
            $nm = $request->gambar;
            $namafile = time().rand(100,999).".".$nm->getClientOriginalExtension();

            // jika simpan ke folder public
            $nm->move(public_path().'/img', $namafile);
            // jika simpan ke folder storage
            // $request->filename_img->storeAs('img', $nm);

            //hapus gambar lama
            $hapus = Master_Profile::findorfail($request->id);
            if ($hapus->gambar != "no image.png") {//hapus image selain file no image.png
                $file = public_path('/img/').$hapus->gambar;
                if(file_exists($file)){
                    @unlink($file);
                }
            }
        } else {//jika tidak upload gambar maka ambil gambar sebelumnya
            $namafile = $request->id_gambar;
        }

        $update_data=Master_Profile::whereId($request->id)->first();//mengambil data berdasarkan id yg direquest
        $update_data->update([//execute update data
            'title' => $request->title,
            'deskripsi_1' => $request->deskripsi_1,
            'deskripsi_2' => $request->deskripsi_2,
            'copyright' => $request->copyright,
            'nomor_telp' => $request->nomor_telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'map_lokasi' => $request->map_lokasi,
            'gambar' =>  $namafile,
        ]);

        return redirect('/profile/edit');//kembali ke link home
    }
}
