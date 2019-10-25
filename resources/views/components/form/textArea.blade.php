<div class="form-group">
    {!! Form::bsLabel($name,$labelOverride,$attributes) !!}
    {{ Form::textArea($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    @if($help !== null)
  <span class="help-block"><small>{{ $help }}</small></span>
  @endif
</div>