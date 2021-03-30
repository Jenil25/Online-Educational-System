<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>
    <br>

    <table class = "container">
    @php( $i=0 )
    <tr>
    @foreach ($courses as $course)
    @if( $i%3 == 0)
    <tr>
        <td>
        <br>
        </td>
    </tr>
    <tr>
    @endif
    @php($i++)
    <td>
    <div class="col mx-auto shadow-none p-3 mb-5 bg-light rounded">
            <div class="card mx-auto" style="width: 21rem;">
                <img src="/{{ $course->thumbnail }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <b>Name: {{ $course->name }}</b> </h5>
                    <p class="card-text m-0 p-0"> {{ $course->desc }} </p> 
                    <br>
                    <p class="price">Price: ₹ {{ $course->price }}</p>
                    <p>Duration: {{ $course->length }}</p>
                    <p>Prerequisite:<br> {{ $course->prerequisite }}</p>
                    <p>What you will Learn:<br> {{ $course->learning }}</p>
                </div>

            <div class="card-footer p-0 border-0">
                    <div class="row no-gutters p-1">
                    @if(in_array($course,$usercourses))
                        <div class="col"> <a href="{{ route('showcourse',['id'=>$course->id]) }}" class="btn btn-light btn-block" > Continue Learning </a> </div>
                    @else
                    <div class="col"> <a href="{{ route('enroll',['id'=>$course->id]) }}" class="btn btn-light btn-block" >Enroll Now</a> </div>
                    @endif
                    </div>
                </div> 
            </div>
    </div>
    </td>
    @if( $i%3 == 0)
    </tr>
    @endif
    @endforeach
    </tr>
    </table>

</x-app-layout>
