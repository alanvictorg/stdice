<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.head')
<body class="hold-transition skin-blue">
    <div id="app" v-cloak>


                <!-- Main content -->
                <section class="content">
                    <!-- Your Page Content Here -->
                    @yield('main-content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

        </div><!-- ./wrapper -->
    </div>
</div>
<!-- ./wrapper -->
@include('layouts.script')
</body>
</html>
