<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Login to your MCQ learning platform account. Test your skills, learn, and grow with thousands of students mastering their knowledge through interactive assessments.">
    <meta name="keywords" content="MCQ, learning, quiz, education, test skills, online learning, student platform">
    <meta name="author" content="MCQ Learning Platform">
    <title>Sign up - MCQ Learning Platform | Test Your Skills. Learn. Grow.</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="../../../assets/css/signup.css">

</head>

<body>
    <div class="container-fluid main-container">
        <div class="row main-row g-0">
            <!-- Left Panel - Login Form -->
            <div class="col-lg-5">
                <div class="left-panel">
                    <div class="login-wrapper">
                        <!-- Logo Section -->
                        <div class="logo-section">
                            <div class="logo-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <h1 class="welcome-heading">Create Account</h1>
                            <p class="welcome-text">Sign up to get started</p>
                        </div>

                        <!-- Login Form -->
                        <form action="../../../includes/signup_manage.php" method="POST" class="login-form" id="loginForm" enctype="multipart/form-data">
                            <div class="field-group">
                                <label for="email" class="field-label">Email Address</label>
                                <div class="input-container">
                                    <i class="fas fa-envelope field-icon"></i>
                                    <input type="email" name="email" class="field-input" id="email" placeholder="Enter your email"
                                        required>
                                </div>
                            </div>

                            <div class="field-group">
                                <label for="password" class="field-label">Password</label>
                                <div class="input-container">
                                    <i class="fas fa-lock field-icon"></i>
                                    <input type="password" name="password" class="field-input" id="password"
                                        placeholder="Enter your password" required>
                                    <button type="button" class="toggle-password" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="eyeIcon"></i>
                                    </button>
                                </div>

                                <!-- Password Requirements -->
                                <div class="password-requirements">
                                    <div class="requirement-item" id="uppercase-req">
                                        <i class="fas fa-times"></i>
                                        <span>Must contain at least one uppercase letter</span>
                                    </div>
                                    <div class="requirement-item" id="alphanumeric-req">
                                        <i class="fas fa-times"></i>
                                        <span>Must contain only alphabets and numbers</span>
                                    </div>
                                    <div class="requirement-item" id="length-req">
                                        <i class="fas fa-times"></i>
                                        <span>Must be exactly 8 characters long</span>
                                    </div>
                                </div>

                            </div>



                            <button type="submit" class="submit-btn" name="signup_submit" id="submitBtn" disabled>Create Account</button>
                        </form>

                        <!-- Separator -->
                        <div class="separator">
                            <span class="separator-text">Or continue with</span>
                        </div>

                        <!-- Google Login -->
                        <button class="google-btn" onclick="googleLogin()">
                            <svg class="google-logo" viewBox="0 0 24 24">
                                <path fill="#4285F4"
                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                <path fill="#34A853"
                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                <path fill="#FBBC05"
                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                <path fill="#EA4335"
                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                            </svg>
                            Continue with Google
                        </button>

                        <!-- Sign Up -->
                        <div class="register-section">
                            Already have an account?<a href="#" class="register-link">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel - Features Section -->
            <div class="col-lg-7 d-none d-lg-block">
                <div class="right-panel">
                    <div class="bg-pattern"></div>
                    <i class="fas fa-book corner-icon"></i>

                    <div class="panel-content">
                        <!-- Features Grid -->
                        <div class="features-grid">
                            <div class="feature-box">
                                <i class="fas fa-book-open feature-icon"></i>
                                <h3 class="feature-name">Learn</h3>
                            </div>
                            <div class="feature-box">
                                <i class="fas fa-bullseye feature-icon"></i>
                                <h3 class="feature-name">Practice</h3>
                            </div>
                            <div class="feature-box">
                                <i class="fas fa-trophy feature-icon"></i>
                                <h3 class="feature-name">Excel</h3>
                            </div>
                            <div class="feature-box">
                                <i class="fas fa-users feature-icon"></i>
                                <h3 class="feature-name">Compete</h3>
                            </div>
                        </div>

                        <!-- Main Content -->
                        <h1 class="hero-title">Test Your Skills. Learn. Grow.</h1>
                        <p class="hero-subtitle">Join thousands of students mastering their knowledge through
                            interactive MCQ assessments</p>

                        <!-- Statistics -->
                        <div class="metrics-row">
                            <div class="metric-item">
                                <span class="metric-number">50K+</span>
                                <span class="metric-text">Students</span>
                            </div>
                            <div class="metric-item">
                                <span class="metric-number">1000+</span>
                                <span class="metric-text">Questions</span>
                            </div>
                            <div class="metric-item">
                                <span class="metric-number">95%</span>
                                <span class="metric-text">Success Rate</span>
                            </div>
                        </div>

                        <!-- Trophy Icon -->
                        <div class="trophy-area">
                            <i class="fas fa-trophy trophy-symbol"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- External JS -->
    <script src="../../../assets/js/signup.js"></script>

</body>

</html>