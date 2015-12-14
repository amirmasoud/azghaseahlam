@extends('theme.portfolio')

@section('title', 'Login')

@section('content')

<div class="row page">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 pull-left">
        <h1 class="text-center"><span class="glyphicon glyphicon-user"></span> ورود</h1>
        @include ('errors.form', ['errors' => $errors])
        {!! Form::open(['url' => 'login', 'method' => 'post', 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                <div class="col-sm-10">
                    {!! Form::input('email', 'email', null, ['class' => 'form-control', 'id' => 'email', 'required' => 'required', 'data-validation-required-message' => "لطفا رایانامه خود را وارد کنید", 'placeholder' => 'رایانامه', 'dir' => 'ltr']) !!}
                </div>
                <label for="email" class="col-sm-2 control-label">رایانامه</label>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    {!! Form::input('password', 'password', null, ['class' => 'form-control', 'id' => 'password', 'required' => 'required', 'data-validation-required-message' => "Please enter your password.", 'placeholder' => 'گذرواژه', 'dir' => 'ltr']) !!}
                </div>
                <label for="password" class="col-sm-2 control-label">گذرواژه</label>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('remember', null, 1, ['id' => 'remember']) !!} من را فراموش نکن
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">ورود</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

@stop
