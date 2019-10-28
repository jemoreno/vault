@extends('layouts.app')
@section('content')
  <div class="container">
    @if(isset($vault->id))
      {!! Form::model($vault,['route'=>['vaults.update',$vault],'method'=>'PATCH']) !!}
    @else
      {!! Form::open(['route'=>'vaults.save']) !!}
    @endif
    {!! Form::bsText('title',null,['required'=>true],'Title') !!}
    {!! Form::bsSelect('vault_type',$types,null,['required'=>'true','id'=>'vaultType','placeholder'=>'Select a type']) !!}
    <div id="dataDiv">

    </div>
    @if(isset($vault->id))
      {!! Form::bsSubmit('Update') !!}
    @else
      {!! Form::bsSubmit('Create') !!}
    @endif
    {!! Form::close() !!}
  </div>
@endsection
@push('scripts')
  <script type="text/javascript">
    $('#vaultType').on('change',function(){
      loadDataForm();
    });
    function loadDataForm(){
      _type = $('#vaultType').val();
      _id   = '{{ $vault->id ?? '' }}'
       $.post('{{ route('vaults.ajaxDataForm') }}',{_token:token,type:_type,id:_id}).done(function(data){
         $('#dataDiv').html(data);
       });
    }
    @if(isset($vault->id))
      loadDataForm();
    @endif
  </script>
@endpush