@extends('layouts.app')

@section('title', '| Forgot my Password')

@section('content')
        <base href="{{asset('')}}">
        <link type="text/css" href="public/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
       <link href="public/css/codinh.css" rel="stylesheet"  type="text/css">
       <div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reset Password</div>
                <div class="card-body">
                    {!! Form::open(['url' => 'password/reset', 'method' => "POST"]) !!}

                    {{ Form::hidden('token', $token) }}

                    {{ Form::label('email', 'Email Address:') }}
                    {{ Form::email('email', $email, ['class' => 'form-control']) }}
                       
                    {{ Form::label('password', 'New Password:') }}
                    {{ Form::label( 'Mật khẩu tối thiểu 8 kí tự') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}

                    {{ Form::label('password_confirmation', 'Confirm New Password:') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                </br>
                    {{ Form::submit('Reset Password', ['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript" src="public/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
