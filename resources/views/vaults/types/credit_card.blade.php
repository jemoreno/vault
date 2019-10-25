@foreach($data AS $field => $item)
  @switch($field)
    @case('description')
      {!! Form::bsTextArea($field,$item) !!}
      @break
    @default
      {!! Form::bsText($field,$item) !!}
      @break
  @endswitch
@endforeach