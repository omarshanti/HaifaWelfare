@extends('layouts.master')
@section('title')
    Haifa Association - Edit Post
@stop
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
    <!--- Internal Select2 css-->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Posts</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit Post</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
<form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Basic Post Wizard
                    </div>
                    <br>
                    <div id="wizard1">
                        <h3>Create Post In English</h3>
                        <br>
                        <section>
                            <div class="control-group form-group">
                                <label class="form-label">English Title</label>
                                <input type="text" class="form-control required" name="name_en" placeholder="Name" value="{{$post->name_en}}">
                                @if($errors->has('name_en'))
                                    <div class="error" style="color: red;">{{ $errors->first('name_en') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-0 justify-content-end">
                                <div class="checkbox">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" @if($post->is_main == 1) checked @endif name="is_main" id="checkbox-2">
                                        <label for="checkbox-2" class="custom-control-label mt-1">Main Post</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row row-sm">
                                <div class="col-lg-4 mg-b-20 mg-lg-b-0">
                                    <p class="mg-b-10">Catygory type</p><select class="form-control "  name="category" >
                                        <option value="null" >
                                            Select Category
                                        </option>
                                        @foreach($cat as $cats)
                                        <option @if($post->category_id == $cats->id ) selected @endif value="{{$cats->id}}" >
                                            {{$cats->name_en}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="control-group form-group">
                                <label class="form-label">English Post Content</label>
                                <div class="ql-wrapper ql-wrapper-demo bg-gray-50">
                                    <input id="x" type="hidden" name="content_en" value="{{$post->content_en}}">
                                    <trix-editor input="x" ></trix-editor>
                                </div>
                                @if($errors->has('content_en'))
                                    <div class="error" style="color: red;">{{ $errors->first('content_en') }}</div>
                                @endif
                            </div>
                        </section>
                        <h3>Create Post In Arabic</h3>
                        <br>
                        <section>
                            <div class="control-group form-group">
                                <label class="form-label">Arabic Title</label>
                                <input type="text" class="form-control required" name="name_ar" placeholder="Name" value="{{$post->name_ar}}">
                                @if($errors->has('content_en'))
                                    <div class="error" style="color: red;">{{ $errors->first('name_ar') }}</div>
                                @endif
                            </div>
                            <br>
                            <div class="control-group form-group">
                                <label class="form-label">Arabic Post Content</label>
                                <div class="ql-wrapper ql-wrapper-demo bg-gray-50">
                                    <input id="y" type="hidden" name="content_ar" value="{{$post->content_ar}}">
                                    <trix-editor input="y"></trix-editor>
                                </div>
                                @if($errors->has('content_en'))
                                    <div class="error" style="color: red;">{{ $errors->first('content_ar') }}</div>
                                @endif
                            </div>
                        </section>
                        <h3>Upload Photo</h3>
                        <section>
                            <!-- row -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-sm-12 col-md-4">
                                                    <input type="file" class="dropify" data-height="200" name="photo"/>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($errors->has('photo'))
                                    <div class="error" style="color: red;">{{ $errors->first('photo') }}</div>
                                @endif
                                <div class="row row-xs wd-xl-80p">
                                    <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button type="submit" class="btn btn-success btn-with-icon btn-block"><i class="typcn typcn-edit"></i> Update</button></div>
                                </div>
                            </div>
                            <!-- row closed -->
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /row -->
</form>
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <!-- Internal TelephoneInput js-->
    <script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
    <!--Internal  Select2 js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Jquery.steps js -->
    <script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!--Internal  Form-wizard js -->
    <script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>

@endsection
