<!DOCTYPE html>
<html >
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Test BRM</title>
  

<style>
    
    </style>

    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
              <button  onclick="location.href='{{ url('/supplier') }}'" class="btn  btn-sm btn-outline-success" type="button">Proveedor</button>&nbsp; 
              <button  onclick="location.href='{{ url('/client') }}'"   class="btn btn-sm btn-outline-secondary" type="button">Cliente</button>&nbsp; 
              <button  onclick="location.href='{{ url('/inventory') }}'" class="btn btn-sm btn-outline-info" type="button">Inventario</button>&nbsp; 

            </form>
          </nav>

          @yield('content')

          @include('sweetalert::alert')

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script>

         $(document).ready(function(){
               $('#quantity_buy').change(function(){
                var type_product_buy = $( "#type_spplier_buy" ).val();
                var quantity_buy = $(this).val();
                var _token = $('input[name="_token"]').val();
                if (type_product_buy != '' && quantity_buy != '' ) {
                      $.ajax({
                        url:"{{ url('buy/product') }}",
                        method:"POST",
                        data:{type_product:type_product_buy, amount:quantity_buy, _token:_token },
                       success:function(response)
                         {
                            var response = JSON.parse(response);
                            if (response != null) {
                                document.getElementById('price_total').disabled = true;
                                var total = quantity_buy*response.price
                                $( "#price_total" ).val(total);  
                            }else{
                               $( "#type_spplier_buy" ).val('');
                               $("#quantity_buy").val('');
                               $( "#price_total" ).val('');  
                                Swal.fire({
                                  "title":"error!",
                                  "text":`el tipo de producto no tiene inventario o no hay stock suficiente `,
                                  "type":"error"
                               });
                            }

                         }

                       })
                }
               });   
        
          });
            // vatidate Form cliente
            $( "#BuyForm" ).validate( {
                rules: {
                    type_spplier_buy: "required",
                    quantity_buy: "required"
                   
                },
                messages: {
                    type_spplier_buy: "Seleccione un producto ",
                    quantity_buy: "la Cantidad es requerida"
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
                }
            } );

            // vatidate Form supplider
            $( "#suppliderForm" ).validate( {
                rules: {
                    type_spplier: "required",
                    quantity: "required",
                    lot_number: "required",
                    expiration_date:{
                        required: true,
                        date: true
                    },
                    price: "required",
                },
                messages: {
                    type_spplier: "Seleccione un producto ",
                    quantity: "la Cantidad es requerida",
                    lot_number: "Numero de lote es requerido",
                    expiration_date: {
                        required: "Fecha de expiracion es requerida",
                        date: "Fecha de expiracion debe ser una fecha valida"
                    },
                    price: "Precio es requerido"
                },
                errorElement: "em",
        
                errorPlacement: function ( error, element ) {
                    // Add the `invalid-feedback` class to the error element
                    error.addClass( "invalid-feedback" );
                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter(element.next( "label" ));
                    } else {
                        error.insertAfter(element.next(".pmd-textfield-focused"));
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
                }
            } );
        </script>

    </body>
    
</html>
