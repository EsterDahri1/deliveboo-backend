@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica il Tuo indirizzo Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Un nuovo link di verificazione ti e' stato inviato al tuo indirizzo Email.') }}
                    </div>
                    @endif

                    {{ __('Prima di procedere, controlla la tua casella di posta elettronica con il link di validazione.') }}
                    {{ __('Non hai ricevuto l'Email?') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clicca qui per richiedere un rinvio') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
