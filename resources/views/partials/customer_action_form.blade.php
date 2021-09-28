<form action="{{ route('auth.customers.destroy', ['customer' => $customer]) }}" method="POST">
    @csrf
    @method('delete')
    <button class="btn btn-outline-danger btn-sm">Delete</button>
</form>