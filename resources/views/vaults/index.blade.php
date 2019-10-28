@extends('layouts.app')
@push('styles')
  <style>
    .title {
      font-size: 84px;
    }
.jumbotron{
      background: url('/images/vault-bg.jpg') center center;
      background-repeat: no-repeat;
      background-size: cover;
      background-color: #686868;
    }
  </style>
@endpush
@section('content')
<div class="content">
  <div class="jumbotron title m-b-md text-white">
    My Vaults
  </div>
</div>
<div class="container">
  <table id="myVaults" class="table table-striped responsive" style="width:100%">
    <thead>
    <tr>
      <th>Title</th>
      <th>Type</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
      @foreach($vaultItems as $item)
        <tr>
          <td>{{ $item->title }}</td>
          <td>{{ $item->vault_type }}</td>
          <td>@include('components.vaults.list.actions',['row'=>$item])</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
{!! Form::open(['id'=>'toDelForm','method'=>'DELETE']) !!}
{!! Form::close() !!}
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
  $(document).on('click','.toDel',function(){
    deleteChecked($(this).data('id'));
  });
  function deleteChecked(_toDel){
    console.log(_toDel);
    Swal.fire({
      title: 'Are you sure?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete!'
    }).then(function(result) {
      if(result.value){
        $('#toDelForm').attr('action','/destroy/'+_toDel);
        $('#toDelForm').submit();
      }
    });
  }
</script>
@endpush