<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IEMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
            position: relative;
        }

        #logo {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 200px;
            z-index: 1;
        }
        
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            z-index: 0;
            margin-top: 100px;
        }
        
        .title {
            font-size: 2rem;
            margin-bottom: 20px;
            font-family: "Arial Black", sans-serif;
            color: black; s
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background-color: #333; 
            color: #4caf50; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        
        .button:hover {
            background-color: #555; 
        }

        @media (prefers-color-scheme: dark) {
            body {
                background-color: #333;
                color: #fff;
            }
            .card {
                background-color: #222;
            }
            .button {
                background-color: #333; 
                color: #4caf50; 
            }
            .button:hover {
                background-color: #555; 
            }
        }
    </style>
</head>
<body>
    <img id="logo" src="images/logo.jpg" alt="IEMS Logo">
    <div class="card">
        <div class="title">Inmate Evaluation and Management System</div>
        
        <a href="{{ route('login') }}" class="button">Login</a>
        
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="button">Register</a>
        @endif
    </div>
</body>
</html>
