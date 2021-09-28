@extends('layouts.app')
@section('title', 'YTC Dev Test - Edit Customer')
@section('description', 'YTC Dev Test - Edit Customer Description')

@section('content')
@include('partials.nav')
<div class="container">
    <div class="row my-3">
        <div class="col-md-12">
            @include('partials.flash-messages')
        </div>
        <div class="col-md-12 my-3">
            <h3>Customer: {{ $customer->name }}</h3>
        </div>
        <div class="col-md-12">
            <form action="{{ route('auth.customers.update', ['customer' => $customer]) }}" method="POST">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="col form-group">
                        <label for="">User</label>
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach (App\Models\User::all() as $u)
                            <option {{ ($u->id == $customer->user_id)?'selected':'' }} value="{{ $u->id }}">{{ $u->name }} - ({{ $u->email }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $customer->name }}">
                    </div>
                    <div class="col form-group">
                        <label for="">Document</label>
                        <input type="text" class="form-control" name="document" value="{{ $customer->document }}">
                    </div>
                    <div class="col form-group">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option {{ ($customer->status == 'new')?'selected':'' }} value="new">New</option>
                            <option {{ ($customer->status == 'active')?'selected':'' }} value="active">Active</option>
                            <option {{ ($customer->status == 'suspended')?'selected':'' }} value="suspended">Suspended</option>
                            <option {{ ($customer->status == 'cancelled')?'selected':'' }} value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('auth.customers.index') }}" class="btn btn-outline-secondary">Back</a>
                        <button class="btn btn-outline-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row my-3">
        <div class="col-md-12">
            <h5>Customer's numbers</h5>
        </div>
        <div class="col-md-12">
            <numbersaddform-component :formurl="'{{ route('auth.numbers.store', ['customer' => $customer]) }}'"></numbersaddform-component>
        </div>
        <div class="col-md-12 my-3">
            <numbers-component :customerid="'{{ $customer->id }}'"></numbers-component>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>

</script>
@endsection