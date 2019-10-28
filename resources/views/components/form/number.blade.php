<div class="form-group">
  {!! Form::bsLabel($name,$labelOverride,$attributes) !!}
  {{ Form::number($name, $value, array_merge(['class' => 'form-control','pattern'=>'\d*'], $attributes)) }}
  @if($help !== null)
  <span class="help-block"><small>{{ $help }}</small></span>
  @endif
</div>