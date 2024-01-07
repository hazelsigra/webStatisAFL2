@extends('Layout.MainLayout')

@section('container')
    <div class="container" style="max-width:50%">
        <h1 style="text-align: centre">Register </h1>
        <form action="/register" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="name-validation-message" value="{{ old('name') }}">
                @error('name')
                    <div id="name-validation-message" class="form-text text-danger">Oops! We need your name to proceed.</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="email-validation-message" value="{{ old('email') }}">
                @error('email')
                    <div id="email-validation-message" class="form-text text-danger">Oops! We need your email to proceed.</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" aria-describedby="password-validation-message">
                @error('password')
                    @if (str_contains($message, 'required'))
                        <div id="password-validation-message" class="form-text text-danger">Oops! We need your password to proceed.</div>    
                    @endif
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password" aria-describedby="password-confirmation-validation-message">
                @error('password')
                    @if (str_contains($message, 'field confirmation'))
                        <div id="password-confirmation-validation-message" class="form-text text-danger">Oops! We need your password to proceed.</div>    
                    @endif
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
