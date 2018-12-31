<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <style type='text/css'>
        /*! HTML5 Boilerplate v4.3.0 | MIT License | http://h5bp.com/ */
        /*
         * What follows is the result of much research on cross-browser styling.
         * Credit left inline and big thanks to Nicolas Gallagher, Jonathan Neal,
         * Kroc Camen, and the H5BP dev community and team.
         */
        /* ==========================================================================
           Base styles: opinionated defaults
           ========================================================================== */

        html,
        button,
        input,
        select,
        textarea {
            color: #222;
        }

        html {
            font-size: 1em;
            line-height: 1.4;
        }

        /*
         * Remove text-shadow in selection highlight: h5bp.com/i
         * These selection rule sets have to be separate.
         * Customize the background color to match your design.
         */
        ::-moz-selection {
            background: #b3d4fc;
            text-shadow: none;
        }

        ::selection {
            background: #b3d4fc;
            text-shadow: none;
        }

        /*
         * A better looking default horizontal rule
         */
        hr {
            display: block;
            height: 1px;
            border: 0;
            border-top: 1px solid #ccc;
            margin: 1em 0;
            padding: 0;
        }

        /*
         * Remove the gap between images, videos, audio and canvas and the bottom of
         * their containers: h5bp.com/i/440
         */
        audio,
        canvas,
        img,
        video {
            vertical-align: middle;
        }

        /*
         * Remove default fieldset styles.
         */
        fieldset {
            border: 0;
            margin: 0;
            padding: 0;
        }

        /*
         * Allow only vertical resizing of textareas.
         */
        textarea {
            resize: vertical;
        }

        /* ==========================================================================
           Browse Happy prompt
           ========================================================================== */
        .browsehappy {
            margin: 0.2em 0;
            background: #ccc;
            color: #000;
            padding: 0.2em 0;
        }

        /* ==========================================================================
           Author's custom styles
           ========================================================================== */
        /* Style Form*/
        div.ul-select-wrap {
            min-height: 34px;
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.428571429;
            color: #555555;
            background-color: #ffffff;
            background-image: none;
            border: 1px solid #cccccc;
            border-radius: 1px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            font-family: 'Roboto', sans-serif;
            padding-top: 3px;
            padding-bottom: 3px;
            height: auto;
        }

        .formst div.ul-select-wrap:focus {
            border-color: #66afe9;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, 0.6);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, 0.6);
        }

        .formst div.ul-select-wrap::-moz-placeholder {
            color: #999999;
            opacity: 1;
        }

        .formst div.ul-select-wrap:-ms-input-placeholder {
            color: #999999;
        }

        .formst div.ul-select-wrap::-webkit-input-placeholder {
            color: #999999;
        }

        .formst div.ul-select-wrap[disabled],
        div.ul-select-wrap[readonly],
        fieldset[disabled] div.ul-select-wrap {
            cursor: not-allowed;
            background-color: #eeeeee;
            opacity: 1;
        }

        textareadiv.ul-select-wrap {
            height: auto;
        }

        .formst div.ul-select-wrap .tag {
            display: inline-block;
            margin: 0 2px;
            padding: 3px 24px 3px 5px;
            font-size: 13px;
            cursor: pointer;
            border-top-right-radius: 5px;
            border-top-left-radius: 5px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            background: #F1F1F1;
            position: relative;
            margin-bottom: 3px;
            margin-top: 3px;
        }

        .formst div.ul-select-wrap .tag:after {
            content: '';
            width: 8px;
            height: 8px;
            background: url('data:image/gif;base64,R0lGODlhCAAIALMAAAAAAP///56lrZifp6GpsaCosJ+nr52lrJujqpqiqZmhqJigp////wAAAAAAAAAAACH5BAEAAAwALAAAAAAIAAgAAAQhkA1GpVyKLswSQolXHcJxVIxgFEWVHAVBtMtLzSeCGkwEADs=') right 50% no-repeat;
            margin-right: 7px;
            margin-top: 8px;
            position: absolute;
            top: 0px;
            right: 0px;
        }

        .formst div.ul-select-wrap.tag-block .tag {
            display: block;
        }

        .formst div.ul-dropdown-wrap {
            min-height: 34px;
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.428571429;
            color: #555555;
            background-color: #ffffff;
            background-image: none;
            border: 1px solid #cccccc;
            border-radius: 1px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            font-family: 'Roboto', sans-serif;
            height: auto;
            display: inline-block;
            position: relative;
            padding-right: 30px;
            cursor: pointer;
            text-align: left;
        }

        .formst div.ul-dropdown-wrap:focus {
            border-color: #66afe9;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, 0.6);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, 0.6);
        }

        .formst div.ul-dropdown-wrap::-moz-placeholder {
            color: #999999;
            opacity: 1;
        }

        .formst div.ul-dropdown-wrap:-ms-input-placeholder {
            color: #999999;
        }

        .formst div.ul-dropdown-wrap::-webkit-input-placeholder {
            color: #999999;
        }

        .formst div.ul-dropdown-wrap[disabled],
        div.ul-dropdown-wrap[readonly],
        fieldset[disabled] div.ul-dropdown-wrap {
            cursor: not-allowed;
            background-color: #eeeeee;
            opacity: 1;
        }

        textareadiv.ul-dropdown-wrap {
            height: auto;
        }

        .formst div.ul-dropdown-wrap:after {
            content: '';
            position: absolute;
            right: 10px;
            top: 14px;
            width: 0;
            height: 0;
            display: inline-block;
            vertical-align: middle;
            border-color: white;
            border-width: 5px;
            border-style: solid;
            border-color: #CBCAC8;
            border-left-color: transparent;
            border-right-color: transparent;
            border-bottom-style: none;
        }

        .formst div.ul-dropdown-wrap:after.up {
            border-left-color: transparent;
            border-right-color: transparent;
            border-top-style: none;
        }

        .formst div.ul-dropdown-wrap:after.down {
            border-left-color: transparent;
            border-right-color: transparent;
            border-bottom-style: none;
        }

        .formst div.ul-dropdown-wrap:after.right {
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-right-style: none;
        }

        .formst div.ul-dropdown-wrap:after.left {
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-left-style: none;
        }

        .formst div.ul-dropdown-wrap .tag {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            display: block;
            cursor: pointer;
            border-right: 1px solid #cccccc;
            padding-right: 5px;
        }

        .formst ul.ul-select {
            list-style: none;
            padding: 0;
            margin: 0;
            background: white;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.176);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.176);
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            border: 1px solid #cccccc;
        }

        .formst ul.ul-select li {
            display: block;
            cursor: pointer;
            padding: 5px 10px;
            margin: 1px 0;
        }

        .formst ul.ul-select li:hover {
            background: #f1f1f1;
        }

        .formst ul.ul-select li.select {
            background: #f1f1f1;
        }

        .formst ul.ul-select li.selected {
            font-weight: bold;
        }

        .formst div.ul-dropdown-wrap.time-picker {
            margin-top: 10px;
            width: 48%;
            margin-left: 4%;
            font-size: 12px;
            min-height: 30px;
        }

        /* DateTimePicker plugin */
        .datetimepicker {
            background: white;
            border-top-right-radius: 5px;
            border-top-left-radius: 5px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            overflow: hidden;
            padding: 10px;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.176);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.176);
            min-width: 200px;
        }

        .datetimepicker .paging {
            text-align: center;
            padding: 5px;
            font-size: 12px;
            position: relative;
        }

        .datetimepicker .paging span {
            position: absolute;
            top: 0px;
            display: inline-block;
            height: 100%;
            line-height: 24px;
            width: 20px;
            cursor: pointer;
        }

        .datetimepicker .paging span i {
            line-height: inherit;
        }

        .datetimepicker .paging span.prev {
            left: 0px;
        }

        .datetimepicker .paging span.next {
            right: 0px;
        }

        .datetimepicker table {
            font-weight: normal;
            font-size: 14px;
            color: #333333;
            border-collapse: collapse;
            width: 100%;
        }

        .datetimepicker table td {
            text-align: center;
            border: 1px solid #eee;
            padding: 3px;
        }

        .datetimepicker table td.near-month {
            color: #ccc;
        }

        .datetimepicker table td.cur-date.cur-month {
            background: #D9EDF7;
        }

        .datetimepicker table thead {
            font-weight: bold;
        }

        .datetimepicker table thead td {
            border: none;
            border-bottom: 2px solid #eee;
            min-width: 40px;
        }

        .datetimepicker table tbody td:hover {
            background: #eee;
            cursor: pointer;
        }

        .datetimepicker table tbody td.unvailable {
            color: #eee;
            background: #F5F5F5;
        }

        .datetimepicker table tbody td.unvailable:hover {
            background: #F5F5F5;
            cursor: not-allowed;
        }

        .datetimepicker select {
            width: 48%;
            margin-top: 10px;
            margin-left: 4%;
            border: 1px solid #ccc;
        }

        .datetimepicker select:first-child {
            margin-left: 0;
        }

        .datetimepicker .timezone {
            margin-top: 10px;
            color: #666;
            font-size: 11px;
            text-align: center;
        }

        input[readonly].datetime-picker {
            cursor: pointer;
        }

        * {
            /* -webkit-box-sizing: border-box;*/
            /* -moz-box-sizing: border-box;*/
            /*box-sizing: border-box;*/
        }

        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            background: #333333 url(../img/bg.jpg) no-repeat center bottom fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
        }

        .booking-form {
            margin: 50px auto;
            background: white;
            padding: 30px 0;
            position: relative;
            -webkit-box-shadow: 0 0 5px 3px rgba(0, 0, 0, 0.125);
            box-shadow: 0 0 5px 3px rgba(0, 0, 0, 0.125);
        }

        .booking-form #form-loading {
            text-align: center;
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
            opacity: 0.5;
            filter: alpha(opacity=50);
            z-index: 1000;
            background: #555555;
        }

        .booking-form #form-loading i {
            font-size: 100px;
        }

        .booking-form #form-message {
            text-align: center;
            color: #555555;
        }

        .booking-form .h1 {
            font-size: 30px;
            color: #3EC038;
            padding: 15px 15px 35px 15px;
            text-transform: uppercase;
            text-align: center;
        }

        .booking-form .logo {
            height: auto;
            max-width: 100%;
        }

        .booking-form .group {
            *zoom: 1;
            -webkit-transition: all ease .2s;
            transition: all ease .2s;
            border-left: 4px solid #fff;
            padding: 10px 0;
        }

        .booking-form .group:before,
        .booking-form .group:after {
            content: " ";
            display: table;
        }

        .booking-form .group:after {
            clear: both;
        }

        .booking-form .group > label {
            padding-left: 15px;
            padding-top: 5px;
            color: #555555;
            font-size: 16px;
            display: block;
        }

        .booking-form .group > label.empty {
            display: block;
            height: 1px;
            padding: 0;
            margin: 0;
        }

        .booking-form .group > div {
            padding: 0 15px;
        }

        .booking-form .group > div.addon-right {
            position: relative;
            padding-right: 50px;
        }

        .booking-form .group > div.addon-right > i {
            position: absolute;
            right: 25px;
            top: 9px;
            z-index: 999;
            color: #555555;
        }

        .booking-form .group > div .error-message {
            font-size: 12px;
            color: red;
            margin-top: 5px;
        }

        .booking-form .group.active {
            background: #F6F6F6;
            border-left-color: #40C2FF;
            -webkit-box-shadow: inset 0px 0px 3px rgba(0, 0, 0, 0.03);
            box-shadow: inset 0px 0px 3px rgba(0, 0, 0, 0.03);
        }

        .booking-form input[type=submit] {
            border: none;
            background: #65CA60;
            color: white;
            font-family: 'Roboto', sans-serif;
            padding: 5px 20px;
            text-transform: uppercase;
            font-weight: 500;
            border-radius: 1px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -webkit-transition: background ease-in-out .15s;
            transition: background ease-in-out .15s;
        }

        .booking-form input[type=submit]:hover {
            background: #5AC253;
        }

        .booking-form {
            width: 320px;
        }

        @media (min-width: 550px) {
            .booking-form {
                width: 520px;
            }

            .booking-form .group > label {
                float: left;
                width: 180px;
            }

            .booking-form .group > div {
                margin-left: 180px;
                padding-left: 0;
            }
        }

        .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.428571429;
            color: #555555;
            background-color: #ffffff;
            background-image: none;
            border: 1px solid #cccccc;
            border-radius: 1px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            font-family: 'Roboto', sans-serif;
        }

        .form-control:focus {
            border-color: #66afe9;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, 0.6);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, 0.6);
        }

        .form-control::-moz-placeholder {
            color: #999999;
            opacity: 1;
        }

        .form-control:-ms-input-placeholder {
            color: #999999;
        }

        .form-control::-webkit-input-placeholder {
            color: #999999;
        }

        .form-control[disabled],
        .form-control[readonly],
        fieldset[disabled] .form-control {
            cursor: not-allowed;
            background-color: #eeeeee;
            opacity: 1;
        }

        textarea.form-control {
            height: auto;
        }

        /* ==========================================================================
           Helper classes
           ========================================================================== */
        .hide {
            display: none !important;
        }

        .show {
            display: block !important;
        }

        .one-line {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        .arrow-up {
            border-left-color: transparent;
            border-right-color: transparent;
            border-top-style: none;
        }

        .arrow-down {
            border-left-color: transparent;
            border-right-color: transparent;
            border-bottom-style: none;
        }

        .arrow-right {
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-right-style: none;
        }

        .arrow-left {
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-left-style: none;
        }

        .arrow {
            width: 0;
            height: 0;
            display: inline-block;
            vertical-align: middle;
            border-color: white;
            border-width: 5px;
            border-style: solid;
        }

        .arrow.up {
            border-left-color: transparent;
            border-right-color: transparent;
            border-top-style: none;
        }

        .arrow.down {
            border-left-color: transparent;
            border-right-color: transparent;
            border-bottom-style: none;
        }

        .arrow.right {
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-right-style: none;
        }

        .arrow.left {
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-left-style: none;
        }

        /*
         * Image replacement
         */
        .ir {
            background-color: transparent;
            border: 0;
            overflow: hidden;
            /* IE 6/7 fallback */
            *text-indent: -9999px;
        }

        .ir:before {
            content: "";
            display: block;
            width: 0;
            height: 150%;
        }

        /*
         * Hide from both screenreaders and browsers: h5bp.com/u
         */
        .hidden {
            display: none !important;
            visibility: hidden;
        }

        /*
         * Hide only visually, but have it available for screenreaders: h5bp.com/v
         */
        .visuallyhidden {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        /*
         * Extends the .visuallyhidden class to allow the element to be focusable
         * when navigated to via the keyboard: h5bp.com/p
         */
        .visuallyhidden.focusable:active,
        .visuallyhidden.focusable:focus {
            clip: auto;
            height: auto;
            margin: 0;
            overflow: visible;
            position: static;
            width: auto;
        }

        /*
         * Hide visually and from screenreaders, but maintain layout
         */
        .invisible {
            visibility: hidden;
        }

        /*
         * Clearfix: contain floats
         *
         * For modern browsers
         * 1. The space content is one way to avoid an Opera bug when the
         *    `contenteditable` attribute is included anywhere else in the document.
         *    Otherwise it causes space to appear at the top and bottom of elements
         *    that receive the `clearfix` class.
         * 2. The use of `table` rather than `block` is only necessary if using
         *    `:before` to contain the top-margins of child elements.
         */
        .clearfix:before,
        .clearfix:after {
            content: " ";
            /* 1 */
            display: table;
            /* 2 */
        }

        .clearfix:after {
            clear: both;
        }

        /*
         * For IE 6/7 only
         * Include this rule to trigger hasLayout and contain floats.
         */
        .clearfix {
            *zoom: 1;
        }

        /* ==========================================================================
           EXAMPLE Media Queries for Responsive Design.
           These examples override the primary ('mobile first') styles.
           Modify as content requires.
           ========================================================================== */
        @media only screen and (min-width: 35em) {
            /* Style adjustments for viewports that meet the condition */
        }

        @media print, (-o-min-device-pixel-ratio: 5/4), (-webkit-min-device-pixel-ratio: 1.25), (min-resolution: 120dpi) {
            /* Style adjustments for high resolution devices */
        }

        /* ==========================================================================
           Print styles.
           Inlined to avoid required HTTP connection: h5bp.com/r
           ========================================================================== */
        @media print {
            * {
                background: transparent !important;
                color: #000 !important;
                /* Black prints faster: h5bp.com/s */
                box-shadow: none !important;
                text-shadow: none !important;
            }

            .formst a,
            a:visited {
                text-decoration: underline;
            }

            a[href]:after {
                content: " (" attr(href) ")";
            }

            abbr[title]:after {
                content: " (" attr(title) ")";
            }

            /*
               * Don't show links for images, or javascript/internal links
               */
            .ir a:after,
            a[href^="javascript:"]:after,
            a[href^="#"]:after {
                content: "";
            }

            pre,
            blockquote {
                border: 1px solid #999;
                page-break-inside: avoid;
            }

            thead {
                display: table-header-group;
                /* h5bp.com/t */
            }

            .formst tr,
            img {
                page-break-inside: avoid;
            }

            .formst img {
                max-width: 100% !important;
            }

            @page {
                margin: 0.5cm;
            }

            .formst p,
            h2,
            h3 {
                orphans: 3;
                widows: 3;
            }

            .formst h2,
            h3 {
                page-break-after: avoid;
            }
        }

        #form-content .group div {
            width: 300px;
        }

        #form-content .group div .form-control {
            height: 30px;
        }

        #form-content .group label {
            width: 150px;
        }

    </style>


    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>sunrise</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen"/>
    <script type='text/javascript' src='loginjquery.min.js'></script>
    <link rel="stylesheet" href="login.css" type="text/css" media="screen"/>
    <script>
        $(document).ready(function () {
            $('#login-trigger').mouseenter(function () {
                $(this).next('#login-content').slideToggle();
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
                else $(this).find('span').html('&#x25BC;')
            })
        });
    </script>
    <script>
        function validate() {
            var name = document.form.name.value;
            if (name == null || name == "") {
                alert("Enter your name");
                document.form.name.focus();
                return false;
            }
            var number = document.form.no.value;
            if (number == null || number == "") {
                alert("Enter your number");
                document.form.no.focus();
                return false;
            }
            if ((number.length < 10) || (number.length > 10)) {
                alert(" Your Mobile Number must be 1 to 10 Integers");
                document.form.no.focus();
                return false;
            }
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var addr = document.form.email.value;
            if (reg.test(addr) == false) {
                alert('Invalid E-mail address');
                document.form.email.focus();
                return false;
            }
            var tname = document.form.address.value;
            if (tname == null || tname == "") {
                alert("Enter your address");
                document.form.address.focus();
                return false;
            }
            var tname = document.form.city.value;
            if (tname == null || tname == "") {
                alert("Enter your city");
                document.form.city.focus();
                return false;
            }
            var tname = document.form.state.value;
            if (tname == null || tname == "") {
                alert("Enter your state");
                document.form.state.focus();
                return false;
            }
            var number = document.form.postal.value;
            if (number == null || number == "") {
                alert("Enter your Postal code");
                document.form.postal.focus();
                return false;
            }


        }
        function Numbers(event) {
            var e = event || evt; // for trans-browser compatibility
            var charCode = e.which || e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
    </script>
</head>
<body>

<div id="bg_top">
    <div id="bg_img_bg">
        <div id="bg_img">
            <div id="logo">
                <?php
                session_start();
                $con = mysql_connect('localhost', 'root', '');
                if ($con)
                {
                mysql_select_db("hms", $con);
                $sname = mysql_query("select H_Name from company");
                $row1 = mysql_fetch_array($sname);
                ?>
                <div>
                    <table width=100%>
                        <tr>
                            <td class='no' style="padding-left:600px">
                                <a href="#"><h1><?php echo $row1['H_Name']; ?></h1></a>
                                <h2><a href="#" id="metamorph">The five star hotal</a></h2>
                </div>
                </td>
                <td align="right">
                    <?php
                    if (isset($_SESSION['A_id']))
                    {
                        $result = mysql_query("select * from Admin_profile");
                        $row = mysql_fetch_array($result);
                        echo "<font color=#d9d900>" . "WELCOME " . $row['Ad_fname'] . " " . $row['Ad_lname'] . "..!!" . "</font>" . "<br>";
                        echo "<ul style=list-style-type:none;>
								
								<li style=float:right;margin-left:5px;><a class='menu' href='logout.php' target='_top'>logout</a><div class='but_r1'></div></li>
								
								<li style=float:right;margin-left:5px><a class='menu' href='hms.php' target='_top'>Edit Information</a><div class='but_r1'></div></li>
								
								<li style=float:right;margin-left:5px><a class='menu' href='view.php' target='_top'>View profile</a><div class='but_r1'></div></li>
								
								<li style=float:right;margin-left:5px><a class='menu' href='edit.php' target='_top'>Edit profile</a><div class='but_r1'></div></li>
								
							</ul>";
                        echo "<td>";
                    }
                    else
                    { ?>
                    <header class='cf'>
                        <nav>
                            <ul>
                                <div class='link'>
                                    <li id='login'><a id='login-trigger' href='#'> Log in <span>&#x25BC;</span> </a>
                                        <div id='login-content'>
                                            <form method='POST' action='hms.php'>
                                                <fieldset id='inputs'><input id='username' type='email' name='id'
                                                                             placeholder='Your email address' required>
                                                    <input id='password' type='password' name='psw'
                                                           placeholder='Password' required></fieldset>
                                                <fieldset id='actions'><input type='submit' id='submit' value='Log in'
                                                                              name='login'>
                                            </form>
                                            <form method="POST" action="signup.php">
                                                <!-- <input type='submit' id='signup1' value='Sign Up' name='signup'> -->
                                                <button id='signup1'>Sign Up</button>
                                            </form>
                                            <label><a href='forget123.php' target='_blank'>Forget
                                                    password</a></label>                                                    </fieldset>
                                            <!-- </form> -->                                            </div>
                                    </li>
                                    <li id='signup'>
                                        <!--<a href=''>Sign up FREE</a>-->                                        </li>
                            </ul>
            </div>
            </nav>                                </header>
            <?php }

            ?>
            </table></div>
    </div>
    <div>
        <div id='buttons' style='padding-left:130px;'>
            <?php

            if (isset($_SESSION['A_id'])) {
                echo "<div class='drop' style='padding-left:100px'>
			<ul>
				<li><a href='index.php' class='but but_t' >Home</a></li>
				<li><a href='about.php' class='but'>About us</a></li>
				<li><a href='v_feed.php' class='but'>Feedback</a></li>
				<li><a href='room.php' class='but'>Rooms</a></li>
				<li><a href='customer.php' class='but'>Customers</a></li>
				<li><a href='photos.php' class='but'>Gallery</a></li>
				<li><a href='contact_us.php' class='but'>Contact us</a></li>
			</ul>
			</div>
			</div>
		";
            } else {
                echo "<div class='drop'>
		<ul>
			<li><a href='index.php' class='but but_t'  title=''>Home</a></li>
			<li><a href='r_info.php' class='but' title=''>Room info</a></li>
			<li><a href='gallery.php'  class='but' title=''>Gallery</a>
			<li style='width:100px;'><a href='#'>Booking &#9662</a>
				<ul>
					<li class='drop'><a href='booking.php' class='but' title=''>Booking</a></li>
					<li><a href='Avail.php' class='but' title=''>Avaibility</a></li>
					<li><a href='reserve.php' class='but' title=''>Reserve Room</a></li>
				</ul>
			</li>
			<li><a href='service.php' class='but' title=''>Service</a>
			<li><a href='Cancellation.php' class='but' title=''>Cancellation</a>
			<li><a href='g_feed.php' class='but' title=''>Feedback</a>
			<li><a href='about_us.php'  class='but' title=''>About us</a>
			<li><a href='contact_us.php' class='but' title=''>Contact us</a>
		 </ul></div>
		</div>";
            }
            }
            ?>

        </div>

        <div id="main" style='padding-top:50px'>
            <!-- header begins -->

            <!-- header ends -->
            <!-- content begins -->
            <div id="custo">
                <!-- <h1>Manage Customers</h1><p>-->
                <?php
                //print_r($_REQUEST);
                $con = mysql_connect('localhost', 'root', '');

                if (!$con) {
                    die('database not connect');
                }
                mysql_select_db('hms', $con);

                /*if(isset($_REQUEST['action']))
                {
                    $cu_id='';
                    $name='';
                    $num='';
                    $email='';
                    $address='';
                    $city='';
                    $state='';
                    $postal='';

                    if($_REQUEST['action']=='delete' or $_REQUEST['action']=='edit')
                    {

                        $cu_id=$_REQUEST['id'];

                        $result=mysql_query("select * from customer_info where Cu_id='$cu_id'");
                        $row=mysql_fetch_array($result);
                        $name=$row['Cu_name'];
                        $num=$row['Cu_Mo_no'];
                        $email=$row['Cu_Email_id'];
                        $address=$row['Cu_Address'];
                        $city=$row['Cu_City'];
                        $state=$row['Cu_State'];
                        $postal=$row['Cu_Postal_code'];

                    }
                    if(isset($_POST['save']))
                        {
                            //$id=$_POST['id'];
                            $name=$_POST['name'];
                            $num=$_POST['no'];
                            $email=$_POST['email'];
                            $address=$_POST['address'];
                            $city=$_POST['city'];
                            $state=$_POST['state'];
                            $postal=$_POST['postal'];

                            print_r($_POST);
                            if($_REQUEST['action']=='edit')
                            {
                                $id=$row['Cu_id'];
                                $change=mysql_query("update customer_info set Cu_name='$name' , Cu_Mo_no='$num', Cu_Email_id='$email', Cu_Address='$address', Cu_City='$city', Cu_State='$state', Cu_Postal_code='$postal' where Cu_id=$id");
                                if($change>0)
                                {
                                    echo "Updates successfully";
                                    header("location:customer.php");
                                }
                            }
                            elseif($_REQUEST['action']=='new')
                            {
                                $insert=mysql_query("insert into customer_info (Cu_name,Cu_Mo_no, Cu_Email_id,Cu_Address,Cu_City,Cu_State,Cu_Postal_code) values ('$name','$num','$email','$address','$city','$state',$postal)");
                                if($insert>0)
                                {
                                echo "Inserted";
                                header("location:customer.php");
                                }
                            }
                            elseif($_REQUEST['action']=='delete')
                            {
                                $id=$row['Cu_id'];
                                $change=mysql_query("delete from customer_info where Cu_id=$id");
                                if($change>0)
                                {
                                echo "Deleted successfully";
                                header("location:customer.php");
                                }
                            }
                        }
                */
                ?>
                <div class='formst'>
                    <form id="booking-form" class="booking-form" name="form1" method="post" action="">
                        <!-- <div align="center"><img class="logo" src="img/example_logo.png" title="Example Logo" alt="Example Logo"></div>-->
                        <div class="h1">Customer Edit Form</div>
                        <div id="form-message" class="message hide">
                            Thank you for your enquiry!
                        </div>
                        <div id="form-content">

                            <div class="group">
                                <label for="name">Name</label>
                                <div><input id="name" name="name" class="form-control" type="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="group">
                                <label for="email">Email</label>
                                <div><input id="email" name="email" class="form-control" type="email"
                                            placeholder="Email"></div>
                            </div>
                            <div class="group">
                                <label for="mono">Mobile No.</label>
                                <div><input id="mono" name="no" class="form-control" type="text"
                                            placeholder="Mobile no"></div>
                            </div>

                            <div class="group">
                                <label for="address">Address</label>
                                <div><input id="address" name="address" class="form-control" type="text"
                                            placeholder="Address"></div>
                            </div>
                            <div class="group">
                                <label for="City">City</label>
                                <div><input id="city" name="city" class="form-control" type="text" placeholder="city">
                                </div>
                            </div>
                            <div class="group">
                                <label for="State">State</label>
                                <div><input id="state" name="state" class="form-control" type="text"
                                            placeholder="state"></div>
                            </div>
                            <div class="group">
                                <label for="postal code">Postal code</label>
                                <div><input id="pc" name="postalcode" class="form-control" type="text"
                                            placeholder="postal code"></div>
                            </div>
                            <!-- <div class="group">
                                 <label for="special-requirements">Special requirements</label>
                                 <div><textarea id="special-requirements" name="special-requirements" class="form-control" cols="" rows="5" placeholder="Special requirements"></textarea></div>
                             </div>-->
                            <div class="group submit">
                                <label class="empty"></label>
                                <div><input name="save" type="submit" value="Save"/></div>
                            </div>

                        </div>
                        <div id="form-loading" class="hide"><i class="fa fa-circle-o-notch fa-spin"></i></div>
                    </form>
                </div>
                <?php
                echo "<form method='POST'>";
                echo "<td align='right'><input type='submit' name='cancel' value='cancel'></td></tr></table>";
                echo "</form>";


                /*if(isset($_POST['cancel']))
                {
                    echo"<script language='javascript'>window.open('customer.php','_top');</script>";
                }
        }*/
                ?>

            </div>
        </div>
        <div style="clear: both;"></div>

        <!-- content ends -->
        <div style="height:35px"></div>

    </div>


    <!-- bottom begin -->
    <div id="bottom_bot">
        <div id="bottom">
            <div id="bottom_all">
                <div id="bottom_all_bot">
                    <div id="b_col1">
                        <h1>Services</h1>
                        <div style="height:10px"></div>
                        <ul class="spis_bot">
                            <li><a href="#">Airport pick-up and drop available</a></li>
                            <li><a href="#">Travel Assistance</a></li>
                            <li><a href="#">Room service </a></li>
                            <li><a href="#">Spice Garden Restaurant</a></li>
                            <li><a href="#">Safety lockers in rooms</a></li>
                            <li><a href="#">Wi-Fi connectivity</a></li>
                            <li><a href="#">Valet parking</a></li>
                        </ul>
                    </div>
                    <div id="b_col2">
                        <h1>Follow Us</h1>
                        <div style="height:15px"></div>
                        <ul class="spis_fu">

                            <li><img src="images/fu_i2.png" class=" fu_i" alt=""/><a
                                        href="http://www.facebook.com/Munaf.Vhora">Be a fan on Facebook</a></li>
                            <li><img src="images/fu_i3.png" class=" fu_i" alt=""/><a href="#">RSS Feed</a></li>
                            <li><img src="images/fu_i4.png" class=" fu_i" alt=""/><a href="#">Follow us on Twitter</a>
                            </li>
                        </ul>
                    </div>

                    <div id="b_col3">
                        <h1>Contact Us</h1>
                        <div style="height:15px"></div>
                        <div class="lh">
                            The Sunrise<br/>
                            RadheKishan villa,Toronto<br/>
                            Phone:+1(647)248-6145<br/>
                            Fax: +1(647)248-6145<br/>
                            E-mail: munafvhora28@hotmail.com
                        </div>

                    </div>
                    <div id="b_col4">
                        <h1>About Us</h1>
                        <div style="height:15px"></div>
                        <b>The Sunrise Hotel is a boutique hotel located on Toronto, Canada.</b><br/>
                        The Hotel is within ideal proximity to corporate houses, business parks as well as malls,
                        multiplexes and shopping arcades. <br/><br/>
                        <b>The Sunrise Hotel offers you a Futuristic Conference Hall and Business Center</b><br/>
                        It is equipped with the state-of-the-art facilities like LCD projectors and sound & light
                        systems, which are ideal for conferences, corporate meetings, seminars and workshops for up to
                        20 to 200 people.

                    </div>
                    <div style="clear: both; height:20px;"></div>
                </div>
            </div>
            <!-- footer begins -->
            <div id="footer">
                Copyright 2018. Designed by <a href="https://www.facebook.com/munaf.vhora" title="Website Templates">Munaf
                    Vhora</a><br/>
                <a href="policy.php">Privacy Policy</a> | <a href="terms.php">Terms of Use</a>
            </div>
            <!-- footer ends -->


        </div>
    </div>
    <!-- bottom end -->

</div>


</body>
</html>
