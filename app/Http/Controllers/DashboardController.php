<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_Rating;//import model
use App\Models\Data_Comment;//import model
use App\Models\Data_Like;//import model
use App\Models\Master_Rental;//import model
use App\Models\Master_Profile;//import model
use Illuminate\Support\Facades\DB;//import SQL Builder
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;//panggil validator untuk validasi data
// use Illuminate\Support\Facades\Route;
// use willvincent\Rateable\Rateable;
// use Jorenvh\Share\ShareFacade;

class DashboardController extends Controller
{
    //membuat function setiap halaman yang ingin ditampilkan
    public function index(){
        if (auth()->user() == null) {
            $snCode = env('APP_KEY');
            $master_profiles = Master_Profile::all()->first();
            $master_rentals = DB::select(DB::raw(
                "select id, nama_rental, nomor_telp, kota, alamat, email, website, map_lokasi, gambar,
                ifnull((select count(id) from data_likes where id_rental = master_rentals.id),0) as jml_like,
                ifnull((select AVG(jml_rating) from data_ratings where id_rental = master_rentals.id),0) as jml_rating,
                ifnull((select count(id) from data_comments where id_rental = master_rentals.id),0) as jml_comment,
                ifnull((select id_rental from data_likes where id_rental = master_rentals.id and id_serial = '$snCode'),0) as status_rate
                from master_rentals where status_best = 1"
            ));

            return view('dashboard',compact('master_rentals','master_profiles'));//menampilkan halaman index user
        } else {
            if (auth()->user()->status_aktif == 1) {//menampilkan halaman admin
                $data_statistics = DB::select(DB::raw(
                    "select
                    ifnull((select count(id) from data_comments where status_comment = 0 and status_read = 0),0) as jml_comment,
                    ifnull((select count(id) from data_likes),0) as jml_like,
                    ifnull((select AVG(jml_rating) from data_ratings),0) as jml_rating"
                ))[0];

                $data_bests = DB::select(DB::raw(
                    "select b.id, b.nama_rental, b.email, b.gambar, b.jml_comment, b.jml_like, b.jml_rating from
                    (select a.id, a.nama_rental, a.email, a.gambar,
                    ifnull((select count(id) from data_comments where status_comment = 0 and id_rental = a.id),0) as jml_comment,
                    ifnull((select count(id) from data_likes where id_rental = a.id),0) as jml_like,
                    ifnull((select AVG(jml_rating) from data_ratings where id_rental = a.id),0) as jml_rating
                     from
                    (select id, nama_rental, email, gambar from master_rentals) as a) as b order by b.jml_rating desc, b.jml_like desc, b.jml_comment desc limit 3"
                ));

                $master_rentals = DB::select(DB::raw(
                    "select b.id, b.nama_rental, b.nomor_telp, b.kota, b.alamat, b.email, b.website, b.gambar, b.status_best, b.jml_comment, b.jml_like, b.jml_rating, b.status_new from
                    (select a.id, a.nama_rental, a.nomor_telp, a.kota, a.alamat, a.email, a.website, a.gambar, a.status_best,
                    ifnull((select count(id) from data_comments where status_comment = 0 and id_rental = a.id),0) as jml_comment,
                    ifnull((select count(id) from data_likes where id_rental = a.id),0) as jml_like,
                    ifnull((select AVG(jml_rating) from data_ratings where id_rental = a.id),0) as jml_rating,
                    ifnull((select id from data_comments where id_rental = a.id and status_read = 0 limit 1
                    ),0) as status_new
                     from
                    (select id, nama_rental, nomor_telp, kota, alamat, email, website, gambar, status_best from master_rentals) as a) as b order by b.status_new desc, b.jml_rating desc, b.jml_like desc, b.jml_comment desc"
                ));

                return view('Dashboard.index', compact('master_rentals','data_bests','data_statistics'));//menampilkan halaman index admin
                } else {
                return view('Dashboard.blank');//menampilkan ke halaman blokir user
            }
        }
    }

    public function bekasi(){
        // $master_rentals = Master_Rental::where(['kota' => 'bekasi',
        // 'status_best' => '1'])->get();
        // $master_rentallists = Master_Rental::where('kota','bekasi')->get();
        // $master_profiles = Master_Profile::all()->first();
        // return view('Dashboard-Bekasi.dashboard',compact('master_rentals','master_rentallists','master_profiles'));//menampilkan halaman index

        $snCode = env('APP_KEY');
        $master_profiles = Master_Profile::all()->first();
        $master_rentals = DB::select(DB::raw(
            "select id, nama_rental, nomor_telp, kota, alamat, email, website, map_lokasi, gambar,
            ifnull((select count(id) from data_likes where id_rental = master_rentals.id),0) as jml_like,
            ifnull((select AVG(jml_rating) from data_ratings where id_rental = master_rentals.id),0) as jml_rating,
            ifnull((select count(id) from data_comments where id_rental = master_rentals.id),0) as jml_comment,
            ifnull((select id_rental from data_likes where id_rental = master_rentals.id and id_serial = '$snCode'),0) as status_rate
            from master_rentals where status_best = 1 and kota = 'Bekasi'"
        ));
        $master_rentallists = DB::select(DB::raw(
            "select id, nama_rental, nomor_telp, kota, alamat, email, website, map_lokasi, gambar,
            ifnull((select count(id) from data_likes where id_rental = master_rentals.id),0) as jml_like,
            ifnull((select AVG(jml_rating) from data_ratings where id_rental = master_rentals.id),0) as jml_rating,
            ifnull((select count(id) from data_comments where id_rental = master_rentals.id),0) as jml_comment,
            ifnull((select id_rental from data_likes where id_rental = master_rentals.id and id_serial = '$snCode'),0) as status_rate
            from master_rentals where kota = 'Bekasi'"
        ));

        return view('Dashboard-Bekasi.dashboard',compact('master_rentals','master_rentallists','master_profiles'));//menampilkan halaman index user
    }

    public function jakarta(){
        // $master_rentals = Master_Rental::where(['kota' => 'jakarta',
        // 'status_best' => '1'])->get();
        // $master_rentallists = Master_Rental::where('kota','jakarta')->get();
        // $master_profiles = Master_Profile::all()->first();
        // return view('Dashboard-Jakarta.dashboard',compact('master_rentals','master_rentallists','master_profiles'));//menampilkan halaman index

        $snCode = env('APP_KEY');
        $master_profiles = Master_Profile::all()->first();
        $master_rentals = DB::select(DB::raw(
            "select id, nama_rental, nomor_telp, kota, alamat, email, website, map_lokasi, gambar,
            ifnull((select count(id) from data_likes where id_rental = master_rentals.id),0) as jml_like,
            ifnull((select AVG(jml_rating) from data_ratings where id_rental = master_rentals.id),0) as jml_rating,
            ifnull((select count(id) from data_comments where id_rental = master_rentals.id),0) as jml_comment,
            ifnull((select id_rental from data_likes where id_rental = master_rentals.id and id_serial = '$snCode'),0) as status_rate
            from master_rentals where status_best = 1 and kota = 'Jakarta'"
        ));
        $master_rentallists = DB::select(DB::raw(
            "select id, nama_rental, nomor_telp, kota, alamat, email, website, map_lokasi, gambar,
            ifnull((select count(id) from data_likes where id_rental = master_rentals.id),0) as jml_like,
            ifnull((select AVG(jml_rating) from data_ratings where id_rental = master_rentals.id),0) as jml_rating,
            ifnull((select count(id) from data_comments where id_rental = master_rentals.id),0) as jml_comment,
            ifnull((select id_rental from data_likes where id_rental = master_rentals.id and id_serial = '$snCode'),0) as status_rate
            from master_rentals where kota = 'Jakarta'"
        ));

        return view('Dashboard-Jakarta.dashboard',compact('master_rentals','master_rentallists','master_profiles'));//menampilkan halaman index user
    }

    public function profile($id)
    {
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
        return view('profile-rental',compact('data_ratingavgs','data_ratingusers','data_comments','master_rentals','master_profiles'));//menampilkan halaman index user
    }

    public function store_likeBestAll($id)
    {
        $snCode = env('APP_KEY');
        $data_likes = Data_Like::where(['id_rental' => $id,
        'id_serial' => $snCode])->first();
        if ($data_likes == null) {
            $data = array(
                'id_rental'      => $id,
                'id_serial'      => $snCode,
                'created_at'        => \Carbon\carbon::now(),//simpan created_at dari waktu saat ini
                'updated_at'        => \Carbon\carbon::now()//simpan updated_at dari waktu saat ini
            );
            // dd($data);
            $insertData = Data_Like::insert($data);//execute simpan data dari variable/array $product ke table orderproduct yang ada di model OrderProduct
        }

        return back();
    }

    public function store_comment(Request $request)//mengambil request dari halaman home
    {
        $data_comments = Data_Comment::create([
            'id_rental' => $request['id_rental'],
            'nama' => $request['nama'],
            'email' => $request['email'],
            'comment' => $request['comment'],
            'status_comment' => 0,//0 adalah user, 1 adalah admin
            'status_read' => 0,//0 adalah belum dibaca, 1 adalah sudah dibaca
        ]);

        return back();//kembali ke link sebelumnya
    }

    public function store_rating(Request $request)
    {
        $snCode = env('APP_KEY');
        $data_ratings = Data_Rating::where(['id_rental' => $request->id_rental,
        'id_serial' => $snCode])->first();
        if ($data_ratings == null) {
            $data = array(
                'id_rental'      => $request->id_rental,
                'id_serial'      => $snCode,
                'jml_rating'      => $request->rate,
                'created_at'        => \Carbon\carbon::now(),//simpan created_at dari waktu saat ini
                'updated_at'        => \Carbon\carbon::now()//simpan updated_at dari waktu saat ini
            );
            // dd($data);
            $insertData = Data_Rating::insert($data);//execute simpan data dari variable/array $product ke table orderproduct yang ada di model OrderProduct
        }

        return back();
    }

}
