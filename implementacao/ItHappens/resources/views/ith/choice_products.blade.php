@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
 <head>
  <title>Escolha os Produtos</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 </head>

 <body class="order-body">     
    <div class="order-container order-box ">
      <div class="col">
          <div class="order-container" style="overflow-x:auto">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                @if ($order)
                    <h4><b>Pedido Nº:{{" 00".$order->id}}</b></h4> 
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="prefix">Cliente:</span>
                            <span class="label label-success">{{$order->client->name}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="prefix">Usuário:</span>
                            <span class="label label-success branch" name="branch"  id="d">{{$order->employee->user->name}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="prefix">Filial:</span>
                            <span class="label label-success">{{$order->branch->description}}</span>
                        </li>
                    </ul>          
                @endif
          </div>
      </div>
    </div >

    <br />

    <div class="order-container ">
	    <div class="order-box" align="center">
            <h2>Inclua os Itens do Pedido</h2>
            {{ Form::open(array( 'name'=>'product_form','method'=>'post')) }}
            <div class="form-group">
                <input type="text" class="form-control input-lg" placeholder="Digite o Sequencial , o barcode ou o nome do produto" id="product" name="product" data="" autocomplete="off" >
                <div id="productlist" name="productlist" class="product-dropdown">
                </div>
                <div class="text-left">
                    <input type="number" class="form-control input-lg product-qtd" placeholder="Qtd" id="quantity" name="quantity" >
                    <div class="notify text-left" id="notify"></div>
                </div>
                <div class="text-right">
                    <button id="addBtn" name="addBtn" type="button" class="addBtn btn btn-nd btn-primary"><i class="fa fa-search"></i> Adicionar</button>
                </div>
            </div>

            <br>
            <div class="col-md" style="overflow-x:auto">
                <table id="table" class="table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th class="col-lg-1 text-center">Seq.</th>
                            <th class="col-lg-3 text-center">Cod.Barras</th>
                            <th class="col-lg-7 text-center">Nome</th>
                            <th class="col-lg-1 text-center">Status</th>
                            <th class="col-lg-1 text-center">Qtd.</th>
                            <th class="col-lg-1 text-center">Valor Unt.</th>
                            <th class="col-lg-1 text-center">Total</th>
                            <th class="col-lg-1 text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody id="tbody" name="tbody">
                    </tbody>
                </table>
            </div>
            <br><br>
            <div class="text-right">
                <button id="submitBtn" name="submitBtn" type="button" class="submitBtn btn btn-nd btn-success"><i class="fa fa-send"></i> Enviar</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>


      @endsection
 @section('js')
 <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
 {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> --}}

<script>
var results;
$(document).ready(function(){

    $('#product').keyup(function(){ 
        var branch = {!! $order->branch->id !!};
        //alert(branch);
        var name = $(this).val();
        if(name != '')
        {
            var _token = $('input[name="_token"]').val();
            results = $.ajax({
                url:"{{ route('product.search') }}",
                //url:"{{ route('product.search',[$order]) }}",
                //async:true,
                method:"POST",
                data:{name:name, branch:branch, _token:_token},
                success:function(result){
                    //console.log(result);
                    if(result){
                        output = "<ul class='dropdown-menu order-dropdown' style='display:block; position:relative;overflow-x:auto;overflow-y:auto'>";
                        result.forEach( function(product){
                            output = output+"<li name='"+product.id+"' ><a href='#' >"+product.id+" - "+product.bars_code+" - "+product.description+" </a></li>";
                        });
                        $('#productlist').fadeIn();   
                        $('#productlist').html(output);
                        $('#productlist').css('display', 'block'); 
                    }
                    if(!result)
                    {
                        $('#productlist').css('display', 'none'); 
                        $('#productlist').fadeOut();  
                    }
                    //return results;
                    return result;
                }
            });
        }
        $(document).on('click', 'li', function(){
            var product_id = jQuery(this).attr("name");
            $('#product').attr('data', product_id);
            $('#product').val($(this).text());  
            $('#productlist').fadeOut();  
        }); 
        return results;
    });
    
        $("#addBtn").click(function(){
            data = results.responseJSON
            //console.log(data[0].id);
        var product_id = jQuery('#product').attr("data");
        var product = data.filter( function( elem, index) {
            //console.log(elem['id']);
            
            if(elem['id'] == product_id){return elem['id'],elem['bars_code'],elem['description'],elem['qtd'] };
        });
        product = product[0];
        //console.log(product);
        //console.log(product[0].id);
         var quantity = $("#quantity").val();

         if(quantity == 0){
             //alert(quantity + 'é maior que '+ product.qtd);
                var msg = "<span class='text-danger notify-span'>Por favor, digite a quantidade desejada. Estoque disponível: "+product.qtd+" unidades</span>"
                $('#notify').fadeIn();   
                $('#notify').html(msg);
                $('#notify').css('display', 'block'); 
                setTimeout(function() {
                    $('#notify').fadeOut('fast');
                }, 2000);
                return;
        }
         if(parseInt(quantity) > parseInt(product.qtd)){
             //alert(quantity + 'é maior que '+ product.qtd);
                var msg = "<span class='text-danger notify-span'>Quantidade informada é maior que a quantidade em Estoque. Estoque disponível: "+product.qtd+" unidades</span>"
                $('#notify').fadeIn();   
                $('#notify').html(msg);
                $('#notify').css('display', 'block'); 
                setTimeout(function() {
                    $('#notify').fadeOut('fast');
                }, 2000);                
                return;
        }
        if ($('#table td:contains('+product.id+')').length) {
            var msg = "<span class='text-danger notify-span'> O Produto "+product.description+" já se encontra na tabela com status ativo</span>"
            $('#notify').fadeIn();   
            $('#notify').html(msg);
            $('#notify').css('display', 'block'); 
            setTimeout(function() {
                $('#notify').fadeOut('fast');
            }, 2000);           
            return;
        }
        var markup = "<tr id='"+product.id+"'><td>"+product.id+"</td><td>" + product.bars_code + "</td><td>" + product.description + "</td><td id='"+product.id+"td'>" + "Ativo"+ "</td><td>" + quantity + "</td><td>" + product.price + "</td><td>" + (product.price*quantity).toFixed(2) + "</td><td><button class='btn btn-danger btn-small delBtn' type='button'>Cancelar</button></td></tr>";
            $("table tbody").append(markup);
            $('#product').attr('data', '');
            $('#product').val('');
            $('#quantity').val('');

        });

        $('table').on('click',".delBtn", function(){
            var parent_id = $(this).parent().parent().attr('id');
            var statusown = $('#'+parent_id+'td').val();
            $('#'+parent_id+'td').html('Cancelado').css('background-color', 'LightPink');
            $(this).parent().parent().css('background-color', 'LightPink');
            //$(this).prop('disable', 'disable');
             console.log(statusown);
        });
    });
</script>


{{-- <script>

$(function (){
    if ($('#table td:contains("Ativo")').length > 2) {

        $("#submitBtn").attr("disabled", true);        
        //$('#notify').fadeIn();   
        //$('#notify').html(msg);
        //$('#notify').css('display', 'block'); 
        
    }else{
        //$("#FirstElement").hide();
        $('#submitBtn').removeAttr("disabled");
        //$('#submitBtn').attr("disabled", false);
    }
});

</script> --}}





<script>
    $(document).ready(function(){
        $('#submitBtn').click(function(){
            var branch = {!! $order->branch->id !!};
            var client = '{!! $order->client->name !!}';
            var order = {!! $order->id !!};
            var _token = $('input[name="_token"]').val();
            // var header = Array();
            //     $("table tr th").each(function(i, v){
            //             header[i] = $(this).text();
            //     })          
            //     alert(header);
                
                var items = Array();
                    
                $("table tr").each(function(i, v){
                    items[i] = Array();
                    $(this).children('td').each(function(ii, vv){
                        items[i][ii] = $(this).text();
                    }); 
                })
                alert(items);
                $.ajax({
                    url:"{{ route('process.items') }}",
                    //url:"{{ route('product.search',[$order]) }}",
                    //async:true,
                    method:"POST",
                    data:{items:items, branch:branch, _token:_token},
                    success:function(result){
                        //console.log(result);

                    }
                });
        });
    });
</script>



@endsection
    </body>
</html>
    
