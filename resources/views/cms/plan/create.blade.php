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



                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.price')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="price" placeholder="{{__('cms.price')}}" />
                            <span class="form-text text-muted">{{__('cms.price')}} {{__('cms.price')}}</span>
                        </div>
                    </div>


                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.date')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="date" placeholder="{{__('cms.date')}}" />
                            <span class="form-text text-muted">{{__('cms.date')}} {{__('cms.date')}}</span>
                        </div>
                    </div>


                    <div class="separator separator-dashed my-10"></div>
                    <h3 class="text-dark font-weight-bold mb-10">{{__('cms.settings')}}</h3>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.active')}}</label>
                        <div class="col-3">
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    <input type="checkbox" checked="checked" id="active">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>

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
formData.append('price',document.getElementById('price').value);
formData.append('max_month',document.getElementById('date').value);
formData.append('active',document.getElementById('active').checked ? 1:0);


if(id == null) {
    store('/cms/admin/plans',formData);
    }else {
    store('/cms/admin/plans/'+id+'/translation',formData);
    }

}
</script>
@endsection
