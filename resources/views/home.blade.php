@extends('layouts.app')

@section('content')
    <projects :projects="{{$projects}}"></projects>
@endsection
