<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.head')
<body class="skin-blue sidebar-mini">
    <div id="app" v-cloak>
        <div class="wrapper">
            @include('layouts.header')
            @include('layouts.sidebar')

            <div class="content-wrapper">
                @include('layouts.contentheader')
                <!-- Main content -->
                <section class="content">
                    <!-- Your Page Content Here -->
                    @yield('main-content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            @include('layouts.footer')
        </div><!-- ./wrapper -->
    </div>
</div>
    <!-- ./wrapper -->
    @include('layouts.script')
    @include('errors._check')
</body>
</html>
