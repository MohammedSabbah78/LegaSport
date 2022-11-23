@extends('cms.parent')

@section('page-name',__('cms.partners'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.partners'))
@section('page-name-small',__('cms.partners'))

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
                        <label class="col-3 col-form-label">{{__('cms.country')}}:<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="country" title="Choose one of the following..."
                                    tabindex="null" data-live-search="true">
                                    @foreach ($Countrys as $Country)
                                    <option value="{{$Country->id}}">{{$Country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">{{__('cms.country')}}
                                {{__('cms.type')}}</span>
                        </div>
                    </div>


                    <div class="separator separator-dashed my-10"></div>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.city')}}:<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="city" title="Choose one of the following..."
                                    tabindex="null" data-live-search="true">
                                    @foreach ($citys as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
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



                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.representative')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="representative" placeholder="{{__('cms.representative')}}" />
                            <span class="form-text text-muted">{{__('cms.representative')}} </span>
                        </div>
                    </div>

                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.compony_record')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="compony_record" placeholder="{{__('cms.compony_record')}}" />
                            <span class="form-text text-muted">{{__('cms.compony_record')}} </span>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label class="col-12 col-form-label">{{__('cms.image')}}:</label>
                        <div class="col-12">
                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                style="background-image: url(https://abraj.mr-dev.tech/assets/media/users/blank.png)">
                                <div class="image-input-wrapper"></div>

                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="profile_avatar_remove">
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


                <div class="separator separator-dashed my-10"></div>
                <div class="form-group row mt-4">
                    <label class="col-3 col-form-label">{{__('cms.date')}}:</label>
                    <div class="col-9">
                        <input type="date" class="form-control" id="incorporation_date" placeholder="{{__('cms.date')}}" />
                        <span class="form-text text-muted">{{__('cms.date')}} </span>
                    </div>
                </div>

                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.mobile')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="representative_mobile" placeholder="{{__('cms.mobile')}}" />
                            <span class="form-text text-muted">{{__('cms.mobile')}} </span>
                        </div>
                    </div>

                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.num_branch')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="num_branch" placeholder="{{__('cms.num_branch')}}" />
                            <span class="form-text text-muted">{{__('cms.num_branch')}}</span>
                        </div>
                    </div>



                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.webist')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="webiste" placeholder="{{__('cms.link')}}" />
                            <span class="form-text text-muted">{{__('cms.link')}} </span>
                        </div>
                    </div>


                    <div class="form-group col-12">
                        <label class="col-12 col-form-label">{{__('cms.image')}}:</label>
                        <div class="col-12">
                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                style="background-image: url(https://abraj.mr-dev.tech/assets/media/users/blank.png)">
                                <div class="image-input-wrapper"></div>

                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="profile_avatar_remove">
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
                            <button type="button" onclick="performStore({{$federation->id ?? null}})"
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
    var logo = new KTImageInput('kt_image_5');
</script>
<script>
    function performStore(id){
let formData = new FormData();
formData.append('language',document.getElementById('language').value);
formData.append('city',document.getElementById('city').value);
formData.append('country',document.getElementById('country').value);
formData.append('name',document.getElementById('name').value);
formData.append('representative',document.getElementById('representative').value);
formData.append('incorporation_date',document.getElementById('incorporation_date').value);
formData.append('compony_record',document.getElementById('compony_record').value);
formData.append('representative_mobile',document.getElementById('representative_mobile').value);
formData.append('num_branch',document.getElementById('num_branch').value);
formData.append('webiste',document.getElementById('webiste').value);
formData.append('logo',logo.input.files[0]);






if(id == null) {
    store('/cms/admin/partners',formData);
    }else {
    store('/cms/admin/partners/'+id+'/translation',formData);
    }

}
</script>
@endsection
