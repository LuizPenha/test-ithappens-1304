<div class="row">
    <div class="col-sm-2">
      {!! Form::label('title','Title') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('title') ? 'has-error' : "" }}">
        {{ Form::text('title',NULL, ['class'=>'form-control', 'id'=>'title', 'placeholder'=>' order...']) }}
        {{ $errors->first('title', '<p class="help-block">:message</p>') }}
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-2">
      {!! Form::label('bosy','Body') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('body') ? 'has-error' : "" }}">
        {{ Form::text('body',NULL, ['class'=>'form-control', 'id'=>'body', 'placeholder'=>'']) }}
        {{ $errors->first('body', '<p class="help-block">:message</p>') }}
      </div>
    </div>
  </div>
  
  <div class="form-group">
    {{ Form::button(isset($model)? 'Update' : 'save' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
  </div>
  