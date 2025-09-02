@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center"> Doctor Information</h4>
                        <img src="{{ asset('images/' . $user->image) }}" width="100px" height="100px"
                             style="border-radius: 50%;object-fit: cover;">
                        <br><br><br>
                        <p class="lead">Name: {{ ucfirst($user->name) }}</p>
                        <p class="lead">Degree: {{ $user->education }}</p>
                        <p class="lead">Specialist: {{ $user->department }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <form action="" method="post">
                    @csrf

                    <div class="card">
                        <div class="card-header">{{ $date }}</div>

                        <div class="card-body">
                            <div class="row">
                                @foreach ($times as $time)
                                    <div class="col-md-3">
                                        <label for="" class="btn btn-outline-primary">
                                            <input type="radio" name="status" value="1">
                                            <span>{{ $time->time }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">Book Appointment</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
