<div class="form-group" >
  {!! Form::bsLabel($name,$labelOverride,$attributes) !!}
  <div class="custom-file">
    {!! Form::file($name,array_merge(['class' => 'custom-file-input'], $attributes)) !!}
    {!! Form::label($name, $inputLabel, ['class' => 'control-label custom-file-label']) !!}
  </div>
</div>
@push('scripts')
<script type="text/javascript">
    $('.custom-file-input').on('change',function(){
      var fileName = $(this).val();
      $(this).next('.custom-file-label').addClass("selected").html(fileName.replace("C:\\fakepath\\",""));
    })
  </script>
@endpush