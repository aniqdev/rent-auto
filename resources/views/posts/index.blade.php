@extends('layouts.app')
@section('title', 'Blog o cestování obytným autem')
@section('description', 'Zda se zajímáte o cestování obytným autem nebo karavanem, přečtěte si naše články ve kterých se dozvíte tipy na výlety a zajímavosti o obytných autech.')
@section('keywords', 'blog, aktuality, články, obytné, vozy, topobytnévozy')
@section('class', 'posts space-top')

@section('content')

    <div class="intro-img intro-overlay">
        <div class="intro-img__content">
            <div class="hp-header">
                <h1 class="page-header">Blog</h1>
                <small class="text-white">Blog o cestování obytným autem</small>
            </div>
        </div>
    </div>

    <div class="page-overlay">
        <separator-bg-light></separator-bg-light>
    </div>

    <div class="main-wrapper__overlay">

            <div class="posts-wrapper">

                    @foreach($posts as $post)

                    <article class="post-item card-4">

                        <a href="{{ route('aktuality.show', $post->slug) }}" class="post-item__link"></a>

                        <div class="post-item__img">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->name }}" />
                            @else
                                <img src="{{ asset('storage/images/no-image.png') }}" alt="{{ $post->name }}" />
                            @endif

                            <div class="post-item__name">
                                {{ $post->name }}
                            </div>
                        </div>

                        <div class="post-item__description">
                            <div class="post-item__category">
                                {{ $post->category->name }}
                            </div>

                            <div class="post-item__shorttext">
                                {!! $post->short_text !!}
                            </div>
                        </div>

                        <div class="post-item__actions">
                            <div class="post-item__readmore">
                                <a href="{{ route('aktuality.show', $post->slug) }}">Číst více <i class="icofont-rounded-right"></i></a>
                            </div>
                        </div>

                    </article>

                    @endforeach




            </div>
                <div class="pagination d-flex justify-content-center">
                    {!! $posts->links() !!}
                </div>
    </div>


    {{-- <div class="container-fluid">
        <div class="row">
            @foreach ($posts as $post)

            <div class="post-block col-sm-12 col-md-6 col-lg-4 col-xl-3">
                <div class="post-block-card">
                    <div class="post-block-img">
                        @if($post->thumbnail)
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->name }}" />
                        @else
                        <img src="{{ asset('storage/images/no-image.png') }}" alt="{{ $post->name }}" />
                        @endif
                    </div>
                    <div class="post-block-name">
                        {{$post->name}}
                    </div>
                    <div class="post-block-description">
                        {!! $post->short_text !!}
                    </div>
                    <div class="post-block-read-more">
                        <a href="{{ route('aktuality.show', $post->slug) }}">Číst více <i class="icofont-rounded-right"></i></a>
                    </div>
                </div>

            </div>

            @endforeach
        </div>
    </div> --}}


     {{-- <div class="top-list top-list-page">

        <div class="content--center">

            <h2>Nejoblíbenejší vozy k pronájmu</h2>
            <span class="content-title-description">Zákazníci u nás nejčastěji zapujčují</span>

        </div>

        <x-best-caravan-list :caravans="$caravans" />

    </div> --}}

    <div class="cta__wrapper">
        <div class="cta-header">
            <h2>Nemůžete najít, co potřebujete?</h2>
        </div>

        <div class="cta-content">
            <p>Vyzkoušejte nás kontaktovat pomocí formuláře.</p>
            <a href="{{ route('stranky.show', 'kontakt') }}" class="primary-btn">Kontaktovat <i class="icofont-thin-right"></i></a>
        </div>
    </div>

    <the-map></the-map>

@endsection
