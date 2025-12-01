<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    @include('header')

    <div class="grid grid-cols-3 align-items-center justify-items-center">
        <div class="bg-white mx-7 p-2 mb-4 rounded-2xl shadow-lg col-start-2 mt-20 w-full h-auto">

            <h1 class="text-2xl font-bold mb-4 mt-10 text-center">Edit Profile</h1>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

            <form class="flex flex-col px-8" method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input
                    id="name"
                    type="text"
                    name="name"
                    class="outline-0 border-b-2 border-black pb-2 mb-4 w-full"
                    placeholder="Name"
                    value="{{ old('name', $user->name) }}"
                    required
                    autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                <!-- Email -->
                <x-input-label for="email" :value="__('Email')" class="mt-4" />
                <x-text-input
                    id="email"
                    type="email"
                    name="email"
                    class="outline-0 border-b-2 border-black pb-2 mb-4 w-full"
                    placeholder="Email"
                    value="{{ old('email', $user->email) }}"
                    required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <!-- Password -->
                <x-input-label for="password" :value="__('New Password')" class="mt-4" />
                <x-text-input
                    id="password"
                    type="password"
                    name="password"
                    class="outline-0 border-b-2 border-black pb-2 mb-4 w-full"
                    placeholder="Leave blank to keep current password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <!-- Confirm Password -->
                <x-input-label for="password_confirmation" :value="__('Confirm New Password')" class="mt-4" />
                <x-text-input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    class="outline-0 border-b-2 border-black pb-2 mb-6 w-full"
                    placeholder="Confirm New Password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                <!-- Submit -->
                <button class="bg-blue-500 text-white rounded-lg p-2 mt-2 mb-8" type="submit">
                    Update Profile
                </button>

                <p class="text-center mb-6">
                    <a href="/" class="text-blue-500">Back to Home</a>
                </p>
            </form>

        </div>
    </div>

</body>

</html>