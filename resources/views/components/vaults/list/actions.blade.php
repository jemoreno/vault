@php
  Log::info($row->id);
@endphp
{!! Form::bsDropdownButton('Actions',['class'=>'btn-sm'],[
    [
      'icon'        => 'fa fa-eye',
      'value'       => 'View',
      'alt-class'   => 'btn-primary',
      'attributes'  => [
        'href'        => route('vaults.show',$row->id),
      ]
    ]
  ]) !!}