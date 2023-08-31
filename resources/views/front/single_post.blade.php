@extends('layouts.app')

@section('content')
    <!-- Section Breadcrumbs-->
    <section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">{{$singlePost->name_en}}</h3>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('categoryPost',$singlePost->Category->id)}}">{{$singlePost->Category->name_en}}</a></li>
                    <li class="active">{{$singlePost->name_en}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Blog Post-->
    <section class="section section-sm bg-gray-100">
        <div class="container">
            <div class="row row-30">
                <div class="col-lg-8">
                    <div class="blog-post">
                        <!-- Badge-->
                        <div @if($singlePost->Category->id == 3) class="badge badge-primary" @elseif($singlePost->Category->id == 4) class="badge badge-red" @else class="badge badge-secondary" @endif>{{$singlePost->category->name_en}}
                        </div>
                        <h3 class="blog-post-title">{{$singlePost->name_en}}</h3>
                        <div class="blog-post-header">
                            <div class="blog-post-author">
                            </div>
                            <div class="blog-post-meta">
                                <time class="blog-post-time" datetime="2022"><span class="icon mdi mdi-clock"></span>{{$singlePost->created_at->format('M d, Y')}}</time>
                            </div>
                        </div>
                        <div class="blog-post-content">
                            <img src="{{asset('imagePosts/photo1/'.$singlePost->photo1)}}" alt="" width="683" height="407"/>

                            <p>
                                 {{strip_tags(html_entity_decode($singlePost->content_en))}}
                            </p>
                        </div>
                    </div>
                    @if($relatedPost->count() > 0)
                    <div class="row">
                        <div class="col-sm-12 owl-carousel-outer-navigation">
                            <!-- Heading Component-->
                            <article class="heading-component">
                                <div class="heading-component-inner">
                                    <h5 class="heading-component-title">Related Posts
                                    </h5>
                                    <div class="owl-carousel-arrows-outline">
                                        <div class="owl-nav">
                                            <button class="owl-arrow owl-arrow-prev"></button>
                                            <button class="owl-arrow owl-arrow-next"></button>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- Blog Carousel-->
                            <div class="owl-carousel" data-items="1" data-sm-items="2" data-dots="false" data-nav="true" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false" data-nav-custom=".owl-carousel-outer-navigation">
                                <!-- Post Carmen-->
                                @foreach($relatedPost as $posts)
                                <article class="post-carmen"><img src="{{asset('imagePosts/photo2/'.$posts->photo1)}}" alt="" width="369" height="343"/>
                                    <div class="post-carmen-header">
                                        <!-- Badge-->
                                        <div @if($posts->Category->id == 3) class="badge badge-primary" @elseif($posts->Category->id == 4) class="badge badge-red" @else class="badge badge-secondary" @endif>{{$posts->category->name_en}}
                                        </div>
                                    </div>
                                    <div class="post-carmen-main">
                                        <h4 class="post-carmen-title"><a href="{{route('singlePost',$posts->id)}}">{{$posts->name_en}}</a></h4>
                                        <div class="post-carmen-meta">
                                            <div class="post-carmen-time"><span class="icon mdi mdi-clock"></span>
                                                <time datetime="2022">{{$posts->created_at->format('M d, Y')}}</time>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <!-- Blog Alide-->
                    <div class="block-aside">
                        <div class="block-aside-item">
                            <!-- Heading Component-->
                            <article class="heading-component">
                                <div class="heading-component-inner">
                                    <h5 class="heading-component-title">Categories
                                    </h5>
                                </div>
                            </article>
                            <!--Block Categories-->
                            <div class="block-categories">
                                <ul class="list-marked list-marked-categories">
                                    @foreach($cats as  $name => $value)
                                    <li><a  href="{{route('categoryPost',$value['id'])}}">{{$value['name_en']}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="block-aside-item">
                            <!-- Heading Component-->
                            <article class="heading-component">
                                <div class="heading-component-inner">
                                    <h5 class="heading-component-title">Most Views
                                    </h5>
                                </div>
                            </article>
                            <!-- List Post Classic-->
                            <div class="list-post-classic">
                                <!-- List Post Classic-->
                                <div class="list-post-classic">
                                    @if($viewPosts)
                                        @foreach($viewPosts as $post)
                                            <!-- Post Classic-->
                                            <article class="post-classic">
                                                <div class="post-classic-aside"><a class="post-classic-figure" href="{{route('singlePost',$post->id)}}"><img src="{{asset('imagePosts/photo1/'.$post->photo2)}}" alt="" width="94" height="94"/></a></div>
                                                <div class="post-classic-main">
                                                    <p class="post-classic-title"><a href="{{route('singlePost',$post->id)}}">{{$post->name_en}}</a></p>
                                                    <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                                                        <time datetime="2020">{{$post->created_at->format('M d, Y')}}</time>
                                                    </div>
                                                </div>
                                            </article>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Footer-->
@endsection
