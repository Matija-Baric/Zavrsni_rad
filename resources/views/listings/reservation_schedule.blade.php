<x-layout>
    {{-- <form action="/listings/{listing}/reservation_schedule">
        <div class="relative border-2 border-gray-100 m-4 rounded-lg">
            <div class="absolute top-4 left-3">
                <i
                    class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
                ></i>
            </div>
            <input
                type="text"
                name="search_reservation"
                class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                placeholder="Search reservations..."
            />
            <div class="absolute top-2 right-2">
                <button
                    type="submit"
                    class="h-10 w-20 text-white rounded-lg  hover:bg-red-600"
                    style="background-color:#545e68"
                >
                    Search
                </button>
            </div>
        </div>
    </form> --}}


    <x-card class="p-10">
    <header>
        <h1
            class="text-3xl text-center font-bold my-6 uppercase"
        >
            Reservations Schedule
        </h1>
    </header>

<style>
    table tr td:empty {
  width: 50px;
}
  
table tr td {
  padding-top: 10px;
  padding-bottom: 10px;
}
</style>



<table>
    <tr>
        <th>Car brand</th>
        <th></th>
        <th>Car model</th>
        <th></th>
        <th>Start date</th>
        <th></th>
        <th>End date</th>
        <th></th>
        <th>Price per day</th>
        <th></th>
        <th>Total price</th>
        <th></th>
        <th>Car location</th>
        <th></th>
        <th>Email</th>
    </tr>
      
   
    @php
    if($id == 2)
    {   
        @endphp
        @foreach($reservations as $reservation)
        <tr>
           <td>{{ $reservation-> brand }}</td>
           <td></td>
           <td>{{ $reservation-> model }}</td>
           <td></td>
           <td>{{ $reservation-> Start_date }}</td>
           <td></td>
           <td>{{ $reservation-> End_date }}</td>
           <td></td>
           <td>{{ $reservation-> Price_per_day }}</td>
           <td></td>
           <td>{{ $reservation-> Total_price }}</td>
           <td></td>
           <td>{{ $reservation-> location }}</td>
           <td></td>
           <td>{{ $reservation-> email }}</td>
           <td></td>
            <td>
                <form method="POST" action="/reservation/{{$reservation->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
            </td>
           
           </tr>
           @endforeach
        
    @php
        }
    @endphp
    
    
        
    @foreach($reservations as $reservation)
    @php
   if($reservation->user_id == $id && $id != 2)
   {
        @endphp 
        
          <tr>
           <td>{{ $reservation-> brand }}</td>
           <td></td>
           <td>{{ $reservation-> model }}</td>
           <td></td>
           <td>{{ $reservation-> Start_date }}</td>
           <td></td>
           <td>{{ $reservation-> End_date }}</td>
           <td></td>
           <td>{{ $reservation-> Price_per_day }}</td>
           <td></td>
           <td>{{ $reservation-> Total_price }}</td>
           <td></td>
           <td>{{ $reservation-> location }}</td>
           <td></td>
           <td>{{ $reservation-> email }}</td>
           <td></td>
            
           
           </tr>
           @php
            } 
            @endphp
            @endforeach
    
            
       
        
    
    
</table>

    </x-card>
</x-layout>
