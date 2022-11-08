@extends('cms.parent')

@section('page-name',__('cms.center'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.center'))
@section('page-name-small',__('cms.center'))

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
                        <label class="col-3 col-form-label">{{__('cms.name')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="name" placeholder="{{__('cms.name')}}" />
                            <span class="form-text text-muted">{{__('cms.name')}} {{__('cms.name')}}</span>
                        </div>
                    </div>


                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.subscribtion_price')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="subscribtion_price" placeholder="{{__('cms.subscribtion_price')}}" />
                            <span class="form-text text-muted">{{__('cms.subscribtion_price')}} {{__('cms.subscribtion_price')}}</span>
                        </div>
                    </div>


                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.longitude')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="long"
                                placeholder="{{__('cms.longitude')}}" />
                            <span class="form-text text-muted">{{__('cms.longitude')}} {{__('cms.longitude')}}</span>
                        </div>
                    </div>


                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.latitude')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="lat"
                                placeholder="{{__('cms.latitude')}}" />
                            <span class="form-text text-muted">{{__('cms.latitude')}} {{__('cms.latitude')}}</span>
                        </div>
                    </div>


                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.website_title')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="url_website"
                                placeholder="{{__('cms.website_title')}}" />
                            <span class="form-text text-muted">{{__('cms.website_title')}} {{__('cms.website_title')}}</span>
                        </div>
                    </div>



                   <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.image')}}:</label>
                        <div class="col-9">
                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                style="background-image: url({{asset('assets/media/users/100_1.jpg')}})">
                                <div class="image-input-wrapper"></div>

                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" id="kt_image_4" name="kt_image_4" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="kt_image_4">
                                </label>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
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
formData.append('name',document.getElementById('name').value);
formData.append('subscribtion_price',document.getElementById('subscribtion_price').value);
formData.append('long',document.getElementById('long').value);
formData.append('lat',document.getElementById('lat').value);
formData.append('url_website',document.getElementById('url_website').value);
formData.append('image',image.input.files[0]);


if(id == null) {
    store('/cms/admin/centers',formData);
    }else {
    store('/cms/admin/centers/'+id+'/translation',formData);
    }

}
</script>
@endsection
