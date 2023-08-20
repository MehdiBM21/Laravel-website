@extends('layouts.app')
{{-- Voir title dans le fichier layout.blade.php --}}
@section('title','Contact')
{{-- le nom du contenu qui est dans section est 'content' --}}
@section('content')
{{-- Le  contenu qui va remplacer le @yield('content') --}}
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8">
                  <h1>Bienvenue</h1>
                </div>

                <div class="mt-8">
                    <center>Vous êtes connecté</center>
            </div>
        </div>
@endsection