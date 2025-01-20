@extends('layouts.main')

@section('content')
    <h1>Register page!</h1>
    <form action="{{ route('register') }}" method="post">
        @csrf
        @include('components.Input', [
            'name' => 'email',
            'placeholder' => 'Email',
            'type' => 'email',
            'value' => old('email'),
        ])
        @include('components.Input', [
            'name' => 'password',
            'placeholder' => 'Password',
            'type' => 'password',
            'value' => old('password'),
        ])
        @include('components.Input', [
            'name' => 'password_confirmation',
            'placeholder' => 'Password again',
            'type' => 'password',
        ])
        <button type="submit">Register</button>
    </form>
@endsection
