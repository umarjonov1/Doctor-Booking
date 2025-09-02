@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('banner/book-your-doctor-online-patient.webp') }}" class="image-fluid" alt=""
                     style="border: 1px solid #ccc;">
            </div>
            <div class="ml-5 col-md-5">
                <h2>Create an account & Book appointment</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur autem dignissimos harum magni
                    minima perferendis reiciendis tempore, unde. At distinctio dolore enim eveniet minus molestiae nam
                    non quis veritatis vitae?</p>
                <div class="mt-5">
                    <a href="{{url('/register')}}">
                        <button class="btn btn-success">Register as Patient</button>
                    </a>
                    <a href="{{url('/login')}}">
                        <button class="btn btn-secondary">Login</button>
                    </a>
                </div>
            </div>
        </div>
        <hr>

        {{--        Search Doctor--}}
        <form action="{{ url('/') }}" method="get">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        Find Doctors
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="date" class="form-control" id="datepicker">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-primary" value="Find Doctors">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{--        display doctors--}}

        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    Doctors
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Expertise</th>
                            <th>Book</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($doctors as $doctor)
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <img src="{{ asset('images/' . $doctor->doctor->image) }}"
                                         alt=""
                                         width="100px"
                                         height="100px"
                                         style="border-radius: 50%; object-fit: cover;">
                                </td>
                                <td>{{ $doctor->doctor->name}}</td>
                                <td>{{ $doctor->doctor->department}}</td>
                                <td>
                                    <a href="{{ route('create.appointment', [$doctor->user_id, $doctor->date]) }}">
                                        <button class="btn btn-success">Book Appointment</button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <td>No doctors available today</td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <style type="text/css">
        input[type="checkbox"] {
            zoom: 1.5;
        }

        body {
            font-size: 20px;
        }
    </style>
@endsection
