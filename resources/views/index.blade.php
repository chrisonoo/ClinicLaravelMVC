@extends('main')

@section('menu')
    @include('doctors.menu')
@endsection

@section('style')
    <link type="text/css" rel="stylesheet" href="/css/materialize.css" media="screen,projection"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l6">
                <a href="/doctors/">
                    <div class="card-panel hoverable center">
                        <h5>All doctors</h5>
                    </div>
                </a>
            </div>
            <div class="col s12 m6 l6">
                <a href="/doctors/search/">
                    <div class="card-panel hoverable center">
                        <h5>Search doctor</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

