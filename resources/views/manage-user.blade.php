<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola User') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6 flex justify-center">
        <div class="w-full max-w-4xl">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- User Management Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Baris untuk menampilkan pesan sukses atau error -->
                                @if(session('status') || session('error'))
                                    <tr>
                                        <td colspan="4" class="px-6 py-3">
                                            @if(session('status'))
                                                <div id="status-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            @if(session('error'))
                                                <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endif

                                <!-- Data Rows -->
                                @foreach($users as $user)
                                    @if($user->usertype === 'user')
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                @if($user->is_ban)
                                                    <span class="text-red-600">Banned</span>
                                                @else
                                                    <span class="text-green-600">Active</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                @if(!$user->is_ban)
                                                    <form action="{{ route('admin.ban-user', $user->id) }}" method="POST">
                                                        @csrf
                                                        <input type="text" name="ban_reason" placeholder="Reason for ban" class="border px-2 py-1 mr-2 rounded-lg">
                                                        <button type="submit" class="text-red-600 hover:text-red-900">Ban</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.unban-user', $user->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="text-green-600 hover:text-green-900">Unban</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // Menghilangkan pesan status setelah beberapa detik
    setTimeout(function() {
        const statusMessage = document.getElementById('status-message');
        const errorMessage = document.getElementById('error-message');
        if (statusMessage) {
            statusMessage.style.display = 'none';
        }
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 3000); // 3 detik
</script>
