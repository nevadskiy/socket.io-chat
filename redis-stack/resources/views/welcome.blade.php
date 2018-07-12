<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>

    <div id="app">
        <h1>New Users</h1>

        <ul>
            <li v-for="user in users">@{{ user }}</li>
        </ul>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>

    <script>
        var socket = io('localhost:3000');

        new Vue({
          el: '#app',

          data() {
            return {
              users: []
            }
          },

          created() {
            console.log('created');
            /** For redis */
            // socket.on('test-channel:UserSignedUp', function(data) {
            socket.on('test-channel:App\\Events\\UserSignedUp', function(data) {
              console.log('fired');
              console.log(data);
              this.users.push(data.username);
            }.bind(this));
          }

        })
    </script>
    </body>
</html>
