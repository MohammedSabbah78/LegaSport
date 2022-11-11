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





                                <div class="separator separator-dashed my-10"></div>

                                <div class="form-group row mt-4">
                                    <label class="col-3 col-form-label">{{__('cms.partner')}}:<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <div class="dropdown bootstrap-select form-control dropup">
                                            <select class="form-control selectpicker" data-size="7" id="partner"
                                                title="Choose one of the following..." tabindex="null" data-live-search="true">
                                                @foreach ($partners as $partner)
                                                <option value="{{$partner->id}}">{{$partner->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="form-text text-muted">{{__('cms.please_select')}}
                                            {{__('cms.type')}}</span>
                                    </div>
                                </div>


                                <div class="separator separator-dashed my-10"></div>

                                <div class="form-group row mt-4">
                                    <label class="col-3 col-form-label">{{__('cms.events')}}:<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <div class="dropdown bootstrap-select form-control dropup">
                                            <select class="form-control selectpicker" data-size="7" id="event"
                                                title="Choose one of the following..." tabindex="null" data-live-search="true">
                                                @foreach ($events as $event)
                                                <option value="{{$event->id}}">{{$event->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="form-text text-muted">{{__('cms.please_select')}}
                                            {{__('cms.type')}}</span>
                                    </div>
                                </div>


                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row mt-4">
                                    <label class="col-3 col-form-label">{{__('cms.cost')}}:</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="cost" placeholder="{{__('cms.cost')}}" />
                                        <span class="form-text text-muted">{{__('cms.cost')}} </span>
                                    </div>
                                </div>


                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performStore({{$sponser->id ?? null}})"
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
formData.append('partner',document.getElementById('partner').value);
formData.append('event',document.getElementById('event').value);
formData.append('cost',document.getElementById('cost').value);






if(id == null) {
    store('/cms/admin/sponsers',formData);
    }else {
    store('/cms/admin/sponsers/'+id+'/translation',formData);
    }

}
</script>
@endsection
