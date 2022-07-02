<!DOCTYPE html>
<html>

<head>
    <!-- CSS Libraries -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <style>
        #button {
            height: 100vh;
            width: 100%;
            background-color: red;
        }
        .circle2 {
            width: 150px;
            height: 150px;
            border: 1px solid #000;
            border-radius: 50%;
        }

        .triangle-up {
            height: 0;
            width: 150px;
            border-bottom: 150px solid;
            border-left: 100px solid transparent;
            border-right: 100px solid transparent;
        }

        .kotak {
            width: 150px;
            height: 150px;
        }

        .rectangle {
            width: 150px;
            height: 100px;
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
    <button id="button" onclick="spwanerData()">
        <center>
            <div class="bg-success" id="shape"></div>
        </center>
    </button>
    <script>
        $(document).ready(function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('/update-status-test') }}",
                method: 'POST',
            })
        });
    </script>
    <script>
        showButton();
        var click = 0;
        var total = 0;
        const nilai = [];
        var timer;
        var timerVariable;

        function spwanerData() {
            click += 1;
            if (click <= 5) {
                console.log('Kurang Dari 5');
                document.getElementById("button").style.visibility = "hidden";
                timer = Math.floor((Math.random() * 5) + 1);
                setTimeout(myFunction, timer * 1000);
            } else if (click >= 6 && click <= 15) {
                console.log('Penilaian Jalan');
                document.getElementById("button").style.visibility = "hidden";
                timer = Math.floor((Math.random() * 5) + 1);
                clearInterval(timerVariable)
                nilai.push(total);
                total = 0;
                setTimeout(myFunction, timer * 1000);
            } else {
                if (click == 20) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('/uji-coba') }}",
                        method: 'POST',
                        data: {
                            nilai: JSON.stringify(nilai)
                        },
                        dataType: "json",
                        traditional: true,
                        success: function (response) {
                            console.log(response);
                        }
                    })
                } else if (click < 20) {
                    console.log('Lebih dari 15');
                    clearInterval(timerVariable)
                    document.getElementById("button").style.visibility = "hidden";
                    timer = Math.floor((Math.random() * 5) + 1);
                    setTimeout(myFunction, timer * 1000);
                } else if (click > 20) {
                    document.getElementById("button").style.visibility = "hidden";
                    window.location = "/";
                }
            }
        }

        function myFunction() {
            if (click <= 5) {
                showButton()
                if (click == 5) {
                    responUser()
                }
            } else if (click >= 6 && click <= 15) {
                showButton()
                responUser()
            } else {
                showButton()
            }
        }

        function responUser() {
            timerVariable = setInterval(dumyCount, 0);

            function dumyCount() {
                ++total;
            }
        }

        function showButton() {
            var color = Math.floor(Math.random() * 16777216).toString(16);
            var color_now = '#000000'.slice(0, -color.length) + color;
            document.getElementById("button").style.visibility = "visible";
            document.getElementById("button").style.background = color_now;
            lightOrDark(color_now);
        }

        function lightOrDark(color) {
            var r, g, b, hsp;
            if (color.match(/^rgb/)) {
                color = color.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);

                r = color[1];
                g = color[2];
                b = color[3];
            } else {
                color = +("0x" + color.slice(1).replace(
                    color.length < 5 && /./g, '$&$&'));

                r = color >> 16;
                g = color >> 8 & 255;
                b = color & 255;
            }
            hsp = Math.sqrt(
                0.299 * (r * r) +
                0.587 * (g * g) +
                0.114 * (b * b)
            );
            var shape = document.getElementById("shape");
            function get_random (list) {
                var result = list[Math.floor((Math.random()*list.length))];
                console.log(result);
                if(result == 'segitiga'){
                    shape.className = "triangle-up";
                    if (hsp > 127.5) {
                        shape.style.borderColor = 'black';
                    } else {
                        shape.style.borderColor = 'white';
                    }
                }else if(result == 'bundar'){
                    shape.className = "circle2";
                    if (hsp > 127.5) {
                        shape.style.background = 'black';
                    } else {
                        shape.style.background = 'white';
                    }
                }else if(result == 'kotak'){
                    shape.className = "kotak";
                    if (hsp > 127.5) {
                        shape.style.borderColor = 'black';
                    } else {
                        shape.style.borderColor = 'white';
                    }
                }else if(result == 'oval'){
                    shape.className = "oval";
                    if (hsp > 127.5) {
                        shape.style.borderColor = 'black';
                    } else {
                        shape.style.borderColor = 'white';
                    }
                }else if(result == 'rectangle'){
                    shape.className = "rectangle";
                    if (hsp > 127.5) {
                        shape.style.background = 'black';
                    } else {
                        shape.style.background = 'white';
                    }
                }else if(result == 'kotak'){
                    shape.className = "kotak";
                    if (hsp > 127.5) {
                        shape.style.background = 'black';
                    } else {
                        shape.style.background = 'white';
                    }
                }
            }
            get_random(['segitiga','bundar', 'kotak', 'oval', 'rectangle'])
        }
    </script>
</body>

</html>
