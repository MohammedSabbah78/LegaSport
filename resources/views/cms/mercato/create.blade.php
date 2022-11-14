@extends('cms.parent')

@section('page-name',__('cms.mercatos'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.mercatos'))
@section('page-name-small',__('cms.mercatos'))

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


                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.title')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="title" placeholder="{{__('cms.title')}}" />
                            <span class="form-text text-muted">{{__('cms.title')}} </span>
                        </div>
                    </div>


                   <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.type')}}</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <div class="dropdown bootstrap-select form-control"><select class="form-control selectpicker" data-size="7"
                                        id="type" title="Choose one of the following..." tabindex="null" data-live-search="true">
                                        <option value="permanet">{{__('cms.permanet')}}</option>
                                        <option value="trmporary">{{{__('cms.trmporary')}}}</option>
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
                        <label class="col-3 col-form-label">{{__('cms.from')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="form" placeholder="{{__('cms.from')}}" />
                            <span class="form-text text-muted">{{__('cms.from')}} </span>
                        </div>

                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.to')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="to" placeholder="{{__('cms.to')}}" />
                            <span class="form-text text-muted">{{__('cms.to')}} </span>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.start_date')}}:</label>
                        <div class="col-9">
                            <input type="date" class="form-control" id="start_date" placeholder="{{__('cms.start_date')}}" />
                            <span class="form-text text-muted">{{__('cms.start_date')}}</span>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.end_date')}}:</label>
                        <div class="col-9">
                            <input type="date" class="form-control" id="end_date" placeholder="{{__('cms.end_date')}}" />
                            <span class="form-text text-muted">{{__('cms.end_date')}} </span>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.salary')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="salary" placeholder="{{__('cms.salary')}}" />
                            <span class="form-text text-muted">{{__('cms.salary')}} </span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <table class="table table-head-custom table-vertical-center table-hover" id="kt_advance_table_widget_2">
                            <thead>
                                <tr class="text-uppercase">
                                    <th style="min-width: 150px">{{__('cms.name')}}</th>
                                    <th style="min-width: 120px">{{__('cms.add_today')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($votequestions as $votequestion)
                                <tr>
                                    <td class="pl-0">
                                        <a href="#"
                                            class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$votequestion->name}}</a>
                                    </td>

                                    <td class="pl-0">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input type="checkbox" name="votequestion_{{$votequestion->id}}" @if($votequestion->granted)
                                                checked="checked"
                                                @endif onclick="grantvotequestion()">
                                                <span></span>{{__('cms.add')}}</label>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>





                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performStore({{$mercato->id ?? null}})"
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
formData.append('image',image.input.files[0]);
formData.append('type',document.getElementById('type').value);
formData.append('form',document.getElementById('form').value);
formData.append('to',document.getElementById('to').value);
formData.append('start_date',document.getElementById('start_date').value);
formData.append('salary',document.getElementById('salary').value);
formData.append('end_date',document.getElementById('end_date').value);






if(id == null) {
    store('/cms/admin/mercatos',formData);
    }else {
    store('/cms/admin/mercatos/'+id+'/translation',formData);
    }

}
</script>

<script>
    function grantvotequestion() {
        let data = {
            
        }
        store('/cms/admin/',data);
    }
</script>
@endsection
