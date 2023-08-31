@extends('layouts.app')

@section('content')
    <!-- Swiper-->
    @if($ads->count() > 0)
    <section class="section swiper-container swiper-slider swiper-classic bg-gray-2" data-loop="true" data-autoplay="4000" data-simulate-touch="false" data-slide-effect="fade">
        <div class="swiper-wrapper">
            @foreach($ads as $ad)
            <div class="swiper-slide text-center" data-slide-bg="{{asset('images/'.$ad->photo)}}">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6">
                            <div class="swiper-slide-caption">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-button swiper-button-prev"></div>
        <div class="swiper-button swiper-button-next"></div>
        <div class="swiper-pagination"></div>
    </section>
    @endif
    <!-- Latest News-->
    <section class="section section-md bg-gray-100">
        <div class="container">
            <div class="row row-50">
                <div class="col-lg-8">
                    <div class="main-component">
                        <!-- Heading Component-->
                        <article class="heading-component">
                            <div class="heading-component-inner">
                                <h5 class="heading-component-title">MAIN POSTS
                                </h5><a class="button button-xs button-gray-outline" href="{{route('categoryPost',1000)}}">All news</a>
                            </div>
                        </article>
                        <div class="row row-30">
                            <div class="col-md-12">
                                <!-- Swiper-->
                                <div class="swiper-container swiper-slider post-slider" data-loop="false" data-autoplay="false" data-simulate-touch="false">
                                    <div class="swiper-wrapper">
                                        @if($mainPosts->count() > 0)
                                            @foreach($mainPosts as $post)
                                        <div class="swiper-slide">
                                            <div class="swiper-slide-caption">
                                                <!-- Post Alice-->
                                                <article class="post-alice"><img src="{{asset('imagePosts/photo1/'.$post->photo1)}}" alt="" width="769" height="397"/>
                                                    <div class="post-alice-main">
                                                        <!-- Badge-->
                                                        <div class="badge badge-secondary">{{$post->Category->name_en}}
                                                        </div>
                                                        <h3 class="post-alice-title"><a href="{{route('singlePost',$post->id)}}">{{$post->name_en}}</a></h3>
                                                        <div class="divider"></div>
                                                        <div class="post-alice-time"><span class="icon mdi mdi-clock"></span>
                                                            <time >{{$post->created_at->diffForHumans()}}</time>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <!-- Swiper Pagination-->
                                    <div class="swiper-pagination"></div>
                                    <!-- Swiper Navigation-->
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                        <article class="heading-component" style="margin-top: 30px">
                            <div class="heading-component-inner">
                                <h5 class="heading-component-title">Social Welfare and Child Care Program
                                </h5><a class="button button-xs button-gray-outline" href="{{route('categoryPost',3)}}">All news</a>
                            </div>
                        </article >
                        @if($socials->count() > 0)
                        <div class="row row-30">
                            <div class="col-md-12">
                                <!-- Post Gloria-->
                                <?php

                                $str2 = strip_tags($first_social->post->content_en);
                                $str3 = str_replace("&nbsp;",'',$str2);
                                $words = explode(' ', $str3);

                                // Get First ten (10) words from String
                                $five_words = array_slice($words,0,20);

                                $result1 = implode(' ',$five_words);


                                ?>
                                <article class="post-gloria"><img src="{{asset('imagePosts/photo2/'.$first_social->post->photo2)}}" alt="" width="769" height="429"/>
                                    <div class="post-gloria-main" >
                                        <h3 class="post-gloria-title"><a href="{{route('singlePost',$first_social->post->id)}}">{{$first_social->post->name_en}}</a></h3>
                                        <div class="post-gloria-meta">
                                            <!-- Badge-->
                                            <div class="badge badge-primary">{{$first_social->name_en}}
                                            </div>
                                            <div class="post-gloria-time"><span class="icon mdi mdi-clock"></span>
                                                <time datetime="2020">{{$first_social->post->created_at->diffForHumans()}}</time>
                                            </div>
                                        </div>
                                        <div class="post-gloria-text">
                                            <svg version="1.1" x="0px" y="0px" width="6.888px" height="4.68px" viewbox="0 0 6.888 4.68" enable-background="new 0 0 6.888 4.68" xml:space="preserve">
                            <path d="M1.584,0h1.8L2.112,4.68H0L1.584,0z M5.112,0h1.776L5.64,4.68H3.528L5.112,0z"></path>
                          </svg>
                                            <p>{{$result1}}...</p>
                                        </div><a class="button" href="{{route('singlePost',$first_social->post->id)}}">Read more</a>
                                    </div>
                                </article>
                            </div>
                            @foreach($socials as $social)
                                    <?php

                                    $str = strip_tags($social->content_en);
                                    $str1 = str_replace("&nbsp;",'',$str);
                                    $words = explode(' ', $str1);

                                    // Get First ten (10) words from String
                                    $count_words = array_slice($words,0,20);

                                    $result = implode(' ',$count_words);


                                    ?>
                            <div class="col-md-12">
                                <!-- Post Future-->
                                <article class="post-future post-future-horizontal"><a class="post-future-figure" href="{{route('singlePost',$social->id)}}"><img src="{{asset('imagePosts/photo2/'.$social->photo2)}}" alt="" width="370" height="325"/></a>
                                    <div class="post-future-main" style="height:290px;overflow:hidden;">
                                        <h4 class="post-future-title"><a href="{{route('singlePost',$social->id)}}">{{$social->name_en}}</a></h4>
                                        <div class="post-future-meta">
                                            <!-- Badge-->
                                            <div class="badge badge-primary">{{$social->category->name_en}}</span>
                                            </div>
                                            <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                                                <time datetime="2020">{{$social->created_at->diffForHumans()}}</time>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="post-future-text">
                                            <p>{{$result}}...</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <article class="heading-component" style="margin-top: 30px">
                            <div class="heading-component-inner">
                                <h5 class="heading-component-title">Relief and Health Program
                                </h5><a class="button button-xs button-gray-outline" href="{{route('categoryPost',4)}}">All news</a>
                            </div>
                        </article >
                        @if($reliefs->count() >= 0)
                        <div class="row row-30">
                            <div class="col-md-12">
                                <!-- Post Gloria-->
                                <?php

                                $str2 = strip_tags($first_relief->post->content_en);
                                $str3 = str_replace("&nbsp;",'',$str2);
                                $words = explode(' ', $str3);

                                // Get First ten (10) words from String
                                $five_words = array_slice($words,0,20);

                                $result1 = implode(' ',$five_words);


                                ?>
                                <article class="post-gloria"><img src="{{asset('imagePosts/photo2/'.$first_relief->post->photo2)}}" alt="" width="769" height="429"/>
                                    <div class="post-gloria-main">
                                        <h3 class="post-gloria-title"><a href="{{route('singlePost',$first_relief->post->id)}}">{{$first_relief->post->name_en}}</a></h3>
                                        <div class="post-gloria-meta">
                                            <!-- Badge-->
                                            <div class="badge badge-red">{{$first_relief->name_en}}
                                            </div>
                                            <div class="post-gloria-time"><span class="icon mdi mdi-clock"></span>
                                                <time datetime="2020">{{$first_relief->post->created_at->diffForHumans()}}</time>
                                            </div>
                                        </div>
                                        <div class="post-gloria-text">
                                            <svg version="1.1" x="0px" y="0px" width="6.888px" height="4.68px" viewbox="0 0 6.888 4.68" enable-background="new 0 0 6.888 4.68" xml:space="preserve">
                            <path d="M1.584,0h1.8L2.112,4.68H0L1.584,0z M5.112,0h1.776L5.64,4.68H3.528L5.112,0z"></path>
                          </svg>
                                            <p>{{$result1}}...</p>
                                        </div><a class="button" href="{{route('singlePost',$first_relief->post->id)}}">Read more</a>
                                    </div>
                                </article>
                            </div>
                            @foreach($reliefs as $relief)
                                    <?php

                                    $str = strip_tags($relief->content_en);
                                    $str1 = str_replace("&nbsp;",'',$str);
                                    $words = explode(' ', $str1);

                                    // Get First ten (10) words from String
                                    $count_words = array_slice($words,0,20);

                                    $result = implode(' ',$count_words);


                                    ?>
                                <div class="col-md-12">
                                    <!-- Post Future-->
                                    <article class="post-future post-future-horizontal"><a class="post-future-figure" href="{{route('singlePost',$relief->id)}}"><img src="{{asset('imagePosts/photo2/'.$relief->photo2)}}" alt="" width="370" height="325"/></a>
                                        <div class="post-future-main" style="height:290px;overflow:hidden;">
                                            <h4 class="post-future-title"><a href="{{route('singlePost',$relief->id)}}">{{$relief->name_en}}</a></h4>
                                            <div class="post-future-meta">
                                                <!-- Badge-->
                                                <div class="badge badge-red">{{$relief->category->name_en}}
                                                </div>
                                                <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                                                    <time datetime="2020">{{$relief->created_at->diffForHumans()}}</time>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="post-future-text">
                                                <p>{{$result}}...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                        @endif
                        <article class="heading-component" style="margin-top: 30px">
                            <div class="heading-component-inner">
                                <h5 class="heading-component-title">Supporting Community and Women Program
                                </h5><a class="button button-xs button-gray-outline" href="{{route('categoryPost',5)}}">All news</a>
                            </div>
                        </article >
                        @if($supports->count() > 0)
                        <div class="row row-30">
                            <div class="col-md-12">
                                <!-- Post Gloria-->
                                <?php

                                $str2 = strip_tags($first_support->post->content_en);
                                $str3 = str_replace("&nbsp;",'',$str2);
                                $words = explode(' ', $str3);

                                // Get First ten (10) words from String
                                $five_words = array_slice($words,0,20);

                                $result1 = implode(' ',$five_words);


                                ?>
                                <article class="post-gloria"><img src="{{asset('imagePosts/photo2/'.$first_support->post->photo2)}}" alt="" width="769" height="429"/>
                                    <div class="post-gloria-main">
                                        <h3 class="post-gloria-title"><a href="{{route('singlePost',$first_support->post->id)}}">{{$first_support->post->name_en}}</a></h3>
                                        <div class="post-gloria-meta">
                                            <!-- Badge-->
                                            <div class="badge badge-secondary">{{$first_support->name_en}}
                                            </div>
                                            <div class="post-gloria-time"><span class="icon mdi mdi-clock"></span>
                                                <time datetime="2020">{{$first_support->post->created_at->diffForHumans()}}</time>
                                            </div>
                                        </div>
                                        <div class="post-gloria-text">
                                            <svg version="1.1" x="0px" y="0px" width="6.888px" height="4.68px" viewbox="0 0 6.888 4.68" enable-background="new 0 0 6.888 4.68" xml:space="preserve">
                            <path d="M1.584,0h1.8L2.112,4.68H0L1.584,0z M5.112,0h1.776L5.64,4.68H3.528L5.112,0z"></path>
                          </svg>
                                            <p>{{$result1}}...</p>
                                        </div><a class="button" href="{{route('singlePost',$first_support->post->id)}}">Read more</a>
                                    </div>
                                </article>
                            </div>
                            @foreach($supports as $support)
                                    <?php

                                    $str = strip_tags($support->content_en);
                                    $str1 = str_replace("&nbsp;",'',$str);
                                    $words = explode(' ', $str1);

                                    // Get First ten (10) words from String
                                    $count_words = array_slice($words,0,20);

                                    $result = implode(' ',$count_words);


                                    ?>
                                <div class="col-md-12">
                                    <!-- Post Future-->
                                    <article class="post-future post-future-horizontal"><a class="post-future-figure" href="{{route('singlePost',$support->id)}}"><img src="{{asset('imagePosts/photo2/'.$support->photo2)}}" alt="" width="370" height="325"/></a>
                                        <div class="post-future-main" style="height:290px;overflow:hidden;">
                                            <h4 class="post-future-title"><a href="{{route('singlePost',$support->id)}}">{{$support->name_en}}</a></h4>
                                            <div class="post-future-meta">
                                                <!-- Badge-->
                                                <div class="badge badge-secondary">{{$support->category->name_en}}
                                                </div>
                                                <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                                                    <time datetime="2020">{{$support->created_at->diffForHumans()}}</time>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="post-future-text">
                                                <p>{{$result}}...</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <!-- Aside Block-->
                <div class="col-lg-4">
                    <aside class="aside-components">

                        <div class="aside-component">
                            <!-- Heading Component-->
                            <article class="heading-component">
                                <div class="heading-component-inner">
                                    <h5 class="heading-component-title">Latest Posts
                                    </h5><a class="button button-xs button-gray-outline" href="{{route('categoryPost',1000)}}">All news</a>
                                </div>
                            </article>
                            <!-- List Post Classic-->
                            <div class="list-post-classic">
                                @if($allPosts->count() > 0)
                                    @foreach($allPosts as $post)
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
                        <div class="aside-component">
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
                        @if($images->count() > 0)
                        <div class="aside-component">
                            <!-- Heading Component-->
                            <article class="heading-component">
                                <div class="heading-component-inner">
                                    <h5 class="heading-component-title">Gallery
                                    </h5>
                                </div>
                            </article>
                            <article class="gallery" data-lightgallery="group">
                                <div class="row row-10 row-narrow">
                                    @foreach($images as $image)
                                    <div class="col-6 col-sm-4 col-md-6 col-lg-4"><a class="thumbnail-creative" data-lightgallery="item" href="{{asset('haifaImages/bigImages/'.$image->bigphoto)}}"><img src="{{asset('haifaImages/smallImages/'.$image->smallphoto)}}" alt=""/>
                                            <div class="thumbnail-creative-overlay"></div></a>
                                    </div>
                                    @endforeach
                                </div>
                            </article>
                        </div>
                        @endif
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
