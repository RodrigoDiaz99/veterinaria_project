<x-app-layout title="Cooper Wash | Agregar Usuario">
    <div class="p-4">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h2 class="text-center text-2xl">DATOS USUARIO</h2>
            <hr>
            <br>
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="grid grid-flow-col auto-cols-max">
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Nombres</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="names" autofocus required>
                        </label>
                    </label>
                    
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Primer Apellido</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="father_last_name" required>
                        </label>
                    </label>
                    
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Segundo Apellido</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="mother_last_name">
                        </label>
                    </label>
                </div>
                
                <div class="grid grid-flow-col auto-cols-max">
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Teléfono Celular</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="phone" required>
                        </label>
                    </label>
                    
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Email</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="email" name="email" required>
                        </label>
                    </label>
                </div>
                
                <label class="flex flex-col mb-4">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="password" name="password" required>
                    </label>
                </label>
                <br>
                <h2 class="text-center text-2xl">DATOS MASCOTA</h2>
                <hr>
                <br>
                <div class="grid grid-flow-col auto-cols-max">
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="name" required>
                        </label>
                    </label>
                        
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Raza</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="race" required>
                        </label>
                    </label>
                </div>
                
                <div class="grid grid-flow-col auto-cols-max">
                    <label class="flex flex-col mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Tamaño</span>
                            <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select" name="size" required>
                                <option value="" hidden disables>SELECCIONE TAMAÑO</option>
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach
                            </select>
                        </label>
                    </label>
                </div>

                <div class="pt-6 flex justify-center">
                    <button type="submit" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <i class="fas fa-user-plus"></i>
                        <span class="pl-1">Agregar Usuario y Mascota</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>