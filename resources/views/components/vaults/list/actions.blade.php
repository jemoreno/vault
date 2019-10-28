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
    ],
    [
      'icon'        => 'fa fa-trash',
      'value'       => 'Delete',
      'alt-class'   => 'btn-danger',
      'attributes'  => [
        'data-id'   => $row->id,
        'class'     => 'toDel',
      ]
    ]
  ]) !!}