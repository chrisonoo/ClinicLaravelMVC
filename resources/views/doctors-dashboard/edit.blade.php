@section('style')
    <link type="text/css" rel="stylesheet" href="/css/materialize.css" media="screen,projection"/>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit doctor\'s data') }}
        </h2>
    </x-slot>

    <div class="container" style="margin-top: 30px">
        <div class="row">
            <form class="col s12" method="post" action="/dashboard/doctors/update/{{$doctor->id}}">
                @csrf
                <div class="col s6">
                    <div class="input-field col s12">
                        <input id="name" type="text" name="name" value="{{$doctor->name}}" class="validate validator-required">
                        <label for="name">Name</label>
                        <span class="helper-text" id="name-helper"></span>
                    </div>
                    <div class="input-field col s12">
                        <input id="surname" type="text" name="surname" value="{{$doctor->surname}}" class="validate validator-required">
                        <label for="surname">Surname</label>
                        <span class="helper-text" id="surname-helper"></span>
                    </div>
                    <div class="input-field col s12">
                        <input id="specialization" type="text" name="specialization" value="{{$doctor->specialization}}" class="validate validator-required">
                        <label for="specialization">Specialization</label>
                        <span class="helper-text" id="specialization-helper"></span>
                    </div>
                </div>
                <div class="col s6 align-right">
                    <img src="{{$doctor->photo}}" alt="doctor" style="border: 1px solid lightgray; margin: auto">
                </div>
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea validate validator-required" name="description">{{$doctor->description}}</textarea>
                    <label for="textarea1">Description (max. 128 characters)</label>
                    <span class="helper-text" id="textarea1-helper"></span>
                </div>
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="submit">Save 💾
                    </button>
                </div>
                @if ($errors->any())
                    <div class="col s 12 alert alert-danger" style="margin-top: 20px; color:red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-app-layout>
