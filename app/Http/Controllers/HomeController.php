<?php

namespace App\Http\Controllers;

use App\Models\Countdown;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
        $countdown = Countdown::where('user_id', $user->id)->latest()->first();
        // dd($countdown);
        return view('home')->with([
            'countdown' => $countdown,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_timer_stop(Request $request)
    {
        $id = $request->input('selectedid');
        User::where('id', $id)->update([
            'is_appr' => 0,
        ]);
    }
}
