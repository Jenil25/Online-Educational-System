<x-app-layout>
    <br>
    <style>
    .price {
        font-size: 20px;
        color: rgb(86, 87, 73);
    }

    #videoList {
        overflow-y: scroll;
        height: 515px;
    }
    </style>

    <style>
    .active-video {
        color: rgb(66, 166, 206);
        background-color: rgb(133, 216, 112);
    }
    </style>

    <style>
    a:hover {
        text-decoration: none;
    }

    a {
        color: rgb(107, 103, 103);
    }
    </style>

    @if(!empty($message))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @endif
    <div class="container-fluid">
    <div>
    <div class="card p-3">
    <div class="row">
    <div class="col"> <!-- Player -->
        <div>
            <iframe id="player" width="100%" height="515" src="https://www.youtube.com/embed/{{ $video->link }}"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </div> <!-- PlayerEnd -->
    <div class="col-3"> <!-- Lecture List -->
            <ul id="videoList" class="list-group">
                @foreach($videos as $videolist)
                    <br>
                    <li class="list-group-item @if ($videolist == $video) active-video @endif">
                    <a href="showcourse?id={{ $cid }}&vid={{ $videolist->id }}">{{ $videolist->title }}</a>
                @endforeach
            </ul>
    </div> <!-- Lecture List End -->
    </div> <!-- Row End -->
    </div> <!-- Card p-3 End -->
    <!-- Prerequisite And PDF Download -->
        <div class="mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Prerequisite: </h5>
                    <p class="card-text">
                        {{ $course->prerequisite }}
                    </p>
                </div>
            </div>
        </div>
        
        <div class="mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Download material in PDF form : </h5>
                    <p class="card-text">
                        <b><a href="{{ route('downloadpdf',['file'=>$course->resource]) }}"> <button type="button" class="btn btn-white shadow"> Click Here </button> </a></b>
                    </p>
                </div>
            </div>
        </div>
    <!-- Prerequisite And PDF Download End -->
    </div>
    </div> <!-- Container fluid End -->
</x-app-layout>
