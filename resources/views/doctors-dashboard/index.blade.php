@section('style')
    <link type="text/css" rel="stylesheet" href="/css/materialize.css" media="screen,projection"/>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage doctors') }}
        </h2>
    </x-slot>

    <div class="container" style="margin-top: 30px">
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
                        <div class="card-action">
                            <a href="{{url()->current()}}/edit/{{$doctor->id}}" class="btn-floating btn-small waves-effect waves-teal">
                                ✏️️
                            </a>
                            <a href="{{url()->current()}}/delete/{{$doctor->id}}" class="btn-floating btn-small waves-effect waves-teal red">
                                ❌
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
