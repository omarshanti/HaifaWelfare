@extends('layouts.app')

@section('content')
    <!-- Section Breadcrumbs-->
    <section class="section parallax-container breadcrumbs-wrap"
             data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">Contact us</h3>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">Contact us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Section Contact-->
    <section class="section section-variant-1 bg-gray-100">
        <div class="container">
            <div class="row row-50">
                <div class="col-lg-7 col-xl-8">
                    <!-- Heading Component-->
                    <article class="heading-component">
                        <div class="heading-component-inner">
                            <h5 class="heading-component-title">Get in touch
                            </h5>
                        </div>
                    </article>
                    <form method="post" action="{{route('createContact')}}">
                        @csrf
                        <div class="row row-10 row-narrow">
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="form-label" for="form-user-name-1">Your Name</label>
                                    <input class="form-input" id="form-user-name-1" type="text" name="name"
                                           data-constraints="">
                                    @if($errors->has('name'))
                                        <div class="error" style="color: red;">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="form-label" for="form-user-phone">Phone</label>
                                    <input class="form-input" id="form-user-phone" type="text" name="phone"
                                           data-constraints="">
                                    @if($errors->has('phone'))
                                        <div class="error" style="color: red;">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-wrap">
                                    <label class="form-label" for="form-message">Message</label>
                                    <textarea class="form-input" id="form-message" name="content"
                                              data-constraints=""></textarea>
                                    @if($errors->has('content'))
                                        <div class="error" style="color: red;">{{ $errors->first('content') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="form-label" for="form-email">E-mail</label>
                                    <input class="form-input" id="form-email" type="email" name="email"
                                           data-constraints="">
                                    @if($errors->has('email'))
                                        <div class="error" style="color: red;">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button class="button button-lg button-primary button-block" type="submit">Send
                                    message
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <!-- Heading Component-->
                    <article class="heading-component">
                        <div class="heading-component-inner">
                            <h5 class="heading-component-title">Contact Details
                            </h5>
                        </div>
                    </article>
                    <div class="contact-list">
                        <dl>
                            <dt>E-mail</dt>
                            <dd><span class="icon icon-primary mdi mdi-email-outline"></span><a class="link"
                                                                                                href="mailto:#">info@haifawelfare.ps</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt>Address</dt>
                            <dd><span class="icon icon-primary mdi mdi-map-marker"></span><a class="link" href="#">Gaza,
                                    Al-Nasr Street, next to Al-Helou Petrol Station</a></dd>
                        </dl>
                        <dl>
                            <dt>Phone</dt>
                            <dd><span class="icon icon-primary mdi mdi-phone"></span><a class="link link-md"
                                                                                        href="tel:#">+972082873782</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!-- Section Breadcrumbs-->

@endsection
