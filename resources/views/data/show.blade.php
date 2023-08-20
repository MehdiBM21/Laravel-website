@extends('master.layout')
@section('title','DATA INDEX')
@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8">
                  <h1>DATA INDEX</h1>
                </div>

                <div class="mt-8">
                    THIS IS THE DATA INDEX PAGE
                        <li class="result">this id: {{$data['id']}} is for {{$data['name']}} living in {{$data['city']}} - {{$data['price']}} </li>{{-- c la variable $data quo'on a retourne dans la fonction show --}}
                        <br> 
                        <center><a href="{{route('data.edit',$data['id'])}}" class="btn"> modifier</a></center>
                        <br>
                        <form action="{{route('data.destroy',$data['id'])}}" method="post">{{-- aller vers destroy() + envoyer l'id avec --}}
                            @csrf
                            @method('DELETE')
                        <center><button type="submit" value="Supprimer" class="btn"></center>
                        </form>
                </div>
</div>
@endsection