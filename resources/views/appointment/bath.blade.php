<x-app-layout title="Cooper Wash | Baño {{ $appointment->pet->name }}">
    <div class="p-4">
        <div class="px-4 py-3 mb-8 text-xs font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-700">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3 text-center text-3xl">DATOS BAÑO</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td>
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr class="text-2xl font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3 text-center">BAÑO</th>
                                            <th class="px-4 py-3 text-center">LIMPIEZA DENTAL</th>
                                            <th class="px-4 py-3 text-center">Alergias u Observaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 text-center uppercase text-2xl">{{ $appointment->type->type }}</td>
                                            <td class="px-4 py-3 text-center uppercase text-2xl">
                                                @if ($appointment->dental_cleaning != 0)
                                                    <i class="fas fa-check text-green-500"></i>
                                                @else
                                                    <i class="fas fa-times text-red-500"></i>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 text-center uppercase text-xl text-blue-500">
                                                @if ($appointment->observations != null)
                                                    {{ $appointment->observations }}

                                                @else
                                                    NINGUNO
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>

            <table class="w-full pt-2 whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3 text-center text-3xl">ESTADO BAÑO</th>
                    </tr>
                </thead>
            </table>

            <div class="w-full py-6">
                <div class="flex">
                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-white w-full">
                                    <i class="fas fa-bath"></i>
                                </span>
                            </div>
                        </div>
                
                        <div class="text-xs text-center md:text-base">Baño</div>
                    </div>
                
                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                    <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                                </div>
                            </div>
                    
                            <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-gray-600 w-full">
                                    <i class="fas fa-wind"></i>
                                </span>
                            </div>
                        </div>
                
                        <div class="text-xs text-center md:text-base">Secado</div>
                    </div>
                
                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                    <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                                </div>
                            </div>
                    
                            <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-gray-600 w-full">
                                    <i class="fas fa-broom"></i>
                                </span>
                            </div>
                        </div>
                
                        <div class="text-xs text-center md:text-base">Limpieza de oídos</div>
                    </div>
                
                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                    <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                                </div>
                            </div>
                    
                            <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-gray-600 w-full">
                                    <i class="fas fa-cut"></i>
                                </span>
                            </div>
                        </div>
                
                        <div class="text-xs text-center md:text-base">Corte y limado de uñas</div>
                    </div>

                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                    <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                                </div>
                            </div>
                    
                            <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-gray-600 w-full">
                                    <i class="fas fa-spray-can"></i>
                                </span>
                            </div>
                        </div>
                
                        <div class="text-xs text-center md:text-base">Decorado y perfume</div>
                    </div>

                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                    <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                                </div>
                            </div>
                    
                            <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-gray-600 w-full">
                                    <i class="fas fa-american-sign-language-interpreting"></i>
                                </span>
                            </div>
                        </div>
                
                        <div class="text-xs text-center md:text-base">Detalles finales</div>
                    </div>

                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                    <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                                </div>
                            </div>
                    
                            <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-gray-600 w-full">
                                    <i class="fas fa-check"></i>
                                </span>
                            </div>
                        </div>
                
                        <div class="text-xs text-center md:text-base">Finalizado</div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-xl px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease">
                    <span>Iniciar Baño</span>
                    <i class="fas fa-shower"></i>
                </button>
            </div>
        </div>
    </div>
</x-app-layout>