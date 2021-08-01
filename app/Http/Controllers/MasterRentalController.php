<?php

namespace App\Http\Controllers;

use App\Models\Master_Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterRentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
            $master_rentals = Master_Rental::orderBy('updated_at','desc')->get();

            return view('Master.Rental.Home.index', compact('master_rentals'));
        }else{
            return view('Dashboard.blank');//menampilkan ke halaman blokir user
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
            $kotas = DB::select(DB::raw(
                "select 'Bekasi' as kota union all select 'Jakarta' as kota"
            ));

            // dd($kotas);

            return view('Master.Rental.Create.index', compact('kotas'));
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
        if ($request->best_checkbox == '1') {
            $best_checkbox = '1';//tidak promo
        }else{
            $best_checkbox = '0';//promo
        }

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

        $master_rentals = Master_Rental::create([
            'nama_rental' => $request['nama_rental'],
            'nomor_telp' => $request['nomor_telp'],
            'kota' => $request['kota'],
            'alamat' => $request['alamat'],
            'email' => $request['email'],
            'website' => $request['website'],
            'map_lokasi' => $request['map_lokasi'],
            'gambar' => $namafile,
            'status_best' => $best_checkbox,
        ]);

        return redirect('/master/rental');//kembali ke link home
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master_Rental  $master_Rental
     * @return \Illuminate\Http\Response
     */
    public function show(Master_Rental $master_Rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
            $kotas = DB::select(DB::raw(
                "select 'Bekasi' as kota union all select 'Jakarta' as kota"
            ));

            $master_rentals = Master_Rental::whereId($id)->first();

            return view('Master.Rental.Edit.index', compact('master_rentals','kotas'));
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
        if ($request->best_checkbox == '1') {
            $best_checkbox = '1';//tidak promo
        }else{
            $best_checkbox = '0';//promo
        }

        // dd($best_checkbox);

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
            $hapus = Master_Rental::findorfail($request->id);
            if ($hapus->gambar != "no image.png") {//hapus image selain file no image.png
                $file = public_path('/img/').$hapus->gambar;
                if(file_exists($file)){
                    @unlink($file);
                }
            }
        } else {//jika tidak upload gambar maka ambil gambar sebelumnya
            $namafile = $request->id_gambar;
        }

        $update_data=Master_Rental::whereId($request->id)->first();//mengambil data berdasarkan id yg direquest
        $update_data->update([//execute update data
            'nama_rental' => $request->nama_rental,
            'nomor_telp' => $request->nomor_telp,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'email' => $request->email,
            'website' => $request->website,
            'map_lokasi' => $request->map_lokasi,
            'gambar' =>  $namafile,
            'status_best' => $best_checkbox,
        ]);

        return redirect('/master/rental');//kembali ke link home
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //hapus data
    public function destroy(Request $request)
    {
        //hapus gambar lama
        $hapus = Master_Rental::findorfail($request->id);
        if ($hapus->gambar != "no image.png") {//hapus image selain file no image.png
            $file = public_path('/img/').$hapus->gambar;
            if(file_exists($file)){
                @unlink($file);
            }
        }

        Master_Rental::whereId($request->id)->delete();//execute delete data
        return back();//kembali ke link sebelumnya
    }
}
