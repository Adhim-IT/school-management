
<nav class="bg-white shadow p-4 flex justify-between">
    <h1 class="text-xl font-bold">School Management</h1>

    @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-red-600 text-white px-4 py-2 rounded">Logout</button>
        </form>
    @endauth
</nav>