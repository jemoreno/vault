@extends('layouts.app')
@push('styles')
  <style>
    html, body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

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
      Vault
    </div>
    <h2>What is Vault?</h2>
  </div>
  <div class="container">
    <div class="row ">
      <div class="col-12">
        Vault is a simple web application built on Laravel to store sensitive information in a database securely.  Not only does it take advantage of UUID for primary keys in the database, all information is stored securly using encryption.
      </div>
    </div>
    <div class="row justify-content-center mt-4">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            {!! Form::bsButton('View Your Items',['class'=>'btn btn-lg btn-block btn-outline-primary','href'=>route('vaults.index')]) !!}
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            {!! Form::bsButton('Create a New Item',['class'=>'btn btn-lg btn-block btn-outline-primary','href'=>route('vaults.create')]) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection