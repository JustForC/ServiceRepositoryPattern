@extends('layout.app')

@section('title', 'Student')

@section('content')
    @include('components.navbar')
    @include('components.header')
    @include('components.sidebar')
    @include('student.content')
    @include('components.footer')
@endsection

@section('javascript')
    @include('student.javascript')
@endsection