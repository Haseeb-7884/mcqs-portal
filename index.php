<?php
// include("includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQs Portal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap me-2"></i>
                MCQs Portal        
                </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Past Papers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <div class="navbar-nav dropdown">
                    <?php
                    if (isset($_SESSION['login'])) {
                        $log_id = $_SESSION['id'];
                        $sessionObj = new backend();
                        $fetchRecord = $sessionObj->fetching("users", "*", null, "id = $log_id");
                        if (!empty($fetchRecord)) {
                            $email = $fetchRecord[0]['email'];
                    ?>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-1"></i> <?= $email ?>
                            </a>
<ul style="width:220px; border-radius:10px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.1);" class="dropdown-menu">
  <li>
    <a class="dropdown-item d-flex align-items-center" href="#">
      <i class="fas fa-home me-2 text-primary"></i> Dashboard
    </a>
  </li>
  <li>
    <a class="dropdown-item d-flex align-items-center" href="#">
      <i class="fas fa-play-circle me-2 text-success"></i> Start Quiz
    </a>
  </li>
  <li>
    <a class="dropdown-item d-flex align-items-center" href="#">
      <i class="fas fa-chart-bar me-2 text-warning"></i> Results
    </a>
  </li>
  <li>
    <a class="dropdown-item d-flex align-items-center" href="#">
      <i class="fas fa-book-open me-2 text-info"></i> Practice
    </a>
  </li>
  <li>
    <a class="dropdown-item d-flex align-items-center" href="#">
      <i class="fas fa-user me-2 text-secondary"></i> Profile
    </a>
  </li>
  <li><hr class="dropdown-divider m-1"></li>
  <li>
    <a class="dropdown-item d-flex align-items-center text-danger fw-bold" href="includes/logout.php">
      <i class="fas fa-sign-out-alt me-2"></i> Logout
    </a>
  </li>
</ul>

                        <?php
                        }
                    } else {
                        ?>
                        <a class="nav-link" href="website/modules/login/login.php"><i class="fas fa-user me-1"></i> Login</a>
                        <a class="btn text-decoration-none btn-primary ms-2" href="website/modules/login/signup.php">Register</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title">Master Your Skills with</h1>
            <h1 class="hero-subtitle">MCQs Portal</h1>
            <p class="hero-description">
                Practice thousands of multiple choice questions, test your knowledge, and gain certificates in various subjects.
            </p>

            <div class="search-box">
                <input type="text" placeholder="Search MCQs, Subjects, or Test Papers" class="form-control border-0">
            </div>

            <button class="btn btn-primary btn-lg mt-3">
                <i class="fas fa-play me-2"></i>
                Start Practicing Now
            </button>
        </div>
    </section>

    <!-- Popular Categories -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-2">Popular Categories</h2>
                <p class="text-muted">Choose from our most practiced subjects</p>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card purple">
                        <h5>General Knowledge</h5>
                        <p>Test your general awareness with questions from various fields</p>
                        <div class="category-stats">
                            <div>
                                <div class="stat-number">1,200</div>
                                <div class="stat-label">Questions</div>
                            </div>
                            <a href="#" class="explore-btn">Explore →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card green">
                        <h5>English</h5>
                        <p>Grammar, vocabulary & comprehension exercises</p>
                        <div class="category-stats">
                            <div>
                                <div class="stat-number">800</div>
                                <div class="stat-label">Questions</div>
                            </div>
                            <a href="#" class="explore-btn">Explore →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card blue">
                        <h5>Computer Science</h5>
                        <p>Programming, algorithms & theory concepts</p>
                        <div class="category-stats">
                            <div>
                                <div class="stat-number">950</div>
                                <div class="stat-label">Questions</div>
                            </div>
                            <a href="#" class="explore-btn">Explore →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card red">
                        <h5>Current Affairs</h5>
                        <p>Latest news and world events questions</p>
                        <div class="category-stats">
                            <div>
                                <div class="stat-number">700</div>
                                <div class="stat-label">Questions</div>
                            </div>
                            <a href="#" class="explore-btn">Explore →</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-outline-primary">View All Categories</button>
            </div>
        </div>
    </section>

    <!-- Latest MCQs -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-2">Latest Uploaded MCQs</h2>
                <p class="text-muted">Fresh questions added by our expert team</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="mcq-card">
                        <div class="mcq-meta">
                            <span class="subject-tag">Current Affairs</span>
                            <span class="time-stamp"><i class="fas fa-clock me-1"></i> 4 hours ago</span>
                        </div>
                        <h6 class="mb-3">Who is the current Secretary-General of the United Nations?</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Medium</span>
                            <button class="btn btn-primary btn-sm">Practice Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mcq-card">
                        <div class="mcq-meta">
                            <span class="subject-tag">Computer Science</span>
                            <span class="time-stamp"><i class="fas fa-clock me-1"></i> 6 hours ago</span>
                        </div>
                        <h6 class="mb-3">What is the output of 2 ** 3 in programming (following operator precedence)?</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Easy</span>
                            <button class="btn btn-primary btn-sm">Practice Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mcq-card">
                        <div class="mcq-meta">
                            <span class="subject-tag">English Vocabulary</span>
                            <span class="time-stamp"><i class="fas fa-clock me-1"></i> 8 hours ago</span>
                        </div>
                        <h6 class="mb-3">What is the synonym of "Obsolete"?</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Medium</span>
                            <button class="btn btn-primary btn-sm">Practice Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mcq-card">
                        <div class="mcq-meta">
                            <span class="subject-tag">General Knowledge</span>
                            <span class="time-stamp"><i class="fas fa-clock me-1"></i> 10 hours ago</span>
                        </div>
                        <h6 class="mb-3">Which planet is known as the "Red Planet"?</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Easy</span>
                            <button class="btn btn-primary btn-sm">Practice Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-dark">View All MCQs</button>
            </div>
        </div>
    </section>

    <!-- Practice by Topic -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-2">Practice by Topic</h2>
                <p class="text-muted">Focus on specific areas to improve your knowledge</p>
            </div>

            <div class="text-center">
                <a href="#" class="topic-btn">Grammar</a>
                <a href="#" class="topic-btn">Programming</a>
                <a href="#" class="topic-btn">Current Affairs</a>
                <a href="#" class="topic-btn">Pakistan Studies</a>
                <a href="#" class="topic-btn">Vocabulary</a>
                <a href="#" class="topic-btn">Mathematics</a>
                <a href="#" class="topic-btn">Physics</a>
                <a href="#" class="topic-btn">Chemistry</a>
                <a href="#" class="topic-btn">Biology</a>
                <a href="#" class="topic-btn">History</a>
                <a href="#" class="topic-btn">Geography</a>
                <a href="#" class="topic-btn">Economics</a>
                <a href="#" class="topic-btn">Political Science</a>
                <a href="#" class="topic-btn">Psychology</a>
                <a href="#" class="topic-btn">Sociology</a>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted">Can't find what you're looking for?</p>
                <a href="#" class="btn btn-outline-primary">Request a New Topic</a>
            </div>
        </div>
    </section>

    <!-- Improved Certificate Section -->
    <section class="certificate-section">
        <div class="container">
            <div class="certificate-content">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="certificate-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h2 class="fw-bold mb-4">Earn Certificates by Scoring 70% or Above!</h2>
                        <p class="mb-5 lead">Validate your knowledge with our certified assessments. Download and share your achievements with employers and educators.</p>

                        <div class="row mt-5">
                            <div class="col-md-4 mb-4">
                                <div class="cert-feature">
                                    <i class="fas fa-certificate"></i>
                                    <h5>Industry-standard Certificate</h5>
                                    <p class="mb-0">Industry-recognised credentials that validate your expertise</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="cert-feature">
                                    <i class="fas fa-download"></i>
                                    <h5>Downloadable</h5>
                                    <p class="mb-0">Get your certificate immediately after completion</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="cert-feature">
                                    <i class="fas fa-share-alt"></i>
                                    <h5>Shareable</h5>
                                    <p class="mb-0">Add to LinkedIn, resumes, and share with employers</p>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-light btn-lg mt-4 px-5 py-3">
                            <i class="fas fa-play-circle me-2"></i>
                            Start a Test Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <i class="fas fa-question-circle fa-2x mb-3" style="color: var(--primary-color);"></i>
                        <h3>10,000+</h3>
                        <p>MCQs Available</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <i class="fas fa-users fa-2x mb-3" style="color: var(--success-color);"></i>
                        <h3>50,000+</h3>
                        <p>Happy Students</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <i class="fas fa-award fa-2x mb-3" style="color: var(--warning-color);"></i>
                        <h3>15,000+</h3>
                        <p>Certificates Issued</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <i class="fas fa-clock fa-2x mb-3" style="color: var(--danger-color);"></i>
                        <h3>24/7</h3>
                        <p>Available</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Why Choose MCQs Portal?</h2>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h5>Updated Test Papers</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <h5>Expert-Curated Questions</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5>Mobile-Friendly Platform</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5>Progress Tracking</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h5>Detailed Explanations</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h5>Multiple Subjects</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Redesigned Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <a href="#" class="footer-logo">
                        <i class="fas fa-graduation-cap me-2"></i>
                        MCQs Portal
                    </a>
                    <p class="footer-desc">Your trusted platform for comprehensive MCQ practice and skill development. Master your knowledge with our extensive question bank.</p>

                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 mb-5 mb-md-0">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Categories</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Practice Tests</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Past Papers</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Certificates</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-4 mb-5 mb-md-0">
                    <h6>Support</h6>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Contact</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Help Center</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Terms of Use</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> FAQ</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-4">
                    <h6>Contact Us</h6>
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <div>hello@mcqsportal.com</div>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-phone"></i>
                        <div>+1 (555) 123-4567</div>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>Educational District, Learning City</div>
                    </div>

                    <div class="mt-4">
                        <h6>Subscribe to Newsletter</h6>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Your Email" aria-label="Your Email">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom pt-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0">© 2024 MCQs Portal. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="footer-bottom-links">
                            <a href="#">Privacy Policy</a>
                            <a href="#">Terms of Service</a>
                            <a href="#">Cookie Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="includes/js/script.js"></script>
</body>

</html>