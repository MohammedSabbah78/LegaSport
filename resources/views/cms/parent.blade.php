<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{App::isLocale('en') ? 'en' : 'ar'}}" direction="{{App::isLocale('en') ? 'ltr' : 'rtl'}}"
	style="direction: {{App::isLocale('en') ? 'ltr' : 'rtl'}};">
{{-- <html lang="{{App::currentLocale()}}"> --}}
<!--begin::Head-->

<head>

	<meta charset="utf-8" />
	<title>{{__('cms.app_name')}} | @yield('page-name')</title>
	<meta name="description" content="{{__('cms.app_name')}} CMS" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="#" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Vendors Styles(used by this page)-->
	<link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
		type="text/css" />
	<!--end::Page Vendors Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />

	@if (App::isLocale('ar'))
	<link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
	@else
	{{-- {{dd('en');}} --}}
	<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	@endif
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<link href="{{asset('assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />

	<style>
		.customImage {
			width: 100%;
			height: 100% !important;
			object-fit: cover;
			border-radius: 7px;
		}
	</style>

	@yield('styles')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
	class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
	<!--begin::Main-->
	<!--begin::Header Mobile-->
	<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
		<!--begin::Logo-->
		<a href="#">
			<img alt="Logo" src="{{asset('assets/media/logos/logo-light.png')}}" />
		</a>
		<!--end::Logo-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Aside Mobile Toggle-->
			<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
				<span></span>
			</button>
			<!--end::Aside Mobile Toggle-->
			<!--begin::Header Menu Mobile Toggle-->
			<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
				<span></span>
			</button>
			<!--end::Header Menu Mobile Toggle-->
			<!--begin::Topbar Mobile Toggle-->
			<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
				<span class="svg-icon svg-icon-xl">
					<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
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
			</button>
			<!--end::Topbar Mobile Toggle-->
		</div>
		<!--end::Toolbar-->
	</div>
	<!--end::Header Mobile-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">
			<!--begin::Aside-->
			<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
				<!--begin::Brand-->
				<div class="brand flex-column-auto" id="kt_brand">
					<!--begin::Logo-->
					<a href="#" class="brand-logo">
						<img alt="Logo" src="{{asset('assets/media/logos/logo-light.png')}}" />
					</a>
					<!--end::Logo-->
					<!--begin::Toggle-->
					<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
						<span class="svg-icon svg-icon svg-icon-xl">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24" />
									<path
										d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
										fill="#000000" fill-rule="nonzero"
										transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
									<path
										d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
										fill="#000000" fill-rule="nonzero" opacity="0.3"
										transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
					</button>
					<!--end::Toolbar-->
				</div>
				<!--end::Brand-->
				<!--begin::Aside Menu-->
				<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
					<!--begin::Menu Container-->
					<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
						data-menu-dropdown-timeout="500">
						<!--begin::Menu Nav-->
						<ul class="menu-nav">
							<li class="menu-item menu-item-active" aria-haspopup="true">
								<a href="{{route('cms.dashboard')}}" class="menu-link">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24" />
												<path
													d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
													fill="#000000" fill-rule="nonzero" />
												<path
													d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
													fill="#000000" opacity="0.3" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.dashboard')}}</span>
								</a>
							</li>

							@canany(['Read-Admins','Create-Admin'])
							<li class="menu-section">
								<h4 class="menu-text">{{__('cms.hr')}}</h4>
								<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
							</li>
							@endcanany

							@canany(['Read-Admins','Create-Admin'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Shield-user.svg--><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
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

									<span class="menu-text">{{__('cms.admins')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.admins')}}</span>
											</span>
										</li>
										@can('Create-Admin')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('admins.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read-Admins')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('admins.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany

							@canany(['Read-Roles','Create-Role','Read-Permissions'])
							<li class="menu-section">
								<h4 class="menu-text">{{__('cms.roles_permissions')}}</h4>
								<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
							</li>
							@endcanany


							@canany(['Read-Roles','Create-Role'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Shield-thunder.svg--><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
													fill="#000000" opacity="0.3" />
												<polygon fill="#000000" opacity="0.3"
													points="11.3333333 18 16 11.4 13.6666667 11.4 13.6666667 7 9 13.6 11.3333333 13.6" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.roles')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.roles')}}</span>
											</span>
										</li>
										@can('Create-Role')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('roles.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read-Roles')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('roles.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany


							@canany(['Read-Permissions'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Clipboard.svg--><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
													fill="#000000" opacity="0.3" />
												<path
													d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
													fill="#000000" />
												<rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2"
													rx="1" />
												<rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2"
													rx="1" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.permissions')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.permissions')}}</span>
											</span>
										</li>
										@can('Read-Permissions')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('permissions.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan

									</ul>
								</div>
							</li>
							@endcanany

							@canany([
                            'Create-Language','Read-Languages',
                            'Create-Ad','Read-Ads',
                            'Create-On-Boarding','Read-On-Boardings',
                            'Create-Sport','Read-Sports',
                            'Create-Nationality','Read-Nationalities',

                            'Create-Achievement', 'Read-Achievements' ,
                            'Create_Plan','Read_Plans',
                            'Read-Centers', 'Create-Center',
                            'Create_Event', 'Read_Events',
                            'Create-Federation', 'Read-Federations',
                            'Create-Partner', 'Read-Partners',
                            'Create-Paymen', 'Read-Paymens',
                            'Create-Office', 'Read-Offices',
                            'Create-Faq', 'Read-Faqs',
                            'Create-Term', 'Read-Terms',
                            'Create-Policie', 'Read-Policies',
                            'Create-About', 'Read-Abouts',


                            ])
							<li class="menu-section">
								<h4 class="menu-text">{{__('cms.content_management')}}</h4>
								<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
							</li>
							@endcanany



							@canany(['Create-Language','Read-Languages'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Home-heart.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 C2.99998155,19.0000663 2.99998155,19.0000652 2.99998155,19.0000642 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M13.8,12 C13.1562,12 12.4033,12.7298529 12,13.2 C11.5967,12.7298529 10.8438,12 10.2,12 C9.0604,12 8.4,12.8888719 8.4,14.0201635 C8.4,15.2733878 9.6,16.6 12,18 C14.4,16.6 15.6,15.3 15.6,14.1 C15.6,12.9687084 14.9396,12 13.8,12 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
									<span class="menu-text">{{__('cms.languages')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.languages')}}</span>
											</span>
										</li>
										@can('Create-Language')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('languages.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read-Languages')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('languages.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany



							@canany(['Create-On-Boarding','Read-On-Boardings'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\iPhone-X.svg--><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z"
													fill="#000000" opacity="0.3" />
												<path
													d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z M8,1 L16,1 C17.5187831,1 18.75,2.23121694 18.75,3.75 L18.75,20.25 C18.75,21.7687831 17.5187831,23 16,23 L8,23 C6.48121694,23 5.25,21.7687831 5.25,20.25 L5.25,3.75 C5.25,2.23121694 6.48121694,1 8,1 Z M9.5,1.75 L14.5,1.75 C14.7761424,1.75 15,1.97385763 15,2.25 L15,3.25 C15,3.52614237 14.7761424,3.75 14.5,3.75 L9.5,3.75 C9.22385763,3.75 9,3.52614237 9,3.25 L9,2.25 C9,1.97385763 9.22385763,1.75 9.5,1.75 Z"
													fill="#000000" fill-rule="nonzero" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.on_boarding')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.on_boarding')}}</span>
											</span>
										</li>
										@can('Create-On-Boarding')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('on-boarding-screens.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read-On-Boardings')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('on-boarding-screens.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany


							@canany(['Create-Ad','Read-Ads'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Files\Upload.svg--><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z"
													fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="14"
													rx="1" />
												<path
													d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z"
													fill="#000000" fill-rule="nonzero" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.ads')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.ads')}}</span>
											</span>
										</li>
										@can('Create-Ad')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('ads.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read-Ads')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('ads.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany


							@canany(['Create-Nationality','Read-Nationalities'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Home.svg--><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
													fill="#000000" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.nationality')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.nationality')}}</span>
											</span>
										</li>
										@can('Create-Nationality')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('nationalities.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read-Nationalities')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('nationalities.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany


							@canany(['Read-Sports', 'Create-Sport'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\Gameboy.svg--><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
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
									<span class="menu-text">{{__('cms.sport')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.sport')}}</span>
											</span>
										</li>
										@can('Create-Sport')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('sports.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read-Sports')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('sports.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany

							@canany(['Create-Achievement', 'Read-Achievements'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
										<svg xmlns="{{asset('cms/http://www.w3.org/2000/svg')}}"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
													fill="#000000" opacity="0.3" />
												<path
													d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
													fill="#000000" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.achievements')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.achievements')}}</span>
											</span>
										</li>
										@can('Create-Achievement')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('achievements.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read-Achievements')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('achievements.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany

							@canany(['Create_Plan', 'Read_Plans'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"></rect>
												<path
													d="M13,5 L15,5 L15,20 L13,20 L13,5 Z M5,5 L5,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,6 C2,5.44771525 2.44771525,5 3,5 L5,5 Z M16,5 L18,5 L18,20 L16,20 L16,5 Z M20,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,19 C22,19.5522847 21.5522847,20 21,20 L20,20 L20,5 Z"
													fill="#000000"></path>
												<polygon fill="#000000" opacity="0.3" points="9 5 9 20 7 20 7 5">
												</polygon>
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.plans')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.plans')}}</span>
											</span>
										</li>
										@can('Create_Plan')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('plans.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read_Plans')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('plans.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany



							@canany(['Read-Centers', 'Create-Center'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Book-open.svg--><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z"
													fill="#000000" />
												<path
													d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z"
													fill="#000000" opacity="0.3" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.center')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.center')}}</span>
											</span>
										</li>
										@can('Create-Center')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('centers.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read-Centers')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('centers.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany

							@canany(['Read-Days', 'Create-Days'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
													fill="#000000" fill-rule="nonzero"
													transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
												<path
													d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
													fill="#000000" opacity="0.3" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{ __('cms.days') }}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{ __('cms.days') }}</span>
											</span>
										</li>
										@can('Read-Days')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{ route('days.index') }}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{ __('cms.index') }}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany

							@canany(['Create_Event', 'Read_Events'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"></rect>
												<path
													d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z"
													fill="#000000"></path>
												<path
													d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z"
													fill="#000000" opacity="0.3"></path>
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.events')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.events')}}</span>
											</span>
										</li>
										@can('Create_Event')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('events.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read_Events')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('events.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany



                            @canany(['Create-Federation', 'Read-Federations'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z"
                                                    fill="#000000"></path>
                                                <path
                                                    d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.federations')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.federations')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Federation')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('federations.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Federations')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('federations.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany



                            @canany(['Create-Partner', 'Read-Partners'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z"
                                                    fill="#000000"></path>
                                                <path
                                                    d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.partners')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.partners')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Partner')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('partners.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Partners')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('partners.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany


                            @canany(['Create-Club', 'Read-Clubs'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z"
                                                    fill="#000000"></path>
                                                <path
                                                    d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.clubs')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.clubs')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Club')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('clubs.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Clubs')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('clubs.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany















                            @canany(['Create-Sponser', 'Read-Sponsers'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)">
                                                </path>
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.sponsers')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.sponsers')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Sponser')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('sponsers.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Sponsers')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('sponsers.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany


                            @canany(['Create-Offer', 'Read-Offers'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)">
                                                </path>
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.offers')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.sponsers')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Offer')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('offers.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Offers')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('offers.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany


                            @canany(['Create-Vote_Question', 'Read-Vote_Questions'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)">
                                                </path>
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.votequestions')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.votequestions')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Vote_Question')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('votequestions.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Vote_Questions')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('votequestions.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany


                            @canany(['Create-Taskes_For_Point', 'Read-Taskes_For_Points'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)">
                                                </path>
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.taskesforpoint')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.taskesforpoint')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Taskes_For_Point')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('taskesforpoints.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Taskes_For_Points')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('taskesforpoints.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany



                            @canany(['Create-Mercato', 'Read-Mercatos'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)">
                                                </path>
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.mercatos')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.mercatos')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Mercato')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('mercatos.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Mercatos')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('mercatos.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany











							@canany(['Create-Country','Read-Countries','Create-City','Read-Cities'])
							<li class="menu-section">
								<h4 class="menu-text">{{__('cms.location_management')}}</h4>
								<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
							</li>
							@endcanany


							@canany(['Create-Country','Read-Countries'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Building.svg--><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z"
													fill="#000000" />
												<rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1" />
												<path
													d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z"
													fill="#000000" opacity="0.3" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.countries')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.countries')}}</span>
											</span>
										</li>
										@can('Create-Country')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('countries.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read-Countries')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('countries.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany


							@canany(['Create-City','Read-Cities'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Map\Marker1.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.cities')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.cities')}}</span>
											</span>
										</li>
										@can('Create-City')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('cities.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										@endcan
										@can('Read-Cities')
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('cities.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
										@endcan
									</ul>
								</div>
							</li>
							@endcanany


                            @canany(['Create-Faq', 'Read-Faqs'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)">
                                                </path>
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.faqs')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.faqs')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Faq')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('faqs.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Faqs')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('faqs.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany


                            @canany(['Create-Paymen', 'Read-Paymens'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z"
                                                    fill="#000000"></path>
                                                <path
                                                    d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.payments')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.payments')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Paymen')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('paymens.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Paymens')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('paymens.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany

                            @canany(['Create-Office', 'Read-Offices'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z"
                                                    fill="#000000"></path>
                                                <path
                                                    d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.offices')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.offices')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Office')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('offices.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Offices')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('offices.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany



                            @canany(['Create-Term', 'Read-Terms'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)">
                                                </path>
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.term')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.term')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Term')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('terms.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Terms')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('terms.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany

                            @canany(['Create-Policie', 'Read-Policies'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)">
                                                </path>
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.policie')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.policie')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-Policie')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('policies.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Policies')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('policies.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany


                            @canany(['Create-About', 'Read-Abouts'])
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)">
                                                </path>
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">{{__('cms.about')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{__('cms.about')}}</span>
                                            </span>
                                        </li>
                                        @can('Create-About')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('abouts.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.create')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                        @can('Read-Abouts')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('abouts.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cms.index')}}</span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcanany


							<li class="menu-section">
								<h4 class="menu-text">{{__('cms.account_management')}}</h4>
								<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
							</li>


							<li class="menu-item" aria-haspopup="true">
								<a href="{{route('edit-password')}}" class="menu-link">
									<span class="svg-icon menu-icon">
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"></rect>
												<path
													d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
													fill="#000000" fill-rule="nonzero"
													transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
												</path>
												<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
													rx="1"></rect>
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.change_password')}}</span>
								</a>
							</li>
							<li class="menu-item" aria-haspopup="true">
								<a href="{{route('cms.logout')}}" class="menu-link">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Electric\Shutdown.svg--><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z"
													fill="#000000" fill-rule="nonzero" />
												<rect fill="#000000" opacity="0.3" x="11" y="3" width="2" height="10"
													rx="1" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.logout')}}</span>
								</a>
							</li>
						</ul>

						<!--end::Menu Nav-->
					</div>
					<!--end::Menu Container-->
				</div>
				<!--end::Aside Menu-->
			</div>
			<!--end::Aside-->

			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
				<div id="kt_header" class="header header-fixed">
					<!--begin::Container-->
					<div class="container-fluid d-flex align-items-stretch justify-content-between">
						<!--begin::Header Menu Wrapper-->
						<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
							<!--begin::Header Menu-->
							<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">

							</div>
							<!--end::Header Menu-->
						</div>
						<!--end::Header Menu Wrapper-->
						<!--begin::Topbar-->
						<div class="topbar">

							<!--begin::Languages-->
							<div class="dropdown">
								<!--begin::Toggle-->
								<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
									<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
										<img class="h-20px w-20px rounded-sm" @if (App::isLocale('en'))
											src="{{asset('assets/media/svg/flags/226-united-states.svg')}}" @else
											src="{{asset('assets/media/svg/flags/008-saudi-arabia.svg')}}" @endif
											alt="" />
									</div>
								</div>
								<!--end::Toggle-->
								<!--begin::Dropdown-->
								<div
									class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
									<!--begin::Nav-->
									<ul class="navi navi-hover py-4">
										<li class="navi-item">
											<a rel="alternate"
												href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"
												class="navi-link">
												<span class="symbol symbol-20 mr-3">
													<img src="{{asset('assets/media/svg/flags/226-united-states.svg')}}"
														alt="" />
												</span>
												<span class="navi-text">English</span>
											</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="navi-item">
											<a rel="alternate"
												href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"
												class="navi-link">
												<span class="symbol symbol-20 mr-3">
													<img src="{{asset('assets/media/svg/flags/008-saudi-arabia.svg')}}"
														alt="" />
												</span>
												<span class="navi-text">العربية</span>
											</a>
										</li>
										<!--end::Item-->
									</ul>
									<!--end::Nav-->
								</div>
								<!--end::Dropdown-->
							</div>
							<!--end::Languages-->
							<!--begin::User-->
							<div class="topbar-item">
								<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
									id="kt_quick_user_toggle">
									<span
										class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">{{__('cms.hi')}},</span>
									<span
										class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{auth()->user()->name}}</span>
									<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
										<span
											class="symbol-label font-size-h5 font-weight-bold">{{auth()->user()->name[0]}}</span>
									</span>
								</div>
							</div>
							<!--end::User-->
						</div>
						<!--end::Topbar-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Subheader-->
					<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
						<div
							class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
							<!--begin::Info-->
							<div class="d-flex align-items-center flex-wrap mr-1">
								<!--begin::Page Heading-->
								<div class="d-flex align-items-baseline flex-wrap mr-5">
									<!--begin::Page Title-->
									<h5 class="text-dark font-weight-bold my-1 mr-5">@yield('page-name')</h5>
									<!--end::Page Title-->
									<!--begin::Breadcrumb-->
									<ul
										class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
										<li class="breadcrumb-item text-muted">
											<a href="" class="text-muted">@yield('main-page')</a>
										</li>
										<li class="breadcrumb-item text-muted">
											<a href="" class="text-muted">@yield('sub-page')</a>
										</li>
										<li class="breadcrumb-item text-muted">
											<a href="" class="text-muted">@yield('page-name-small')</a>
										</li>
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page Heading-->
							</div>
							<!--end::Info-->
						</div>
					</div>
					<!--end::Subheader-->
					<!--begin::Entry-->
					<div class="d-flex flex-column-fluid">
						<!--begin::Container-->
						<div class="container">
							@yield('content')
						</div>
						<!--end::Container-->
					</div>
					<!--end::Entry-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
					<!--begin::Container-->
					<div
						class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
						<!--begin::Copyright-->
						<div class="text-dark order-2 order-md-1">
							<span class="text-muted font-weight-bold mr-2">{{now()->year}}©</span>
							<a href="http://keenthemes.com/metronic" target="_blank"
								class="text-dark-75 text-hover-primary">{{__('cms.app_name')}}</a>
						</div>
						<!--end::Copyright-->
						<!--begin::Nav-->
						<div class="nav nav-dark">
							{{-- <a href="#" target="_blank" class="nav-link pl-0 pr-5">About</a>
							<a href="#" target="_blank" class="nav-link pl-0 pr-5">Team</a>
							<a href="#" target="_blank" class="nav-link pl-0 pr-0">Contact</a> --}}
						</div>
						<!--end::Nav-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Main-->
	<!-- begin::User Panel-->
	<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
		<!--begin::Header-->
		<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
			<h3 class="font-weight-bold m-0">{{__('cms.user_profile')}}
				<small class="text-muted font-size-sm ml-2">{{__('cms.app_name')}} -
					{{__('cms.cms')}}</small>
			</h3>
			<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
				<i class="ki ki-close icon-xs text-muted"></i>
			</a>
		</div>
		<!--end::Header-->
		<!--begin::Content-->
		<div class="offcanvas-content pr-5 mr-n5">
			<!--begin::Header-->
			<div class="d-flex align-items-center mt-5">
				<div class="symbol symbol-100 mr-5">
					<div class="symbol-label" style="background-image:url('{{Storage::url(auth()->user()->image)}}')">
					</div>
					<i class="symbol-badge bg-success"></i>
				</div>
				<div class="d-flex flex-column">
					<a href="#"
						class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{auth()->user()->name}}</a>
					<div class="text-muted mt-1">{{count(auth()->user()->roles) > 0 ? auth()->user()->roles[0]->name :
						'-'}}</div>
					<div class="navi mt-2">
						<a href="#" class="navi-item">
							<span class="navi-link p-0 pb-2">
								<span class="navi-icon mr-1">
									<span class="svg-icon svg-icon-lg svg-icon-primary">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
													fill="#000000" />
												<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</span>
								<span class="navi-text text-muted text-hover-primary">
									@php
									$string=explode("@", auth()->user()->email);
									@endphp
									{{
									$string[0]
									}}</span>
							</span>
						</a>
						<a href="{{route('cms.logout')}}"
							class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">{{__('cms.logout')}}</a>
					</div>
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Separator-->
			<div class="separator separator-dashed mt-8 mb-5"></div>
			<!--end::Separator-->
			<!--begin::Nav-->
			@if(auth('admin')->check())
			<div class="navi navi-spacer-x-0 p-0">
				<!--begin::Item-->
				<a href="" class="navi-item">
					<div class="navi-link">
						<div class="symbol symbol-40 bg-light mr-3">
							<div class="symbol-label">
								<span class="svg-icon svg-icon-md svg-icon-success">
									<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
										width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path
												d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
												fill="#000000" />
											<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</div>
						</div>
						<div class="navi-text">
							<div class="font-weight-bold">{{__('cms.edit_profile')}}</div>
							{{-- <div class="text-muted">Account settings and more --}}
								{{-- <span
									class="label label-light-danger label-inline font-weight-bold">{{__('cms.update')}}</span>
								--}}
							</div>
						</div>
					</div>
				</a>
				<!--end:Item-->
			</div>
			@endif

			<!--end::Nav-->
			<!--begin::Separator-->
			<div class="separator separator-dashed my-7"></div>
			<!--end::Separator-->
		</div>
		<!--end::Content-->
	</div>
	<!-- end::User Panel-->

	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop">
		<span class="svg-icon">
			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
				height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<polygon points="0 0 24 0 24 24 0 24" />
					<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
					<path
						d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
						fill="#000000" fill-rule="nonzero" />
				</g>
			</svg>
			<!--end::Svg Icon-->
		</span>
	</div>
	<!--end::Scrolltop-->
	<script>
		var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
	</script>
	<!--begin::Global Config(global config for global JS scripts)-->
	<script>
		var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };
	</script>
	<!--end::Global Config-->
	<!--begin::Global Theme Bundle(used by all pages)-->
	<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
	<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
	<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
	<!--end::Global Theme Bundle-->
	<!--begin::Page Vendors(used by this page)-->
	<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(used by this page)-->
	<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
	<!--end::Page Scripts-->
	<script src="{{asset('assets/js/pages/features/miscellaneous/toastr.js')}}"></script>
	<script src="{{asset('assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
	<script src="{{asset('js/axios.js')}}"></script>
	<script src="{{asset('js/crud.js?n=8')}}"></script>
	@yield('scripts')
</body>
<!--end::Body-->

</html>
