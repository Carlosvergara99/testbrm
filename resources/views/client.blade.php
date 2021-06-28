@extends('welcome')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Comprar</div>

                <div class="card-body">
                    <form id="BuyForm" method="post" action="{{ url('/edit/product') }}" >
                        {{ csrf_field() }}

                        <div class="row ">
                            <div class="form-group col-md-6">
                                <label  class="form-control-label"> Tipo de Producto</label>
    
                                <select  class="form-control"  name="type_spplier_buy" placeholder="Seleccione"  id="type_spplier_buy" >
                                    <option value="" selected>Seleccione</option>
                                    <option value="1">Coca-Cola</option>
                                    <option value="2">Red Bull</option>
                                    <option value="3">Pepsi</option>
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="form-control-label">Cantidad</label>
    
                               <input type="number"  class="form-control" name="quantity_buy"  id="quantity_buy"   placeholder="Cantidad de producto" >
                                  
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div  for="price" class=" form-group col-md-6">
                                <span>Precio total</span>
                                <input type="text"  disabled class="form-control" name="price" id="price_total" placeholder="precio" >
                             </div>
                             
                             <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                 <br>
                                 <button type="submit" class="btn btn-warning  float-right">Comprar</button>
    
                            </div>
                        </div>

                    </form>
                </div>
                 
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection