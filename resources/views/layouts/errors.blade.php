<div class="container">
@if (session('success'))
  <div class="alert alert-success fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading">Success</h4>
    <hr>
    <p>{!! session('success') !!}</p>
  </div>
@endif
@if(isset($errors) && count($errors))
  <div class="alert alert-danger fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading">Error</h4>
    <hr>
    <p>
      @foreach($errors->all() as $error)
        {{ $error }}<br>
      @endforeach
    </p>
  </div>
@endif
@if(session('error'))
  <div class="alert alert-danger fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading">Error</h4>
    <hr>
    <p>{{ session('error') }}</p>
  </div>
@endif
</div>