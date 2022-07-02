<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        /* .triangle-up {
            border-left: 40px solid transparent;
            border-right: 40px solid transparent;
            border-bottom: 40px solid green;
            border-top: 40px solid transparent;
            display: inline-block;
        } */

        .circle2 {
            width: 150px;
            height: 150px;
            background: #a1a1a1;
            border: 1px solid #000;
            border-radius: 50%;
        }

        .triangle-up {
            height: 0;
            width: 150px;
            border-bottom: 150px solid green;
            border-left: 100px solid transparent;
            border-right: 100px solid transparent;
        }

        .kotak {
            width: 150px;
            height: 150px;
            background: #a1a1a1;
        }

        .rectangle {
            width: 150px;
            height: 100px;
            background: #a1a1a1;
        }

        .oval {
            width: 160px;
            height: 80px;
            background: #a84909;
            border-radius: 50%;
        }

    </style>
</head>

<body>
    <button class="btn btn-primary" onclick="showButton()" style="height: 100vh; width:100%;">
        <center>
            <div class="bg-success" id="shape"></div>
        </center>
    </button>
    {{-- <div class="triangle-up"></div>
    <br><br>
    <div class="circleBase circle2"></div>
    <br><br>
    <div class="trapezium"></div> --}}
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
    <script>
        function showButton() {
            // var color = Math.floor(Math.random() * 16777216).toString(16);
            // var color_now = '#000000'.slice(0, -color.length) + color;
            // document.getElementById("button").style.visibility = "visible";
            // document.getElementById("button").style.background = color_now;
            function get_random (list) {
                var result = list[Math.floor((Math.random()*list.length))];
                console.log(result);
                if(result == 'segitiga'){
                    document.getElementById("shape").className = "triangle-up";
                }else if(result == 'bundar'){
                    document.getElementById("shape").className = "circle2";
                }else if(result == 'kotak'){
                    document.getElementById("shape").className = "kotak";
                }else if(result == 'oval'){
                    document.getElementById("shape").className = "oval";
                }else if(result == 'rectangle'){
                    document.getElementById("shape").className = "rectangle";
                }

            }
            get_random(['segitiga','bundar', 'kotak', 'oval', 'rectangle'])
        }
    </script>
    <script>
        function lightOrDark(color) {

            // Variables for red, green, blue values
            var r, g, b, hsp;

            // Check the format of the color, HEX or RGB?
            if (color.match(/^rgb/)) {

                // If RGB --> store the red, green, blue values in separate variables
                color = color.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);

                r = color[1];
                g = color[2];
                b = color[3];
            } else {

                // If hex --> Convert it to RGB: http://gist.github.com/983661
                color = +("0x" + color.slice(1).replace(
                    color.length < 5 && /./g, '$&$&'));

                r = color >> 16;
                g = color >> 8 & 255;
                b = color & 255;
            }

            // HSP (Highly Sensitive Poo) equation from http://alienryderflex.com/hsp.html
            hsp = Math.sqrt(
                0.299 * (r * r) +
                0.587 * (g * g) +
                0.114 * (b * b)
            );
            // Using the HSP value, determine whether the color is light or dark
            if (hsp > 127.5) {
                //return 'light';
                console.log('light');
            } else {
                console.log('dark');
                //return 'dark';
            }
        }

    </script>
</body>

</html>
