@extends('admin.sidebar')

@section('content')

    
    <div class="d-flex justify-content-between mt-5 mb-3">
        <h1 class="">I tuoi piatti:</h1>
        <form class="" action="{{ route('admin.products.create') }}">

            <button type="submit" class="btn btn-success my-3">Aggiungi un nuovo piatto</button>

        </form>
    </div>
    <div class="card-body">


        <div class="table-responsive ">
            <table
                class="table table-striped
                            table-hover	
                            table-borderless
                            align-middle">
                <thead class="table-light">
                    <caption>All Product</caption>
                    <tr class>
                        <th class="text-center">ID</th>
                        <th class="text-center">NOME</th>
                        <th class="text-center">PREZZO</th>
                        <th class="text-center">IMMAGINE</th>
                        <th class="text-center">AZIONI</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @if (isset($message))
                        <h1>{{ $message }}</h1>
                    @else
                        @forelse ($products as $product)
                            <tr class="table-primary del_dark">
                                <td class="text-center m-auto" scope="row">{{ $product->id }}</td>
                                <td class="text-center m-auto">{{ $product->name }}</td>
                                <td class="text-center m-auto">{{ $product->price }} &euro;</td>
                                <td class="text-center m-auto">
                                    @if (Str::contains($product->cover_image, 'product_images'))
                                        <img class="img-fluid w-50" src="{{ asset('storage/' . $product->cover_image) }}"
                                            alt="">
                                    @else
                                        <img class="img-fluid w-50" src="{{ $product->cover_image }}" alt="">
                                    @endif
                                </td>



                                <td class="text-center m-auto">
                                    <div class="d-flex justify-content-center">

                                        <form action="{{ route('admin.products.show', [$product->id]) }}">

                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa-solid fa-circle-info"></i></button>

                                        </form>
                                        <form class="mx-2" action="{{ route('admin.products.edit', [$product->id]) }}">

                                            <button type="submit" class="btn btn-info"><i
                                                    class="fa-solid fa-pencil"></i></button>

                                        </form>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')


                                            <button type="submit" class="btn btn-danger"> <i

                                                    class="fa-solid fa-trash"></i></button>
                                        </form>




                                    </div>


                                </td>
                            </tr>
                        @empty
                            <h1>Non hai ancora inserito dei prodotti!</h1>
                        @endforelse
                    @endif




                </tbody>

            </table>
        </div>

        {{-- <div class="pt-4"> {{ $products->links('pagination::bootstrap-5') }} </div> --}}
    </div>

    </div>
@endsection
