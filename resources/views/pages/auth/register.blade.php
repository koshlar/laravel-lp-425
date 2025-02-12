@extends('layouts.main')

@section('content')
    <div class="container">
        <form class="form--default form--medium" action="{{ route('register') }}" method="post">
            @csrf
            <h1>Register </h1>
            @include('components.inputs.Input', [
                'name' => 'email',
                'placeholder' => 'Email',
                'type' => 'email',
                'value' => old('email'),
            ])
            @include('components.inputs.Input', [
                'name' => 'password',
                'placeholder' => 'Password',
                'type' => 'password',
            ])
            @include('components.inputs.Input', [
                'name' => 'password_confirmation',
                'placeholder' => 'Password again',
                'type' => 'password',
            ])
            <button type="submit">Register</button>
        </form>
    </div>
@endsection
