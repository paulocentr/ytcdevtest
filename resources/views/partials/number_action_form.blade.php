<form action="{{ route('auth.numbers.destroy', ['customer' => $customer, 'number' => $number]) }}" method="POST">
    @csrf
    @method('delete')
    <button class="btn btn-outline-danger btn-sm">Delete</button>
</form>