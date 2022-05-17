<!DOCTYPE html>
<html lang="en">
@extends('template.forecourt-new')

@section('content')
<main class="main">
    <section class="sejarah section top__section" id="sejarah">
        <div class="container">
            <div class="row my-3">
                <h2 class="section__title mx-auto px-2 text-capitalize bg-first-variation rounded">
                    {{__('submenu.information.sejarah')}}
                </h2>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-lg-6 sejarah__img mb-3">
                    <img src="{{asset('image/sejarah.jpg')}}" alt="sejarah-image" class="w-100">
                </div>
                <div class="col-12 col-lg-6 sejarah__content bg-third-variation rounded p-3 text-justify">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus consequatur veniam maxime odit modi unde nobis sit omnis? Voluptatibus incidunt mollitia laborum odio error quos consequatur pariatur, cumque rerum eligendi!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quaerat accusantium sunt debitis ipsum dolorem quis rerum, voluptas officia dolorum ab repudiandae quasi laborum rem at. Aut repellendus fuga exercitationem!</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum quos animi eius fuga voluptates quas repudiandae fugiat itaque placeat et a nemo sunt aliquid, veniam quibusdam nulla quia sapiente adipisci?</p>
                </div>
            </div>
        </div>
    </section>
    <section class="visi-misi section" id="visi-misi">
        <div class="container">
            <div class="row my-3">
                <h2 class="section__title mx-auto px-2 text-capitalize bg-first-variation">
                    {{__('submenu.information.visi-misi')}}
                </h2>
            </div>
            <div class="row my-3">
                <div class="col-12 col-lg-6 order-lg-6 visi-misi__img mb-3">
                    <video src="{{asset('video/visi-misi.mp4')}}" controls class="h-100"></video>
                </div>
                <div class="col-12 col-lg-6 visi-misi__content bg-third-variation rounded p-3 text-justify">
                    <div class="row">
                        <div class="container">
                            <h3 class="text-bolder text-center">Visi</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container mb-4">
                            Menciptakan Peserta Didik Yang Kreatif, Inovatif, Kompetitif, dan Mandiri Serta Memiliki Budi Pekerti yang Luhur.
                        </div>
                    </div>
                    <div class="row">
                        <div class="container">
                            <h3 class="text-bolder text-center">Misi</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container">
                            <ol>
                                <div class="container">
                                    <li>Tertanamnya Nilai Budi Pekerti Dan Cinta Terhadap Budaya Bangsa</li>
                                    <li>Tertanamnya Sikap Kemandirian dan Sikap Kompetitif</li>
                                    <li>Terwujudnya Pembelajaran Aktif, Inovatif, Kreatif dan Menyenangkan</li>
                                    <li>Berkembangnya Potensi Dasar Individu Peserta Didik Secara Integral</li>
                                    <li>Terwujudnya Standar Kelulusan Sesuai BNSP</li>
                                    <li>Tersampaikannya Bekal Keterampilan Hidup Kepada Peserta Didik</li>
                                </div>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="legalitas section" id="legalitas">
        <div class="container">
            <div class="row my-3">
                <h2 class="section__title mx-auto px-2 text-capitalize bg-first-variation rounded">
                    {{__('submenu.information.legalitas')}}
                </h2>
            </div>
            <div class="row my-3">
                <div class="col-12 col-lg-4">
                    <img src="{{asset('image/kemenkumham.jpg')}}" alt="akta-kemenkumham" class="h-75 w-100 mb-3">
                    <div class="row">
                        <h2 class="my-3 text-bold mx-auto bg-red-third p-2 bg-third-variation rounded">Surat Legalitas 1</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <img src="{{asset('image/akreditasi.jpg')}}" alt="akreditasi" class="h-50 w-100 mb-3">
                    <div class="row">
                        <h2 class="my-3 text-bold mx-auto bg-red-third p-2 bg-third-variation rounded">Surat Legalitas 2</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <img src="{{asset('image/npsn.jpg')}}" alt="npsn" class="h-75 w-100 mb-3">
                    <div class="row">
                        <h2 class="my-3 text-bold mx-auto bg-red-third p-2 bg-third-variation rounded">Surat Legalitas 3</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection