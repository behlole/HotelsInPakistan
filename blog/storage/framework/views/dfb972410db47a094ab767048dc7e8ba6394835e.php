<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="Qovz8cKQfF34i9wZYacJmiBP5vguqp1b9hHP6985">
    <link rel="icon" type="image/png" href="..\uploads\demo\general\favicon.png">
    <title>Profile - Booking Core</title>
    <meta name="description" content="">
    <link href="<?php echo e(asset('libs\bootstrap\css\bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs\font-awesome\css\font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs\ionicons\css\ionicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs\icofont\icofont.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dist\frontend\css\app.css?_ver=1.7.0')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('libs\daterange\daterangepicker.css')); ?>">
    <script src="https://cdn.tiny.cloud/1/ma4bhg9448864e35asz6aejqd05f3wlww44k3f13a6k2qf33/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel='stylesheet' id='google-font-css-css' href='..\css.css?family=Poppins%3A400%2C500%2C600' type='text/css' media='all'>
    <script>
        var bookingCore = {
            url: 'https://bookingcore.org',
            url_root: 'https://bookingcore.org',
            booking_decimals: 0,
            thousand_separator: '.',
            decimal_separator: ',',
            currency_position: 'left',
            currency_symbol: '$',
            currency_rate: '1',
            date_format: 'MM/DD/YYYY',
            map_provider: 'gmap',
            map_gmap_key: '',
            routes: {
                login: 'https://bookingcore.org/login',
                register: 'https://bookingcore.org/register',
            }
        };
        var i18n = {
            warning: "Warning",
            success: "Success",
            confirm_delete: "Do you want to delete?",
            confirm: "Confirm",
            cancel: "Cancel",
        };
        var daterangepickerLocale = {
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "first_day_of_week": 1,
            "daysOfWeek": [
                "Su",
                "Mo",
                "Tu",
                "We",
                "Th",
                "Fr",
                "Sa"
            ],
            "monthNames": [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ],
        };
    </script>
    <link href="..\module\user\css\user.css" rel="stylesheet">

    <style type="text/css">
        .bravo_topbar,
        .bravo_header,
        .bravo_footer {
            display: none;
        }

        html,
        body,
        .bravo_wrap,
        .bravo_user_profile,
        .bravo_user_profile>.container-fluid>.row-eq-height>.col-md-3 {
            min-height: 100vh !important;
        }
    </style>
    <link href="..\custom-css.css" rel="stylesheet">
    <link href="..\libs\carousel-2\owl.carousel.css" rel="stylesheet">
    <link href="<?php echo e(asset('module/user/css/user.css')); ?>" rel="stylesheet">
    <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('libs/fullcalendar-4.2.0/core/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libs/fullcalendar-4.2.0/daygrid/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libs/daterange/daterangepicker.css')); ?>">
   
      <script>
        tinymce.init({
          selector: 'textarea',
          plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
          toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
          toolbar_mode: 'floating',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
        });
      </script>
</head>
