<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <style>
        /* Importing a Modern Font */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap');

        /* Vibrant Gradient Background */
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Glowing Card Container */
        .confirmation-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 500px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transform-style: preserve-3d;
            transition: all 0.5s ease;
            animation: cardEntrance 0.8s ease-out;
        }

        .confirmation-card:hover {
            transform: perspective(1000px) rotateX(5deg);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.4);
        }

        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* Header Styling */
        h2 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            display: inline-block;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: white;
            border-radius: 3px;
        }

        /* Data Display Items */
        .data-item {
            background: rgba(255, 255, 255, 0.2);
            padding: 1rem;
            border-radius: 12px;
            margin: 1.2rem 0;
            transition: all 0.3s ease;
            text-align: left;
            border-left: 4px solid rgba(255, 255, 255, 0.5);
        }

        .data-item:hover {
            transform: translateX(10px);
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .data-label {
            font-weight: 600;
            display: block;
            margin-bottom: 0.3rem;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .data-value {
            font-size: 1.1rem;
            word-break: break-word;
        }

        /* Password Security */
        .password-display {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .hidden-password {
            font-family: monospace;
            letter-spacing: 2px;
            color: #ffcc00;
            font-weight: 600;
        }

        .security-icon {
            font-size: 1.5rem;
            color: #4CAF50;
        }

        /* Animated Button */
        .action-btn {
            display: inline-block;
            background: white;
            color: #e73c7e;
            padding: 0.9rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            margin-top: 1.5rem;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(0, 0, 0, 0.3);
            color: #23a6d5;
        }

        .action-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transform: translateX(-100%);
            transition: 0.5s;
        }

        .action-btn:hover::after {
            transform: translateX(100%);
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .confirmation-card {
                padding: 1.5rem;
            }
            
            h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

    <div class="confirmation-card">
        <h2>Registration Complete!</h2>
        
        <div class="data-item">
            <span class="data-label">Full Name</span>
            <div class="data-value"><?php echo htmlspecialchars($_POST['name'] ?? 'John Doe'); ?></div>
        </div>
        
        <div class="data-item">
            <span class="data-label">Email Address</span>
            <div class="data-value"><?php echo htmlspecialchars($_POST['email'] ?? 'john@example.com'); ?></div>
        </div>
        
        <div class="data-item">
            <span class="data-label">Password</span>
            <div class="password-display">
                <span class="hidden-password">••••••••••</span>
                <span class="security-icon">✓</span>
            </div>
        </div>
        
        <a href="index.php" class="action-btn">Return to Form</a>
    </div>

</body>
</html>