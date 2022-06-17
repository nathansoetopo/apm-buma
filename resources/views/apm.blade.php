<!DOCTYPE html>
<html>
<head>
    <!-- CSS Libraries -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <style>
        #button{
            height: 100vh;
            width: 100%;
            background-color: red;
        }
    </style>
</head>

<body>
    <button id="button" onclick="spwanerData()">Click Me</button>
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
                console.log(click);
                clearInterval(timerVariable)
                nilai.push(total);
                total = 0;
                setTimeout(myFunction, timer * 1000);
            }else{
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
                            window.location = "/";
                            // window.open("/");
                        }
                    })
                }else if(click < 20){
                    console.log('Lebih dari 15');
                    clearInterval(timerVariable)
                    document.getElementById("button").style.visibility = "hidden";
                    timer = Math.floor((Math.random() * 5) + 1);
                    setTimeout(myFunction, timer * 1000);
                }else if(click > 20){
                    document.getElementById("button").style.visibility = "hidden";
                    // alert('Selesai APM');
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
            } else{
                showButton()
            }
        }

        function responUser() {
            timerVariable = setInterval(dumyCount, 0);
            function dumyCount() {
                ++total;
            }
        }

        function showButton(){
            var color = Math.floor(Math.random() * 16777216).toString(16);
            var color_now = '#000000'.slice(0, -color.length) + color;
            document.getElementById("button").style.visibility = "visible";
            document.getElementById("button").style.background = color_now;
        }
    </script>
</body>

</html>
