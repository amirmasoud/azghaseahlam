@extends('theme.portfolio')

@section('title', 'در حال تعمیر')

@section('content')
    <div class="page">
    {!! HTML::image('img/repair.jpg', 'repair', ['class' => 'img-responsive center-block', 'width' => '400px']) !!}
    <h1 class="text-center"><span class="glyphicon glyphicon-wrench"></span> در حال تعمیر</h1>
    </div>
@stop
