@extends('cms.parent')

@section('page-name',__('cms.sport'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.sport'))
@section('page-name-small',__('cms.update'))

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
                                    title="Choose one of the following..." tabindex="null" data-live-search="true"
                                    >
                                    @foreach ($languages as $language)
                                    <option value="{{$language->id}}" @selected($sportTranslation->language_id ==
                                        $language->id)>{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.type')}}</span>
                        </div>
                    </div>



                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.country')}}:<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="country" title="Choose one of the following..."
                                    tabindex="null" data-live-search="true">
                                    @foreach ($countrys as $country)
                                    <option value="{{$country->id}}" @selected($sportTranslation->country_id ==
                                        $country->id)>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.type')}}</span>
                        </div>
                    </div>


                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.city')}}:<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="city" title="Choose one of the following..."
                                    tabindex="null" data-live-search="true">
                                    @foreach ($citys as $city)
                                    <option value="{{$city->id}}" @selected($sportTranslation->city_id ==
                                        $city->id)>{{$city->name}}</option>
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
                            <input type="text" class="form-control" id="title" placeholder="{{__('cms.title')}}"
                                value="{{$sportTranslation->title}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.title')}}</span>
                        </div>
                    </div>
                    @empty($sportTranslation)
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
                            <button type="button" onclick="performEdit()"
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
    function performEdit(){
        let data = {
            language: document.getElementById('language').value,
            country: document.getElementById('country').value,
            city: document.getElementById('city').value,
            title: document.getElementById('title').value,
        }
        update('/cms/admin/sports/translations/{{$sportTranslation->id}}', data, '/cms/admin/sports');
    }
</script>
@endsection
