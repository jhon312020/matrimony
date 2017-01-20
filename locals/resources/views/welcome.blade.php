<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @if(rtrim(Request::url(),'/') == rtrim(asset('/'),'/'))
                <a href="{{Request::url().'/en'}}">EN</a>
                <a href="{{Request::url().'/ta'}}">TA</a>
            @else
                <a href="{{str_replace('/'.Request::route('locale'),'/en', Request::url())}}">EN</a>
                <a href="{{str_replace('/'.Request::route('locale'),'/ta', Request::url())}}">TA</a>
            @endif
            <div class="content">
                <a href="{{asset(App::getLocale().'/search')}}">Search</a> <br/>
                <div class="title">{{trans('messages.Laravel 5')}}</div>
            </div>
        </div>
    </body>
</html>
