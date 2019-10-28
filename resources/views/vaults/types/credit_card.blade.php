@php
$years = [];
for($i = date('Y')-12; $i <= date('Y')+12; $i++){
  $years[$i]=$i;
}
@endphp
<div class="row">
<div class="col-8">
  {!! Form::bsText('card_number',$data['card_number'],['pattern'=>'[0-9]{13,16}','maxlength'=>16]) !!}
</div>
<div class="col-4">
  {!! Form::bsText('card_cvc',$data['card_cvc'],['maxlength'=>3]) !!}
</div>
<div class="col-6">
  {!! Form::bsText('name_on_card',$data['name_on_card']) !!}
</div>
<div class="col-3">
  {!! Form::bsSelect(
    'card_exp_mm',
    ['01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12'],
    $data['card_exp_mm'],
    ['pladeholder'=>'Month']
  ) !!}
</div>
<div class="col-3">
  {!! Form::bsSelect('card_exp_yy',
    $years,
  $data['card_exp_yy']
  ) !!}
</div>
</div>
{!! Form::bsTextArea('description',$data['description']) !!}