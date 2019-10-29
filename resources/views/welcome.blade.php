@extends('layouts.app')

@section('content')
<posts :articles="{{$articles}}">
</posts>
@stop