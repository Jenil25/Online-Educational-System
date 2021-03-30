<x-app-layout>
    <br>
    <style>
    .price {
        font-size: 20px;
        color: rgb(86, 87, 73);
    }

    #videoList {
        overflow-y: scroll;
    }
    </style>

    <style>
    .active-video {
        color: rgb(66, 166, 206);
        background-color: rgb(251, 255, 10);
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
    <div class="card p-3">
      <div class="row"> <!-- Player -->
    <div class="col"> 
          <div>
            <iframe id="player" width="100%" height="515" src="https://www.youtube.com/embed/{{ $video->link }}"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
    </div> <!-- PlayerEnd -->
    <div class="col-3"> <!-- Lecture List -->

          <ul id="videoList" class="list-group">

            @foreach($videos as $video)
                <br>
                <a href="?id={{ $cid }}&vid={{ $video->id }}">{{ $video->title }}</a>
            @endforeach

          </ul>
    </div> <!-- Lecture List End -->
    <div>
              <h5>Prerequisite: {{ $course->prerequisite }}
              <br>
              <br>
              Download material in PDF from <b><a href="{{ route('downloadpdf',['file'=>$course->resource]) }}">here</a></b></h5>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</x-app-layout>
