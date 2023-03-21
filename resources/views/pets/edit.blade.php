<x-app-layout title="Cooper Wash | Editar Mascota">
    <div class="p-4">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('pets.update', $edit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-flow-col auto-cols-max">
                    <label class="block mt-4 text-sm">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Mascota</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="name" value="{{ $edit->name }}" required>
                        </label>
                    </label>

                    <label class="block mt-4 text-sm">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Raza</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="race" value="{{ $edit->race }}" required>
                        </label>
                    </label>
                </div>

                <label class="block mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Tamaño</span>
                        <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="sizePets_id" required>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}" @if($size->id === $edit->sizePets_id) selected='selected' @endif>{{ $size->size }}</option>
                            @endforeach
                        </select>
                    </label>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Dueño
                    </span>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" id="SelectUser" name="user_id" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if($user->id === $edit->user_id) selected='selected' @endif>{{ $user->names }} {{ $user->father_last_name }} {{ $user->mother_last_name }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" value="{{ $edit->owner->id }}" id="user_id" name="user_id">
                    <div x-data={show:false}>
                        <button  @click="show=!show" id="btnUser" class="bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-3 text-sm focus:outline-none" type="button">
                            <i class="fas fa-user-edit"></i>
                            <span class="pl-1">Editar Usuario</span>
                        </button>
                        <div x-show="show" class="border px-4 py-3 my-2 text-gray-300">
                            <h4 class="text-center">Editar Usuario</h4>
                            <div class="grid grid-flow-col auto-cols-max">
                                <label class="block mt-4 text-sm">
                                    <label class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">Nombres:</span>
                                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="names" name="names">
                                    </label>
                                </label>
            
                                <label class="block mt-4 text-sm">
                                    <label class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">Primer Apellido:</span>
                                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="father_last_name" name="father_last_name">
                                    </label>
                                </label>

                                <label class="block mt-4 text-sm">
                                    <label class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">Segundo Apellido:</span>
                                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="mother_last_name" name="mother_last_name">
                                    </label>
                                </label>
                            </div>
                            <div class="grid grid-flow-col auto-cols-max">
                                <label class="block mt-4 text-sm">
                                    <label class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">Teléfono:</span>
                                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="phone" name="phone">
                                    </label>
                                </label>
            
                                <label class="block mt-4 text-sm">
                                    <label class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">Email:</span>
                                        <input type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="email" name="email">
                                    </label>
                                </label>
                            </div>
                            <br>
                        </div>
                    </div>
                </label>

                <div class="pt-6 flex justify-center">
                    <button id="btnEdit" type="submit" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <i class="fas fa-pencil-alt"></i>
                        <span class="pl-1">Editar Mascota</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script´s -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('#btnUser').on('click', function(){
                if($('#names').val() == ""){
                    $('#btnEdit').html('Editar Mascota y Usuario');

                    $('#SelectUser').attr('disabled', 'disabled');

                    $("#names").prop('required', true);
                    $("#father_last_name").prop('required', true);
                    $("#mother_last_name").prop('required', true);
                    $("#phone").prop('required', true);
                    $("#email").prop('required', true);

                    $('#names').val("{{ $edit->owner->names }}");
                    $('#father_last_name').val("{{ $edit->owner->father_last_name }}");
                    $('#mother_last_name').val("{{ $edit->owner->mother_last_name }}");
                    $('#phone').val("{{ $edit->owner->phone }}");
                    $('#email').val("{{ $edit->owner->email }}");
                } else {
                    $('#btnEdit').html('Editar Mascota');

                    $('#SelectUser').removeAttr('disabled');

                    $("#names").prop('required', false);
                    $("#father_last_name").prop('required', false);
                    $("#mother_last_name").prop('required', false);
                    $("#phone").prop('required', false);
                    $("#email").prop('required', false);

                    $('#names').val("");
                    $('#father_last_name').val("");
                    $('#mother_last_name').val("");
                    $('#phone').val("");
                    $('#email').val("");
                }
            });
        });
    </script>
</x-app-layout>