<x-app-layout title="Cooper Wash | Editar Cita">
    <div class="p-4">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('appointment.update', $appointment->id) }}" method="POST">
                @csrf
                @method('PUT')

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Mascota
                        </span>
                        <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="patient" autofocus required>
                            @foreach ($pets as $pet)
                                <option value="{{ $pet->id }}" @if($pet->id === $appointment->pet_id) selected='selected' @endif>{{ $pet->name }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Tipo Cita
                        </span>
                        <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="type" required>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @if($type->id === $appointment->typeOfAppointment_id) selected='selected' @endif>{{ $type->type }}</option>
                            @endforeach
                        </select>
                    </label>
        
                    <div class=" mt-4 text-sm">
                        <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                            <span for="datepicker" class="text-gray-700 dark:text-gray-400">Fecha Cita</span>
                            <div class="relative">
                                <input type="text" name="date" x-ref="date" hidden>
                                <input 
                                    type="text"
                                    readonly
                                    x-model="datepickerValue"
                                    @click="showDatepicker = !showDatepicker"
                                    @keydown.escape="showDatepicker = false"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Select date">

                                    <div class="absolute top-0 right-0 px-3 py-2">
                                        <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>

                                    <div 
                                        class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0" 
                                        style="width: 17rem" 
                                        x-show.transition="showDatepicker"
                                        @click.away="showDatepicker = false">

                                        <div class="flex justify-between items-center mb-2">
                                            <div>
                                                <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                                <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                            </div>
                                            <div>
                                                <button 
                                                    type="button"
                                                    class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full" 
                                                    :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                                    :disabled="month == 0 ? true : false"
                                                    @click="month--; getNoOfDays()">
                                                    <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                                    </svg>  
                                                </button>
                                                <button 
                                                    type="button"
                                                    class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full" 
                                                    :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                                    :disabled="month == 11 ? true : false"
                                                    @click="month++; getNoOfDays()">
                                                    <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>									  
                                                </button>
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap mb-3 -mx-1">
                                            <template x-for="(day, index) in DAYS" :key="index">	
                                                <div style="width: 14.26%" class="px-1">
                                                    <div
                                                        x-text="day" 
                                                        class="text-gray-800 font-medium text-center text-xs"></div>
                                                </div>
                                            </template>
                                        </div>

                                        <div class="flex flex-wrap -mx-1">
                                            <template x-for="blankday in blankdays">
                                                <div 
                                                    style="width: 14.28%"
                                                    class="text-center border p-1 border-transparent text-sm">
                                                </div>
                                            </template>	
                                            <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">	
                                                <div style="width: 14.28%" class="px-1 mb-1">
                                                    <div
                                                        @click="getDateValue(date)"
                                                        x-text="date"
                                                        class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                                        :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"	
                                                    ></div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="block text-sm">
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Hora Cita
                            </span>
                            <select name="time" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                            </select>
                        </label>

                        <!--<label class="block mt-4 text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Hora Cita</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="datepicker" name="time" value="{{ $appointment->timeOfAppointment }}" required>
                            </label>
                        </label>-->
                    </div>
                <div class="pt-6 flex justify-center">
                    <button type="submit" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <span>Editar Cita</span>
                        <svg class="w-4 h-4 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- component -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">

    <script>
        const MONTH_NAMES = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        const DAYS = ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'];

        function app() {
            return {
                showDatepicker: false,
                datepickerValue: '',

                month: '',
                year: '',
                no_of_days: [],
                blankdays: [],
                days: ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'],

                initDate() {
                    let today = new Date();
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                },

                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);

                    return today.toDateString() === d.toDateString() ? true : false;
                },

                getDateValue(date) {
                    let selectedDate = new Date(this.year, this.month, date);
                    this.datepickerValue = selectedDate.toDateString();

                    this.$refs.date.value = selectedDate.getFullYear() + "/" + ('0' + selectedDate.getMonth()).slice(-2)+1 + "/" + ('0' + selectedDate.getDate()).slice(-2);

                    //console.log(this.$refs.date.value);

                    this.showDatepicker = false;
                },

                getNoOfDays() {
                    let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                    // find where to start calendar day of week
                    let dayOfWeek = new Date(this.year, this.month).getDay();
                    let blankdaysArray = [];
                    for ( var i=1; i <= dayOfWeek; i++) {
                        blankdaysArray.push(i);
                    }

                    let daysArray = [];
                    for ( var i=1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }

                    this.blankdays = blankdaysArray;
                    this.no_of_days = daysArray;
                }
            }
        }
    </script>
</x-app-layout>