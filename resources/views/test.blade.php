<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Testing APM V2</title>
    <style>
        .circle2 {
            width: 100px;
            height: 100px;
            background: #a1a1a1;
            border-radius: 50%;
        }

        .kotak {
            width: 100px;
            height: 100px;
            background: #a1a1a1;
            margin: auto;
        }

        .belahketupat {
            width: 100px;
            height: 100px;
            transform: rotate(45deg);
            background: #a1a1a1;
            margin: auto;
        }

        .rectangle {
            width: 150px;
            height: 100px;
            background: #a1a1a1;
        }

        .oval {
            width: 150px;
            height: 100px;
            background: #a1a1a1;
            border-radius: 50%;
        }

    </style>
</head>

<body>
    <div class="container" id="shapegen" style="height: 40vh; padding-top: 10px;">
        <center>
            <h3>Sesuaikan Dengan Bentuk Berikut :</h3>
            <div class="container pt-5" style="height: fit-content;">
                <div id="shaperesult" class="kotak"></div>
            </div>
        </center>
    </div>
    <div class="container" id="answer" style="min-height: fit-content; padding-top: 70px; padding-bottom: 30px;">
        <center>
            <h4>Pilih Bentuk</h4>
        </center>
        <div class="row" style="justify-content: center">
            <div class="col-md-6 col-6">
                <button class="btn btn-transparent">
                    <div class="kotak" id="choice" data-shape = 'kotak'></div>
                </button>
            </div>
            <div class="col-md-6 col-6">
                <button class="btn btn-transparent" style="float: right">
                    <div class="rectangle" id="choice" data-shape = 'rectangle'></div>
                </button>
            </div>
            <div class="col-md-12 col-12">
                <center>
                    <button class="btn btn-transparent">
                        <div class="oval" id="choice" data-shape="oval"></div>
                    </button>
                </center>
            </div>
            <div class="col-md-6 col-6">
                <button class="btn btn-transparent" style="float: left">
                    <div class="belahketupat" id="choice" data-shape="belahketupat"></div>
                </button>
            </div>
            <div class="col-md-6 col-6">
                <button class="btn btn-transparent" style="float: right">
                    <div class="circle2" id="choice" data-shape="circle2"></div>
                </button>
            </div>
        </div>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
        renderShape();
        var result;
        var click = 0;
        var total = 0;
        const nilai = [];
        var timer;
        var timerVariable;
        function renderShape() {
            function get_random(list) {
                var color = Math.floor(Math.random() * 16777216).toString(16);
                var color_now = '#000000'.slice(0, -color.length) + color;
                result = list[Math.floor((Math.random() * list.length))];
                var shape = document.getElementById("shaperesult");
                shape.className = result;
                shape.style.background = color_now;
                shape.style.visibility = "visible";
                var stylinganswer = document.querySelector('div[data-shape="'+result+'"]');
                stylinganswer.style.background = color_now;
            }
            get_random(['belahketupat', 'circle2', 'kotak', 'oval', 'rectangle'])
        }
        $(document).on('click', '#choice', function(){
            var choice = $(this).data('shape');
            if(choice == result){
                click += 1;
                spawnerData();
            }
        });
        function spawnerData() {
            if (click <= 5) {
                console.log('Kurang Dari 5');
                document.getElementById("shaperesult").style.visibility = "hidden";
                timer = Math.floor((Math.random() * 5) + 1);
                setTimeout(myFunction, timer * 1000);
            } else if (click >= 6 && click <= 15) {
                console.log('Penilaian Jalan');
                document.getElementById("shaperesult").style.visibility = "hidden";
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
                    clearInterval(timerVariable)
                    document.getElementById("shaperesult").style.visibility = "hidden";
                    timer = Math.floor((Math.random() * 5) + 1);
                    setTimeout(myFunction, timer * 1000);
                } else if (click > 20) {
                    document.getElementById("shaperesult").style.visibility = "hidden";
                    window.location = "/";
                }
            }
        }

        function myFunction() {
            if (click <= 5) {
                renderShape();
                if (click == 5) {
                    responUser()
                }
            } else if (click >= 6 && click <= 15) {
                renderShape();
                responUser();
            } else {
                renderShape();
            }
        }

        function responUser() {
            timerVariable = setInterval(dumyCount, 0);

            function dumyCount() {
                ++total;
            }
        }
    </script>
</body>

</html>
