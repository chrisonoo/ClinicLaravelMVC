@extends('main' , ['title'=>'👩‍⚕️ Search doctors'])

@section('menu')
    @include('doctors.menu')
@endsection

@section('style')
    <link type="text/css" rel="stylesheet" href="/css/materialize.css" media="screen,projection"/>
@endsection

@section('content')
    <div class="container">
        <div class="row" style="margin: 20px 0 40px">
            <form class="col s12" action="{{ route('search') }}" method="GET">
                <div class="input-field col s12 center-align">
                    <input required name="search" placeholder="Placeholder" id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="col s12 center-align">
                    <button class="btn blue waves-effect waves-light valign-wrapper" type="submit">Search
                        <i class="material-icons right">search</i>
                    </button>
                    <a href="/doctors/search/" class="btn blue waves-effect waves-light valign-wrapper">Reset
                        <i class="material-icons right">clear</i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    @if($doctors->isNotEmpty())
        <div class="container">
            <div class="row">
                @foreach($doctors as $doctor)
                    <div class="col s12 m4">
                        <div class="card hoverable">
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
    @else
        <div>
            <h2>No posts found</h2>
        </div>
    @endif
@endsection
