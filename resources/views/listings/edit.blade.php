
<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
                        <header class="text-center">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Edit Car
                            </h2>
                           
                        </header>
    
                        <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-6">
                                <label
                                    for="brand"
                                    class="inline-block text-lg mb-2"
                                    >Car Brand</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="brand" value="{{$listing->brand}}"
                                />
                                @error('brand')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="model" class="inline-block text-lg mb-2"
                                    >Car Model</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="model"
                                    placeholder="Example: A4 2012"
                                    value="{{$listing->model}}"
                                />
    
                                @error('model')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label
                                    for="price"
                                    class="inline-block text-lg mb-2"
                                    >Car Price</label
                                >
                                <input
                                    type="integer"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="price"
                                    placeholder="Example: 200"
                                    value="{{$listing->price}}"
                                />
                                @error('price')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label
                                    for="location"
                                    class="inline-block text-lg mb-2"
                                    >Car Location</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="location"
                                    placeholder="Example: Remote, Boston MA, etc"
                                    value="{{$listing->location}}"
                                />
                                @error('location')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="email" class="inline-block text-lg mb-2"
                                    >Contact Email</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="email"
                                    value="{{$listing->email}}"
                                />
    
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            
    
                            <div class="mb-6">
                                <label for="tags" class="inline-block text-lg mb-2">
                                    Tags (Comma Separated)
                                </label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="tags"
                                    placeholder="Example: Laravel, Backend, Postgres, etc"
                                    value="{{$listing->tags}}"
                                />
    
                                @error('tags')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="logo" class="inline-block text-lg mb-2">
                                    Car Picture
                                </label>
                                <input
                                    type="file"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="logo"/>

                                    <img
                                    class="w-48 mr-6 mb-6"
                                    src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/car-icon.jpg')}}"
                                    alt=""
                                />
    
                                @error('logo')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label
                                    for="description"
                                    class="inline-block text-lg mb-2"
                                >
                                    Car Description
                                </label>
                                <textarea
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="description"
                                    rows="10"
                                    placeholder="Include tasks, requirements, salary, etc">
                                    {{$listing->description}}
                                    </textarea>
    
                                @error('description')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div> 
    
                            <div class="mb-6">
                                <button
                                    class=" text-white rounded py-2 px-4 hover:bg-black"
                                    style="background-color:#545e68"
                                >
                                    Edit Car
                                </button>
    
                                <a href="/" class="text-black ml-4"> Back </a>
                            </div>
                        </form>
    </x-card>
    </x-layout>