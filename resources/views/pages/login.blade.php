@extends('default-page')
@section('title', 'Convertiverse - Login')
@section('content')
    <div class="container middle-content">
        <h1>Login</h1>
        <div id="log-in-form">
            @if (session('message'))
                <div class="alert alert-success text-sm">
                    {{ session('message') }}
                </div>
            @endif
            @if ($errors->has('error'))
                <div class="error text-sm">{{$errors->first('error')}}</div>
            @endif
            <form action="{{route('login')}}" method="POST">
                <div class="input-group">
                    <input type="email" class="input-field" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" class="input-field" name="password" placeholder="Password" required>
                </div>
                <div class="form-button text-center mt-5">
                    <button class="btn">Sign In</button>
                </div>
                @csrf
            </form>
            <div class="text-sm text-center">
                <a href="{{route('page.sign-up')}}" class="link">Create an Account</a>, if you do not have one
            </div>
        </div>
    </div>
@endsection
