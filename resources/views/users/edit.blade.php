<x-app-layout title="Cooper Wash | Editar Usuario">
    <div class="p-4">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h2 class="text-center text-2xl">EDITAR A {{ $user->names }}</h2>
            <hr>
            <br>
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-flow-col auto-cols-max">
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Nombres</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="names" value="{{ $user->names }}" autofocus required>
                        </label>
                    </label>
                    
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Primer Apellido</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="father_last_name" value="{{ $user->father_last_name }}" required>
                        </label>
                    </label>
                    
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Segundo Apellido</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="mother_last_name" value="{{ $user->mother_last_name }}" required>
                        </label>
                    </label>
                </div>
                
                <div class="grid grid-flow-col auto-cols-max">
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Teléfono Celular</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="phone" value="{{ $user->phone }}" required>
                        </label>
                    </label>
                    
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Email</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="email" name="email" value="{{ $user->email }}" required>
                        </label>
                    </label>
                </div>

                <div class="pt-6 flex justify-center">
                    <button type="submit" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow">
                        <i class="fas fa-user-edit"></i>
                        <span class="pl-1">Editar Usuario</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>