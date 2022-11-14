@extends('cms.parent')

@section('page-name',__('cms.plans'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.plans'))
@section('page-name-small',__('cms.plans'))

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
                   <div class="card-body">
                        <div class="form-group row mt-4">
                            <label class="col-3 col-form-label">{{__('cms.language')}}:<span class="text-danger">*</span></label>
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
                            <label class="col-3 col-form-label">{{__('cms.question')}}:</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="question" placeholder="{{__('cms.question')}}" />
                                <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.question')}}</span>
                            </div>
                        </div>


                        <div class="form-group row mt-4">
                            <label class="col-3 col-form-label">{{__('cms.answer')}}:</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="answer" placeholder="{{__('cms.answer')}}" />
                                <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.answer')}}</span>
                            </div>
                        </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performStore({{$plan->id ?? null}})"
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
formData.append('qs',document.getElementById('question').value);
formData.append('answer',document.getElementById('answer').value);





if(id == null) {
    store('/cms/admin/faqs',formData);
    }else {
    store('/cms/admin/faqs/'+id+'/translation',formData);
    }

}
</script>
@endsection
