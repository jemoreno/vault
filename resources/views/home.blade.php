@extends('layouts.app')

@section('content')
<div class="container">
	<table id="myVaults" clas="responsive" style="width:100%">
		<thead>
		<tr>
			<th></th>
			<th>Title</th>
			<th>Type</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody>
			{{-- @foreach()
			@endforeach
		 --}}</tbody>
	</table>
</div>
@endsection

@push('scripts')
@endpush