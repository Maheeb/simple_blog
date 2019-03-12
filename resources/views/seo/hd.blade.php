@extends('layouts.sight')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>

            {{--@foreach ($pds as $pd)--}}

                <div class="col-lg-8">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{ $pds->image?asset('/frontend/img/' . $pds->image):'http://placehold.it/400x400' }}" alt="">
                            <div class="overlay"></div>
                            <a href="{{ $pds->image?asset('/frontend/img/' . $pds->image):'http://placehold.it/400x400' }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="{{route('seo.show',$pds->id)}}">{{$pds->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                               {{$pds->published}}
                                            </time>

                                        </span>

                                    <span class="category">

                                            <i class="seoicon-tags"></i>
                                        @foreach ($pds->tags as $tag)
                                            <span>{{$tag->name}},</span>

                                        @endforeach

                                        </span>

                                    <a href="{{route('seo.show',$pds->id)}}#post-comments"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                    {{$pds->comments->count()}}

                                </div>
                            </div>
                        </div>

                    </article>
                </div>


            {{--@endforeach--}}

            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            @foreach ($pcs as $pc)
                <div class="col-lg-6">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{ $pc->image?asset('/frontend/img/' . $pc->image):'http://placehold.it/400x400' }}" alt="seo">
                            <div class="overlay"></div>
                            <a href="{{ $pc->image?asset('/frontend/img/' . $pc->image):'http://placehold.it/400x400' }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="{{route('seo.show',$pc->id)}}">{{$pc->title}}</a>
                                </h2>

                                <div class="post-additional-info">

        <span class="post__date">

        <i class="seoicon-clock"></i>

        <time class="published" datetime="2016-04-17 12:00:00">
        {{$pc->published}}
        </time>

        </span>

                                    <span class="category">
        <i class="seoicon-tags"></i>

                 {{$pc->tags_html}}

        </span>

                                    <span class="post__comments">
        <a href="{{route('seo.show',$pc->id)}}#post-comments"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
        {{$pc->comments->count()}}
        </span>

                                </div>
                            </div>
                        </div>

                    </article>
                </div>
            @endforeach


        </div>
    </div>
    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                @foreach($posts->chunk(3) as $row)


                    <div class="col-lg-12">

                        <div class="offers">
                            <div class="row">

                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    <div class="heading">
                                        <h4 class="h1 heading-title">Laravel 5.3</h4>
                                        <div class="heading-line">
                                            <span class="short-line"></span>
                                            <span class="long-line"></span>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row">

                                <div class="case-item-wrap">
                                    @foreach ($row as $post)
                                        <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                            <div class="case-item">
                                                <div class="case-item__thumb">
                                                    <img src="{{ $post->image?asset('/frontend/img/' . $post->image):'http://placehold.it/400x400' }}" alt="our case">
                                                </div>
                                                <a href="{{route('seo.show',$post->id)}}"><h6 class="case-item__title">{{$post->title}}</h6></a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>


                        </div>

                    </div>

                @endforeach
            </div>
        </div>
    </div>

@stop
