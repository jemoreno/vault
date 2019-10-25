<div class="form-group">
    {!! Form::bsLabel($name,$labelOverride,$attributes) !!}
    <input type="range" name="{{$name}}" min="{{$min}}" data-slider-min="{{$min}}" max="{{$max}}" data-slider-max="{{$max}}" data-slider-step="{{$step}}" step="{{$step}}" data-slider-value="{{$value}}">
    @if($useValueLabel)
    <label class="range-value-label">{{$value}}</label>
    @endif
</div>