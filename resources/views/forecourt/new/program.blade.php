@extends('template.forecourt-new')

@section('content')
<main class="main">
    <section class="program section top__section">
        <div class="container">
        @if(count($programs) != 0)
        <div class="carousel slide" id="programCarousel" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($programs as $i=>$program)
                    <div class="carousel-item <?= $i==0 ? "active" : "" ?> mh-100">
                        <div class="row mx-0">
                            <h2 class="section__title mx-auto px-2 text-capitalize my-3 bg-first-variation rounded">
                                {{$program->title}}
                            </h2>
                        </div>
                        <div class="row mx-0">
                            <img class="rounded col-lg-6 pb-3 pb-lg-0 mh-100" src="{{$program->thumb_img}}" alt="program thumbs <?=$i?>">
                            <div class="program__carousel-data-container col-lg-6 bg-third-variation rounded py-3 text-justify">
                                <div class="row mb-3">
                                    <div class="container">
                                        <?=$program->description?>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row justify-content-around">
                                        <a href="#" target="_blank" class="btn btn-light col-3">
                                            <i class="fa fa-book program__card-content-icon"></i> Contoh Materi
                                        </a>
                                        <a href="#" target="_blank" class="btn btn-light col-3">
                                            <i class="fa-solid fa-calendar-days program__card-content-icon"></i> Jadwal
                                        </a>
                                        <a href="#" target="_blank" class="btn btn-light col-3">
                                            <i class="fa-solid fa-people-group program__card-content-icon"></i> Tim Pengajar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#programCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#programCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        @else
        <h3 class="mx-auto">Belum ada data program</h3>
        @endif
    </section>
</main>
@endsection