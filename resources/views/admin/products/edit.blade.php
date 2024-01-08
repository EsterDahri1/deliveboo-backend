@extends('admin.sidebar')

@section('content')

    <div class="col-6 mx-auto">
        {{-- se il validation messo nella funzione store riscontra degli errori, allora stampo in pagina un messaggio di errore --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- vado a attivare la funzione update nel product controller (la rotta la vedo nelle route list) e gli passo il valore di $product --}}

        <form action="{{ route('admin.products.update', $product) }}" method="post" onsubmit="return validation()"
            enctype="multipart/form-data">

            @csrf

            @method('PUT')

            <h1 class="my-3">MODIFICA UN PIATTO</h1>


            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                {{-- utilizziamo la funzione old per ridare all'utente i valori inseriti prima,in caso di errore --}}
                <input required type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                    placeholder="Scrivi un titolo per il tuo progetto" value="{{ old('name', $product->name) }}">
                <small id="nameHelper" class="form-text text-muted">Scrivi un nome per il tuo piatto</small>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                {{-- utilizziamo la funzione old per ridare all'utente i valori inseriti prima,in caso di errore --}}
                <input required type="text" class="form-control" name="price" id="price" aria-describedby="helpId"
                    placeholder="Scrivi il prezzo del tuo piatto" value="{{ old('price', $product->price) }}">
                <small id="priceHelper" class="form-text text-muted">Scrivi il prezzo del tuo piatto</small>
                <span class="invalid-feedback" id="priceError" style="display: none" role="alert">
                    <strong>Non puoi inserire un valore negativo</strong>
                </span>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                {{-- utilizziamo la funzione old per ridare all'utente i valori inseriti prima,in caso di errore --}}
                <input required type="text" class="form-control" name="description" id="description" aria-describedby="helpId"
                    placeholder="Scrivi una descrizione per il tuo progetto"
                    value="{{ old('description', $product->description) }}">
                <small id="descriptionHelper" class="form-text text-muted">Scrivi una descrizione per il tuo piatto</small>
            </div>


            <div class="mb-3">
                <label for="cover_image" class="form-label">Scegli un'immagine per il tuo piatto</label>
                <input required type="file" class="form-control" name="cover_image" id="cover_image"
                    placeholder="Scegli una immagine per il tuo progetto" aria-describedby="cover_image_helper"
                    value="{{ old('cover_image', $product->cover_image) }}">
                <div id="cover_image_helper" class="form-text">Inserisci una immagine per il tuo piatto</div>
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti</label>
                {{-- utilizziamo la funzione old per ridare all'utente i valori inseriti prima,in caso di errore --}}
                <input required type="text" class="form-control" name="ingredients" id="ingredients" aria-describedby="help"
                    placeholder="Scrivi gli autori del tuo progetto"
                    value="{{ old('ingredients', $product->ingredients) }}">
                <small id="ingredientsHelper" class="form-text text-muted">Scrivi gli ingredienti del tuo progetto</small>
            </div>

            <div class="mb-3">
                <label for="is_available" class="form-label">E' disponibile?</label>
                <select class="form-select @error('is_available') is-invalid  @enderror" name="is_available"
                    id="is_available">
                    <option selected disabled>Scegli se questo piatto è disponibile</option>
                    <option class="d-none" value="">Uncategorized</option>

                    <option value="1">disponibile</option>
                    <option value="0">non disponibile</option>
                </select>
                <span class="invalid-feedback" id="isAvaibleError" style="display: none" role="alert">
                    <strong>Scegli se questo prodotto è disponibile</strong>
                </span>

            </div>
            @error('is_available')
                <div class="text-danger">{{ $message }}</div>
            @enderror




            <button type="submit" class="btn btn-primary">Modifica il piatto</button>
        </form>
        {{-- <a class="nav-link my-2 text-end" href="{{route('project.index')}}">
        <button type="button" class="btn btn-warning">TORNA AI PROGETTI</button>
    </a> --}}
    </div>
    <script>
        function validation() {


            let price = document.getElementById('price').value;

            let priceError = document.getElementById('priceError');

            let isAvaible = document.getElementById('is_available').value;

            let isAvaibleError = document.getElementById('isAvaibleError');

            let exit = true;
            console.log(parseInt(price));



            if (price < 0 || isNaN(price)) {
                priceError.style.display = 'block';
                exit = false
            }

            if (isAvaible === 'Scegli se questo piatto è disponibile') {
                isAvaibleError.style.display = 'block';
                exit = false
            }

            if (exit == true) {

                priceError.style.display = 'none';

                isAvaibleError.style.display = 'none';
                return true

            } else {
                return false
            }







            // if (price < 0) {
            //     priceError.style.display = 'block';
            //     return false
            // } else {
            //     priceError.style.display = 'none';
            //     if (isAvaible === 'Scegli se questo piatto è disponibile') {
            //         isAvaibleError.style.display = 'block';
            //         return false
            //     } else {
            //         isAvaibleError.style.display = 'none';
            //         return true;
            //     }
            // }






        }
    </script>
@endsection
