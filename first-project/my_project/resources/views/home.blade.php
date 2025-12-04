@php
    $name="Malik Kamil";
    $user='Muhammad';
    $names=["malik","kamil","shami","king","khan","ahmad"];
@endphp
<h1>{{$user}}</h1>
<h1>{{$name}}</h1>

{{-- {{!!'<script>alert("hi kamil!")</script>'!!}} --}}
@foreach ($names as $name)
    <ul>
    
        {{-- <li>{{$loop->index}}-{{$name}}</li> --}}
        {{-- <li>{{$loop->iteration}}-{{$name}}</li> --}}
        {{-- <li>{{$loop->count}}-{{$name}}</li> --}}
        {{-- <li>{{$loop->count}}-{{$name}}</li> --}}
   
        {{-- @if ($loop->first)
           <li style="color:red">{{$name}}</li> 
        @elseif($loop->last)
        <li style="color:green">{{$name}}</li>
        @else
            <li>{{$name}}</li>
        @endif --}}
        @if($loop->even)
        <li style="color:red">{{$name}}</li>
        @elseif($loop->odd)
        <li style="color:rgb(132, 0, 255)">{{$name}}</li>
        @endif

    </ul>
@endforeach