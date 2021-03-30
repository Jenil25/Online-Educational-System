<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Courses') }}
        </h2>
    </x-slot>
    <br>

    <!-- <table class = "container">
    <tr>
    @foreach ($mycourses as $course)
    <td>
    <div class="col mx-auto">
            <div class="card mx-auto" style="width: 18rem;">
                <img src="/{{ $course->thumbnail }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <b>{{ $course->name }}</b> </h5>
                    <p class="card-text m-0 p-0"> {{ $course->desc }} </p> 
                    <p class="price"> ₹ {{ $course->price }}</p>
                </div>

            <div class="card-footer p-0 border-0">
                    <div class="row no-gutters p-1">
                    <div class="col"> <a href="#" class="btn btn-light btn-block" >Enroll Now</a> </div>
                    <div class="col"> <a href="#" class="btn btn-light btn-block" > Show More </a> </div>
                    </div>
                </div> 
            </div>
    </div>
    <td>
    @endforeach
    </tr>
    </table> -->
    @if( empty($mycourses) )
    <div class="alert alert-primary" role="alert">
        You haven't enrolled in any course yet! Start Today!!
    </div>
    @endif
    <table class = "container">
    @php( $i=0 )
    <tr>
    @foreach ($mycourses as $course)
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
    <div class="col mx-auto shadow-none p-3 mb-5 bg-light rounded"> <!-- Course Card -->
            <div class="card mx-auto" style="width: 21rem;">
                <img src="/{{ $course->thumbnail }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <b>{{ $course->name }}</b> </h5>
                    <p class="card-text m-0 p-0"> {{ $course->desc }} </p> 
                    <p>Duration: {{ $course->length }}</p>
                    <p>Prerequisite:<br> {{ $course->prerequisite }}</p>
                    <p>What you will Learn:<br> {{ $course->learning }}</p>
                </div>

            <div class="card-footer p-0 border-0">
                    <div class="row no-gutters p-1">
                    <div class="col"> <a href="{{ route('showcourse',['id'=>$course->id]) }}" class="btn btn-light btn-block" > Continue Learning</a> </div>
                    </div>
                </div> 
            </div>
    </div> <!-- Course Card End-->
    </td>
    @if( $i%3 == 0)
    </tr>
    @endif
    @endforeach
    </tr>
    </table>

</x-app-layout>
