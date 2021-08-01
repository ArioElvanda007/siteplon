<?php

namespace App\Http\Controllers;

use App\Models\Data_Rating;//import model
use App\Models\Data_Comment;//import model
use App\Models\Master_Profile;//import model
use Illuminate\Support\Facades\DB;//import SQL Builder

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_comments=Data_Comment::where('id_rental', $request->id_rental);//mengambil data berdasarkan id yg direquest
        $user_comments->update([//execute update data
            'status_read' => 1,//0 adalah belum dibaca, 1 adalah sudah dibaca
        ]);

        $admin_comments = Data_Comment::create([
            'id_rental' => $request['id_rental'],
            'nama' => $request['nama'],
            'email' => $request['email'],
            'comment' => $request['comment'],
            'status_comment' => 1,//0 adalah user, 1 adalah admin
            'status_read' => 1,//0 adalah belum dibaca, 1 adalah sudah dibaca
        ]);

        return back();//kembali ke link sebelumnya
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->status_aktif == 1) {
            // SELECT AVG(jml_rating) AS AveragePrice FROM data_ratings where id_rental = 5
            $data_ratingusers = Data_Rating::where('id_rental',$id)->first();
            $data_ratingavgs = DB::select(DB::raw(
                "select ifnull(AVG(jml_rating),0) AS rate FROM data_ratings where id_rental = '$id'"
                ))[0];
            $data_comments = Data_Comment::where('id_rental',$id)->orderby('created_at','desc')->get();
            $master_profiles = Master_Profile::all()->first();
            $master_rentals = DB::select(DB::raw(
                "select id, nama_rental, nomor_telp, kota, alamat, email, website, map_lokasi, gambar, ifnull((select count(id) from data_likes where id_rental = master_rentals.id),0) as jml_like from master_rentals where id = '$id'"
                ))[0];

            // dd($master_rentals);
            return view('Master.Rental.Comment.Comment.Index',compact('data_ratingavgs','data_ratingusers','data_comments','master_rentals','master_profiles'));//menampilkan halaman index user
        } else {
            return view('Dashboard.blank');//menampilkan ke halaman blokir user
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
