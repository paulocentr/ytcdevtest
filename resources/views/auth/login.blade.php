@extends('layouts.app')
@section('title', 'YTC Dev Test - Login')
@section('description', 'YTC Dev Test - Login Description')
@section('content')
<section class="align-items-center bg-secondary d-flex min-vh-100 pb-5 pt-5 text-secondary">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-md-9 col-xl-9 ml-auto mr-auto">
                <div class="bg-dark overflow-hidden rounded-lg">
                    <div class="align-items-center no-gutters row">
                        <div class="col-lg-6 p-4 pl-sm-5 pr-sm-5 text-center text-white">
                            <img class="img-fluid w-100" src="{{ asset('logo.svg') }}" alt="">
                        </div>
                        <div class="bg-white col-lg-6 pb-5 pl-4 pl-sm-5 pr-4 pr-sm-5 pt-5">
                            <div class="pb-lg-4 pt-lg-4">
                                <h1 class="h2 mb-1 text-dark">Sign In</h1>
                                <p class="mb-4">Please type in your credentials.</p>
                                <form action="{{ url('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="flex-nowrap input-group">
                                            <div class="input-group-prepend">
                                                <span class="bg-light input-group-text" id="user-email-input">
                                                    <i class="far fa-envelope"></i>
                                                </span>
                                            </div>
                                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="User Email" aria-describedby="user-email-input" />
                                        </div>
                                        @error('email')
                                            <span class="help-block text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="flex-nowrap input-group">
                                            <div class="input-group-prepend">
                                                <span class="bg-light input-group-text" id="user-password-input">
                                                    <i class="fas fa-key"></i>
                                                </span>
                                            </div>
                                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="user-password-input" />
                                        </div>
                                        @error('password')
                                            <span class="help-block text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary font-weight-bold pb-2 pl-3 pr-3 pt-2">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection