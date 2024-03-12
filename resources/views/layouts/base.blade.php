<!DOCTYPE html>
<html>
    <head>
        <title>@yield('titulo')</title>
        <link rel="icon" href="assets/icons/bookmark.svg">
        <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/css/style.css">
        <meta charset="UTF-8">
        <!-- <script type="text/javascript" src="assets/js/textarea-limit.js"></script> -->
        <script type="text/javascript" src="{{url('')}}/assets/js/textarea-limit.js"></script>
    </head>
    <body>
            @yield('header')

            <section>
                @yield('lista')
                <div class="workbench">
                    @yield('body')
                </div>
            </section>
            
    </body>
</html>