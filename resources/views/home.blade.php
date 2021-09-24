@extends('layouts.app')
@section('title', 'YTC Dev Test - Home')
@section('description', 'YTC Dev Test - Homepage Description')

@section('content')
@include('partials.nav')
<div class="container">
    <div class="row my-3">
        <div class="col">
            <div class="card ">
                <div class="card-header">
                    <h3>Laravel test</h3>
                </div>
                <div class="card-body">
                    <p>Create a Laravel 8 application following the rules in this doc</p>
                    <br>
                    <a href="{{ asset('laravel_arena_test.pdf') }}" target="_blank">Laravel Arena Test</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
