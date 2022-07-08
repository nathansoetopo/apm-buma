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
            width: 60px;
            height: 60px;
            background: #a1a1a1;
            border-radius: 50%;
            position: relative;
        }

        .kotak {
            width: 50px;
            height: 50px;
            background: #a1a1a1;
            position: relative;
        }

        .belahketupat {
            width: 60px;
            height: 60px;
            transform: rotate(45deg);
            background: #a1a1a1;
            margin: auto;
            position: relative;
        }

        .rectangle {
            width: 60px;
            height: 50px;
            background: #a1a1a1;
            position: relative;
        }

        .oval {
            width: 70px;
            height: 60px;
            background: #a1a1a1;
            border-radius: 50%;
            position: relative;
        }

        .btn-answer{
            top: 0;
            left: 0;
            position: relative;
            animation: moving 10s ease-out infinite;
        }

        .btn-answer1{
            top: 60%;
            left: 20%;
            position: absolute;
            animation: moving1 17s ease-out infinite;
        }

        .btn-answer2{
            top: 60%;
            left: 0;
            position: absolute;
            animation: moving2 15s ease-out infinite;
        }

        .btn-answer3{
            top: 60%;
            left: 20%;
            position: absolute;
            animation: moving3 10s ease-out infinite;
        }

        .btn-answer4{
            top: 66%;
            left: 70%;
            position: absolute;
            animation: moving2 20s ease-out infinite;
        }

        @keyframes moving{
            0%{
                top: 60%;
                left: 0;
            }
            25%{
                top: 80%;
                margin-left: 70%;
                position: absolute;
            }
            50%{
                top: 70%;
                margin-left: 80%;
                position: absolute;
            }
            75%{
                top: 80%;
                margin-left: 10%;
                position: absolute;
            }
        }

        @keyframes moving1{
            0%{
                top: 60%;
                left: 20%;
                position: absolute;
            }
            25%{
                top: 65%;
                margin-left: 50%;
                position: absolute;
            }
            50%{
                top: 70%;
                left: 0;
                position: absolute;
            }
            75%{
                top: 60%;
                left: 20%;
                position: absolute;
            }
        }

        @keyframes moving2{
            0%{
                top: 50%;
                left: 0;
                position: absolute;
            }
            25%{
                top: 60%;
                margin-left: 30%;
                position: absolute;
            }
            50%{
                top: 70%;
                left: 60%;
                position: absolute;
            }
            75%{
                top: 50%;
                left: 0;
                position: absolute;
            }
        }

        @keyframes moving3{
            0%{
                top: 60%;
                left: 20%;
                position: absolute;
            }
            25%{
                top: 65%;
                left: 50%;
                position: absolute;
            }
            50%{
                top: 75%;
                left: 60%;
                position: absolute;
            }
            75%{
                top: 80%;
                left: 20%;
                position: absolute;
            }
        }
    </style>
</head>

<body style="padding: 2%">
    <div class="container" id="shapegen" style="height: 40vh; padding-top: 10px;">
        <center>
            <h3>Sesuaikan Dengan Bentuk Berikut :</h3>
            <div class="container pt-5" style="height: fit-content;">
                <div id="shaperesult" class="kotak"></div>
            </div>
        </center>
    </div>
    <div class="container bg-success" id="answer" style="height: 400px">
        <center>
            <h4>Pilih Bentuk</h4>
        </center>
        <button class="btn btn-transparent btn-answer" id="btn-answer0">
            <div class="kotak" id="choice" data-shape = 'kotak'></div>
        </button>
        <button class="btn btn-transparent btn-answer1" id="btn-answer1">
            <div class="rectangle" id="choice" data-shape = 'rectangle'></div>
        </button>
        <button class="btn btn-transparent btn-answer2" id="btn-answer2">
            <div class="oval" id="choice" data-shape="oval"></div>
        </button>
        <button class="btn btn-transparent btn-answer3" id="btn-answer3">
            <div class="belahketupat" id="choice" data-shape="belahketupat"></div>
        </button>
        <button class="btn btn-transparent btn-answer4" id="btn-answer4">
            <div class="circle2" id="choice" data-shape="circle2"></div>
        </button>
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
        var width = document.body.clientWidth
        var height = document.body.clientHeight
        renderShape();
        var result;
        var click = 0;
        var total = 0;
        var respons = 0;
        const nilai = [];
        var arr;
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
            arr = ['kotak','rectangle']
            get_random(arr)
        }
        $(document).on('click', '#choice', function(){
            var choice = $(this).data('shape');
            console.log(click);
            if(choice == result){
                if(respons < 1 && click < 20){
                    click += 1;
                    respons += 1;
                    spawnerData();
                }else if(click >= 20){
                    click += 1;
                    spawnerData();
                }
            }

        });
        function spawnerData() {
            if (click <= 5) {
                document.getElementById("shaperesult").style.visibility = "hidden";
                timer = Math.floor((Math.random() * 5) + 1);
                setTimeout(myFunction, timer * 1000);
            } else if (click >= 6 && click <= 15) {
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
                            console.log(respons);
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
            respons = 0;
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
