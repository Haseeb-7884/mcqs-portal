<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Authentication successful - Redirecting to secure dashboard">
    <meta name="keywords" content="authentication, secure login, dashboard, verification">
    <meta name="author" content="Your Company">
    <meta name="robots" content="noindex, nofollow">
    <title>Authentication Successful | Secure Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 0;
            padding: 0;
        }

        .main-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .success-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            padding: 48px 32px;
            text-align: center;
            max-width: 850px;
            width: 100%;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards;
        }

        .success-icon {
            width: 72px;
            height: 72px;
            background: #22c55e;
            border-radius: 50%;
            margin: 0 auto 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: scale(0.5);
            animation: scaleUp 0.6s ease forwards 0.3s;
        }

        .success-icon i {
            color: white;
            font-size: 28px;
            font-weight: bold;
        }

        .loading-spinner {
            width: 28px;
            height: 28px;
            margin: 20px auto;
        }

        .spinner {
            width: 28px;
            height: 28px;
            border: 3px solid #e2e8f0;
            border-top: 3px solid #3b82f6;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleUp {
            0% {
                transform: scale(0.5);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(15px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }

        .main-title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
            line-height: 1.2;
            opacity: 0;
            animation: slideUp 0.6s ease forwards 0.6s;
        }

        .subtitle,
        .description {
            opacity: 0;
            animation: slideUp 0.6s ease forwards 0.9s;
        }

        .auth-text {
            color: #3b82f6;
        }

        .success-text {
            color: #22c55e;
        }

        .subtitle {
            color: #64748b;
            font-size: 16px;
            margin-bottom: 24px;
            font-weight: 400;
        }

        .description {
            color: #475569;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 32px;
        }

        .countdown-container {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 16px;
            margin: 24px auto;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            opacity: 0;
            animation: slideUp 0.6s ease forwards 1.2s;
        }

        .countdown-dot {
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
        }

        .countdown-text {
            color: #374151;
            font-size: 14px;
            font-weight: 500;
        }

        .countdown-number {
            color: #374151;
            font-weight: 600;
        }

        .status-indicators {
            display: flex;
            justify-content: center;
            gap: 32px;
            margin-top: 32px;
            opacity: 0;
            animation: slideUp 0.6s ease forwards 1.5s;
        }

        .status-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #64748b;
            animation: pulse 2s infinite;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .status-dot.green {
            background: #22c55e;
        }

        .status-dot.blue {
            background: #3b82f6;
        }

        .status-dot.purple {
            background: #8b5cf6;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .main-container {
                padding: 16px;
            }

            .success-card {
                padding: 32px 24px;
            }

            .main-title {
                font-size: 24px;
            }

            .subtitle {
                font-size: 15px;
            }

            .description {
                font-size: 13px;
            }

            .status-indicators {
                flex-direction: column;
                gap: 16px;
                align-items: center;
            }

        }

        @media (max-width: 480px) {
            .success-card {
                padding: 24px 20px;
            }

            .success-icon {
                width: 64px;
                height: 64px;
            }

            .success-icon i {
                font-size: 24px;
            }

            .main-title {
                font-size: 22px;
            }

            .status-indicators {
                gap: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="success-card">
            <!-- Success Icon -->
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>

            <!-- Loading Spinner -->
            <div class="loading-spinner">
                <div class="spinner"></div>
            </div>

            <!-- Main Title -->
            <h1 class="main-title">
                <span class="auth-text">Editor Verification</span> <span class="success-text">Successful</span>
            </h1>


            <!-- Subtitle -->
            <p class="subtitle">Redirecting securely to your Editor Dashboard...</p>

            <!-- Description -->
            <!-- <p class="description">
                Thank you for verifying your credentials. Your session has been authenticated successfully, and we are preparing your personalized Editor Dashboard. Please wait while we establish a secure connection to your account workspace.
            </p> -->

            <!-- Countdown Container -->
            <div class="countdown-container">
                <div class="countdown-dot"></div>
                <span class="countdown-text">Redirecting in <span class="countdown-number" id="countdown">5</span> seconds</span>
            </div>

            <!-- Status Indicators -->
            <div class="status-indicators">
                <div class="status-item">
                    <div class="status-dot green"></div>
                    <span>Secure Connection</span>
                </div>
                <div class="status-item">
                    <div class="status-dot blue"></div>
                    <span>Encrypted Session</span>
                </div>
                <div class="status-item">
                    <div class="status-dot purple"></div>
                    <span>Protected Dashboard</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
        // Countdown functionality
        let countdown = 5;
        const countdownElement = document.getElementById('countdown');
        const countdownInterval = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;
            if (countdown <= 0) {
                clearInterval(countdownInterval);
                window.location.href = '../../editor/index.php';
            }
        }, 1000);

        // Fallback redirect
        setTimeout(() => {
            if (!window.location.href.includes('index.php')) {
                window.location.href = '../../editor/index.php';
            }
        }, 6000);
    </script>
</body>

</html>