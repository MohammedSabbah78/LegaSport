@extends('cms.parent')

@section('page-name',__('cms.about'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.about'))
@section('page-name-small',__('cms.about'))

@section('styles')

@endsection

@section('content')
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
        {{-- {{dd(isset($data['country']));}} --}}
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title"></h3>
                {{-- <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div> --}}
            </div>
            <!--begin::Form-->
            <form id="create-form">
                <div class="card-body">
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.language')}}:<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="language"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                    @foreach ($languages as $language)
                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.type')}}</span>
                        </div>
                    </div>








                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.vision')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="vision" placeholder="{{__('cms.vision')}}" />
                            <span class="form-text text-muted">{{__('cms.vision')}}</span>
                        </div>
                    </div>


                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.mission')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="mission" placeholder="{{__('cms.mission')}}" />
                            <span class="form-text text-muted">{{__('cms.mission')}}</span>
                        </div>
                    </div>


                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.message')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="message" placeholder="{{__('cms.message')}}" />
                            <span class="form-text text-muted">{{__('cms.message')}}</span>
                        </div>
                    </div>






                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performStore({{$about->id ?? null}})"
                                class="btn btn-primary mr-2">{{__('cms.save')}}</button>
                            <button type="reset" class="btn btn-secondary">{{__('cms.cancel')}}</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Container-->
@endsection

@section('scripts')
<script>
    var image = new KTImageInput('kt_image_5');
</script>
<script>
    function performStore(id){
let formData = new FormData();
formData.append('language',document.getElementById('language').value);
formData.append('vision',document.getElementById('vision').value);
formData.append('message',document.getElementById('message').value);
formData.append('mission',document.getElementById('mission').value);







if(id == null) {
    store('/cms/admin/abouts',formData);
    }else {
    store('/cms/admin/abouts/'+id+'/translation',formData, '/cms/admin/abouts');
    }

}
</script>
@endsection
