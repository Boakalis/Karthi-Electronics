<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Ekka - Admin Dashboard eCommerce HTML Template.">

    <title>{{ @$globalSetting->name }} - Admin Dashboard</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('admin-assets/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/developer.css') }}" rel="stylesheet" />

    <!-- Ekka CSS -->
    <link id="ekka-css" href="{{ asset('admin-assets/assets/css/ekka.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Data Tables -->
    <link href='{{ asset('admin-assets/assets/plugins/data-tables/datatables.bootstrap5.min.css') }}'
        rel='stylesheet'>
    <link href='{{ asset('admin-assets/assets/plugins/data-tables/responsive.datatables.min.css') }}'
        rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js">
    </script>

    <style>
        .text-danger {
            color: red;
        }

        .text-success {
            color: green;
        }

        .text-warning {
            color: yellow;
        }

    </style>
    <!-- FAVICON -->
    <link href="{{ asset('admin-assets/assets/img/favicon.png') }}" rel="shortcut icon" />
    <script>

        var module = { }; /*   <-----THIS LINE */
    </script>

    @livewireStyles

</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light compact-spacing" id="body">

    <!--  WRAPPER  -->
    <div class="wrapper">

        <!-- LEFT MAIN SIDEBAR -->
        @include('admin.layouts.sidebar')
        <!--  PAGE WRAPPER -->
        <div class="ec-page-wrapper">

            <!-- Header -->
            @include('admin.layouts.header')
            <!-- CONTENT WRAPPER -->
            <div class="ec-content-wrapper">
                <div class="content">
                    @yield('content')
                </div> <!-- End Content -->
            </div> <!-- End Content Wrapper -->

            <!-- Footer -->
            @include('admin.layouts.footer')

        </div> <!-- End Page Wrapper -->
    </div> <!-- End Wrapper -->

    <!-- Common Javascript -->
    <script src="{{ asset('admin-assets/assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/jquery-zoom/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/slick/slick.min.js') }}"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <!-- Chart -->
    <script src="{{ asset('admin-assets/assets/plugins/charts/Chart.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/chart.js') }}"></script>

    <!-- Google map chart -->
    <script src="{{ asset('admin-assets/assets/plugins/charts/google-map-loader.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/charts/google-map.js') }}"></script>

    <!-- Date Range Picker -->
    <script src="{{ asset('admin-assets/assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/date-range.js') }}"></script>

    <!-- Option Switcher -->
    <script src="{{ asset('admin-assets/assets/plugins/options-sidebar/optionswitcher.js') }}"></script>
    <script src="https://kit.fontawesome.com/1b0bb62797.js" crossorigin="anonymous"></script>
    <!-- Ekka Custom -->
    <script src="{{ asset('admin-assets/assets/js/ekka.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            toastr.options = {
                "closeButton": false,
                "debug": true,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select-2').select2({
                dropdownParent: $("#select2Modal"),
                placeholder: "Select...",
                allowClear: true,
                width: "100%"
            });
        });
        //fix modal force focus
        $.fn.modal.Constructor.prototype.enforceFocus = function() {
            var that = this;
            $(document).on('focusin.modal', function(e) {
                if ($(e.target).hasClass('select2')) {
                    return true;
                }

                if (that.$element[0] !== e.target && !that.$element.has(e.target).length) {
                    that.$element.focus();
                }
            });
        };
    </script>
    <script src="{{ asset('repeater.js') }}"></script>
    <script>
        /* Create Repeater */
        $("#repeater").createRepeater();
    </script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script>
        var fileUploadUrl = "{{ route('fileUploadEditor') }}";
        const editor_config = {
            force_p_newlines: false,
            remove_linebreaks: false,
            forced_root_block: "",
            path_absolute: "{{ url('/') }}/",
            selector: "textarea.tinymce-editor",
            extended_valid_elements: false,
            height: 300,
            readonly: false,
            menubar: true,
            plugins: [
                "codesample advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars  code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons paste textcolor colorpicker textpattern ",
            ],
            toolbar: "insertfile undo redo | codesample| styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

            relative_urls: false,
            convert_urls: false,
            images_upload_handler: function(blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open("POST", fileUploadUrl);
                var token = "{{ csrf_token() }}"; //document.getElementById("_token").value;
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure("HTTP Error: " + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != "string") {
                        failure(xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append("file", blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            },
        };
        tinymce.init(editor_config);

        setTimeout(function() {
            $(".alert").hide();
        }, 10000);

        function logout() {
            $('#logOut').submit();
        }

        function deleteData(url, id) {
            console.log(url + ',' + id);
            Swal.fire({
                title: "Are you sure want to delete?",
                // text: "Action is irreversible. Do you want to proceed?",
                position: "center",
                // backdrop: "linear-gradient(yellow, orange)",
                background: "white",
                allowOutsideClick: true,
                allowEscapeKey: false,
                allowEnterKey: false,
                showCancelButton: true,
                confirmButtonText: "Go Ahead",
                cancelButtonText: "No",
                confirmButtonColor: "#00ff55",
                cancelButtonColor: "#999999",
                reverseButtons: true,
            }).then((result) => {
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': id,
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            toastr.success('Deleted Successfully');
                            location.reload();
                        } else {
                            toastr.error('Something went wrong. Try again later');
                        }
                    }
                });
            })

        }
    </script>
    <!-- Data Tables -->
    <script src='{{ asset('admin-assets/assets/plugins/data-tables/jquery.datatables.min.js') }}'></script>
    <script src='{{ asset('admin-assets/assets/plugins/data-tables/datatables.bootstrap5.min.js') }}'></script>
    <script src='{{ asset('admin-assets/assets/plugins/data-tables/datatables.responsive.min.js') }}'></script>

    @yield('javascript')
    @livewireScripts
    <script>
        Livewire.on('login', function(data) {

            alert(1)
        });
        window.addEventListener('order-cancelled', event => {
            alert('Name updated to');
        });
    </script>
      <script >

</script>
    @stack('scripts')
</body>

</html>
