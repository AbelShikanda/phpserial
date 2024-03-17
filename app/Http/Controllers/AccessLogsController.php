<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Notifications;
use App\Models\AccessLogs;
use App\Models\User;
use DB;

class AccessLogsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $logs = AccessLogs::where('user_id', $user->id)
        ->first()
        ->orderBy('created_at', 'desc')
        ->get();
        $user_name = User::find($user->id)->name;
        // dd($user_name);
        return view('logs')->with([
            'logs' => $logs,
            'user_name' => $user_name,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $comando = $request->input('signal_id');
        // dd($comando);
        ////////////////////////////////////////
        // if ($comando == 'Lock') {
        //     $command = 'l';
        // }elseif ($comando == 'Unlock') {
        //     $command = 'd';
        // }
        ///////////////////////////////////////
        // $fp = fopen('COM4', 'w+');
        // if ($fp === false) {
        //     die('Failed to open serial port.');
        // }
        // $bytes_written = fwrite($fp, $command);
        // if ($bytes_written === false) {
        //     fclose($fp);
        //     die('Failed to write to serial port.');
        // }
        // fclose($fp);
        ///////////////////////////////////////
        $comand = $request->validate([
            'signal_id' => 'required'
        ]);
        // dd($comand);
        try {
            DB::beginTransaction();
            
            $comand = AccessLogs::create([
                'user_id' => $user->id,
                'action' => $comando,
            ]);

            //only if the locks are touched between 00:00HRS and 06:00HRS
            // Notifications::create([
            //     'user_id' => $product->id,
            //     'subject' => $product->categories_id,
            //     'message' => $product->categories_id,
            //     'status' => $product->categories_id,
            // ]);


            if(!$comand){
                DB::rollBack();

                return back()->with('error', 'check data');
            }

            DB::commit();
            return redirect()->route('home')->with('message',  $comando . ' success');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
