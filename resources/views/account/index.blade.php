@extends('master.layout')
@section('title','DATA INDEX')
@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8">
                  <h1>DATA INDEX</h1>
                </div>

                <div class="mt-8">
                    THIS IS THE DATA INDEX PAGE
                    {{-- $data est l'array qu'on a retourne dans la fonction index --}}
                   ID: {{$dataid}}
            </div>
        </div>
@endsection