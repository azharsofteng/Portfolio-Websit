<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Open Graph Meta-->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Admin | @yield('title')</title>
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('backend/css/main.css')}}" />
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        @stack('admin-css')
        <style>
            .form-group{
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body class="app sidebar-mini">
        <!-- Navbar-->
        @include('partials.header')
        <!-- Sidebar menu-->
        @include('partials.sidebar')

        <main class="app-content">
            @yield('admin_content')
        </main>

        {{-- modal --}}
        <div class="modal fade" id="passwordChange" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('password.change') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <label for="">Old Password</label>
                            <input type="password" name="old_password" class="form-control mb-1" placeholder="Enter Old Password">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter New password">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Essential javascripts for application to work-->
        <script src="{{asset('backend/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('backend/js/popper.min.js')}}"></script>
        <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('backend/js/main.js')}}"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="{{asset('backend/js/plugins/pace.min.js')}}"></script>
        <!-- Google analytics script-->
        <script type="text/javascript">
            if (document.location.hostname == "pratikborsadiya.in") {
                (function (i, s, o, g, r, a, m) {
                    i["GoogleAnalyticsObject"] = r;
                    (i[r] =
                        i[r] ||
                        function () {
                            (i[r].q = i[r].q || []).push(arguments);
                        }),
                        (i[r].l = 1 * new Date());
                    (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m);
                })(window, document, "script", "//www.google-analytics.com/analytics.js", "ga");
                ga("create", "UA-72504830-1", "auto");
                ga("send", "pageview");
            }
        </script>
        @stack('admin-js')
    </body>
</html>
