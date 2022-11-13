@extends('cms.parent')

@section('page-name',__('cms.taskesforpoint'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.taskesforpoint'))
@section('page-name-small',__('cms.taskesforpoint'))

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
                        <label class="col-3 col-form-label">{{__('cms.task_title')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="task_title" placeholder="{{__('cms.task_title')}}" />
                            <span class="form-text text-muted">{{__('cms.task_title')}} {{__('cms.task_title')}}</span>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.type')}}</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <div class="dropdown bootstrap-select form-control"><select class="form-control selectpicker" data-size="7"
                                        id="type" title="Choose one of the following..." tabindex="null" data-live-search="true">
                                        <option value="player">{{__('cms.player')}}</option>
                                        <option value="coach">{{{__('cms.coache')}}}</option>
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




                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.point')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="point" placeholder="{{__('cms.point')}}" />
                            <span class="form-text text-muted">{{__('cms.point')}} {{__('cms.point')}}</span>
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
formData.append('task_title',document.getElementById('task_title').value);
formData.append('point',document.getElementById('point').value);
formData.append('type',document.getElementById('type').value);






if(id == null) {
    store('/cms/admin/taskes-for-points',formData);
    }else {
    store('/cms/admin/taskes-for-points/'+id+'/translation',formData);
    }

}
</script>
@endsection
