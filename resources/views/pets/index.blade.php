<x-app-layout title="Cooper Wash | Mascotas">
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="float-right pt-3 pb-4">
                <a class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" href="{{ route("pets.create") }}" style="transition: all .15s ease">
                    <i class="fas fa-plus"></i> Agregar Mascota
                </a>
            </div>
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">MASCOTA</th>
                            <th class="px-4 py-3">DUEÑO</th>
                            <th class="px-4 py-3 text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($pets as $pet)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->profile_photo_url }}" aria-hidden="true" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $pet->name }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $pet->race }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $pet->owner->names }} {{ $pet->owner->father_last_name }} {{ $pet->owner->mother_last_name }}
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        {{ $pet->owner->phone }}
                                    </p>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('pets.show', $pet->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Show">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('pets.edit', $pet->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" aria-label="Delete">
                                            @csrf
                                            @method('DELETE')
                                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" onclick="return confirm('Estás seguro que deseas eliminar el registro?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</x-app-layout>