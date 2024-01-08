@extends('admin.sidebar')

@section('content')
    <h1 class="my-5">Ordini ricevuti: </h1>


    <div class="table-responsive mt-3">
        <table class="table table-primary">
            <thead>
                <tr>

                    <th class="text-center" scope="col">NOME PRODOTTO</th>
                    <th class="text-center" scope="col">NOME CUSTOMER</th>
                    <th class="text-center" scope="col">QUANTIT&Agrave;</th>
                    <th class="text-center" scope="col">TELEFONO</th>
                    <th class="text-center" scope="col">INDIRIZZO</th>
                    <th class="text-center" scope="col">DATA ORDINAZIONE</th>
                    <th class="text-center" scope="col">DELIVERY</th>
                    <th class="text-center" scope="col">STATO</th>
                    <th class="text-center" scope="col">TOTALE</th>
                    <th class="text-center" scope="col">AZIONI</th>

                </tr>
            </thead>

            <tbody>

                @forelse ($orders as $order)
                    <tr>

                        <td class="text-center" scope="row">{{ $order->order_number }}</td>

                        <td class="text-center">
                            {{ $order->costumer }}
                        </td>

                        <td class="text-center">
                            {{ $order->email }}
                        </td>
                        <td class="text-center">
                            {{ $order->phoneNumber }}
                        </td>
                        <td class="text-center">
                            {{ $order->costumerAddress }}
                        </td>
                        <td class="text-center">
                            {{ $order->orderDate }}
                        </td>
                        <td class="text-center">
                            {{ $order->deliveryDate }}
                        </td>
                        <td class="text-center">
                            <!-- {{ $order->statusOrder }} -->
                            @if ($order->statusOrder === 1)
                                Ordine completato
                            @else
                                Ordine in lavorazione
                            @endif

                        </td>
                        <td class="text-center">
                            {{ $order->totalPrice }} &euro;
                        </td>

                        <td class="text-center m-auto">
                            <div class="d-flex gap-2">


                                {{-- <form action="{{ route('admin.orders.show', [$order->id]) }}">

                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa-solid fa-circle-info"></i></button>

                                </form> --}}




                                <form action="{{ route('admin.orders.destroy', [$order->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')


                                    <button type="submit" class="btn btn-danger"> <i
                                            class="fa-solid fa-trash"></i></button>
                                </form>

                        </td>




    </div>







    </tr>

    </tbody>

@empty
    <h1 class="mb-3">Non hai ancora degli ordini!</h1>
    @endforelse
    </table>
    </div>
    <!--  -->
@endsection
