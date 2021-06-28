@extends('welcome')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Crear Producto</div>

                <div class="card-body">
                    <form id="suppliderForm" method="post" action="{{ url('store/supplier') }}">
                        {{ csrf_field() }}

                        <div class="row ">
                            <div class="form-group col-md-6">
                                <label  class="form-control-label"> Tipo de Producto</label>
    
                                <select  class="form-control"  name="type_product" placeholder="Seleccione"  id="type_spplier" >
                                    <option value="" selected>Seleccione</option>
                                    <option value="1">Coca-Cola	</option>
                                    <option value="2">Red Bull</option>
                                    <option value="3">Pepsi</option>
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="form-control-label">Cantidad</label>
    
                               <input type="number"  class="form-control" name="amount"  id="quantity"   placeholder="Cantidad de producto" >
                                  
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                             <div class="form-group col-md-6">
                               <span>Numero de lote</span>
                               <input type="number"  class="form-control" name="lot_number" id="lot_number" placeholder="Numero de lote" >
                            </div>
    
                            <div class=" form-group col-md-6">
                                <span>Fecha de expiracion </span>
                                <input type="date"  class="form-control" name="date_of_expiry" id="expiration_date" placeholder="Fecha de expiracion" >
                             </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div  for="price" class=" form-group col-md-6">
                                <span>Precio</span>
                                <input type="number" class="form-control" name="price" id="price" placeholder="precio" >
                             </div>
                             
                             <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                 <br>
                                 <button type="submit" class="btn btn-warning  float-right">Guardar</button>
    
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
