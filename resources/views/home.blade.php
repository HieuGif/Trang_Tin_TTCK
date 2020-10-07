@extends('layouts.app')

@section('content')
<base href="{{asset('')}}">
<link href="public/css/bootstrap.min.css" rel="stylesheet"  type="text/css">
<link href="public/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet"  type="text/css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="public/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
@endsection
