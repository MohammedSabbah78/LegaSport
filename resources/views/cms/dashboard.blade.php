@extends('cms.parent')
@section('page-name',__('cms.dashboard'))
@section('main-page',__('cms.app_name'))
@section('sub-page',__('cms.dashboard'))
@section('content')

<div class="row">
    <div class="col-xl-3">
        <!--begin::Stats Widget 13-->
        <a href="#" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <div class="text-inverse-danger font-weight-bolder font-size-h6 mb-2 mt-5">{{__('cms.all_players')}}
                    (1)
                </div>
                <div class="font-weight-bold text-inverse-danger font-size-sm">{{__('cms.register_today')}}
                    [12]</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Stats Widget 13-->
    </div>
    <div class="col-xl-3">
        <!--begin::Stats Widget 14-->
        <a href="#" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">



                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Shield-user.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path
                                d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                fill="#000000" opacity="0.3" />
                            <path
                                d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                fill="#000000" opacity="0.3" />
                            <path
                                d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <div class="text-inverse-danger font-weight-bolder font-size-h6 mb-2 mt-5">{{__('cms.all_coaches')}}
                    (41)
                </div>
                <div class="font-weight-bold text-inverse-danger font-size-sm">{{__('cms.register_today')}}
                    [5]</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Stats Widget 14-->
    </div>
    <div class="col-xl-3">
        <!--begin::Stats Widget 15-->
        <a href="#" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Fireplace.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path
                                d="M17,20 L17,12 C17,9.23857625 14.7614237,7 12,7 C9.23857625,7 7,9.23857625 7,12 L7,20 L5,20 C3.8954305,20 3,19.1045695 3,18 L3,6 C3,4.8954305 3.8954305,4 5,4 L19,4 C20.1045695,4 21,4.8954305 21,6 L21,18 C21,19.1045695 20.1045695,20 19,20 L17,20 Z"
                                fill="#000000" opacity="0.3" />
                            <path
                                d="M12.9717525,11.7005668 C12.8097937,13.3201542 12.3239175,14.1866868 11.5141238,14.3001646 C11.5141238,14.3001646 12.2429381,11.4576287 11.2711857,10 C11.2711857,10 11.1681401,11.5618236 10.126941,13.4359819 C9.63887975,14.3144921 9.08474261,14.9067082 9.08474261,16.0734529 C9.08474261,17.7393714 10.7908674,18.6003292 12.002779,18.6003292 C13.2146906,18.6003292 14.9152574,18.0172577 14.9152574,15.9765075 C14.9152574,15.1373628 14.2674224,13.7120493 12.9717525,11.7005668 Z"
                                fill="#000000" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <div class="text-inverse-danger font-weight-bolder font-size-h6 mb-2 mt-5">
                    {{__('cms.all_academies')}} (51)</div>
                <div class="font-weight-bold text-inverse-danger font-size-sm">{{__('cms.register_today')}}
                    [12]</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Stats Widget 15-->
    </div>

    <div class="col-xl-3">
        <!--begin::Stats Widget 18-->
        <a href="#" class="card card-custom bg-dark bg-hover-state-dark card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\Gameboy.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path
                                d="M11,16 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,16 L19,16 C20.1045695,16 21,16.8954305 21,18 L21,19 C21,20.1045695 20.1045695,21 19,21 L5,21 C3.8954305,21 3,20.1045695 3,19 L3,18 C3,16.8954305 3.8954305,16 5,16 L11,16 Z"
                                fill="#000000" opacity="0.3" />
                            <circle fill="#000000" cx="12" cy="7" r="3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <div class="text-inverse-danger font-weight-bolder font-size-h6 mb-2 mt-5">{{__('cms.all_sports')}}
                    ({{$allSports}})</div>
                <div class="font-weight-bold text-inverse-danger font-size-sm">{{__('cms.add_today')}}
                    [{{$sportToday}}]</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Stats Widget 18-->
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <!--begin::Mixed Widget 4-->

        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">{{__('cms.last_academies_register')}}</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">{{__('cms.more_than')}} {{134}}+
                        {{__('cms.academy')}}</span>
                </h3>

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-0 pb-3">
                <div class="tab-content">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr class="text-left text-uppercase">
                                    <th style="min-width: 250px" class="pl-7">
                                        <span class="text-dark-75">{{__('cms.name')}}</span>
                                    </th>
                                    <th style="min-width: 100px">{{__('cms.type')}}</th>
                                    <th style="min-width: 100px">{{__('cms.phone')}}</th>
                                    <th style="min-width: 100px">{{__('cms.gender')}}</th>
                                    <th style="min-width: 130px">{{__('cms.birth_date')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($users as $user)
                                <tr>
                                    <td class="pl-0 py-8">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50 symbol-light mr-4">
                                                <span class="symbol-label">
                                                    <img src="{{Storage::url($user->image)}}"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <div>
                                                <a href="#"
                                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                    {{$user->first_name}} {{$user->last_name}}</a>
                                                <span
                                                    class="text-muted font-weight-bold d-block">{{$user->email}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->account_type}}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->phone_number}}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->gender_key}}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->birth_date}}</span>
                                    </td>

                                </tr>
                                @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Body-->
        </div>

        <!--end::Mixed Widget 4-->
    </div>


</div>

<div class="row">
    <div class="col-xl-6">
        <!--begin::Mixed Widget 4-->

        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">{{__('cms.last_players_register')}}</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">{{__('cms.more_than')}} {{134}}+
                        {{__('cms.player')}}</span>
                </h3>

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-0 pb-3">
                <div class="tab-content">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr class="text-left text-uppercase">
                                    <th style="min-width: 250px" class="pl-7">
                                        <span class="text-dark-75">{{__('cms.name')}}</span>
                                    </th>
                                    <th style="min-width: 100px">{{__('cms.type')}}</th>
                                    <th style="min-width: 100px">{{__('cms.phone')}}</th>
                                    <th style="min-width: 100px">{{__('cms.gender')}}</th>
                                    <th style="min-width: 130px">{{__('cms.birth_date')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($users as $user)
                                <tr>
                                    <td class="pl-0 py-8">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50 symbol-light mr-4">
                                                <span class="symbol-label">
                                                    <img src="{{Storage::url($user->image)}}"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <div>
                                                <a href="#"
                                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                    {{$user->first_name}} {{$user->last_name}}</a>
                                                <span
                                                    class="text-muted font-weight-bold d-block">{{$user->email}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->account_type}}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->phone_number}}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->gender_key}}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->birth_date}}</span>
                                    </td>

                                </tr>
                                @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Body-->
        </div>

        <!--end::Mixed Widget 4-->
    </div>
    <div class="col-xl-6">
        <!--begin::Mixed Widget 5-->

        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">{{__('cms.last_coaches_register')}}</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">{{__('cms.more_than')}} {{12}}+
                        {{__('cms.coache')}}</span>
                </h3>

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-0 pb-3">
                <div class="tab-content">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr class="text-left text-uppercase">
                                    <th style="min-width: 250px" class="pl-7">
                                        <span class="text-dark-75">{{__('cms.name')}}</span>
                                    </th>
                                    <th style="min-width: 100px">{{__('cms.type')}}</th>
                                    <th style="min-width: 100px">{{__('cms.phone')}}</th>
                                    <th style="min-width: 100px">{{__('cms.gender')}}</th>
                                    <th style="min-width: 130px">{{__('cms.birth_date')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($users as $user)
                                <tr>
                                    <td class="pl-0 py-8">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50 symbol-light mr-4">
                                                <span class="symbol-label">
                                                    <img src="{{Storage::url($user->image)}}"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <div>
                                                <a href="#"
                                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                    {{$user->first_name}} {{$user->last_name}}</a>
                                                <span
                                                    class="text-muted font-weight-bold d-block">{{$user->email}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->account_type}}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->phone_number}}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->gender_key}}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->birth_date}}</span>
                                    </td>

                                </tr>
                                @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Body-->
        </div>

        <!--end::Mixed Widget 5-->
    </div>

</div>


@endsection