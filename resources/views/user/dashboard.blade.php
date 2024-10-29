<form action="{{ route('user.logout') }}" method="POST">
    <h1>Dashboard</h1>
    @csrf
    <button type="submit" class="btn btn-primary">Logout</button>
</form>