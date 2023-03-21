<x-app-layout title="Cooper Wash | Usuarios">
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="float-right pt-3 pb-4">
                <a class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" href="{{ route("user.create") }}" style="transition: all .15s ease">
                    <i class="fas fa-user-plus"></i> Agregar Usuario
                </a>
            </div>
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">USER</th>
                            <th class="px-4 py-3">EMAIL</th>
                            @role('Super-Admin')
                                <th class="px-4 py-3 text-center">ROLE</th>
                                <th class="px-4 py-3">PERMISSIONS</th>
                            @endrole
                            <th class="px-4 py-3 text-center">MASCOTAS</th>
                            <th class="px-4 py-3 text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($users as $user)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->profile_photo_url }}" aria-hidden="true" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                        </div>
                                        <div>
                                            <p class="font-semibold uppercase">{{ $user->names }} {{ $user->father_last_name }} {{ $user->mother_last_name}}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $user->phone }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-sm lowercase">
                                    {{ $user->email }}
                                </td>
                                
                                @role('Super-Admin')
                                    <td class="px-4 py-3 text-sm uppercase text-center">
                                        @if($user->getRoleNames()[0] == "Super-Admin")
                                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                {{ $user->getRoleNames()[0] }}
                                            </span>
                                        @endif
                                        
                                        @if($user->getRoleNames()[0] == "Admin")
                                            <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                {{ $user->getRoleNames()[0] }}
                                            </span>
                                        @endif
                                        
                                        @if($user->getRoleNames()[0] == "Client")
                                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                {{ $user->getRoleNames()[0] }}
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 text-sm uppercase text-center">
                                        <ul class="list-decimal">
                                            @foreach ($user->getPermissionsViaRoles() as $permissions)
                                                <li>{{ $permissions->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                @endrole

                                <td class="px-4 py-3 text-sm text-center">
                                    @foreach ($user->pets as $pet)
                                        <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease">{{ $pet->name }}</button>
                                    @endforeach
                                </td>

                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('user.show', $user->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Show">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('user.edit', $user->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" aria-label="Delete">
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