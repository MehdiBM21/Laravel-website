@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
           

                <div class="flex justify-center pt-8">
                    <h1>Confirmer MDP</h1>
                  </div>
                  <section class="card">
                <form class="form" method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <p class="leading-normal text-gray-500">
                        {{ __('Confirmer votre MDP avant de continuer.') }}
                    </p>
                   
                    <div class="">
                        <label for="password" class="label np">Mot de Passe</label>

                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required autocomplete="new-password">

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap justify-center items-center space-y-6 pb-6 sm:pb-10 sm:space-y-0 sm:justify-between">
                        <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:w-auto sm:px-4 sm:order-1">
                            {{ __('Confirmer le MDP') }}
                        </button>
                    </div>
                        @if (Route::has('password.request'))
                        <a class="mt-4 text-xs text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline sm:text-sm sm:order-0 sm:m-0"
                            href="{{ route('password.request') }}">
                            {{ __('MDP oublié?') }}
                        </a>
                        @endif
                    
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
