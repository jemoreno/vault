@extends('layouts.app')

@section('content')
<div class="container">
  <table id="myVaults" class="table table-striped responsive" style="width:100%">
    <thead>
    <tr>
      <th></th>
      <th>Title</th>
      <th>Type</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
      @foreach($vaultItems as $item)
        <tr>
          <td>{!! Form::checkbox('',$item->id,null,['class'=>'toDel']) !!}</td>
          <td>{{ $item->title }}</td>
          <td>{{ $item->vault_type }}</td>
          <td>@include('components.vaults.list.actions',['row'=>$item])</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
  var table = $('#myVaults').DataTable({
    dom: 'Z<"top row"<"#new.dataTables_btn"><"#del.dataTables_btn">>rt<"bottom row mt-2" <"col-4"l><"col-4"i><"col-4"p>><"clear">',
    processing: true,
    scrollX: true,
    colResize: {
      tableWidthFixed: false
    },
    language: {
      zeroRecords: '<div>No matching records found.</div>',
      loadingRecords: "<div>Preparing data...</div>",
      processing: "<div class='card d-inline'><i class='fal fa-spinner-third fa-spin'></i> Loading...</div>"
    },
    pageLength: 50,
    lengthMenu: [ 25, 50, 75, 100, 200 ],
    sortable: true
  });
  $('#new').html('<a href="{{ route('vaults.create') }}" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Add New Item</a>');
  $('#del').html('<a class="btn btn-default btn-sm"><i class="fa fa-trash"></i> Delete</a>');
  $('#del').on('click',function(){
      deleteChecked();
    });
    function deleteChecked(){
      var checkedVals = $('.toDel:checkbox:checked').map(function() {
        return $(this).val();
      }).get();
      $('#idsToDel').val(checkedVals.join(","));
      console.log($('#idsToDel').val());
      if(checkedVals.length >= 1){
        initApp.playSound('/media/sound', 'bigbox');
        bootbox.confirm({
          title: "<i class='fal fa-times-circle text-danger mr-2'></i> Do you wish to delete this {{ $delLabel ?? '' }}?",
          message: "<span><strong>Warning:</strong> This action cannot be undone!</span>",
          centerVertical: true,
          swapButtonOrder: true,
          buttons:{
            confirm:{
              label: 'Yes',
              className: 'btn-danger shadow-0'
            },
            cancel:{
              label: 'No',
              className: 'btn-default'
            }
          },
          className: "modal-alert",
          closeButton: false,
          callback: function(result){
            if(result == true){
              $('#delForm').submit();
            }
          }
        });
      }
    }
</script>
@endpush