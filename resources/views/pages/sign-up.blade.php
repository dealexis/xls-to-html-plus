@extends('default-page')
@section('title', 'Convertiverse - Sign Up')
@section('content')
    <div class="container middle-content">
        <h1>Sign Up</h1>
        <div id="sign-in-form">
            @if($errors->isNotEmpty())
                <div class="error">
                    @foreach($errors->getMessages() as $error)
                        <p class="text-sm">
                            {{join(', ', $error)}}
                        </p>
                    @endforeach
                </div>
            @endif
            <form action="{{route('register')}}" method="POST">
                <div class="input-group">
                    <input type="text" class="input-field" placeholder="Name" name="name" required>
                </div>
                <div class="input-group">
                    <input type="email" class="input-field" placeholder="Email" name="email" required>
                </div>
                <div class="input-group">
                    <input type="password" class="input-field" placeholder="Password" name="password" required>
                </div>
                <div class="input-group">
                    <input type="password" class="input-field" placeholder="Repeat Password" name="c_password" required>
                </div>
                <div class="form-button text-center mt-5">
                    <button class="btn">Create Account</button>
                </div>
                @csrf
            </form>
            <div class="terms text-sm text-center">
                By submitting, you do agree to the <a href="{{route('page.terms')}}">terms and conditions</a>
            </div>
            <div class="text-sm text-center">
                Already have an account? <a href="{{route('page.login')}}" class="link">Log in</a>
            </div>
        </div>
    </div>
@endsection
