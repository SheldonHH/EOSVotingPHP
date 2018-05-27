<!DOCTYPE html>
<html lang="en">
<head>
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
  <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Title</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div id="app">
      <v-app id="inspire">
        <Myheader>
        </Myheader>
        <div class="container">
            <router-view></router-view>
            {{--<Add></Add>--}}
        </div>
        <Myfooter>
        </Myfooter>
        <Maipn>
        </Maipn>
      </v-app>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
