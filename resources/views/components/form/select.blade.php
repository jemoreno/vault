@php
  if(array_key_exists('class', $attributes)){
    $attributes['class'] = trim($attributes['class']) . ' form-control select2';
  }else{
    $attributes['class'] = 'form-control select2';
  }
@endphp
@if(! $skipGroup)
<div class="form-group">
    {!! Form::bsLabel($name,$labelOverride,$attributes) !!}
    {!! Form::select($name, $options, $default, $attributes) !!}
    @if($help !== null)
  <span class="help-block"><small>{{ $help }}</small></span>
  @endif
</div>
@else
  {!! Form::select($name, $options, $default, $attributes) !!}
@endif
@if(empty($ignoreSelect2) || $ignoreSelect2 === false)
@push('scripts')
<script>
  $('.select2').select2();
</script>
@endpush
@endif