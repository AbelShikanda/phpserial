<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Countdown;
use App\Models\Notifications;
use App\Models\User;

use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        foreach ($users as $user) {
            // Fetch the latest countdown for the current user
            $countdown = Countdown::where('user_id', $user->id)->latest()->first();

            // Attach the latest countdown value to the user model
            $user->latestCountdown = $countdown;
        }
        // dd($countdown);
        return view('admin.admin.index')->with([
            'users' => $users,
            'countdown' => $countdown,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.admin.create')->with([
            'users' => $users,
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
        $id = $request->input('name');

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);

        try {
            DB::beginTransaction();

            // Logic For Save User Data
            $clt_details = Countdown::create([
                'user_id' => $request->input('name'),
                'price' => $request->input('price'),
                'countdown' => $request->input('date'),
            ]);
            // dd($clt_details);

            User::where('id', $id)->update([
                'is_appr' => !empty($request->status) ? 1 : 0,
            ]);

            if (!$clt_details) {
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('dashboard.index')->with('success', 'User Stored Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->get();
        // $countdown = Countdown::where('user_id', $id)->first()->get();
        $countdown = Countdown::where('user_id', $id)->first();

        if ($countdown) {
            // Countdown object exists, you can call get() method safely
            $countdownData = $countdown->get();
        } else {
            // Countdown object is null, handle this case appropriately
            $countdownData = [];
        }
        // dd($user);
        // dd($countdown);
        return view('admin.admin.show')->with([
            'user' => $user,
            'countdown' => $countdownData,
        ]);
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
