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
                        <label class="col-3 col-form-label">{{__('cms.title')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="title" placeholder="{{__('cms.title')}}" />
                            <span class="form-text text-muted">{{__('cms.title')}} {{__('cms.title')}}</span>
                        </div>
                    </div>


                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.description')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="description" placeholder="{{__('cms.description')}}" />
                            <span class="form-text text-muted">{{__('cms.description')}} {{__('cms.description')}}</span>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.isPrivate')}}</label>
                        <div class="col-3">
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    <input type="checkbox" checked="checked" id="isPrivate">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.isOnline')}}</label>
                        <div class="col-3">
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    <input type="checkbox" checked="checked" id="isOnline">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.type')}}</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <div class="dropdown bootstrap-select form-control"><select class="form-control selectpicker" data-size="7"
                                        id="type" title="Choose one of the following..." tabindex="null" data-live-search="true">
                                        <option value="Free">{{__('cms.free')}}</option>
                                        <option value="Paid">{{{__('cms.paid')}}}</option>
                                    </select>
                                    <div class="dropdown-menu ">
                                        <div class="bs-searchbox"><input type="search" class="form-control" autocomplete="off"
                                                role="combobox" aria-label="Search" aria-controls="bs-select-1" aria-autocomplete="list">
                                        </div>
                                        <div class="inner show" role="listbox" id="bs-select-1" tabindex="-1">
                                            <ul class="dropdown-menu inner show" role="presentation"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please select Type</span>
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

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.date')}}:</label>
                        <div class="col-9">
                            <input type="date" class="form-control" id="date" placeholder="{{__('cms.date')}}" />
                            <span class="form-text text-muted">{{__('cms.date')}} {{__('cms.date')}}</span>
                        </div>
                    </div>


                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.users')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="max_user" placeholder="{{__('cms.users')}}" />
                            <span class="form-text text-muted">{{__('cms.users')}} {{__('cms.users')}}</span>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.price')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="price" placeholder="{{__('cms.price')}}" />
                            <span class="form-text text-muted">{{__('cms.price')}} {{__('cms.price')}}</span>
                        </div>
                    </div>


                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.website_title')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="url_website" placeholder="{{__('cms.website_title')}}" />
                            <span class="form-text text-muted">{{__('cms.website_title')}} {{__('cms.website_title')}}</span>
                        </div>
                    </div>



                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.start_date')}}:</label>
                        <div class="col-9">
                            <input type="time" class="form-control" id="start" placeholder="{{__('cms.start_date')}}" />
                            <span class="form-text text-muted">{{__('cms.start_date')}} {{__('cms.start_date')}}</span>
                        </div>
                    </div>


                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.end_date')}}:</label>
                        <div class="col-9">
                            <input type="time" class="form-control" id="end" placeholder="{{__('cms.end_date')}}" />
                            <span class="form-text text-muted">{{__('cms.end_date')}} {{__('cms.end_date')}}</span>
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
formData.append('title',document.getElementById('title').value);
formData.append('description',document.getElementById('description').value);
formData.append('isPrivate',document.getElementById('isPrivate').checked ? 1:0);
formData.append('isOnline',document.getElementById('isOnline').checked ? 1:0);
formData.append('type',document.getElementById('type').value);
formData.append('poster',image.input.files[0]);
formData.append('date',document.getElementById('date').value);
formData.append('max_user',document.getElementById('max_user').value);
formData.append('price',document.getElementById('price').value);
formData.append('event_link',document.getElementById('url_website').value);
formData.append('start',document.getElementById('start').value);
formData.append('end',document.getElementById('end').value);





if(id == null) {
    store('/cms/admin/events',formData);
    }else {
    store('/cms/admin/events/'+id+'/translation',formData);
    }

}
</script>
@endsection
