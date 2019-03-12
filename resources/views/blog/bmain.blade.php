@extends('layouts.single')

@section('content')
    <div class="content-wrapper">

        <!-- Stunning Header -->

        <div class="stunning-header stunning-header-bg-lightviolet">
            <div class="stunning-header-content">
                <h1 class="stunning-header-title">{{$post->title}}</h1>
            </div>
        </div>

        <!-- End Stunning Header -->

        <!-- Post Details -->


        <div class="container">
            <div class="row medium-padding120">
                <main class="main">
                    <div class="col-lg-10 col-lg-offset-1">
                        <article class="hentry post post-standard-details">

                            <div class="post-thumb">
                                <img src="{{ $post->image?asset('/frontend/img/' . $post->image):'http://placehold.it/400x400' }}" alt="seo">
                            </div>

                            <div class="post__content">


                                <div class="post-additional-info">

                                    <div class="post__author author vcard">
                                        Posted by

                                        <div class="post__author-name fn">
                                            <a href="#" class="post__author-link">{{$post->author->name}}</a>
                                        </div>

                                    </div>

                                    <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                   {{$post->published}}
                                </time>

                            </span>
                                    <span class="category">
                                <i class="seoicon-tags"></i>

                                        {{$post->tags_html}}
                            </span>

                                </div>

                                <div class="post__content-info">

                                    <p class="post__subtitle">{!! $post->excerpt_html !!}
                                    </p>

                                    <p class="post__text">{!! $post->body_html !!}
                                    </p>

                                </div>



                            </div>

                            <div class="socials">Share:
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-facebook"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-twitter"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-linkedin"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-google-plus"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-pinterest"></i>
                                </a>
                            </div>

                        </article>

                        <div class="blog-details-author">

                            <div class="blog-details-author-thumb">
                                <img src="{{asset('frontend/img/blog-details-author.png')}}" alt="Author">
                            </div>

                            <div class="blog-details-author-content">
                                <div class="author-info">
                                    <h5 class="author-name">{{$post->author->name}}</h5>
                                    <p class="author-info">SEO Specialist</p>
                                </div>
                                <p class="text">{{$post->author->bio}}
                                </p>
                                <div class="socials">

                                    <a href="#" class="social__item">
                                        <img src="{{asset('frontend/svg/circle-facebook.svg')}}" alt="facebook">
                                    </a>

                                    <a href="#" class="social__item">
                                        <img src="{{asset('frontend/svg/twitter.svg')}}" alt="twitter">
                                    </a>

                                    <a href="#" class="social__item">
                                        <img src="{{asset('frontend/svg/google.svg')}}" alt="google">
                                    </a>

                                    <a href="#" class="social__item">
                                        <img src="{{asset('frontend/svg/youtube.svg')}}" alt="youtube">
                                    </a>

                                </div>
                            </div>
                        </div>



                        <div class="comments">

                            <div class="heading text-center">
                                <h4 class="h1 heading-title">Comments</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @include('seo.comments')
                        </div>


                    </div>


                </main>
            </div>
        </div>

        <!-- Subscribe Form -->



        <!-- End Subscribe Form -->

    </div>
@stop