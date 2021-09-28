<form action="{{ route('auth.preferences.destroy', ['customer' => $customer, 'number' => $number, 'preference' => $preference]) }}" method="POST">
    @csrf
    @method('delete')
    <button class="btn btn-outline-danger btn-sm">Delete</button>
</form>