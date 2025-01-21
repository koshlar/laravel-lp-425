@extends('layouts.main')

@section('content')
    <div class="container">

        <h1>Login page!</h1>
        <form action="{{ route('login') }}" method="post">
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
            ])
            <button type="submit">Login</button>
        </form>
    </div>
@endsection
