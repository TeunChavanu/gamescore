<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    @include('header')

    <div class="max-w-7xl mx-auto mt-20 p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Admin Dashboard</h1>

        @if(auth()->check() && auth()->user()->role === 'admin')
        <div class="bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-2xl font-semibold mb-4">Users</h2>

            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="py-2 px-4">ID</th>
                        <th class="py-2 px-4">Name</th>
                        <th class="py-2 px-4">Email</th>
                        <th class="py-2 px-4">Role</th>
                        <th class="py-2 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $user->id }}</td>
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4">{{ $user->role }}</td>
                        <td class="py-2 px-4">
                            @if($user->role !== 'admin')
                            <form method="POST" action="{{ route('admin.promote', $user->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-lg">Promote</button>
                            </form>
                            @else
                            <span class="text-gray-500">Admin</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center text-red-500 mt-10">You are not an admin and cannot view this page.</p>
        @endif
    </div>

</body>

</html>