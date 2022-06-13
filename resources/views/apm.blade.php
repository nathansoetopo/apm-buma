<!DOCTYPE html>
<html>

<head>
    <!-- CSS Libraries -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body>

    <h2>Uji Coba Timing</h2>

    <p>Sistem APM.</p>

    <h2>Respond User</h2>
    <div id="count_up_timer">00</div>
    <br><br>
    <button id="button" onclick="spwanerData()">Click</button>
    <script>
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
                console.log(click);
                clearInterval(timerVariable)
                nilai.push(total);
                total = 0;
                setTimeout(myFunction, timer * 1000);
            }else{
                console.log('Lebih dari 15');
                clearInterval(timerVariable)
                document.getElementById("button").style.visibility = "hidden";
                timer = Math.floor((Math.random() * 5) + 1);
                setTimeout(myFunction, timer * 1000);
                if(click == 20){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:"{{ url('/uji-coba') }}",
                        method:'POST',
                        data:{nilai:JSON.stringify(nilai)},
                        dataType: "json",
                        traditional: true,
                        success:function(response)
                        {
                        console.log(response);
                        }
                    })
                }
            }
        }

        function myFunction() {
            if (click <= 5) {
                document.getElementById("button").style.visibility = "visible";
                if (click == 5) {
                    responUser()
                }
            } else if (click >= 6 && click <= 15) {
                document.getElementById("button").style.visibility = "visible";
                responUser()
            } else {
                document.getElementById("button").style.visibility = "visible";
            }
        }

        function responUser() {
            timerVariable = setInterval(dumyCount, 10);
            function dumyCount() {
                ++total;
                document.getElementById("count_up_timer").innerHTML = total;
            }
        }
    </script>
</body>

</html>
