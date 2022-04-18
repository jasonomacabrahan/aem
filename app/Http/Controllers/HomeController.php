<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $emailisverified = auth()->user()->email_verified_at ?? '';
        if($emailisverified==null)
        {
            return redirect()->route('verification.notice');
        }else{
            $url = url()->previous();
            $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
            if($route == 'newattendance') {
                return redirect($url);
            }
            return redirect()->route('dashboard.index');
        }
        //return view('home.index');
    }
    
    public function home()
    {
        return view('home.index');
    }
    public function guest($ativityid,$realid)
    {
        $id = Crypt::decryptString($ativityid);
        if(Auth::check())
        { 
            ActivityAttendanceController::newattendance($ativityid,$realid);
            return redirect()->route('attendancesuccess')
                    ->with('attendanceok', 'Event');
        }else{
            return view('activity.guestattendance',[
                                                    'id'=>$realid,
                                                    'ativityid'=>$ativityid
                                                ]);
        }
    }

    public function successattendance()
    {
        return view('home.attendancesuccess');
    }
    
    public function myTestAddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        abort_if(Gate::denies('userlogs'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $logs = \LogActivity::logActivityLists();
        return view('logActivity',compact('logs'));
    }
}
