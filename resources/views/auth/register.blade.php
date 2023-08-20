@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
      <h1>Informations de Connexion</h1>
    </div>
    <div class="card">
        <form class="form" method="post" action="{{ route('register') }}" >
            @csrf
            <input type="hidden" name="dataid" id="dataid" value="{{request()->query('dataid')}}">
            <span class="input-span">
            <label for="email" class="label np">Email</label>
            <input type="email" name="email" id="email" value="{{old('email')}}">
            <div class="error">    
                @error('email')
                    {{$message}}
                @enderror
            </div>
            </span>

            <span class="input-span">
                <label for="password" class="label np">Mot de Passe</label>
                    <input type="password" name="password" id="password" >
                    <div class="error">    
                    @error('password')
                        {{$message}}
                        @enderror
                    </div>
            </span>
            <span class="input-span">
                <label for="password_confirmation" class="label np">Retapez mdp</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
            </span>

            {{-- <span class="input-span">
                <label for="password_confirmation" class="label np">Retapez mdp</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
            </span> --}}

            
                {{-- <label for="agree" >Accepter les <a href="#">CGU</a></label>
            <input type="checkbox" id="agree" name="agree" class="ui-checkbox"> --}}
            <span class="input-span">
            <div class="form-row">
                <input type="checkbox" id="agree" name="agree" class="ui-checkbox">
                <label for="agree" class="checkbox-label">Accepter les <a href="#">CGU</a></label>
            </div>
            <div class="error">    
                @error('agree')
                    {{$message}}
                    @enderror
                </div>
            </span>
            

                    
                        <input type="submit" class="submit" value="S'inscrire" >
                          
                       

        
                    
                </form>

            
</div>
@endsection
