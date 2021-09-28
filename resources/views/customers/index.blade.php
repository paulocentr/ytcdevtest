@extends('layouts.app')
@section('title', 'YTC Dev Test - Customers')
@section('description', 'YTC Dev Test - Customers Description')

@section('content')
@include('partials.nav')
<div class="container">
    <div class="row my-3">
        <div class="col-md-12">
            @include('partials.flash-messages')
        </div>
        <div class="col-md-12 my-3">
            <customersaddform-component :formurl="'{{ route('auth.customers.store') }}'"></customersaddform-component>
        </div>
        <div class="col-md-12">
            <customers-component></customers-component>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>

</script>
@endsection