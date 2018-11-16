<!DOCTYPE html>
<html>
    <head>
        <title>Love Bug</title>
        <link rel="shortcut icon" href="/img/favicon2.ico"/>

        <!-- Bootstrap styles -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">

        <!-- The only way to make dropdown menus work?? -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Custom styles -->
        <link rel="stylesheet" href="/css/main.css">

        <!-- Custom scripts -->
        <script src="/js/bundle.js"></script>

        <!-- Mobile friendly viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        @include('partials/header')

        <section class="content container-fluid">
            @if(Session::has('success'))
                <?php $success = Session::get('success'); ?>

                <div class="general-alert alert alert-success" role="alert">
                    @if(is_array($success))
                        <b>{{ $success['title'] or 'Success!'}}</b> {{ $success['message'] or '' }}
                    @else
                        <b>Success!</b> {{ $success }}
                    @endif
                </div>
            @endif

            @if(Session::has('error'))
                <div class="general-alert alert alert-danger" role="alert">
                    <b>Error!</b> {{ Session::get('error') }}
                </div>
            @endif

            @yield('content')
        </section>

        @include('partials/footer')

        <!-- Media query elements for js -->
        <div class="mobile hidden-md hidden-lg"></div>
        <div class="desktop hidden-xs hidden-sm"></div>
    </body>
</html>
