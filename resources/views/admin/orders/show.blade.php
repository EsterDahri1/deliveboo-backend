@extends('admin.sidebar')

@section('content')

    <?php
    $totalQty=0;
    $totalPrice=0;
    ?>
    <h1 class="text-center my-3">RIEPILOGO ORDINE:</h1>


    <div class="table-responsive mt-5">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">QUANTITA'</th>
                    <th class="text-center" scope="col">NOME</th>
                    <th class="text-center" scope="col">INGREDIENTI</th>
                    <th class="text-center" scope="col">PREZZO</th>
                </tr>
            </thead>
            <tbody>

ì                    <tr>

                        <td class="text-center m-auto" scope="row">
                            {{ $order->id }}
                        </td>
                        {{-- <td class="text-center m-auto" scope="row">
                            {{ $order->qu }}
                        </td>

                        <td class="text-center" scope="row">
                            {{ $product->name }}
                        </td>



                        <td class="text-center">
                            {{ $product->ingredients }}
                        </td>


                        <td class="text-center">
                            {{ $product->price }} &euro;
                        </td>
                     --}}




                    </tr>


                    {{-- <?php
                        $totalQty=$totalQty+$product->pivot->product_quantity;
                        $totalPrice=$totalPrice+$product->price;
                    ?> --}}

                {{-- <tr class="text-center">
                    <td class="fw-bold">Totale:</td>
                    <td>{{$totalQty}}</td>
                    <td></td>
                    <td></td>
                    <td>{{$totalPrice}} &euro;</td>
                </tr> --}}
            </tbody>
            
                            
            
        </table>
    </div>
    <a class="nav-link my-2 text-end" href="{{ route('admin.orders.index') }}">
        <button type="button" class="btn btn-primary">TORNA AGLI ORDINI</button>
    </a>
@endsection
