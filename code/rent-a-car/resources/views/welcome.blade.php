<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class=" row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8 well">
                    <div class="container nav-left col-xs-6">
                        <h2>Pick-up date</h2>
                        <input class="date form-control" type="text">
                    </div>
                    <script type="text/javascript">
                        $('.date').datepicker({  
                        format: 'mm-dd-yyyy'
                        });  
                    </script> 
                    <div class="container nav-right col-xs-6">
                            <h2>Drop-off date</h2>
                            <input class="date form-control" type="text">
                    </div>
                    <script type="text/javascript">
                        $('.date').datepicker({  
                        format: 'mm-dd-yyyy'
                        });  
                    </script>
                    <hr>
                    <div>
                        <button class="btn btn-primary nav-right">
                            Search
                        </button>
                    </div>
                    </div>
                    <div class="col-xs-2"></div>
        </div>
    </body>
</html>
