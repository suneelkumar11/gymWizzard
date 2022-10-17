<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.auth.head')
        <title>Gym Wizzard - @yield('title')</title>
    </head>
    <body id="page-top">
        <div id="wrapper">
            @include('includes.auth.sidebar')
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column"> 
                <!-- Main Content -->
                <div id="content"> 
                    @include('includes.auth.header') 
                    <!-- Begin Page Content -->
                    <div class="container-fluid marg-top-20">
                        @yield('content')
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        @include('includes.auth.footer')
    </body>
</html>
