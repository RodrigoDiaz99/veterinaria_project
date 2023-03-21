<x-app-layout title="Cooper Wash | Agregar Mascota">
    <div class="p-4">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('pets.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="grid grid-flow-col auto-cols-max">
                    <label class="block mt-4 text-sm">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Mascota</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="name" autofocus required>
                        </label>
                    </label>

                    <label class="block mt-4 text-sm">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Raza</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="race" required>
                        </label>
                    </label>
                </div>

                <label class="block mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Tamaño</span>
                        <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="sizePets_id" required>
                            <option value="" hidden disabled>SELECCIONE</option>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                            @endforeach
                        </select>
                    </label>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Dueño
                    </span>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" id="SelectUser" name="user_id" required>
                        <option value="" hidden disabled>SELECCIONE</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->names }} {{ $user->father_last_name }} {{ $user->mother_last_name }}</option>
                        @endforeach
                    </select>
                </label>

                <div class="pt-6 flex justify-center">
                    <button type="submit" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <i class="fas fa-plus-circle"></i>
                        <span class="pl-1">Agregar Mascota</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>