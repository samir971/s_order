<!-- BEGIN: Main Menu -->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="#">
                    <div class="brand-logo">
                        <img class="logo" src="{{ asset('app-assets/images/logo/logo.png') }}" />
                    </div>
                    <h2 class="brand-text mb-0">{{ config('app.name') }}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>
                    <i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class="navigation-header">
                <span>Dashboard</span>
            </li>

            <li class="nav-item">
             <a href="../../../html/rtl/vertical-menu-template-semi-dark/index.html">
              <i class="menu-livicon" data-icon="desktop"></i>
              <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
             </a>



<li class="nav-item">
 <a href="#"><i class="bx bx-grid-alt"></i><span class="menu-title">لوحة التحكم</span></a>
 <ul class="menu-content" >
  <li>
   <a href="{{ route('Admin-Panel') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">الصفحة الرئيسية</span>
   </a>
  </li>
 </ul>
</li>
<br>
<li class="nav-item">
    <a href="#"><i class="bx bx-map"></i><span class="menu-title">المحافظات و المناطق </span></a>
    <ul class="menu-content">

<li class="nav-item">
 <a href="#"><i class="bx bx-map"></i><span class="menu-title">المحافظات </span></a>
 <ul class="menu-content">

<li>
   <a href="{{ route('cities') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">استعراض</span></a></li>
  <li>
   <a href="{{ route('cities.create') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">إضافة</span></a>
  </li>

 </ul>
</li>

<li class="nav-item">
    <a href="#"><i class="bx bx-map"></i><span class="menu-title">المناطق</span></a>
    <ul class="menu-content">
   
   <li>
      <a href="{{ route('areas') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">استعراض</span></a></li>
     <li>
      <a href="{{ route('areas.create') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">إضافة</span></a>
     </li>
     
   
    </ul>
   </li>
</ul>
</li>
<br>
   <li class="nav-item">
    <a href="#"><i class="bx bx-user"></i><span class="menu-title">مسؤولين التسويق</span></a>
    <ul class="menu-content">
     <li>
      <a href="{{ route('monitors') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">استعراض</span></a></li>
     <li>
      <a href="{{ route('monitors.create') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">إضافة</span></a>
     </li>
    </ul>
   </li>
   <br>
   <li class="nav-item">
    <a href="#"><i class="bx bx-truck"></i><span class="menu-title">المراسلين</span></a>
    <ul class="menu-content">
     <li>
      <a href="{{ route('deliveries') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">استعراض</span></a></li>
     <li>
      <a href="{{ route('deliveries.create') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">إضافة</span></a>
     </li>
    </ul>
   </li>
   <br>
   <li class="nav-item">
    <a href="#"><i class="bx bx-truck"></i><span class="menu-title">الباقات</span></a>
    <ul class="menu-content">
     <li>
      <a href="{{ route('packages') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">استعراض</span></a></li>
     <li>
      <a href="{{ route('packages.create') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">إضافة</span></a>
     </li>
    </ul>
    <br>
   </li>
   <li class="nav-item">
    <a href="#"><i class="bx bx-group"></i><span class="menu-title">المشتركين</span></a>
    <ul class="menu-content">
     
     <li>
      <a href="{{ route('customers') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">استعراض</span></a></li>
     <li>
      <a href="{{ route('customers.create') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">إضافة</span></a>
     </li>
    </ul>
   </li>
   <br>
   <li class="nav-item">
    <a href="#"><i class="bx bx-cart"></i><span class="menu-title">الطلبات</span></a>
    <ul class="menu-content">
     <li>
      <a href=""><i class="bx bx-right-arrow-alt"></i><span class="menu-item">استعراض</span></a></li>
     <li>
      <a href=""><i class="bx bx-right-arrow-alt"></i><span class="menu-item">إضافة</span></a>
     </li>
     <li>
      <a href=""><i class="bx bx-right-arrow-alt"></i><span class="menu-item">طلبات مجدولة</span></a>
     </li>
     <li>
       <a href=""><i class="bx bx-right-arrow-alt"></i><span class="menu-item">طلبات محذوفة</span></a>
     </li>
    </ul>
   </li>
   <br>
   <li class="nav-item">
    <a href="#"><i class="bx bx-book"></i><span class="menu-title">الخدمات</span></a>
    <ul class="menu-content">
     <li>
      <a href=""><i class="bx bx-right-arrow-alt"></i><span class="menu-item">التقييمات</span></a></li>
     <li>
      <a href=""><i class="bx bx-right-arrow-alt"></i><span class="menu-item">إقتراحات الشكاوى</span></a>
     </li>
    </ul>
   </li>
   <br>
   <li class="nav-item">
    <a href="#"><i class="bx bx-wrench"></i><span class="menu-title">الإعدادات</span></a>
    <ul class="menu-content">
     <li>
      <a href="{{ route('worktimes.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">أوقات العمل</span></a></li>
     <li>
      <a href="{{ route('settings.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">فترة السماح</span></a>
     </li>
    </ul>
   </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
