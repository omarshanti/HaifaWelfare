@extends('layouts.app')

@section('content')
    <!-- Section Breadcrumbs-->
    <section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">@if(isset($cat_name->name_en)) {{$cat_name->name_en}} @else {{$cat_name}} @endif</h3>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>PROGRAMES AND PROJECTS</li>
                    <li class="active">@if(isset($cat_name->name_en)) {{$cat_name->name_en}} @else {{$cat_name}} @endif</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- News 3-->
    <section class="section section-sm bg-gray-100">
        <div class="container">
            <div class="row row-30">
                <div class="col-lg-8">
                    <!-- Heading Component-->
                    <article class="heading-component">
                        <div class="heading-component-inner">
                            <h5 class="heading-component-title">Latest Posts
                            </h5>
                        </div>
                    </article>
                    <!-- Post Future-->
                    @foreach($categoryPost as $post)
                            <?php

                            $str2 = strip_tags($post->content_en);
                            $str3 = str_replace("&nbsp;",'',$str2);
                            $words = explode(' ', $str3);

                            // Get First ten (10) words from String
                            $five_words = array_slice($words,0,20);

                            $result1 = implode(' ',$five_words);


                            ?>
                    <article class="post-future post-future-horizontal"><a class="post-future-figure" href="{{route('singlePost',$post->id)}}"><img src="{{asset('imagePosts/photo3/'.$post->photo3)}}" alt="" width="370" height="325"/></a>
                        <div class="post-future-main" style="height:275px;overflow:hidden;">
                            <h4 class="post-future-title"><a href="{{route('singlePost',$post->id)}}">{{$post->name_en}}</a></h4>
                            <div class="post-future-meta">
                                <!-- Badge-->
                                <div @if($post->Category->id == 3) class="badge badge-primary" @elseif($post->Category->id == 4) class="badge badge-red" @else class="badge badge-secondary" @endif>{{$post->category->name_en}}</span>
                                </div>
                                <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                                    <time datetime="2022">{{$post->created_at->format('M d, Y')}}</time>
                                </div>
                            </div>
                            <hr/>
                            <div class="post-future-text">
                                <p>{{$result1}}...</p>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    {!! $categoryPost->links() !!}

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
