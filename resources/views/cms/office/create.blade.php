@extends('cms.parent')

@section('page-name',__('cms.federations'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.federations'))
@section('page-name-small',__('cms.federations'))

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
                            <span class="form-text text-muted">{{__('cms.please_select')}}
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
                        <label class="col-3 col-form-label">{{__('cms.name')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="name" placeholder="{{__('cms.name')}}" />
                            <span class="form-text text-muted">{{__('cms.please_select')}} {{__('cms.name')}}</span>
                        </div>
                    </div>


                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.email')}}:</label>
                        <div class="col-9">
                            <input type="email" class="form-control" id="email" placeholder="{{__('cms.email')}}" />
                            <span class="form-text text-muted">{{__('cms.please_select')}} {{__('cms.email')}}</span>
                        </div>
                    </div>



                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.address1')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="address1"
                                placeholder="{{__('cms.address1')}}" />
                            <span class="form-text text-muted">{{__('cms.please_select')}} {{__('cms.address1')}}</span>
                        </div>
                    </div>


                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.address2')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="address2"
                                placeholder="{{__('cms.address2')}}" />
                            <span class="form-text text-muted">{{__('cms.please_select')}} {{__('cms.address2')}}</span>
                        </div>
                    </div>

                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.mobile')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="mobile" placeholder="{{__('cms.mobile')}}" />
                            <span class="form-text text-muted">{{__('cms.please_select')}} {{__('cms.mobile')}}</span>
                        </div>
                    </div>


                    <div class="separator separator-dashed my-10"></div>
                   
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.work_from')}}:</label>
                        <div class="col-9">
                            <input type="time" class="form-control" id="work_from" placeholder="{{__('cms.work_from')}}" />
                            <span class="form-text text-muted">{{__('cms.please_select')}} {{__('cms.work_from')}}</span>
                        </div>
                    </div>

                  <div class="separator separator-dashed my-10"></div>
                <div class="form-group row mt-4">
                    <label class="col-3 col-form-label">{{__('cms.work_to')}}:</label>
                    <div class="col-9">
                        <input type="time" class="form-control" id="work_to" placeholder="{{__('cms.work_to')}}" />
                        <span class="form-text text-muted">{{__('cms.please_select')}} {{__('cms.work_to')}}</span>
                    </div>
                </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performStore({{$office->id ?? null}})"
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
    let days = $('.days:checked').map((i,e) => {
    return $(e).val();
    }).get();
</script>
<script>
    function performStore(id){
let formData = new FormData();
formData.append('language',document.getElementById('language').value);
formData.append('name',document.getElementById('name').value);
formData.append('email',document.getElementById('email').value);
formData.append('address1',document.getElementById('address1').value);
formData.append('address2',document.getElementById('address2').value);
formData.append('work_from',document.getElementById('work_from').value);
formData.append('work_to',document.getElementById('work_to').value);
formData.append('mobile',document.getElementById('mobile').value);

if(id == null) {
    formData.append('city',document.getElementById('city').value);
    formData.append('country',document.getElementById('country').value);
    store('/cms/admin/offices',formData);
    }else {
    store('/cms/admin/offices/'+id+'/translation',formData);
    }

}
</script>
@endsection
