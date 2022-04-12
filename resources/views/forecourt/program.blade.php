@extends('template.forecourt')

@section('css-page-before')
<link rel="stylesheet" href="{{asset('css/program.css')}}">
@endsection

@section('content')
<main class="main">
    <section class="program">
        <div class="program__card">
            <div class="program__card-container grid">
                <div class="program__card-thumbnail">
                    <h2 class="program__card-thumbnail-title">Program 1</h2>
                    <img src="{{asset('image/program_a.jpg')}}" alt="" class="program__card-thumbnail-img">
                </div>
                <div class="program__card-info-general">
                    <p class="program__card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium commodi ut excepturi nobis non tenetur recusandae aliquid maiores et velit sed odio, obcaecati ipsa consectetur modi dolorum facilis praesentium labore.</p>
                </div>
                <div class="program__card-more-info">
                    <div class="program__card-content-container grid">
                        <a href="#" target="_blank" class="program__card-link">
                            <i class="fa fa-book program__card-content-icon"></i>
                            <h3 class="program__card-content-title">Contoh Materi</h3>
                        </a>
                        <a href="#" target="_blank" class="program__card-link">
                            <i class="fa-solid fa-calendar-days program__card-content-icon"></i>
                            <h3 class="program__card-content-title">Jadwal</h3>
                        </a>
                        <a href="#" target="_blank" class="program__card-link">
                            <i class="fa-solid fa-people-group program__card-content-icon"></i>
                            <h3 class="program__card-content-title">Tim Pengajar</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="program__card">
            <div class="program__card-container grid">
                <div class="program__card-thumbnail">
                    <h2 class="program__card-thumbnail-title">Program 2</h2>
                    <img src="{{asset('image/program_b.jpg')}}" alt="" class="program__card-thumbnail-img">
                </div>
                <div class="program__card-info-general">
                    <p class="program__card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium commodi ut excepturi nobis non tenetur recusandae aliquid maiores et velit sed odio, obcaecati ipsa consectetur modi dolorum facilis praesentium labore.</p>
                </div>
                <div class="program__card-more-info">
                    <div class="program__card-content-container grid">
                        <a href="#" target="_blank" class="program__card-link">
                            <i class="fa fa-book program__card-content-icon"></i>
                            <h3 class="program__card-content-title">Contoh Materi</h3>
                        </a>
                        <a href="#" target="_blank" class="program__card-link">
                            <i class="fa-solid fa-calendar-days program__card-content-icon"></i>
                            <h3 class="program__card-content-title">Jadwal</h3>
                        </a>
                        <a href="#" target="_blank" class="program__card-link">
                            <i class="fa-solid fa-people-group program__card-content-icon"></i>
                            <h3 class="program__card-content-title">Tim Pengajar</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="program__card">
            <div class="program__card-container grid">
                <div class="program__card-thumbnail">
                    <h2 class="program__card-thumbnail-title">Program 3</h2>
                    <img src="{{asset('image/program_c.jpg')}}" alt="" class="program__card-thumbnail-img">
                </div>
                <div class="program__card-info-general">
                    <p class="program__card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium commodi ut excepturi nobis non tenetur recusandae aliquid maiores et velit sed odio, obcaecati ipsa consectetur modi dolorum facilis praesentium labore.</p>
                </div>
                <div class="program__card-more-info">
                    <div class="program__card-content-container grid">
                        <a href="#" target="_blank" class="program__card-link">
                            <i class="fa fa-book program__card-content-icon"></i>
                            <h3 class="program__card-content-title">Contoh Materi</h3>
                        </a>
                        <a href="#" target="_blank" class="program__card-link">
                            <i class="fa-solid fa-calendar-days program__card-content-icon"></i>
                            <h3 class="program__card-content-title">Jadwal</h3>
                        </a>
                        <a href="#" target="_blank" class="program__card-link">
                            <i class="fa-solid fa-people-group program__card-content-icon"></i>
                            <h3 class="program__card-content-title">Tim Pengajar</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection