@extends('layouts.master')
@section('title')
    Haifa - Messages list
@endsection
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Messages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Messages List</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-sm-12 col-lg-5 col-xl-4">
						<div class="card custom-card">
							<div class="">
								<div class="main-content-app main-content-contacts pt-0">
									<div class="main-content-left main-content-left-contacts">
										<nav class="nav main-nav-line main-nav-line-chat  pl-3">
											<a class="nav-link active" data-toggle="tab" href="">All Messages</a>
										</nav>
										<div class="main-contacts-list" id="mainContactList">
											<div class="main-contact-label">
												Unread Messages
											</div>
                                            <!-- Container to display the processed data -->
                                            <div id="resultContainer"></div>
                                            @foreach($unreadMessages as $message)
											<div class="main-contact-item">
												<div class="main-img-user online"><img alt="avatar" src="{{URL::asset('assets/img/faces/2.jpg')}}"></div>
												<div class="main-contact-body">
                                                    <a href="{{route('singleMessage',['id' => $message->data['id'],'notify' => $message->id])}}"><h6 >{{$message->data['name']}}</h6></a><span class="phone">{{$message->data['phone']}}</span>
												</div>
												<a class="main-contact-star" href="{{route('deleteMsg',['id' => $message->data['id'],'notify' => $message->id])}}">
													<i class="fe fe-trash-2 mr-1"></i>
												</a>
											</div>
                                            @endforeach
											<div class="main-contact-label">
												Messages
											</div>
                                            @foreach($readMessages as $message)
											<div class="main-contact-item">
												<div class="main-img-user"><img alt="avatar" src="{{URL::asset('assets/img/faces/4.jpg')}}"></div>
												<div class="main-contact-body">
                                                    <a href="{{route('singleMessage',$message->data['id'])}}"><h6 style="font-weight: normal">{{$message->data['name']}}</h6></a><span>{{$message->data['phone']}}</span>
												</div>
												<a class="main-contact-star" href="{{route('deleteMsg',['id' => $message->data['id'],'notify' => $message->id])}}">
                                                    <i class="fe fe-trash-2 mr-1"></i>
												</a>
											</div>
                                            @endforeach

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @if(isset($sm) || isset($lastSm))
					<div class="col-sm-12 col-lg-7 col-xl-8">
						<div class="">
							<a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
							<div class="main-content-body main-content-body-contacts card custom-card">
								<div class="main-contact-info-header pt-3">
									<div class="media">
										<div class="main-img-user">
											<img alt="avatar" src="{{URL::asset('assets/img/faces/6.jpg')}}">
										</div>
										<div class="media-body">
											<h5 >{{isset($sm) ? $sm->name : $lastSm->name}}</h5>
											<p>{{isset($sm) ? $sm->created_at : $lastSm->created_at}}</p>
										</div>
									</div>
									<div class="main-contact-action btn-list pt-3 pr-3">
                                        @if(isset($sm))
                                            <a href="{{route('deleteMsg',['id' => $sm->id,'notify' => $notify])}}" class="btn ripple btn-secondary text-white btn-icon" data-placement="top" data-toggle="tooltip" title="Delete Message"><i class="fe fe-trash-2"></i></a>
                                        @elseif(isset($lastSm))
                                            <a href="{{route('deleteMsg',['id' => $lastSm->id])}}" class="btn ripple btn-secondary text-white btn-icon" data-placement="top" data-toggle="tooltip" title="Delete Message"><i class="fe fe-trash-2"></i></a>
                                        @endif
									</div>
								</div>
								<div class="main-contact-info-body p-4">
									<div>
                                        <p>{{isset($sm) ? $sm->content : $lastSm->content}}</p>
									</div>
									<div class="media-list pb-0">
										<div class="media">
											<div class="media-body">
												<div>
													<label>Phone</label> <span class="tx-medium">{{isset($sm) ? $sm->phone : $lastSm->phone}}</span>
												</div>
												<div>
													<label>Email</label> <span class="tx-medium">{{isset($sm) ? $sm->email : $lastSm->email}}</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @endif
				</div>
				<!-- End Row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Contact js -->
<script src="{{URL::asset('assets/js/contact.js')}}"></script>

@endsection
