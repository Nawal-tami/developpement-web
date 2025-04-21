<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* Importing a Fun Font */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Pacifico&display=swap');

        /* Vibrant Color Theme */
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            animation: gradientBG 15s ease infinite;
            background-size: 400% 400%;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Fun Form Container */
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 450px;
            text-align: center;
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255,255,255,0.3);
            transform-style: preserve-3d;
            transition: all 0.5s ease;
        }

        .form-container:hover {
            transform: perspective(500px) rotateX(5deg) rotateY(5deg);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        /* Form Heading */
        h1 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #ff6b6b;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            font-family: 'Pacifico', cursive;
        }

        /* Labels */
        label {
            font-size: 0.9rem;
            font-weight: 600;
            display: block;
            margin-top: 1.2rem;
            text-align: left;
            color: #ff6b6b;
            padding-left: 5px;
        }

        /* Input Fields */
        input {
            width: 100%;
            padding: 0.8rem;
            margin-top: 0.3rem;
            border: 2px solid #ffb8b8;
            border-radius: 12px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            outline: none;
            transition: all 0.3s ease;
        }

        /* Input Focus and Hover */
        input:focus, input:hover {
            border-color: #ff6b6b;
            box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.2);
            transform: translateY(-2px);
        }

        /* Stylish Submit Button */
        .btn {
            display: inline-block;
            background: linear-gradient(45deg, #ff6b6b, #ff8e8e);
            color: white;
            padding: 0.9rem;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            margin-top: 1.8rem;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            font-size: 1rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
        }

        /* Button Hover Effect */
        .btn:hover {
            background: linear-gradient(45deg, #ff5252, #ff7676);
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(255, 107, 107, 0.6);
        }

        /* Floating Animation */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .form-container {
            animation: float 6s ease-in-out infinite;
        }

        /* Responsive Adjustments */
        @media (max-width: 480px) {
            .form-container {
                padding: 1.8rem;
            }
            
            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Join Us!</h1>
        <form method="POST" action="cible.php">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" placeholder="Your name" required>

            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" placeholder="hello@example.com" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Your secret code" required>

            <button type="submit" class="btn">Get Started →</button>
        </form>
    </div>

</body>
</html>
