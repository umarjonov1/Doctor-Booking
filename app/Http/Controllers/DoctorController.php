<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        $users = User::get();
        return view('admin.doctor.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.doctor.create');
    }


    public function store(Request $request)
    {
        $this->valideteStore($request);
        $data = $request->all();

        $name = (new User)->userAvatar($request);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with('message', 'Doctor added successfully');

    }


    public function show(User $doctor)
    {

        return view('admin.doctor.delete', compact('doctor'));
    }


    public function edit(User $doctor)
    {
        return view('admin.doctor.edit', compact('doctor'));
    }


    public function update(Request $request, User $doctor)
    {
        $this->validateUpdate($request, $doctor->id);
        $data = $request->all();
        $imageName = $doctor->image;
        $doctorPassword = $doctor->password;

        if ($request->has('image')) {
            if (!empty($doctor->image) && file_exists(public_path('images/' . $doctor->image))) {
                unlink(public_path('images/' . $doctor->image));
            }
            $imageName = (new User)->userAvatar($request);
            $data['image'] = $imageName;
        }

        if ($doctor->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $doctorPassword;
        }
        $doctor->update($data);

        return redirect()->route('doctor.index')->with('message', 'Doctor updated successfully');
    }


    public function destroy(User $doctor)
    {
        if (auth()->user() && (auth()->user()->id == $doctor->id)) {
            abort(401);
        }
        if (!empty($doctor->image) && file_exists(public_path('images/' . $doctor->image))) {
            unlink(public_path('images/' . $doctor->image));
        }

        $doctor->delete();

        return redirect()->route('doctor.index')->with('message', 'Doctor deleted successfully');
    }

    private function valideteStore($request)
    {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:25',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,jpg',
            'role_id' => 'required',
            'description' => 'required',
        ]);
    }

    private function validateUpdate($request, $id)
    {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'mimes:jpeg,png,jpg',
            'role_id' => 'required',
            'description' => 'required',
        ]);
    }
}

