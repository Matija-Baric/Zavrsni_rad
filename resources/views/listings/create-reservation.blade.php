<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
                        <header class="text-center">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Create New Reservation
                            </h2>
                            
                        </header>

                        
                        <form method="POST" action="/reservation/{{$listing->id, $listing->model, $listing->user_id, $listing->email, $listing->location,$listing->brand}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-6">
                                <label for="Start_date" class="inline-block text-lg mb-2"
                                    >Start of reservation</label
                                >
                                <input
                                    type="date"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="Start_date"
                                    placeholder="Example: 2022 18 10"
                                    value="{{old('Start_date')}}"
                                />
    
                                @error('Start_date')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label for="Start_date" class="inline-block text-lg mb-2"
                                    >End of reservation</label
                                >
                                <input
                                    type="date"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="End_date"
                                    placeholder="Example: 2022 25 10"
                                    value="{{old('End_date')}}"
                                />
    
                                @error('End_date')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label
                                    for="Price_per_day"
                                    class="inline-block text-lg mb-2"
                                    >Car Price Per Day</label
                                >
                                <input
                                    type="integer"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="Price_per_day"
                                    placeholder="Example: 50"
                                    value="{{old('price')}}"
                                />
                                @error('Price_per_day')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
    
                            <div class="mb-6">
                                <button
                                    class="text-white rounded py-2 px-4 hover:bg-black"
                                    style="background-color:#545e68"
                                >
                                    Create Reservation
                                </button>
    
                                <a href="/" class="text-black ml-4"> Back </a>
                            </div>
                        </form>
    </x-card>
    </x-layout>