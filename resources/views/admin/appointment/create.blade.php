@extends('admin.layout.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>appointment time</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Appointment</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('appointment.store') }}" method="post">
            @csrf

            <div class="card">
                <div class="card-header">
                    Choose date
                </div>
                <div class="card-body">
                    <input type="text" class="form-control datetimepicker-input @error('date') is-invalid @enderror" id="datepicker"
                           data-toggle="datetimepicker" data-target="#datepicker" name="date">
                    @error('date')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Choose AM time
                    <span style="margin-left: 700px">Check/Uncheck
                    <input type="checkbox"
                           onclick="for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked">
                </span>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><input type="checkbox" name="time[]" value="6am">6:00am</td>
                            <td><input type="checkbox" name="time[]" value="6.20am">6:20am</td>
                            <td><input type="checkbox" name="time[]" value="6.40am">6:40am</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><input type="checkbox" name="time[]" value="7am">7:00am</td>
                            <td><input type="checkbox" name="time[]" value="7.20am">7:20am</td>
                            <td><input type="checkbox" name="time[]" value="7.40am">7:40am</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><input type="checkbox" name="time[]" value="8am">8:00am</td>
                            <td><input type="checkbox" name="time[]" value="8.20am">8:20am</td>
                            <td><input type="checkbox" name="time[]" value="8.40am">8:40am</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td><input type="checkbox" name="time[]" value="9am">9:00am</td>
                            <td><input type="checkbox" name="time[]" value="9.20am">9:20am</td>
                            <td><input type="checkbox" name="time[]" value="9.40am">9:40am</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td><input type="checkbox" name="time[]" value="10am">10:00am</td>
                            <td><input type="checkbox" name="time[]" value="10.20am">10:20am</td>
                            <td><input type="checkbox" name="time[]" value="10.40am">10:40am</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td><input type="checkbox" name="time[]" value="11am">11:00am</td>
                            <td><input type="checkbox" name="time[]" value="11.20am">11:20am</td>
                            <td><input type="checkbox" name="time[]" value="11.40am">11:40am</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Choose PM time
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th scope="row">7</th>
                            <td><input type="checkbox" name="time[]" value="12pm">12:00am</td>
                            <td><input type="checkbox" name="time[]" value="12.20pm">12:20am</td>
                            <td><input type="checkbox" name="time[]" value="12.40pm">12:40am</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td><input type="checkbox" name="time[]" value="1pm">1:00am</td>
                            <td><input type="checkbox" name="time[]" value="1.20pm">1:20am</td>
                            <td><input type="checkbox" name="time[]" value="1.40pm">1:40am</td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td><input type="checkbox" name="time[]" value="2pm">2:00am</td>
                            <td><input type="checkbox" name="time[]" value="2.20pm">2:20am</td>
                            <td><input type="checkbox" name="time[]" value="2.40pm">2:40am</td>
                        </tr>
                        <tr>
                            <th scope="row">10</th>
                            <td><input type="checkbox" name="time[]" value="3pm">3:00am</td>
                            <td><input type="checkbox" name="time[]" value="3.20pm">3:20am</td>
                            <td><input type="checkbox" name="time[]" value="3.40pm">3:40am</td>
                        </tr>
                        <tr>
                            <th scope="row">11</th>
                            <td><input type="checkbox" name="time[]" value="4pm">4:00am</td>
                            <td><input type="checkbox" name="time[]" value="4.20pm">4:20am</td>
                            <td><input type="checkbox" name="time[]" value="4.40pm">4:40am</td>
                        </tr>
                        <tr>
                            <th scope="row">12</th>
                            <td><input type="checkbox" name="time[]" value="5pm">5:00am</td>
                            <td><input type="checkbox" name="time[]" value="5.20pm">5:20am</td>
                            <td><input type="checkbox" name="time[]" value="5.40pm">5:40am</td>
                        </tr>
                        <th scope="row">13</th>
                        <td><input type="checkbox" name="time[]" value="6pm">6:00pm</td>
                        <td><input type="checkbox" name="time[]" value="6.20pm">6:20pm</td>
                        <td><input type="checkbox" name="time[]" value="6.40pm">6:40pm</td>
                        </tr>
                        <tr>
                            <th scope="row">14</th>
                            <td><input type="checkbox" name="time[]" value="7pm">7:00pm</td>
                            <td><input type="checkbox" name="time[]" value="7.20pm">7:20pm</td>
                            <td><input type="checkbox" name="time[]" value="7.40pm">7:40pm</td>
                        </tr>
                        <tr>
                            <th scope="row">15</th>
                            <td><input type="checkbox" name="time[]" value="8pm">8:00pm</td>
                            <td><input type="checkbox" name="time[]" value="8.20pm">8:20pm</td>
                            <td><input type="checkbox" name="time[]" value="8.40pm">8:40pm</td>
                        </tr>
                        <tr>
                            <th scope="row">16</th>
                            <td><input type="checkbox" name="time[]" value="9pm">9:00pm</td>
                            <td><input type="checkbox" name="time[]" value="9.20pm">9:20pm</td>
                            <td><input type="checkbox" name="time[]" value="9.40pm">9:40pm</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">
                        Confirm
                    </button>
                </div>
            </div>
        </form>
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
