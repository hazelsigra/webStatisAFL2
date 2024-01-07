@extends('Layout.MainLayout')

@section('container')
    <div class="container" style="max-width:50%">
        <h1 style="text-align: centre">Login </h1>
        <form action="/login" method="post">
            @csrf
            @error('email')
                @if (str_contains($message, 'not match'))
                    <div class="alert alert-warning" role="alert">Oops! Email or password is not match.</div>
                @endif
            @enderror
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="email-validation-message" value="{{ old('email') }}">
                @error('email')
                    <div id="email-validation-message" class="form-text">Oops! We need your email address to proceed.</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" aria-describedby="password-validation-message">
                @error('password')
                    @if (str_contains($message, 'required'))
                        <div id="password-validation-message" class="form-text">Oops! The passwords you entered don't match. Please make sure they are identical.</div>    
                    @endif
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>        
        </form>
    </div>
@endsection
