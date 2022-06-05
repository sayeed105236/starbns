<!DOCTYPE html>
<!--
Template Name: Rubick - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    @include('frontend.partials.header')
    <!-- END: Head -->
    <body class="py-5">
        <!-- BEGIN: Mobile Menu -->
      @include('frontend.partials.mobile-menu')
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
              @include('frontend.partials.sidebar')
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                @include('frontend.partials.topbar')
                <!-- END: Top Bar -->
              @yield('content')
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: Dark Mode Switcher-->

        <!-- END: Dark Mode Switcher-->

        <!-- BEGIN: JS Assets-->
      @include('frontend.partials.script')
        <!-- END: JS Assets-->
    </body>
</html>
