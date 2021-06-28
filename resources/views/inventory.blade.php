@extends('welcome')

@section('content')
<br>
<button  onclick="location.href='{{ url('return/inventory') }}'" class="btn btn-sm btn-outline-dark" type="button"><i class="fas fa-redo-alt"></i>&nbsp;Cancelar Productos</button>
<button  onclick="location.href='{{ url('/invoice/inventory') }}'" class="btn btn-sm btn-outline-dark" type="button"><i class="fas fa-file-pdf"></i>&nbsp; Factura</button>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Numero de lote</th>
        <th scope="col">Fecha de expiracion</th>
        <th scope="col">Precio</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($product as $data)
       <tr>
        <th scope="row">{{ $data->id }}</th>
        <td>
        @if ($data->type_product == 1)
        Coca-Cola        
        @endif
        @if ($data->type_product == 2)
        Red Bull    
        @endif
        @if ($data->type_product == 3)
        Pepsi    
        @endif
        </td>
        <td>{{$data->amount}}</td>
        <td>{{$data->lot_number}}</td>
        <td>{{$data->date_of_expiry}}</td>
        <td>{{$data->price}}</td>
      </tr>
     @endforeach
    </tbody>
  </table>
@endsection
