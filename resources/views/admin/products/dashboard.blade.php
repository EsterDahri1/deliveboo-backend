@extends('admin.sidebar')

@section('content')
<?php


?>
<div class="container del_yellow">
    <h2 class="fs-4 text-light my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header del_dark text-white">{{ $restaurants->name}}'s Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    

                    <div class="d-flex justify-content-between align-items-center">
                        {{-- <form class="my-3" action="{{ route('admin.products.index') }}">

                            <button type="submit" class="btn btn-warning text-white">Guarda i tuoi piatti</button>
                
                        </form> --}}
                        <h4> Bentornato {{$user->name}}!</h4>

                        {{-- <form class="my-3" action="{{ route('admin.orders.index') }}">

                            <button type="submit" class="btn btn-primary">Guarda i tuoi ordini</button>
                
                        </form> --}}
                    </div>

                    
                    <div class=" my-5 d-flex justify-content-center align-items-center" >
                        
                      <div class="col-6">
                        <h5>Il tuo ristorante:</h5>

                         <img src="https://barrymoltz.com/wp-content/uploads/2018/10/restaurant-open-sign-1100x600.jpg" class="card-img-top w-75 m-auto" alt="...">
                         
                      </div>
                     
                      <div class="col-6">
                      <h3 class="self-align-center">Nome ristorante: {{$restaurants->name}}</h3>
                        <h6 class="">Indirizzo: {{$restaurants->address}}</h6>
                       <h6>Le tue tipologie:</h6>
                       
                        <ul> 
                        @foreach($typologies as $typology)    
                             
                           <li>{{$typology->name_typology}};</li> 

                           
                            @endforeach
                        </ul> 
                        <h6>Partita iva: {{$restaurants->vat}}</h6>
                      </div>
                    </div>
                        

                        
                        <div class="">
                            <img class="w-75" src="" alt="" srcset="">
                        </div>
                        
                        



                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
