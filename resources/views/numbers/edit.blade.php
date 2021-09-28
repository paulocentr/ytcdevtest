@extends('layouts.app')
@section('title', 'YTC Dev Test - Edit Customer number')
@section('description', 'YTC Dev Test - Edit Customer number Description')

@section('content')
@include('partials.nav')
<div class="container">
    <div class="row my-3">
        <div class="col-md-12">
            @include('partials.flash-messages')
        </div>
        <div class="col-md-12 my-3">
            <h3>Customer's Number: {{ $number->number }}</h3>
        </div>
        <div class="col-md-12">
            <form action="{{ route('auth.numbers.update', ['customer' => $customer, 'number' => $number]) }}" method="POST">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="col form-group">
                        <label for="">Number</label>
                        <input type="text" class="form-control" name="number" value="{{ $number->number }}" required maxlength="14" minlength="8">
                    </div>
                    <div class="col form-group">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option {{ ($number->status == 'active')?'selected':'' }} value="active">Active</option>
                            <option {{ ($number->status == 'inactive')?'selected':'' }} value="inactive">Inactive</option>
                            <option {{ ($number->status == 'cancelled')?'selected':'' }} value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('auth.customers.edit', ['customer' => $customer, 'number' => $number]) }}" class="btn btn-outline-secondary">Back to customer</a>
                        <button class="btn btn-outline-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row my-3">
        <div class="col-md-12">
            <h5>number's preferences</h5>
        </div>
        <div class="col-md-12">
            <preferencesaddform-component :formurl="'{{ route('auth.preferences.store', ['customer' => $customer, 'number' => $number]) }}'"></preferencesaddform-component>
        </div>
        <div class="col-md-12 my-3">
            <preferences-component :customerid="'{{ $customer->id }}'" :numberid="'{{ $number->id }}'"></preferences-component>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>

</script>
@endsection