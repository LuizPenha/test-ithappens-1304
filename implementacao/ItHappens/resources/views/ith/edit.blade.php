@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($post,['route'=>['order.update',$post->id],'method'=>'PATCH']) }}
      @include('order.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection