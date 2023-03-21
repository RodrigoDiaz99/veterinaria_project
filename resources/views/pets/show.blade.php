<x-app-layout title="Cooper Wash | Expediente {{ $pet->name }}">
    <div class="p-4">
        <!-- component -->
        <div class="top h-64 w-full bg-blue-600 overflow-hidden relative">
            <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="" class="bg w-full h-full object-cover object-center absolute z-0">
            <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
                <img class="h-24 w-24 object-cover rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->profile_photo_url }}" aria-hidden="true" />
                <h1 class="text-2xl font-semibold">{{ $pet->name }}</h1>
                <h4 class="text-sm font-semibold">{{ $pet->race }}</h4>
            </div>
        </div>
        <div class="grid grid-cols-12 text-xs font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-700">
            <div class="col-span-12 w-full px-3 py-6 space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start">
                <h1 class="font-semibold uppercase">Datos Citas</h1>
                <hr>
                <div class="flex justify-start">
                    <div class="relative pt-1 h-full">
                        <div class="flex mb-2 items-center justify-between">
                            <div>
                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200">
                                    Citas Completadas
                                </span>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-semibold inline-block text-pink-600">
                                    {{ $total }}
                                </span>
                            </div>
                        </div>
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
                            <div style="width:{{ $total }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
                        </div>
                    </div>
                </div>
                <span class="text-center text-red-700">Citas Pendientes: {{ $contAppointments }}</span>
                <span class="text-center text-green-700">Citas Completadas: {{ $contRecords }} </span>
                <h1 class="font-semibold uppercase">Datos Dueño</h1>
                <hr>
                <div class="flex justify-start">
                    <svg class="w-4 h-4 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <span class="pl-2">{{ $pet->owner->names }}</span>
                </div>

                <div class="flex justify-start">
                    <svg class="w-4 h-4 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <span class="pl-2">{{ $pet->owner->phone}}</span>
                </div>

                <div class="flex justify-start">
                    <span class="text-xs">{{ $pet->owner->email }}</span>
                </div>
            </div>
        
            <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 md:col-span-10">
                <div class="px-4 pt-4">
                    <h1 class="font-semibold uppercase">Expediente</h1>
                    <hr>
                    <br>
                    <h2 class="text-center">PRESCRIPCIONES</h2>
                    <table class="w-full pt-2 whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3 text-center">PRESCRIPCIÓN</th>
                                <th class="px-4 py-3 text-center">FECHA</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($records as $record)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <p class="text-center">{{ $record->prescriptions }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <p class="text-center">{{ $record->created_at }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <h2 class="text-center">PESOS</h2>
                    <table class="w-full pt-2 whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3 text-center">PESO</th>
                                <th class="px-4 py-3 text-center">FECHA</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($records as $record)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <p class="text-center">{{ $record->weight }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <p class="text-center">{{ $record->created_at }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <h2 class="text-center">OBSERVACIONES</h2>
                    <table class="w-full pt-2 whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3 text-center">OBSERVACIONES</th>
                                <th class="px-4 py-3 text-center">FECHA</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($records as $record)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <p class="text-center">{{ $record->remarks }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <p class="text-center">{{ $record->created_at }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>