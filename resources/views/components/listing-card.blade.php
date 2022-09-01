@props(['listing'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/car-icon.jpg')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}">{{$listing->brand}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->model}}</div>
            <x-listing-tags :tagsCsv="$listing->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</div>
</x-card>