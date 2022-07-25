@extends('layouts.master')

@section('title', 'SELECT statement')

@section('content')

    <h1>All users</h1>

    <table class='table table-dark'>
        <tr>
            <th>Name</th>
            <th>Is active</th>
            <th>Password</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->isActive }}
            </td>
            <td>
                {{ $user->password }}
            </td>
        </tr>
    @endforeach
    </table>

@endsection
