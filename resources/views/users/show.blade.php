<x-app-layout title="Cooper Wash | Expediente {{ $user->names }}">
    <div class="p-4">
        <div class="flex flex-wrap bg-gray-100 w-full h-screen">
            <div class="w-3/12 bg-white rounded p-3 shadow-lg">
                <div class="pt-8">
                    <div class="flex justify-center mb-4">
                        <div class="content-center block w-32 h-32 p-1 overflow-hidden text-center rounded-full focus:outline-none">
                            <img class="content-center object-cover w-full h-full border-2 border-gray-200 rounded-full" src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=50" alt="">
                        </div>
                    </div>
                    <p class="text-lg font-semibold text-center text-gray-800">{{ $user->names }} {{ $user->father_last_name }} {{ $user->mother_last_name }}</p>
                    <p class="text-sm font-medium text-center text-green-500">online</p>
                </div>
                  <div class="flex items-center w-full px-3 mt-6">
                    <div class="px-2 text-gray-500 rounded-full hover:text-gray-600">
                      <svg class="w-6 h-6 text-gray-600 fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill-rule="nonzero" d="M12,1 C18.0751322,1 23,5.92486775 23,12 C23,18.0751322 18.0751322,23 12,23 C5.92486775,23 1,18.0751322 1,12 C1,5.92486775 5.92486775,1 12,1 Z M12,3 C7.02943725,3 3,7.02943725 3,12 C3,16.9705627 7.02943725,21 12,21 C16.9705627,21 21,16.9705627 21,12 C21,7.02943725 16.9705627,3 12,3 Z M12,11 C12.5128358,11 12.9355072,11.3860402 12.9932723,11.8833789 L13,12 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4871642,18 11.0644928,17.6139598 11.0067277,17.1166211 L11,17 L11,12 C11,11.4477153 11.4477153,11 12,11 Z M12,6.5 C12.8284271,6.5 13.5,7.17157288 13.5,8 C13.5,8.82842712 12.8284271,9.5 12,9.5 C11.1715729,9.5 10.5,8.82842712 10.5,8 C10.5,7.17157288 11.1715729,6.5 12,6.5 Z"/>
                      </svg>
                    </div>
                    <div class="ml-4">
                      <div class="mr-auto text-sm font-semibold text-gray-800">{{ $user->created_at }}</div>
                      <div class="mt-1 mr-auto text-sm font-semibold leading-none text-gray-600">Registrado desde</div>
                    </div>
                  </div>
                  <div>
                    <div class="flex items-center w-full px-3 mt-4">
                      <div class="px-2 text-gray-500 rounded-full hover:text-gray-600">
                        <svg class="w-6 h-6 text-gray-600 fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                          <path fill-rule="nonzero" d="M12,1 C18.0751322,1 23,5.92486775 23,12 C23,15.2534621 21.3575416,17.4078375 19.0415827,17.5042247 C17.5448049,17.5665187 16.2418767,16.729824 15.5433162,15.3661459 C14.6550197,16.3039294 13.3958222,16.8888889 12,16.8888889 C9.29994122,16.8888889 7.11111111,14.7000588 7.11111111,12 C7.11111111,9.29994122 9.29994122,7.11111111 12,7.11111111 C13.1311057,7.11111111 14.1724943,7.49523561 15.000833,8.14015176 L15,8 C15,7.44771525 15.4477153,7 16,7 C16.5128358,7 16.9355072,7.38604019 16.9932723,7.88337887 L17,8 L17,13 C17,14.5880914 17.9057778,15.5497641 18.9584173,15.5059546 C20.0913022,15.4588053 21,14.2668872 21,12 C21,7.02943725 16.9705627,3 12,3 C7.02943725,3 3,7.02943725 3,12 C3,16.9705627 7.02943725,21 12,21 C12.7993259,21 13.583948,20.8960375 14.3403366,20.6929627 C14.8737319,20.549757 15.4222254,20.8660682 15.5654311,21.3994635 C15.7086368,21.9328588 15.3923256,22.4813523 14.8589303,22.624558 C13.9337959,22.8729377 12.9748353,23 12,23 C5.92486775,23 1,18.0751322 1,12 C1,5.92486775 5.92486775,1 12,1 Z M12,9.11111111 C10.4045107,9.11111111 9.11111111,10.4045107 9.11111111,12 C9.11111111,13.5954893 10.4045107,14.8888889 12,14.8888889 C13.5954893,14.8888889 14.8888889,13.5954893 14.8888889,12 C14.8888889,10.4045107 13.5954893,9.11111111 12,9.11111111 Z"/>
                        </svg>
                      </div>
                      <div>
                        <div class="ml-4 mr-auto text-sm font-semibold text-gray-800">{{ $user->email }}</div>
                        <div class="mt-1 ml-4 mr-auto text-sm font-semibold leading-none text-gray-600">Email</div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="flex items-center w-full px-3 mt-4">
                      <div class="px-2 text-gray-500 rounded-full hover:text-gray-600">
                        <svg class="w-6 h-6 text-gray-600 fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                          <path fill-rule="nonzero" d="M7.23584729,12.5662193 L9.59157842,9.95106331 C10.1552393,9.38932119 10.4467339,8.55220389 10.3497484,7.70703944 L10.091414,5.46219074 C9.9242391,4.0550699 8.7398983,3 7.3255142,3 L5.78463506,3 C4.20042472,3 2.90721409,4.32400855 3.00518508,5.90554894 C3.50830004,14.0123888 9.98998589,20.491257 18.0941879,20.9948033 C19.6759108,21.0927867 21.0001332,19.7995671 21.0001332,18.2153552 L21.0001332,16.6744677 C21.013787,15.2731573 19.9556245,14.0848636 18.5502962,13.917893 L16.2834192,13.6590644 C15.4388246,13.562143 14.601708,13.8536405 14.0021558,14.453196 L11.4339669,16.7640867 C9.87568608,15.7549411 8.52871768,14.4473269 7.47401517,12.9220367 L7.23584729,12.5662193 Z M13.2949234,17.779617 L15.3784355,15.9034093 C15.5842713,15.6995067 15.8165698,15.6186166 16.0559758,15.6460896 L18.3188767,15.9044538 C18.7112475,15.951083 19.003823,16.2796389 19.0000842,16.6646639 L19,18.2153552 C19,18.6635336 18.6307181,19.0242061 18.218031,18.9986413 C16.4722141,18.8901667 14.8122275,18.4649122 13.2949234,17.779617 Z M6.220439,10.7056813 C5.53504105,9.18831553 5.10972952,7.52810348 5.00135169,5.7817795 C4.97579551,5.36922745 5.33643432,5 5.78463506,5 L7.3255142,5 C7.72533936,5 8.0576092,5.29600256 8.10495475,5.6944964 L8.36282472,7.93536896 C8.39026139,8.17446174 8.30937042,8.40676528 8.14147101,8.5746656 L6.220439,10.7056813 Z"/>
                        </svg>
                      </div>
                      <div class="ml-4">
                        <div class="mr-auto text-sm font-semibold text-gray-800">{{ $user->phone }}</div>
                        <div class="mt-1 mr-auto text-sm font-semibold leading-none text-gray-600">Celuar</div>
                      </div>
                    </div>
                </div>
                <br>
                <ul class="flex flex-row items-center justify-around px-3 mb-1 list-none border-b select-none">
                  <li class="flex-auto px-4 mx-1 -mb-px text-center rounded-t-lg cursor-pointer last:mr-0 hover:bg-gray-200">
                    <a class="block py-3 text-xs font-bold leading-normal text-blue-500 uppercase border-b-4 border-blue-500">
                      Media
                    </a>
                  </li>
                  <li class="flex-auto px-4 mx-1 -mb-px text-center rounded-t-lg cursor-pointer last:mr-0 hover:bg-gray-200">
                    <a class="block py-3 text-xs font-bold leading-normal uppercase border-b-4 border-transparent">
                      Docs
                    </a>
                  </li>
                  <li class="flex-auto px-4 mx-1 -mb-px text-center rounded-t-lg cursor-pointer last:mr-0 hover:bg-gray-200">
                    <a class="block py-3 text-xs font-bold leading-normal uppercase border-b-4 border-transparent">
                      Links
                    </a>
                  </li>
                  <li class="flex-auto px-4 mx-1 -mb-px text-center rounded-t-lg cursor-pointer last:mr-0 hover:bg-gray-200">
                    <a class="block py-3 text-xs font-bold leading-normal uppercase border-b-4 border-transparent">
                      Audio
                    </a>
                  </li>
                </ul>
            </div>
        
            <div class="w-9/12">
                <div class="p-4 text-gray-500">
                    Content here...
                </div>
            </div>
        </div>
    </div>
</x-app-layout>