<div class="form-group">
  {!! Form::bsLabel($name,$labelOverride,$attributes) !!}
  @php
    if(array_key_exists('class', $attributes) ){
      if($attributes['class'] != ''){
        $attributes['class'] = trim($attributes['class']) . ' form-control';
      }
    }else{
      $attributes['class'] = 'form-control';
    }
  @endphp
  {!! Form::password($name, $attributes) !!}
  @if($help !== null)
  <span class="help-block"><small>{{ $help }}</small></span>
  @endif
</div>