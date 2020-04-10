@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <title>Novo Pedido</title>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

        <style type="text/css">
            .body{
                background: #55AFCD;
                color:aliceblue;
            }
            .container{
                width: 50vw;
                background: #55AFCD;
                display: flex;
                flex-direction:row;
                justify-content: center;
                border-color:black;
            }

            .box{
                width: 40vw;
                background: #55AFCD;
                margin: 0 auto;
                border:1px solid #ccc;
                border-color:black;
                padding: 0.6em
            }

            .btn-menu{
                padding-top:20px;
                padding-bottom:20px;
                width:38vw;
                margin: 0 auto;
                margin-top: 0.5em
            }
        </style>
    </head>

    <body>
        <br />
            <div class="initial-box">
                <h3 align ="center">iTHappens</h3>
            </div>
        <br />
        <div class="initial-box">
            <div >
                <h3 align="center">Pedidos</h3>
            </div>
            {{-- panel heading end --}}
            <div class="panel-body" >
                <div class="row">
                    <div class="col-md m-0">
                        <a href="{{route('order.new', ['type'=> 1])}}" class="btn  btn-lg btn-block initial-btn" style="background-color:#C4E917">Pedido Entrada</a>
                    </div>
                </div>
                {{-- end row --}}
                <div class="row">
                    <div class="col-md">
                        <a href="{{route('order.new', ['type'=> 2])}}" class="btn btn-lg btn-block initial-btn" style="background-color:whitesmoke; text-color:black">Pedido Saída</a>
                    </div>
                </div>
                {{-- end row --}}
                <br>
            </div>
            {{-- panel-body end --}}
        </div> 
        {{-- panel-default end --}}
    </body>

</html>

@endsection

