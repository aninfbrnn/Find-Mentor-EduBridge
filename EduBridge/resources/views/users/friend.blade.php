<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Find Friend') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
        <!-- Filter Section -->
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <span class="font-bold text-gray-700">Filter By</span>
                        <form action="{{ route('users.friend') }}" method="GET" class="flex space-x-4">
                            <select name="education" class="border rounded pl-5 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <option value="">Pendidikan</option>
                                <option value="Mahasiswa" {{ request('education') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                <option value="SMA" {{ request('education') == 'SMA' ? 'selected' : '' }}>SMA</option>
                            </select>

                            <select name="interest" class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <option value="">Minat</option>
                                <option value="Sains" {{ request('interest') == 'Sains' ? 'selected' : '' }}>Sains</option>
                                <option value="Bisnis" {{ request('interest') == 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
                                <option value="Komunikasi" {{ request('interest') == 'Komunikasi' ? 'selected' : '' }}>Komunikasi</option>
                            </select>

                            <button type="submit" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition duration-150">
                                Apply Filter
                            </button>
                            
                            <a href="{{ route('users.friend') }}" class="border border-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-100 transition duration-150">
                                Clear Filter
                            </a>
                        </form>
                    </div>

                    <div class="relative">
                        <form action="{{ route('users.friend') }}" method="GET" class="flex items-center space-x-2">
                            <div class="relative">
                                <input 
                                    type="text" 
                                    name="search" 
                                    value="{{ request('search') }}"
                                    placeholder="Cari Teman" 
                                    class="border rounded pr-2 pl-8 focus:outline-none focus:ring-2 focus:ring-purple-500"
                                >
                                <svg class="w-4 h-4 absolute left-2 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <button type="submit" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition duration-150">
                                Search
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users List -->
        <div class="space-y-4">
            @foreach($users as $key => $user)
            <div class="bg-white rounded-lg shadow p-6 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <img 
                        src="https://picsum.photos/500/500?face-{{$key}}" 
                        alt="{{ $user->name }}'s avatar"
                        class="w-24 h-24 object-cover rounded-lg"
                    >
                    <div>
                        <h3 class="font-bold text-lg">{{ $user->name }}</h3>
                        <p class="text-gray-600">{{ $user->university }}</p>
                        <p class="text-gray-500">{{ $user->description }}</p>
                        <div class="flex space-x-2 mt-2">
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-sm">{{ $user->education }}</span>
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-sm">{{ $user->interest }}</span>
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <a href="/users"><button type="submit" class="w-full bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition duration-150">Add</button></a>
                    <form action="{{ route('users.not-interested', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full border border-red-500 text-red-500 px-4 py-2 rounded hover:bg-red-50 transition duration-150">Not Interested</button>
                    </form>
                </div>
            </div>
            @endforeach

            <!-- Add pagination links -->
            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
