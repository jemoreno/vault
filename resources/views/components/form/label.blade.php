@if($labelOverride != ' ')

{!! Form::label(
    (isset($attributes['required']) || in_array('required',$attributes))? $name.' *':$name,
    ($labelOverride != null && (isset($attributes['required']) || in_array('required',$attributes)))? $labelOverride.' *' : $labelOverride,
    (isset($attributes['required']) || in_array('required',$attributes))? ['class'=>'control-label font-weight-bold']: ['class' => 'control-label']) !!}
@endif