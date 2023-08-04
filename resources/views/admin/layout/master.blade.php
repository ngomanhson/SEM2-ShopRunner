<!doctype html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>@yield('title')</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="dashboard/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="dashboard/css/feather.css">
    <link rel="stylesheet" href="dashboard/css/select2.css">
    <link rel="stylesheet" href="dashboard/css/dropzone.css">
    <link rel="stylesheet" href="dashboard/css/uppy.min.css">
    <link rel="stylesheet" href="dashboard/css/jquery.steps.css">
    <link rel="stylesheet" href="dashboard/css/jquery.timepicker.css">
    <link rel="stylesheet" href="dashboard/css/quill.snow.css">
    <link rel="stylesheet" href="dashboard/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="dashboard/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="dashboard/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="dashboard/css/app-dark.css" id="darkTheme" disabled>
    <link rel="icon" type="image/x-icon" href="front/img/favicon.ico">
</head>
<body class="vertical  light  ">
<div class="wrapper">
    <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
            <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        @if(Request::is('order')) <!-- Replace 'order' with the correct URL path for the order page -->
        <form class="form-inline mr-auto searchform text-muted">
            <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" value="{{ request()->input('search') }}" name="search" type="search" placeholder="Type something..." aria-label="Search">
            <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                <span>Search</span>
            </button>
        </form>
        @endif
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                    <i class="fe fe-sun fe-16"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                    <span class="fe fe-grid fe-16"></span>
                </a>
            </li>

            <li class="nav-item dropdown">
              <span class="avatar avatar-sm mt-2">
               <span style="display: block" >{{Auth::user()->name ?? ''}}</span>
               <span>{{Auth::user()->email ?? ''}}</span>
              </span>
{{--                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                    <a class="dropdown-item" href="#">Profile</a>--}}
{{--                    <a class="dropdown-item" href="#">Settings</a>--}}
{{--                    <a class="dropdown-item" href="#">Activities</a>--}}
{{--                </div>--}}
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted my-2" href="./admin/logout" >
                    <span class="fe fe-log-out"></span>
                </a>
            </li>
        </ul>
    </nav>
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
            <!-- nav bar -->
            <div class="w-100 mb-4 d-flex">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{url("/admin/dashboard")}}">
                    <img src="./dashboard/assets/images/logo.png" alt="Shop Runner">
                </a>
            </div>

            <p class="text-muted nav-heading mt-1 mb-1">
                <span>Home</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item">
                    <a href="{{url("/")}}" class="nav-link">
                        <i class="fe fe-home fe-16"></i>
                        <span class="ml-3 item-text">Home</span>
                    </a>
                </li>
            </ul>

            <p class="text-muted nav-heading mt-1 mb-1">
                <span>Dashboard</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item">
                    <a href="{{url("/admin/dashboard")}}" class="nav-link">
                        <i class="fe fe-pie-chart fe-16"></i>
                        <span class="ml-3 item-text">Dashboard</span>
                    </a>
                </li>
            </ul>
            @canany(['user.view','user.edit','user.edit','user.delete'])
            <p class="text-muted nav-heading mt-1 mb-1">
                <span>Components</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{url("/admin/user")}}">
                        <i class="fe fe-user fe-16"></i>
                        <span class="ml-3 item-text">User</span>
                    </a>
                </li>
            </ul>
            @endcanany
            @canany(['orders.view','orders.edit','orders.edit','orders.delete'])
            <p class="text-muted nav-heading mt-1 mb-1">
                <span>Orders</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item">
                    <a href="{{url("/admin/orders")}}" class="nav-link">
                        <i class="fe fe-box fe-16"></i>
                        <span class="ml-3 item-text">Orders</span>
                        <span class="badge badge-pill badge-primary">New</span>
                    </a>
                </li>
            </ul>
            @endcanany
            @canany(['product.view','product.edit','product.edit','product.delete'])
            <p class="text-muted nav-heading mt-1 mb-1">
                <span>Products</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item">
                    <a href="{{url("/admin/product")}}" class="nav-link">
                        <i class="fe fe-grid fe-16"></i>
                        <span class="ml-3 item-text">Product</span>
                    </a>
                </li>
            </ul>
            @endcanany
            @canany(['category.view','category.edit','category.edit','category.delete'])
            <p class="text-muted nav-heading mt-1 mb-1">
                <span>Category</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item">
                    <a href="{{url("/admin/category")}}" class="nav-link">
                        <i class="fe fe-layers fe-16"></i>
                        <span class="ml-3 item-text">Category</span>
                    </a>
                </li>
            </ul>
            @endcanany
            @canany(['brand.view','brand.edit','brand.edit','brand.delete'])
            <p class="text-muted nav-heading mt-1 mb-1">
                <span>Brand</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item">
                    <a href="{{url("/admin/brand")}}" class="nav-link">
                        <i class="fe fe-shopping-bag fe-16"></i>
                        <span class="ml-3 item-text">Brand</span>
                    </a>
                </li>
            </ul>
            @endcanany

            <p class="text-muted nav-heading mt-1 mb-1">
                <span>Decentralization</span>
            </p>
            @canany(['role.view','role.edit','role.edit','role.delete'])
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item dropdown">
                    <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-shield fe-16"></i>
                        <span class="ml-3 item-text">Decentralization</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{route('permission.add')}}">
                                <span class="ml-1 item-text">Permission</span>
                            </a>
                        </li>
                        @can('role.view')
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{route('role.index')}}">
                                    <span class="ml-1 item-text">List of roles</span>
                                </a>
                            </li>
                        @endcan
                        @can('role.add')
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{route('role.add')}}">
                                    <span class="ml-1 item-text"> More roles</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            </ul>
            @endcanany

            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item">
                    <div class="btn-box w-100 mt-4 mb-1">
                        <a href="{{url("/admin/logout")}}" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
                            <span class="small">Logout</span>
                            <i class="fe fe-log-out fe-12 mx-2"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </aside>

{{--    Main--}}
@yield('body')

</div> <!-- .wrapper -->
<script src="dashboard/js/jquery.min.js"></script>
<script src="dashboard/js/popper.min.js"></script>
<script src="dashboard/js/moment.min.js"></script>
<script src="dashboard/js/bootstrap.min.js"></script>
<script src="dashboard/js/simplebar.min.js"></script>
<script src='dashboard/js/daterangepicker.js'></script>
<script src='dashboard/js/jquery.stickOnScroll.js'></script>
<script src="dashboard/js/tinycolor-min.js"></script>
<script src="dashboard/js/config.js"></script>
<script src="dashboard/js/d3.min.js"></script>
<script src="dashboard/js/topojson.min.js"></script>
<script src="dashboard/js/datamaps.all.min.js"></script>
<script src="dashboard/js/datamaps-zoomto.js"></script>
<script src="dashboard/js/datamaps.custom.js"></script>
<script src="dashboard/js/Chart.min.js"></script>
<script src="dashboard/js/jquery-3.2.1.min.js"></script>
{{--<script type="text/javascript" src="dashboard/js/main.js"></script>--}}
<script type="text/javascript" src="dashboard/js/my_script.js"></script>
<script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="dashboard/js/gauge.min.js"></script>
<script src="dashboard/js/jquery.sparkline.min.js"></script>
<script src="dashboard/js/apexcharts.min.js"></script>
<script src="dashboard/js/apexcharts.custom.js"></script>
<script src='dashboard/js/jquery.mask.min.js'></script>
<script src='dashboard/js/select2.min.js'></script>
<script src='dashboard/js/jquery.steps.min.js'></script>
<script src='dashboard/js/jquery.validate.min.js'></script>
<script src='dashboard/js/jquery.timepicker.js'></script>
<script src='dashboard/js/dropzone.min.js'></script>
<script src='dashboard/js/uppy.min.js'></script>
<script src='dashboard/js/quill.min.js'></script>
<script>
    $('.select2').select2(
        {
            theme: 'bootstrap4',
        });
    $('.select2-multi').select2(
        {
            multiple: true,
            theme: 'bootstrap4',
        });
    $('.drgpicker').daterangepicker(
        {
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale:
                {
                    format: 'MM/DD/YYYY'
                }
        });
    $('.time-input').timepicker(
        {
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
    /** date range picker */
    if ($('.datetimes').length)
    {
        $('.datetimes').daterangepicker(
            {
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale:
                    {
                        format: 'M/DD hh:mm A'
                    }
            });
    }
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end)
    {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker(
        {
            startDate: start,
            endDate: end,
            ranges:
                {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
        }, cb);
    cb(start, end);
    $('.input-placeholder').mask("00/00/0000",
        {
            placeholder: "__/__/____"
        });
    $('.input-zip').mask('00000-000',
        {
            placeholder: "____-___"
        });
    $('.input-money').mask("#.##0,00",
        {
            reverse: true
        });
    $('.input-phoneus').mask('(000) 000-0000');
    $('.input-mixed').mask('AAA 000-S0S');
    $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
        {
            translation:
                {
                    'Z':
                        {
                            pattern: /[0-9]/,
                            optional: true
                        }
                },
            placeholder: "___.___.___.___"
        });
    // editor
    var editor = document.getElementById('editor');
    if (editor)
    {
        var toolbarOptions = [
            [
                {
                    'font': []
                }],
            [
                {
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [
                {
                    'header': 1
                },
                {
                    'header': 2
                }],
            [
                {
                    'list': 'ordered'
                },
                {
                    'list': 'bullet'
                }],
            [
                {
                    'script': 'sub'
                },
                {
                    'script': 'super'
                }],
            [
                {
                    'indent': '-1'
                },
                {
                    'indent': '+1'
                }], // outdent/indent
            [
                {
                    'direction': 'rtl'
                }], // text direction
            [
                {
                    'color': []
                },
                {
                    'background': []
                }], // dropdown with defaults from theme
            [
                {
                    'align': []
                }],
            ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
            {
                modules:
                    {
                        toolbar: toolbarOptions
                    },
                theme: 'snow'
            });
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function()
    {
        'use strict';
        window.addEventListener('load', function()
        {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form)
            {
                form.addEventListener('submit', function(event)
                {
                    if (form.checkValidity() === false)
                    {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    var uptarg = document.getElementById('drag-drop-area');
    if (uptarg)
    {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
            {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus,
            {
                endpoint: 'https://master.tus.io/files/'
            });
        uppy.on('complete', (result) =>
        {
            console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
    }
</script>
<script src="dashboard/js/apps.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
<script>
    $(document).ready(function() {
        $('.nav-link.active .sub-menu').slideDown();
        // $("p").slideUp();

        $('#sidebar-menu .arrow').click(function() {
            $(this).parents('li').children('.sub-menu').slideToggle();
            $(this).toggleClass('fa-angle-right fa-angle-down');
        });

        $("input[name='checkall']").click(function() {
            var checked = $(this).is(':checked');
            $('.table-checkall tbody tr td input:checkbox').prop('checked', checked);
        });
    });
</script>
</body>
</html>
