<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Notifications;
use App\Models\AccessLogs;
use App\Models\User;

use DateTime;
// use DB;

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
        $selectedDate = $request->input('date');
        
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

            ////////////////////////////////////////////////////////////
            // Convert the selected date to a DateTime object
            $dateTime = new DateTime($selectedDate);

            // Extract the time component from the DateTime object
            $hour = $dateTime->format('H');
            $minute = $dateTime->format('i');

            // Check if the time is between midnight (00:00) and 6 AM (06:00)
            if ($hour >= 00 && $hour < 06) {
                Notifications::create([
                    'user_id' => $user->id,
                    'subject' => 'Alert',
                    'message' => 'your door was accessed at past midnight',
                    'status' => 1,
                ]);
            }
            ///////////////////////////////////////////////////////////


            if (!$comand) {
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
