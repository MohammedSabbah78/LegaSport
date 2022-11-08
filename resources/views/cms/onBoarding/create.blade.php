@extends('cms.parent')

@section('page-name',__('cms.on_boarding'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.on_boarding'))
@section('page-name-small',__('cms.create'))

@section('styles')

@endsection

@section('content')
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title"></h3>
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
                    @empty($screen)
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.country')}}:<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="country"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                </select>
                            </div>
                            <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.type')}}</span>
                        </div>
                    </div>
                    @endempty
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.title')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="title" placeholder="{{__('cms.title')}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.title')}}</span>
                        </div>
                    </div>

                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.body')}}:<span class="text-danger"></span></label>
                        <div class="col-9">
                            <textarea class="form-control" id="body" maxlength="1000" rows="3"
                                placeholder="{{__('cms.please_enter')}} {{__('cms.body')}}"></textarea>
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.body')}}</span>
                        </div>
                    </div>


                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.ordering')}}:<span class="text-danger"></span></label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="ordering" maxlength="1000" rows="3"
                                placeholder="{{__('cms.please_enter')}} {{__('cms.ordering')}}">
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.ordering')}}</span>
                        </div>
                    </div>
                    @empty($screen)

                    <div class="row">
                        <div class="form-group col-12">
                            <label class="col-12 col-form-label">{{__('cms.image')}}:</label>
                            <div class="col-12">
                                <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                    style="background-image: url(https://abraj.mr-dev.tech/assets/media/users/blank.png)">
                                    <div class="image-input-wrapper"></div>

                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="profile_avatar_remove">
                                    </label>

                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel" data-toggle="tooltip" title=""
                                        data-original-title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>

                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="remove" data-toggle="tooltip" title=""
                                        data-original-title="Remove avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                            </div>
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
                    @endempty
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performStore({{$screen->id ?? null}})"
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
    controlFormInputs(true);
    $('#language').on('change',function() {
        if('{{empty($screen)}}') {
            controlFormInputs(this.value == -1);
            $('#country').empty();
            getCountries(this.value);
            // $('#name').val('');
            // $('#info').val('');
        }else {
        $('#title').attr('disabled',false);
        $('#body').attr('disabled',false);
        $('#ordering').attr('disabled',false);
        }
    });

    function controlFormInputs(disabled) {
        $('#title').attr('disabled',disabled);
        $('#body').attr('disabled',disabled);
        $('#ordering').attr('disabled',disabled);
        $('#country').attr('disabled',disabled);
    }

    function getCountries(languageId) {
        blockUI();
        axios.get(`/cms/admin/on-boarding-screens/translation/${languageId}`)
        .then(function (response) {
            if(response.data.countries.length != 0) {
                response.data.countries.map((country) => {
                    $('#country').append(new Option(country.name, country.country_id))
                    $('#country').selectpicker("refresh");
                });
            }else {
                controlFormInputs(true);
            }
        })
        .catch(function (error) {
            toastr.error(error.response.data.message);
        })
        .then(function () {
            unBlockUI();
        });
    }

    function blockUI () {
        KTApp.blockPage({
            overlayColor: 'blue',
            opacity: 0.1,
            state: 'primary' // a bootstrap color
        });
    }

    function unBlockUI () {
        KTApp.unblockPage();
    }

function performStore(id){
let formData = new FormData();
formData.append('title',document.getElementById('title').value);
formData.append('body',document.getElementById('body').value);
formData.append('language',document.getElementById('language').value);

if(id != null) {
store('/cms/admin/on-boarding-screens/'+id+'/translation',formData);
}else {
 formData.append('active',document.getElementById('active').checked?1:0);
 formData.append('country_id',document.getElementById('country').value);
formData.append('image',image.input.files[0]);
formData.append('ordering',document.getElementById('ordering').value);

store('/cms/admin/on-boarding-screens',formData);
}
}
</script>
@endsection