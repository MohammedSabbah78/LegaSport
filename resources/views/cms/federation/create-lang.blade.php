@extends('cms.parent')

@section('page-name', __('cms.federations'))
@section('main-page', __('cms.content_management'))
@section('sub-page', __('cms.federations'))
@section('page-name-small', __('cms.federations'))

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
                            <label class="col-3 col-form-label">{{ __('cms.language') }}:<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <div class="dropdown bootstrap-select form-control dropup">
                                    <select class="form-control selectpicker" data-size="7" id="language"
                                        title="Choose one of the following..." tabindex="null" data-live-search="true">
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="form-text text-muted">{{ __('cms.please_select') }}
                                    {{ __('cms.type') }}</span>
                            </div>
                        </div>


                        {{-- <div class="separator separator-dashed my-10"></div>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.country')}}:<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="country"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
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
                        <label class="col-3 col-form-label">{{__('cms.city')}}:<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="city"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
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
                        <label class="col-3 col-form-label">{{__('cms.sport')}}:<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="sport"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                    @foreach ($sports as $sport)
                                    <option value="{{$sport->id}}">{{$sport->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.type')}}</span>
                        </div>
                    </div>


                    <div class="separator separator-dashed my-10"></div> --}}



                        <div class="form-group row mt-4">
                            <label class="col-3 col-form-label">{{ __('cms.name') }}:</label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="name"
                                    placeholder="{{ __('cms.name') }}" />
                                <span class="form-text text-muted">{{ __('cms.name') }} {{ __('cms.name') }}</span>
                            </div>
                        </div>






                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-3">

                            </div>
                            <div class="col-9">
                                <button type="button" onclick="performStore({{ $federation->id ?? null }})"
                                    class="btn btn-primary mr-2">{{ __('cms.save') }}</button>
                                <button type="reset" class="btn btn-secondary">{{ __('cms.cancel') }}</button>
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
        function performStore(id) {
            let formData = new FormData();
            formData.append('language', document.getElementById('language').value);
            formData.append('name', document.getElementById('name').value);
            if (id == null) {
                formData.append('country', document.getElementById('country').value);
                formData.append('city', document.getElementById('city').value);
                formData.append('sport', document.getElementById('sport').value);
                store('/cms/admin/federations', formData);
            } else {
                store('/cms/admin/federations/' + id + '/translation', formData, '/cms/admin/federations');
            }

        }
    </script>
@endsection
