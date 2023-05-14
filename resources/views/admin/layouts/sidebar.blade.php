<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto">
            <a class="navbar-brand" href="{{url('admin/dashboard')}}">
              <span class=""> <img src="{{ URL::asset('resources/uploads/logo/01.png')}}" alt="GirValley" height="50" width="150" class="p-auto"> </span>
              {{-- <h2 class="brand-text">{{ config('app.name') }}</h2> --}}
            </a>
          </li>
          <li class="nav-item nav-toggle">
            <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
              <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
      </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content" style="padding-top: 15px">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item @if(Request::is('admin/dashboard') ||Request::is('admin/dashboard/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/dashboard')}}">
              <i class="fa fa-home" aria-hidden="true"></i>
              <span class="menu-title text-truncate" data-i18n="Dashboard">
                Dashboard
              </span>
            </a>
          </li>
          @can('user-list')
            <li class=" nav-item @if(Request::is('admin/users') ||Request::is('admin/users/*') ) active @endif">
                <a class="d-flex align-items-center" href="{{url('admin/users')}}">
                <i class="fa fa-user-circle-o"></i>
                <span class="menu-title text-truncate" data-i18n="Users">
                    Users
                </span>
                </a>
            </li>
          @endcan


          @if(auth()->user()->can('driver-list') || auth()->user()->can('driver-alert-list') )
          <li class="nav-item"><a class="d-flex align-items-center" href="{{url('admin/drivers')}}"><i data-feather="file-text" class="fa fa-truck"></i><span class="menu-title text-truncate" data-i18n="Tests">Manage Driver</span></a>
            @can('driver-list')
              <ul class="menu-content">
                <li class="@if(Request::is('admin/drivers') ||Request::is('admin/drivers/*') ) active @endif"><a class="d-flex align-items-center" href="{{url('admin/drivers')}}"><i class="fa fa-truck"></i><span class="menu-title text-truncate" data-i18n="Tests">Manage Drivers</span></a>
                </li>
              </ul>
            @endcan
            @can('driver-alert-list')
              <ul class="menu-content">
                <li class="@if(Request::is('admin/alert') || Request::is('admin/alert/*') ) active @endif"><a class="d-flex align-items-center" href="{{url('admin/alert/')}}"><i class="fa fa-exclamation"></i><span class="menu-title text-truncate" data-i18n="Tests">Driver Alert</span></a>
                </li>
              </ul>
            @endcan
            @can('driver-vacation-list')
              <ul class="menu-content">
                <li class="@if(Request::is('admin/driver/vacation') || Request::is('admin/driver/vacation/*') ) active @endif"><a class="d-flex align-items-center" href="{{url('admin/driver/vacation/')}}"><i class="fa fa-pagelines"></i><span class="menu-title text-truncate" data-i18n="Tests">Driver Vacation List</span></a>
                </li>
              </ul>
            @endcan
          @endif

            @can('driver-payout')
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class='fa fa-money'></i><span class="menu-title text-truncate" data-i18n="Reports">Payout Management</span></a>
                <ul class="menu-content">
                <li class="@if(Request::is('admin/payout') ||Request::is('admin/payout/*') ) active @endif"><a class="d-flex align-items-center" href="{{url('admin/payout')}}">
                    <i class="fa fa-circle"></i>
                    <span class="menu-title text-truncate" data-i18n="Payout Management">
                    Driver Payout
                    </span>
                </a>
                </li>
                    <!-- <li><a class="d-flex align-items-center" href="app-invoice-list.html"><i class="fa fa-circle"></i><span class="menu-item text-truncate" data-i18n="Payment">Payment Reports</span></a>
                </li> -->
                <li class="@if(Request::is('admin/payouts-requests') ||Request::is('admin/payouts-requests/*') ) active @endif"><a class="d-flex align-items-center" href="{{url('admin/payouts-requests')}}"><i class="fa fa-circle"></i><span class="menu-item text-truncate" data-i18n="Payout Request">Driver Payout Request</span></a>
                </li>
                </ul>
            </li>
            @endcan

          {{-- <li class=" nav-item @if(Request::is('admin/drivers') ||Request::is('admin/drivers/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/drivers')}}">
              <i class="fa fa-user-circle-o"></i>
              <span class="menu-title text-truncate" data-i18n="Drivers">
                Manage Drivers
              </span>
            </a>
          </li> --}}
          @can('banner-list')
          <li class=" nav-item @if(Request::is('admin/banner') ||Request::is('admin/banner/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/banner')}}">
              <i class="fa fa-square"></i>
              <span class="menu-title text-truncate" data-i18n="banner">
                Banner
              </span>
            </a>
          </li>
          @endcan

          @can('product-list')
          <li class=" nav-item @if(Request::is('admin/products') ||Request::is('admin/products/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/products')}}">
              <i class="fa fa-product-hunt" aria-hidden="true"></i>
              <span class="menu-title text-truncate" data-i18n="products">
                Products
              </span>
            </a>
          </li>
          @endcan

          @can('category-list')
            <li class=" nav-item @if(Request::is('admin/productcategories') ||Request::is('admin/productcategories/*') ) active @endif">
                <a class="d-flex align-items-center" href="{{url('admin/productcategories')}}">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                <span class="menu-title text-truncate" data-i18n="productcategories">
                    Product Category
                </span>
                </a>
            </li>
          @endcan

          @can('offer-list')
          <li class=" nav-item @if(Request::is('admin/offers') ||Request::is('admin/offers/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/offers')}}">
              <i class="fa fa-ticket"></i>
              <span class="menu-title text-truncate" data-i18n="Offers">
                Promo Codes
              </span>
            </a>
          </li>
          @endcan

         @can('geo-fence-list')
          <li class=" nav-item @if(Request::is('admin/geo_fence') ||Request::is('admin/geo_fence/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/geo_fence')}}">
              <i class="fa fa-map-o"></i>
              <span class="menu-title text-truncate" data-i18n="geo_fence">
                Geo Fence
              </span>
            </a>
          </li>
          @endcan

          @can('notification-list')
          <li class=" nav-item @if(Request::is('admin/notification') ||Request::is('admin/notification/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/notification')}}">
              <i class="fa fa-bell"></i>
              <span class="menu-title text-truncate" data-i18n="notification">
                Notification
              </span>
            </a>
          </li>
          @endcan

          @can('review-list')
          <li class=" nav-item @if(Request::is('admin/reviews') ||Request::is('admin/reviews/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/reviews')}}">
              <i class="fa fa-star"></i>
              <span class="menu-title text-truncate" data-i18n="reviews">
                Manage Reviews
              </span>
            </a>
          </li>
          @endcan
          {{-- <li class=" nav-item @if(Request::is('admin/productorderlist') ||Request::is('admin/productorderlist/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/productorderlist')}}">
              <i class="fa fa-bell"></i>
              <span class="menu-title text-truncate" data-i18n="productorderlist">
                Manage Orders
              </span>
            </a>
          </li> --}}

          @can('plan-list')
           <li class=" nav-item @if(Request::is('admin/plans') ||Request::is('admin/plans/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/plans')}}">
              <i class="fa fa-braille"></i>
              <span class="menu-title text-truncate" data-i18n="plans">
                Manage Plan
              </span>
            </a>
          </li>
          @endcan

          @can('order-list')
          <li class=" nav-item @if(Request::is('admin/orders') ||Request::is('admin/orders/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/orders')}}">
              <i class="fa fa-first-order"></i>
              <span class="menu-title text-truncate" data-i18n="orders">
                Manage Orders
              </span>
            </a>
          </li>
          @endcan



          @can('purity-list')
            <li class=" nav-item @if(Request::is('admin/purity') ||Request::is('admin/purity/*') ) active @endif">
                <a class="d-flex align-items-center" href="{{url('admin/purity')}}">
                <i class="fa fa-picture-o"></i>
                <span class="menu-title text-truncate" data-i18n="purity">
                    Manage Purity
                </span>
                </a>
            </li>
          @endcan

          @can('support-list')
          <li class=" nav-item @if(Request::is('admin/support') ||Request::is('admin/support/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/support')}}">
              <i class="fa fa-question"></i>
              <span class="menu-title text-truncate" data-i18n="support">
                Manage Support
              </span>
            </a>
          </li>
          @endcan


          @can('referral-list')
          <li class=" nav-item @if(Request::is('admin/referral') ||Request::is('admin/referral/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/referral')}}">
                <i class="fa fa-money"></i>
              <span class="menu-title text-truncate" data-i18n="support">
                Referral
              </span>
            </a>
          </li>
          @endcan

          @can('cashback-list')
          <li class=" nav-item @if(Request::is('admin/cashback') ||Request::is('admin/cashback/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/cashback')}}">
              <i class="fa fa-inr"></i>
              <span class="menu-title text-truncate" data-i18n="support">
                CashBack
              </span>
            </a>
          </li>
          @endcan

          @if(auth()->user()->can('user-report-list') || auth()->user()->can('driver-report-list') || auth()->user()->can('support-report-list') || auth()->user()->can('order-report-list') || auth()->user()->can('cashback-report-list') || auth()->user()->can('payment-report-list') )
          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fa fa-file"></i><span class="menu-title text-truncate" data-i18n="Reports">Reports</span></a>
              <ul class="menu-content">
                <li class="@if(Request::is('admin/user-reports') ||Request::is('admin/user-reports/*') ) active @endif"><a class="d-flex align-items-center" href="{{url('admin/user-reports')}}"><i class="fa fa-circle"></i><span class="menu-item text-truncate" data-i18n="Customer">User Reports</span></a>
                </li>
                <!-- <li><a class="d-flex align-items-center" href="app-invoice-list.html"><i class="fa fa-circle"></i><span class="menu-item text-truncate" data-i18n="Payment">Payment Reports</span></a>
              </li> -->
              <li class="@if(Request::is('admin/driver-reports') ||Request::is('admin/driver-reports/*') ) active @endif"><a class="d-flex align-items-center" href="{{url('admin/driver-reports')}}"><i class="fa fa-circle"></i><span class="menu-item text-truncate" data-i18n="Driver">Driver Reports</span></a>
              </li>
              <li class="@if(Request::is('admin/support-reports') ||Request::is('admin/support-reports/*') ) active @endif"><a class="d-flex align-items-center" href="{{url('admin/support-reports')}}"><i class="fa fa-circle"></i><span class="menu-item text-truncate" data-i18n="Support">Support Reports</span></a>
              </li>
              <li class="@if(Request::is('admin/order-reports') ||Request::is('admin/order-reports/*') ) active @endif"><a class="d-flex align-items-center" href="{{url('admin/order-reports')}}"><i class="fa fa-circle"></i><span class="menu-item text-truncate" data-i18n="Order">Order Reports</span></a>
              </li>
              <li class="@if(Request::is('admin/cashback-reports') ||Request::is('admin/cashback-reports/*') ) active @endif"><a class="d-flex align-items-center" href="{{url('admin/cashback-reports')}}"><i class="fa fa-circle"></i><span class="menu-item text-truncate" data-i18n="Cashback">Cashback Reports</span></a>
              </li>
              <li class="@if(Request::is('admin/payment-reports') ||Request::is('admin/payment-reports/*') ) active @endif"><a class="d-flex align-items-center" href="{{url('admin/payment-reports')}}"><i class="fa fa-circle"></i><span class="menu-item text-truncate" data-i18n="Cashback">Payment Reports</span></a>
              </li>
              <li class="@if(Request::is('admin/payout-reports') ||Request::is('admin/payout-reports/*') ) active @endif"><a class="d-flex align-items-center" href="{{url('admin/payout-reports')}}"><i class="fa fa-circle"></i><span class="menu-item text-truncate" data-i18n="Cashback">Payout Reports</span></a>
              </li>
            </ul>
          </li>
          @endif

          @can('role-list')
          <li class=" nav-item @if(Request::is('admin/roles') ||Request::is('admin/roles/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/roles')}}">
              <i class="fa fa-user"></i>
              <span class="menu-title text-truncate" data-i18n="Sub Admins">
                  Roles
              </span>
            </a>
          </li>
          @endcan

          @can('role-user-list')
          <li class=" nav-item @if(Request::is('admin/roleuser') ||Request::is('admin/roleuser/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/roleuser')}}">
              <i class="fa fa-user"></i>
              <span class="menu-title text-truncate" data-i18n="Sub Admins">
                  Role Users
              </span>
            </a>
          </li>
          @endcan

          @can('faq-list')
          <li class=" nav-item @if(Request::is('admin/faq') ||Request::is('admin/faq/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/faq')}}">
              <i class="fa fa-question-circle-o"></i>
              <span class="menu-title text-truncate" data-i18n="faq">
                Faq
              </span>
            </a>
          </li>
          @endcan

          @can('page-list')
          <li class=" nav-item @if(Request::is('admin/pages') ||Request::is('admin/pages/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/pages')}}">
              <i class="fa fa-flag"></i>
              <span class="menu-title text-truncate" data-i18n="pages">
                Pages
              </span>
            </a>
          </li>
          @endcan

          {{-- @can('contact-us-message-list')
          <li class=" nav-item @if(Request::is('admin/contactus') ||Request::is('admin/contactus/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/contactus')}}">
              <i class="fa fa-phone"></i>
              <span class="menu-title text-truncate" data-i18n="contactus">
                Contact Us
              </span>
            </a>
          </li>
          @endcan --}}

          @can('country-list')
          <li class=" nav-item  @if(Request::is('admin/countries') ||Request::is('admin/countries/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/countries')}}">
              <i class="fa fa-globe"></i>
              <span class="menu-title text-truncate" data-i18n="Manage Country/State/City">
                Manage Location
              </span>
            </a>
          </li>
          @endcan

          @can('setting-list')
          <li class=" nav-item  @if(Request::is('admin/settings') ||Request::is('admin/settings/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/settings')}}">
              <i class="fa fa-duotone fa-gear"></i>
              <span class="menu-title text-truncate" data-i18n="settings">
                General Settings
              </span>
            </a>
          </li>
          @endcan

          {{-- <li class=" nav-item @if(Request::is('admin/hospital') ||Request::is('admin/hospital/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/hospital')}}">
              <i class="fa fa-hospital-o" aria-hidden="true"></i>
              <span class="menu-title text-truncate" data-i18n="Hospital">
                Hospital
              </span>
            </a>
          </li>

          <li class=" nav-item @if(Request::is('admin/doctors') ||Request::is('admin/doctors/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/doctors')}}">
              <i class="fa fa-user-md"></i>
              <span class="menu-title text-truncate" data-i18n="Doctors">
                Doctors
              </span>
            </a>
          </li>
          <li class=" nav-item @if(Request::is('admin/nurses') ||Request::is('admin/nurses/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/nurses')}}">
              <i class="fa fa-user-md"></i>
              <span class="menu-title text-truncate" data-i18n="Nurses">
                Nurses
              </span>
            </a>
          </li>
          <li class=" nav-item @if(Request::is('admin/laboratories') ||Request::is('admin/laboratories/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/laboratories')}}">
              <i class="fa fa-flask"></i>
              <span class="menu-title text-truncate" data-i18n="laboratories">
                Laboratories
              </span>
            </a>
          </li>
          <li class=" nav-item @if(Request::is('admin/subadmins') ||Request::is('admin/subadmins/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/subadmins')}}">
              <i class="fa fa-user"></i>
              <span class="menu-title text-truncate" data-i18n="Sub Admins">
                  Sub Admins
              </span>
            </a>
          </li>
          <li class=" nav-item @if(Request::is('admin/categories') ||Request::is('admin/categories/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/categories')}}">
              <i class="fa fa-globe"></i>
              <span class="menu-title text-truncate" data-i18n="categories">
                Categories
              </span>
            </a>
          </li>
          <li class=" nav-item @if(Request::is('admin/sub-categories') ||Request::is('admin/sub-categories/*') ) active @endif">
            <a class="d-flex align-items-center" href="{{url('admin/sub-categories')}}">
              <i class="fa fa-list"></i>
              <span class="menu-title text-truncate" data-i18n="Sub Category">
                Sub Category
              </span>
            </a>
          </li> --}}

  </div>
</div>
