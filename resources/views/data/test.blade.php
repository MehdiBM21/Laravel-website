@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    
    <div class="flex">
        
        <div class="w-full">
            
            @if (session('resent'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100  px-3 py-4 mb-4"
                role="alert">
                {{ __('Un nouveau lien de verification a été envoyé à votre adresse email.') }}
            </div>
            @endif
            <center><img src="{{url('images/checkmark.png')}}" style="max-width: 100px;"></center>
            <section class="flex flex-col break-words  sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Vérifiez votre adresse email') }}
                </header>

                <div class="w-full flex flex-wrap text-gray-700 leading-normal text-sm p-6 space-y-4 sm:text-base sm:space-y-6">
                    <p>
                        {{ __('Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification. ') }}
                    </p>

                    <p>
                        {{ __(' Si vous n\'avez pas reçu l\'email') }}, <a
                            class="text-blue-500 hover:text-blue-700 no-underline hover:underline cursor-pointer"
                            onclick="event.preventDefault(); document.getElementById('resend-verification-form').submit();">{{ __('cliquez ici') }}</a>.
                    </p>

                    <form id="resend-verification-form" method="POST" action="{{ route('verification.resend') }}"
                        class="hidden">
                        @csrf
                    </form>
                </div>

            </section>
        </div>
    </div>
</main>
@endsection
