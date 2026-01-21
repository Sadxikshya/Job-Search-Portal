<x-layout>
    <x-slot:heading>
        Change Password
    </x-slot:heading>

    <form method="POST" action="{{ route('password.update') }}" class="space-y-4 max-w-md">
        @csrf

        <div>
            <label class="block text-sm font-medium">Current Password</label>
            <input type="password" name="current_password" class="w-full border rounded px-3 py-2">
            @error('current_password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">New Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2">
            @error('password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
            Update Password
        </button>

    </form>
</x-layout>
