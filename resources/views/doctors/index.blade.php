@extends('main' , ['title'=>'👩‍⚕️ Doctors'])

@section('menu')
    @include('doctors.menu')
@endsection

@section('style')
    <link type="text/css" rel="stylesheet" href="/css/materialize.css" media="screen,projection"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach($doctors as $doctor)
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{$doctor->photo}}" alt="doctor">
                        </div>
                        <div class="card-content">
                            <span class="card-title">Dr {{$doctor->name}} {{$doctor->surname}}</span>
                            <h6 class="blue-text">{!!$doctor->specialization!!}</h6>
                            <p>{!!$doctor->description!!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
