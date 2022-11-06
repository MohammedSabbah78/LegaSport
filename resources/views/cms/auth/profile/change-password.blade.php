@extends('cms.parent')
@section('title', __('cms.change_password'))
@section('styles')

@endsection
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">{{__('cms.change_password')}}</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">{{__('cms.change_password')}}</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">{{__('cms.change_password')}}</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">{{__('cms.change_password')}}</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->

            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Container-->
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">{{__('cms.change_password')}}</h3>

                        </div>
                        <!--begin::Form-->
                        <form id="create-form">
                            <div class="card-body">
                                <h3 class="text-dark font-weight-bold mb-10">{{__('cms.change_password')}}</h3>


                                <div class="form-group row mt-4">
                                    <label class="col-3 col-form-label">{{__('cms.password')}}</label>
                                    <div class="col-9">
                                        <input type="password" class="form-control" id="current_password"
                                            placeholder="Enter password">
                                        <span class="form-text text-muted">Please enter password</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <label class="col-3 col-form-label">{{__('cms.new_password')}}</label>
                                    <div class="col-9">
                                        <input type="password" class="form-control" id="new_password"
                                            placeholder="Enter new_password">
                                        <span class="form-text text-muted">Please enter new_password</span>
                                    </div>
                                </div>


                                <div class="form-group row mt-4">
                                    <label class="col-3 col-form-label">{{__('cms.new_password_confirmation')}}</label>
                                    <div class="col-9">
                                        <input type="password" class="form-control" id="new_password_confirmation"
                                            placeholder="Enter password_confirmation">
                                        <span class="form-text text-muted">Please enter password_confirmation</span>
                                    </div>
                                </div>





                            </div>
                            <div class="card-footer">
                                <button type="button" onclick="performstore()"
                                    class="btn btn-primary">{{(__('cms.update'))}}</button>
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
</div>
<!--end::Container-->
</div>
<!--end::Entry-->
</div>


@endsection
@section('scripts')
<script>
    function performstore(){
    //    alert(document.getElementById('branch_id').value);
    //    console.log(document.getElementById('kt_image_4').files[0]);
        let formData=new FormData ();
            formData.append('password',document.getElementById('current_password').value);
            formData.append('new_password',document.getElementById('new_password').value);
            formData.append('new_password_confirmation',document.getElementById('new_password_confirmation').value);

        axios.post('update-password', formData)
        .then(function (response) {
    console.log(response);
    toastr.success(response.data.message);
    window.location.href='/cms/admin'
  })
  .catch(function (error) {
    console.log(error);
    toastr.error(error.response.data.message);
  });
    }
</script>
@endsection
