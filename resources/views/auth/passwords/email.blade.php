@extends('layouts.app')
@section('title', '| Forgot my Password')
<base href="{{asset('')}}">
<link type="text/css" href="public/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
       <link href="public/css/codinh.css" rel="stylesheet"  type="text/css">
@section('content')
<div class="row carousel-holder">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">


            <div class="card">
                <div class="card-header">Reset Password</div>

                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                    {!! Form::open(['url' => 'password/email', 'method' => "POST"]) !!}

                    {{ Form::label('email', 'Email Address:') }}
                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                <br>
                    {{ Form::submit('Reset Password', ['class' => 'btn btn-primary']) }}

                    {{ Form::close() }}

                </div>
                </ul>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript" src="public/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
