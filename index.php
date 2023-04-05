<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Restro POS System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            
            
            background: url("bg_file.jpg");
            
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: black;
            padding: 0 30px;
            font-size: 3vh;
            font-weight: 600;
            bottom: 10px;
            background-color: lightgreen;
            border-radius: 30px;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            animation: rotate 1s linear;
        }
        @keyframes rotate {
  from {
    transform: rotate(0deg);
    font-size: 0vh;
  }
  to {
    transform: rotate(360deg);
    font-size: 3vh;
  }
}
        .m-b-md {
            color: black;
            background-color: blue;
            border-radius: 5vh;
            background-attachment: fixed;
            padding: 0 30px;
            margin-bottom: 40px;
            animation: up-to-down 2s ease-in-out;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            font-size: 15vh;
        }
        @keyframes up-to-down {
        0% {
            margin-bottom: -450px;
        }
        100% {
            margin-bottom: 40px;
        
        }
        }
        
        @media (max-width: 600px) {
            .m-b-md {
            color: black;
            background-color: blue;
            border-radius: 10vh;
            background-attachment: fixed;
            padding: 0 1px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            font-size: 2vh;
        }
        .links>a {
            color: black;
            padding: 0 30px;
            font-size: 3vh;
            font-weight: 600;
            bottom: 10px;
            background-color: lightgreen;
            border-radius: 30px;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
}
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Restaurant POS 
            </div>

            <div class="links">
			
                <a href="wait?url=Restro/admin/">Admin Log In</a>
                <a href="wait?url=Restro/cashier/">Cashier Log In</a>
                <a href="wait?url=Restro/customer">Customer Log In</a>
            </div>
        </div>
    </div>
</body>
<script src="js.js"></script>
</html>