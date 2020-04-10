@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
 <head>
  <title>Novo Pedido</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
 </head>

 <body class="order-body">
    <div class="order-box">
        <div class="col"> 
            <h3 align ="center">
              iTHappens 
            </h3>
        </div> 
    </div>
    <br>

    <div >
      <div class="order-box">
        <div class="panel-heading">
          <h3 align="center">Pedido 
            @if ($type == 2 )
            - Saída @if(!empty($order)){{"sim sim sim" }} @endif
            @else 
            - Entrada 
            @endif
          </h3>
        </div>
        {{-- <form name="order_form"> --}}
        @if(isset($order) == false )
        {{ Form::open(array( 'route'=>'orders.store', 'name'=>'order_form','method'=>'post')) }}
        <div class="form-group">
          <select name="branch" id="branch" class="form-control input-lg droplist" data-dependent="employee" data-parsley-required>
            <option value="">Selecione a Filial</option>
            @foreach($branch_list as $branch)
              <option value="{{ $branch->id}}">{{$branch->id}} - {{$branch->description }}</option>
            @endforeach
          </select>
        </div>
        <br />
    
        <div class="form-group">
          <select name="employee" id="employee" class="form-control input-lg droplist display-flex" data-dependent="product" style="display:flex" data-parsley-required>
            <option value="">Selecione o Usuário</option>
          </select>
        </div>  
        @endif

        @if (isset($type) && $type == 2 && !isset($order)) 

          <div class="form-group ">
            <input type="text" class="form-control input-lg" placeholder="Digite o Nome do Cliente" id="client" name="client" autocomplete="off" data-parsley-required>
            <div id="clientslist" name="clientslist" >
            </div>
          </div>


          <div class="form-group">
            <textarea class="form-control input-lg" id="observation" rows="3" placeholder="Observação para Entrega" 
                maxlenght = "150" style="resize: vertical;" id="observation" name="observation" data-parsley-required>
          </textarea>
          </div>  

          <div class="text-right">
          <button type="submit" class="btn btn-success btn-lg btn-order"  id="order-check" name="order-check" value="{{$type}}">Enviar Pedido</button>
          </div>


        @endif
        {{-- {{ csrf_field() }} --}}
        {{ Form::close() }}
        {{-- </form> --}}
      </div>
    <br />
    <br />
  </div>

<script>
  window.onload = function() {
      var form = document.querySelector("order_form");
      form.onsubmit = submitted.bind(form);
  }

  function submitted(event) {
      event.preventDefault();
  }
</script>


<script>
  $(document).ready(function(){

    $('.droplist').change(function(){
      if($(this).val() != '')
      {
        var select = $(this).attr("id");
        var value = $(this).val();
        var dependent = $(this).data('dependent');
        var _token = $('input[name="_token"]').val();
        $.ajax({
          url:"{{ route('orders.search') }}",
          method:"POST",
          data:{select:select, value:value, _token:_token, dependent:dependent},
        success:function(result)
        {
          $('#'+dependent).html(result);
        }
        })
      }
    });
    $('#branch').change(function(){
      $('#employee').val('');
      // $('#product').val('');
    });
  });
</script>

  <script>
    $(document).ready(function(){
    
     $('#client').keyup(function(){ 
            var name = $(this).val();
            if(name != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('client.search') }}",
              async:true,
              method:"POST",
              data:{name:name, _token:_token},
              success:function(result){
                  //console.log(result);
                  if(result){
                    $('#clientslist').fadeIn();   
                    $('#clientslist').html(result);
                    $('#clientslist').css('display', 'block'); 
                  }
                  if(!result)
                  {
                      $('#clientslist').css('display', 'none'); 
                      $('#clientslist').fadeOut();  
                  }

                }

             });
            }
        });
    
        $(document).on('click', 'li', function(){  
            $('#client').val($(this).text());  
            $('#clientslist').fadeOut();  
        });  
    
    });
</script>

  </body>
</html>
@endsection