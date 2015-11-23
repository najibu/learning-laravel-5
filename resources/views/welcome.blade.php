<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <!--  <script src="https://js.pusher.com/3.0/pusher.min.js"></script>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.8/vue.min.js"></script> -->

        

        <!--<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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
        </style> -->
    </head>
    <body>
        <div class="container">
            <div class="content">
               <div class="title">Hello Gary</div>
                
                @can('edit_forum')
                    <a href="#">Edit the Forum</a>
                @endcan

            </div>

            <!-- <ul id="users">
                <li v-repeat='user: users'>@{{ user.name }}</li>
            </ul> -->
            <!-- <form method="POST" action="/search-results">
                <input type="text" name="_token" value="{{ csrf_token() }}">
                <input type="text" id="search" name="search">
                <button type="submit">Search</button>
            </form> -->

            <!-- @include('stats') -->
        </div>

        <script>
        // (function() {

        //     var pusher = new Pusher('02f7d1064d1a050ba46a', {
        //         encrytped: true
        //     });

        //     var channel = pusher.subscribe('test');

        //     channel.bind('App\\Events\\UserHasRegistered', function(data) {
        //       console.log(data);
        //     });
        // })();
            
            // new Vue ({
            //     el: '#users',

            //     data: {
            //         users: []
            //     },

            //     ready: function() {
            //         var pusher = new Pusher('02f7d1064d1a050ba46a', {
            //             encrytped: true
            //         });

            //         pusher.subscribe('test')
            //               .bind('App\\Events\\UserHasRegistered', this.addUser);
            //     },

            //     methods: {
            //         addUser: function(user) {
            //             this.users.push(user);
            //         }
            //     }

            // });

        </script>
    </body>
</html>
