<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{isset($pageTitle) ? $pageTitle : 'careplus | authentication'}}</title>
    <link rel="stylesheet" href="{{asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('/bower_components/bootstrap/dist/css/bootstrap-theme.min.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('/bower_components/font-awesome/css/font-awesome.min.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('/bower_components/intl-tel-input/build/css/intlTelInput.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" media="all">
</head>
<body>
<div class="container">

    @yield('content')
</div>


<script type="text/javascript" src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/bower_components/intl-tel-input/build/js/intlTelInput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/script.js')}}"></script>
<script>
    $(document).ready(function () {
        var phoneField = $('.phone');
        if(phoneField)
        {
            phoneField.intlTelInput({
                nationalMode:true,
                initialCountry: "auto",
                geoIpLookup: function(callback) {
                    $.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "";
                        callback(countryCode);
                    });
                },
                utilsScript: "/bower_components/intl-tel-input/build/js/utils.js"
            });
        }


    });
</script>
</body>
</html>