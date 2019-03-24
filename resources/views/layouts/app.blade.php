<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Salesmith</title>

    <style>
        [v-cloak] > * { display:none }
    </style>

    @stack('styles')

</head>
<body>
    <div id="app" user="{{Auth::user()}}" roles="{{auth()->user()->roles ?? 'admin'}}" v-cloak>
        <v-app>
            <v-toolbar app>
                <v-toolbar-title class="headline text-uppercase">
                    <span>Salesmith</span>
                    <span class="font-weight-light" v-html="pageTitle"></span>
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn
                        flat
                        @click="signout()"
                >
                    @if (Auth::user())
                    <span class="mr-2" >Sign out</span>
                    @else
                    @endif


                </v-btn>
            </v-toolbar>

            <v-content>
                @yield('content')
            </v-content>
        </v-app>
    </div>
</body>
<script src="{{ mix('js/app.js') }}"></script>

</html>
