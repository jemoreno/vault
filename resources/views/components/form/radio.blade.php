<div class="form-group">
  {!! Form::radio(
    $attributes['id'] ?? $name,
    $value,
    $checked,
    (isset($attributes['id'])) ? array_merge(array_merge(['class' => 'form-control with-gap'],
    $attributes),['id'=>$attributes['id'].$value]) : array_merge(['class' => 'form-control with-gap'],$attributes)
  ) !!}
  {!! Form::label($attributes['id'].$value ?? $name, $labelOverride, ['class' => 'control-label']) !!}
  @if($help !== null)
  <span class="help-block"><small>{{ $help }}</small></span>
  @endif
</div>