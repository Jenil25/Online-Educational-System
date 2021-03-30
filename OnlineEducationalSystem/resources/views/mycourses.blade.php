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

    <table class = "container">
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
                    <!-- <div class="col"> <a href="#" class="btn btn-light btn-block" >Enroll Now</a> </div> -->
                    <div class="col"> <a href="#" class="btn btn-light btn-block" > Continue </a> </div>
                    </div>
                </div> 
            </div>
    </div>
    <td>
    @endforeach
    </tr>
    </table>

</x-app-layout>
