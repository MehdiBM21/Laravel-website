@extends('layouts.app')
@section('title','CREATE DATA TABLE')
@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8">
                  <h1>Inscription</h1>
                </div>

                
    <div class="card">
                <form class="form" method="post" action="{{route('data.store')}}" >
                    @csrf
                    
                    <div class="input-container">
                    <span class="input-span">
                    <label for="nom" class="label np">Nom</label>
                    <input type="text" name="nom" id="nom" value="{{old('nom')}}">
                    <div class="error">    
                    @error('nom')
                        {{$message}}
                        @enderror
                    </div>
                    </span>

                    <span class="input-span">
                        <label for="prenom" class="label np">Prénom</label>
                            <input type="text" name="prenom" id="prenom" value="{{old('prenom')}}">
                            <div class="error">    
                            @error('prenom')
                                {{$message}}
                                @enderror
                            </div>
                    </span>
                    </div>
                    <span class="input-span">
                        <label for="cin" class="label">CIN</label>
                            <input type="text" name="cin" id="cin" value="{{old('cin')}}">
                            <div class="error">    
                            @error('cin')
                                {{$message}}
                                @enderror
                            </div>
                    </span>
                    <span class="input-span">
                        <label for="naissance" class="label">Date de naissance</label>
                            <input type="date" name="date_de_naissance" id="date_de_naissance" value="{{old('date_de_naissance')}}">
                            <div class="error">    
                            @error('date_de_naissance')
                                {{$message}}
                                @enderror
                            </div>
                    </span>
                    <span class="input-span">
                        <label for="telephone" class="label">Téléphone (+212)</label>
                            <input type="tel" name="telephone" id="telephone" value="{{old('telephone')}}" placeholder="6XXXXXXXX">
                            <div class="error">    
                            @error('telephone')
                                {{$message}}
                                @enderror
                            </div>
                    </span>
                    
                    <input class="submit" type="submit" value="Suivant">
                    
                </form>
                <br>
                <center>Vous avez déjà un compte? <a href="{{route('login')}}" >Connectez-vous</a></center>
        </div>
</div>
@endsection