@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
      <h1>Informations de Connexion</h1>
    </div>
    <div class="card">
        <form class="form" method="post" action="{{ route('login') }}" >
            @csrf
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

           
            <input type="submit" class="submit" value="Se connecter" >
                          
                    <div class="flex items-center " >
                        
                        <label class="" for="remember">
                            <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                                {{ old('remember') ? 'checked' : '' }}>
                            <span >{{ __('Se souvenir de moi') }}</span>
                        </label>
                    </div>
                        @if (Route::has('password.request'))
                        <a
                            href="{{ route('password.request') }}">
                            {{ __('Mdp oublié?') }}
                        </a>
                        @endif
                    

                    <div class="flex flex-wrap">
                        

                        @if (Route::has('register'))
                        
                            {{ __("Pas de compte?") }}&nbsp;
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('data.create') }}">
                                 {{ __('S\'inscrire') }}
                            </a>
                        
                        @endif
                    </div>
                </form>

         
        </div>
</div>
    
@endsection
