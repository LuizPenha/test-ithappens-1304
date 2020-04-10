@extends('layouts.app')
@section('content')

<div class="col-sm-12 center flex-center box " style="margin: 0 auto">
  <div class="row">
  <div class="col-sm-8">
    <div class="full-right">
      <h2 class="text-center">iTHappens</h2>
      <h2>Entrada de Estoque</h2>
    </div>
  </div>
  </div>

  @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif
  <div class="row">
    <div class="col-sm-8">
      <table class="table table-bordered">
        <tr>
          <th with="80px">No</th>
          <th>Filial</th>
          <th>Usuário</th>
          <th with="140px" >
            <a href="{{route('orders.create', ['type'=> 1])}}" class="btn btn-success btn-sm">
              <i class="glyphicon glyphicon-plus"></i>
            </a>
          </th>
        </tr>
        <?php $no=1; ?>
          @if ($orders)
            @foreach ($orders as $key => $order)
              @if($order->type_id == 1)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$order->branch->description }}</td>
                  <td>{{ $order['employee']->user->name }}</td>
                  <td>
                    <a class="btn btn-info btn-sm" href="{{route('orders.show',$order->id)}}">
                        <i class="glyphicon glyphicon-th-large"></i></a>
                    <a class="btn btn-primary btn-sm" href="{{route('orders.edit',$order->id)}}">
                        <i class="glyphicon glyphicon-edit"></i></a>
                      {!! Form::open(['method' => 'DELETE','route' => ['orders.destroy', $order->id],'style'=>'display:inline']) !!}
                        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
                      {!! Form::close() !!}
                  </td>
                </tr>
                @endif
            @endforeach
          @endif

      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-8">
      <div class="full-right">
        <h2>Saída de Estoque</h2>
      </div>
    </div>
    </div>

  <div class="row">
    <div class="col-sm-8">
      <table class="table table-bordered"  >  
        <tr>
          <th with="80px">No</th>
          <th>Filial</th>
          <th>Usuário</th>
          <th>Cliente</th>
          <th>Observação - Entrega</th>
          <th with="140px">
            <a href="{{route('orders.create', ['type'=> 2])}}" class="btn btn-success btn-sm ">
              <i class="glyphicon glyphicon-plus"></i>
            </a>
          </th>
        </tr>
        <?php $no=1; ?>
          @if ($orders)
            @foreach ($orders as $key => $order)
              @if($order->type_id == 1)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{ $order->branch->description}}</td>
                  <td>{{ $order['employee']->user->name }}</td>
                  <td>{{ $order->client->name }}</td>
                  <td>{{ $order->client->name }}</td>
                  <td style="align:right;">
                    <a class="btn btn-info btn-sm" href="{{route('orders.show',$order->id)}}">
                      <i class="glyphicon glyphicon-th-large"></i></a>
                    <a class="btn btn-primary btn-sm" href="{{route('orders.edit',$order->id)}}">
                      <i class="glyphicon glyphicon-edit"></i></a>
                      {!! Form::open(['method' => 'DELETE','route' => ['orders.destroy', $order->id],'style'=>'display:inline']) !!}
                        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
                      {!! Form::close() !!}
                  </td>
                  
                </tr>
              @endif
            @endforeach
          @endif
      </table>
    </div>
  </div>

</div>
@endsection