@extends('cms.parent')

@section('page-name',__('cms.cities'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.cities'))
@section('page-name-small',__('cms.create'))

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
                    @empty($city)
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
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.name')}}:</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control" id="name" placeholder="{{__('cms.name')}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.name')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.longitude')}}:</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control" id="longitude"
                                placeholder="{{__('cms.longitude')}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.longitude')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.latitude')}}:</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control" id="latitude"
                                placeholder="{{__('cms.latitude')}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.latitude')}}</span>
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
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performStore({{$city->id ?? null}})"
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
    controlFormInputs(true);
    $('#language').on('change',function() {
        if('{{empty($city)}}') {
            controlFormInputs(this.value == -1);
            $('#country').empty();
            getCountries(this.value);
            // $('#name').val('');
            // $('#info').val('');
        }else {
        $ ('#name').attr('disabled',false);
        $ ('#latitude').attr('disabled',false);
        $ ('#longitude').attr('disabled',false);
        }
    });

    function controlFormInputs(disabled) {
        $('#name').attr('disabled',disabled);
        $('#latitude').attr('disabled',disabled);
        $('#longitude').attr('disabled',disabled);
        $('#country').attr('disabled',disabled);
    }

    function getCountries(languageId) {
        blockUI();
        axios.get(`/cms/admin/countries/translation/${languageId}`)
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

</script>
<script>
    function performStore(id){
        let data = {
            language: document.getElementById('language').value,
            name: document.getElementById('name').value,
            latitude: document.getElementById('latitude').value,
            longitude: document.getElementById('longitude').value,
            active: document.getElementById('active').checked,
        }

        if(id == null) {
            data['country'] = document.getElementById('country').value,
            store('/cms/admin/cities',data);
        }else {
            store('/cms/admin/cities/'+id+'/translation',data);
        }
    }
</script>
@endsection