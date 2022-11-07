@extends('cms.parent')

@section('page-name',__('cms.ads'))
@section('main-page',__('cms.hr'))
@section('sub-page',__('cms.ads'))
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

                    <div class="form-group col-3">
                        <label class="col-3 col-form-label">{{__('cms.image')}}:</label>
                        <div class="col-9">
                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                style="background-image: url({{Storage::url($admin->image)}})">
                                <div class="image-input-wrapper"></div>

                                <label
                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title=""
                                    data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="profile_avatar_remove">
                                </label>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="cancel" data-toggle="tooltip" title=""
                                    data-original-title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="remove" data-toggle="tooltip" title=""
                                    data-original-title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.OnBoardingScreen')}}:</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="on_boarding_screen_id"
                                    title="{{__('cms.select_hint')}}" tabindex="null" data-live-search="true">
                                    @foreach ($OnBoardingScreens as $OnBoardingScreen)
                                    <option @selected($OnBoardingScreen->id == $ad->on_boarding_screen_id)
                                        value="{{$OnBoardingScreen->id}}">{{$OnBoardingScreen->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">{{__('cms.OnBoardingScreen')}}
                                {{__('cms.OnBoardingScreen')}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.active')}}</label>
                        <div class="col-3">
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    <input type="checkbox" id="active" @checked($ad->active==1)>
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
                            <button type="button" onclick="performStore('{{$ad->id}}')"
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
    function performStore(id){
        let formData=new FormData ();
            formData.append('_method','PUT');
            formData.append('on_boarding_screen_id',document.getElementById('on_boarding_screen_id').value);
           formData.append('active',document.getElementById('active').checked?1:0);
            formData.append('image',image.input.files[0]);
            axios.post('/cms/admin/ads/'+id, formData)
                .then(function (response) {
                        console.log(response);
                        toastr.success(response.data.message);
                        window.location.href='/cms/admin/ads'
                    })
                .catch(function (error) {
                        console.log(error);
                        toastr.error(error.response.data.message);
                });
        }
</script>
@endsection