@extends('admin.sidebar')

@section('content')
    <h1 class="text-center my-3">PIATTO</h1>


    <div class="table-responsive mt-5">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th class="text-center" scope="col">IMMAGINE</th>
                    <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">DISPONIBILE?</th>
                    <th class="text-center" scope="col">NOME</th>
                    <th class="text-center" scope="col">PREZZO</th>
                    <th class="text-center" scope="col">DESCRIZIONE</th>
                    <th class="text-center" scope="col">INGREDIENTI</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">
                        @if ($product->cover_image)
                            <img width="100" src="{{ asset('storage/' . $product->cover_image) }}">
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="text-center m-auto" scope="row">{{ $product->id }}</td>
                    @if ($product->is_available === 0)
                        <td class="text-center m-auto" scope="row">Non disponibile</td>
                    @else
                        <td class="text-center m-auto" scope="row">Disponibile</td>
                    @endif

                    <td class="text-center" scope="row">{{ $product->name }}</td>



                    <td class="text-center">
                        {{ $product->price }} &euro;
                    </td>


                    <td class="text-center">
                        @if ($product->description)
                            {{ $product->description }}
                        @else
                            N/A
                        @endif
                    </td>



                    <td class="text-center">
                        @if ($product->ingredients)
                            {{ $product->ingredients }}
                        @else
                            N/A
                        @endif
                    </td>




                </tr>

            </tbody>
        </table>
    </div>
    <a class="nav-link my-2 text-end" href="{{ route('admin.products.index') }}">
        <button type="button" class="btn btn-primary">TORNA AI PIATTI</button>
    </a>
@endsection
