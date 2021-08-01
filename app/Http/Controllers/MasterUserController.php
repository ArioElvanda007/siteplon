<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;//import model
// use App\Models\Team;
use Illuminate\Support\Facades\DB;//import SQL Builder
use Illuminate\Support\Facades\Hash;//import encrypt password
use Illuminate\Support\Facades\Validator;//import validasi data
use Laravel\Jetstream\Jetstream;//import Jetstream

class MasterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan halaman utama
    public function index()
    {
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
            $master_users = User::where('status_aktif','=',1)->orderBy('updated_at','desc')->get();

            //menampilkan data ke halaman index
            return view('Master.User.index', compact('master_users'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //simpan data
    public function store(Request $request)//mengambil request dari halaman home
    {
        $master_user = User::create([
            'name' => $request['name_user'],
            'email' => $request['email_user'],
            'no_telp' => $request['no_telp'],
            'password' => Hash::make($request['password_user']),
            'status_aktif' => 1,//default aktif
            'id_profile' => 1//default
        ]);

        // $team_user = Team::create([
        //     'user_id' => $master_user->id,
        //     'name' => explode(' ', $master_user->name, 2)[0]."'s Team",
        //     'personal_team' => true
        // ]);

        // $update_user=User::whereId($master_user->id)->first();//mengambil data dari articles yang ada dimodel Article berdasarkan id
        // $update_user->update([//execute update data
        //     'current_team_id' => $team_user->id//update field category_id dari request category dari page
        // ]);
        
        return back();//kembali ke link sebelumnya
    }

    //     /**
    //  * Create a personal team for the user.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @return void
    //  */
    // protected function createTeam(User $user)
    // {
    //     $user->ownedTeams()->save(Team::forceCreate([
    //         'user_id' => $user->id,
    //         'name' => explode(' ', $user->name, 2)[0]."'s Team",
    //         'personal_team' => true,
    //     ]));
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
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
        $update_data=User::whereId($request->id)->first();//mengambil data berdasarkan id yg direquest
        $update_data->update([//execute update data
            'name' => $request->name_user,
            'email' => $request->email_user,
        ]);

        return redirect('/master/user');//kembali ke link home
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //hapus data
    public function destroy(Request $request)
    // public function destroy($id)
    {
        $update_data=User::whereId($request->id)->first();//mengambil data dari request
        $update_data->update([//execute update data
            'status_aktif' => 0
        ]);

        return back();//kembali ke link sebelumnya

    } 
}
