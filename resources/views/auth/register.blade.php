@extends('layouts.app')


@section('content')
    <div class="del_yellow">
        <div class="container mt-4">
            <div class="row justify-content-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header del_dark text-light">{{ __('Registrati') }}</div>

                        <div class="card-body">
                            <form method="POST" onsubmit="return validation()" action="{{ route('register') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-4 row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror border-2" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="restaurantName"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nome del tuo Ristorante') }}</label>

                                    <div class="col-md-6">
                                        <input id="restaurantName" type="text"
                                            class="form-control @error('restaurantName') is-invalid @enderror border-2"
                                            name="restaurantName" value="{{ old('restaurantName') }}" required
                                            autocomplete="restaurantName" autofocus>

                                        @error('restaurantName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="mb-3">
                            <label for="cover_image" class="form-label">Scegli un'immagine per il tuo ristorante</label>
                            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="Scegli una immagine per il tuo progetto" aria-describedby="cover_image_helper" value="{{ old('cover_image') }}">
                            <div id="cover_image_helper" class="form-text">Inserisci una immagine per il tuo ristorante</div>
                        </div> --}}

                                <div class="mb-4 row ">
                                    <label for="typologies" class="col-md-4 col-form-label text-md-right">Scegli una o piu'
                                        tipologie del ristorante</label>

                                    <div class="col-md-6">

                                        <select required multiple
                                            class="form-select @error('typologies') is-invalid  @enderror border-2"
                                            name="typologies[]" id="typologies">
                                            @foreach ($typologies as $typology)
                                                <option value="{{ $typology->id }}">{{ $typology->name_typology }}</option>
                                            @endforeach

                                            @error('typologies')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </select>

                                    </div>

                                </div>

                                <div class="mb-4 row">
                                    <label required for="address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror border-2"
                                            name="address" value="{{ old('address') }}" required autocomplete="address"
                                            autofocus>

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label required for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror border-2"
                                            name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label required for="vat"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva') }}</label>

                                    <div class="col-md-6">

                                        <input unique minlength="13" maxlength="13" required id="vat" type="text"

                                            class="form-control  @error('vat') is-invalid @enderror border-2" name="vat"
                                            value="{{ old('vat') }}" required autocomplete="vat" autofocus>

                                            <span class="invalid-feedback" id="vatError" style="display: none" role="alert">
                                                <strong>Inserisci 13 caratteri</strong>
                                            </span>

                                        @error('vat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input minlength="8" required id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror border-2"
                                            value="{{ old('password') }}" name="password" required
                                            autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control border-2"
                                            name="password_confirmation" value="{{ old('password_confirmation') }}"
                                            required autocomplete="new-password">
                                        <span class="invalid-feedback" id="passwordError" style="display: none"
                                            role="alert">
                                            <strong>La password non coincide</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="mb-4 row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrati') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validation() {
            let password = document.getElementById('password').value;
            let confirmpassword = document.getElementById('password-confirm').value;
            let passwordError = document.getElementById('passwordError');

            let vat = document.getElementById('vat').value;


            let vatError = document.getElementById('vatError');

            if (vat.length != 13) {
                vatError.style.display = 'block';

                return false
            } else {
                vatError.style.display = 'none';
                return true;

            }

            if (password !== confirmpassword) {
                passwordError.style.display = 'block';

                return false
            } else {
                passwordError.style.display = 'none';
                return true;

            }
        }
    </script>
@endsection
