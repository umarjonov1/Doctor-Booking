<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Time;
use Illuminate\Http\Request;
use Carbon\Carbon;
class AppointmentController extends Controller
{

    public function index()
    {
        $myAppointments = Appointment::where('user_id', auth()->user()->id)->get();

        return view('admin.appointment.index', compact('myAppointments'));
    }


    public function create()
    {

        return view('admin.appointment.create');
    }


    public function store(Request $request)
    {
        $this->validateStore($request);

        $appointment = Appointment::create([
            'user_id' => auth()->user()->id,
            'date' => Carbon::parse($request->date)->toDateString(),
        ]);

        foreach ($request->time as $time) {
            Time::create([
                'appointment_id' => $appointment->id,
                'time' => $time,
//                'status' => '0'
            ]);
        }
        return redirect()->back()->with('message', 'Appointment created for ' . $request->date);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateStore($request)
    {
        $this->validate($request, [
            'date' => 'required|date',
        ]);
    }

    public function check(Request $request)
    {
        $date = Carbon::parse($request->date)->toDateString();
        $appointment = Appointment::where('date', $date)->where('user_id', auth()->user()->id)->first();

        if (!$appointment) {
            return redirect()->to('/appointment')->with('errmessage', 'Appointment time not available for this date');
        }

        $appointmentId = $appointment->id;
        $times = Time::where('appointment_id', $appointmentId)->get();
        return view('admin.appointment.index', compact('times', 'appointmentId', 'date'));
    }

    public function updateTime(Request $request)
    {
                $appointmentId = $request->appointmentId;
            $appointment = Time::where('appointment_id', $appointmentId)->delete();

        foreach ($request->time as $time) {
            Time::create([
                    'appointment_id' => $appointmentId,
                'time' => $time,
                'status' => 0,
            ]);
        }
        return redirect()->route('appointment.index')->with('message', 'Appointment time updated!');

    }
}
