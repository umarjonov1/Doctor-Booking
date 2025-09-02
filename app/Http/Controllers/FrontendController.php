<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Time;
use App\User;
class FrontendController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Tashkent');
        $doctors = Appointment::where('date', date('Y-m-d'))->get();
        if (request('date')) {
            $doctors = $this->findDoctorBasedOnDate(request('date'));
            return view('welcome', compact('doctors'));
        }

        return view('welcome', compact('doctors'));
    }

    public function show($doctorId, $date)
    {
        $appointment = Appointment::where('user_id', $doctorId)->where('date', $date)->first();
        $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
        $user = User::where('id', $doctorId)->first();
        return view('appointment', compact('times', 'date', 'user'));
    }

    public function findDoctorBasedOnDate($date)
    {
        $doctors = Appointment::where('date', $date)->get();

        return $doctors;
    }
}
