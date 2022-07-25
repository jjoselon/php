@extends('layouts.master')

@section('title', 'Content StatementsController')

@section('content')

    <ul class='list-group'>
        <li class='list-group-item'>
            <a href="{{ route('running-a-select-query') }}">Running A Select Query</a>
        </li>
        <li class='list-group-item'>
            <a href="{{ route('using-named-bindings') }}">Using Named Bindings</a>
        </li>
    </ul>

@endsection
