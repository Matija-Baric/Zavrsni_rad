<x-layout-show>

    @include('partials._search')
    
    <a href="/" class="inline-block text-black ml-4 mb-4"
                    ><i class="fa-solid fa-arrow-left"></i> Back
                </a>
                <div class="mx-4">
                    <x-card class="p-10">
                        <div
                            class="flex flex-col items-center justify-center text-center"
                        >
                            {{-- <img
                                class="w-48 mr-6 mb-6"
                                src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/car-icon.jpg')}}"
                                alt=""
                            /> --}}
    
                            <h3 class="text-2xl mb-2">{{$listing->brand}}</h3>
                            <div class="text-xl font-bold mb-4">{{$listing->model}}</div>
    
                            <x-listing-tags :tagsCsv="$listing->tags" />
                            
                             <div class="text-lg my-4">
                                <i class="fa-solid fa-usd" aria-hidden="true"></i> {{$listing->price}}
                            </div>    
                                
                            <div class="text-lg my-4">
                                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                            </div>

                            <div class="text-lg my-4">
                                <a
                                 href="/listings/{{$listing->id}}/create-reservation"
                                 class="block text-white mt-6 py-2 px-2 rounded-xl hover:opacity-80"
                                        style="background-color:#545e68">
                                 <i class="fa fa-calendar" aria-hidden="true"></i> Create reservation
                                
                                </a>

                                <a
                                 href="/listings/{{$listing->id}}/reservation_schedule"
                                 class="block text-white mt-6 py-2 px-2 rounded-xl hover:opacity-80"
                                        style="background-color:#545e68">
                                 <i class="fa fa-calendar" aria-hidden="true"></i> See reservation schedule
                                
                                </a>
                                 
                            </div>


                            <div class="border border-gray-200 w-full mb-6"></div>
                            <div>
                                <h2 class="text-3xl font-bold mb-4">
                                    Car Description
                                </h2>
                                <div class="text-lg space-y-6">
                                    {{$listing->description}}
    
                                    <a
                                        href="mailto:{{$listing->email}}"
                                        class="block text-white mt-6 py-2 px-2 rounded-xl hover:opacity-80"
                                        style="background-color:#545e68"
                                        ><i class="fa-solid fa-envelope"></i>
                                        Contact for information</a
                                    >
    
                                </div>
                            </div>
                            
                    </div>
                    </x-card>
                    
                    
                </div>
    
</x-layout-show>