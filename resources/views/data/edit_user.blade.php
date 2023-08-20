@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
      <h1>Modifier les données</h1>
    </div>
    <div class="card">
        <form class="form" method="post" action="{{ route('account.update', $user->id) }}" >
            @csrf
            @method('PUT')
            <span class="input-span">
            <label for="email" class="label np">Email</label>
            <input type="email" name="email" id="email" value="{{$user->email}}">
            <div class="error">
            @error('email')
                {{$message}}
                @enderror
            </div>
            </span>
            <span class="input-span">
                <label for="old_password" class="label np">MDP actuel</label>
                    <input type="password" name="old_password" id="old_password" >
                    <div class="error">    
                    @error('old_password')
                        {{$message}}
                        @enderror
                    </div>
            </span>

            <span class="input-span">
                <label for="password" class="label np">Nouveau MDP</label>
                    <input type="password" name="password" id="password" >
                    <div class="error">    
                    @error('password')
                        {{$message}}
                        @enderror
                    </div>
            </span>
            <span class="input-span">
                <label for="password_confirmation" class="label np">Retapez MDP</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
            </span>

            {{-- <span class="input-span">
                <label for="password_confirmation" class="label np">Retapez mdp</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
            </span> --}}

            
                {{-- <label for="agree" >Accepter les <a href="#">CGU</a></label>
            <input type="checkbox" id="agree" name="agree" class="ui-checkbox"> --}}
                    
                        <input type="submit" class="submit" value="Modifier" >
                        
                        <center><a class="text-blue-500 hover:text-blue-700 no-underline btn" href="{{ route('home.info') }}">
                            {{ __('Annuler') }}
                        </a></center>

                </form>

            
</div>
@endsection
