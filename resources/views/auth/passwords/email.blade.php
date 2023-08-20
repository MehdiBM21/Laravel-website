@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">

            @if (session('status'))
            <div class="text-sm text-green-700 bg-green-100 px-5 py-6 sm:rounded sm:border sm:border-green-400 sm:mb-6"
                role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="flex justify-center pt-8">
                <h1>Modifier le Mot De Passe</h1>
              </div>
            <section class="card" style="background-color: #21264A ">
                

                <form class="form" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="">
                        <label for="email" class="label np">Email</label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap justify-center items-center space-y-6 pb-6 sm:pb-10 sm:space-y-0 sm:justify-between">
                        <button type="submit"
                        class="submit">
                            {{ __('Envoyer le lien de réinitialisation du MDP') }}
                        </button>
                        
                    </div>
                            <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                                {{ __('Retourner à la page de connexion') }}
                            </a>
                        
                    
                </form>
            </section>
        </div>
    </div>
</main>
@endsection
