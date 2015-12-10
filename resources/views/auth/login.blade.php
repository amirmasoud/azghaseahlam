@extends('theme.portfolio')

@section('title', 'Login')

@section('content')

<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        @include ('errors.form', ['errors' => $errors])

        {!! Form::open(['url' => 'login', 'method' => 'post', 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    {!! Form::input('email', 'email', null, ['class' => 'form-control', 'id' => 'email', 'required' => 'required', 'data-validation-required-message' => "Please enter your email.", 'placeholder' => 'Email']) !!}
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    {!! Form::input('password', 'password', null, ['class' => 'form-control', 'id' => 'password', 'required' => 'required', 'data-validation-required-message' => "Please enter your password.", 'placeholder' => 'Password']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('remember', null, 1, ['id' => 'remember']) !!} Remember me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

@stop
