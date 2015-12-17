@extends('theme.portfolio')

@section('title', 'پیدا نشد')

@section('content')
    <div class="page">
    {!! HTML::image('img/404.png', 'repair', ['class' => 'img-responsive center-block', 'width' => '400px', 'style' => 'margin-top: -50px']) !!}
    <h1 class="text-center"><span class="glyphicon glyphicon-bullhorn"></span> پیدا نشد</h1>
    </div>
@stop
