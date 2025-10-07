<?php
$submissionObj = new backend();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ Submission Management - Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../admin/css/sumission_manage.css">

    <style>
        #toast {
            min-width: 300px;
            max-width: 400px;
            text-align: left;
            border-radius: 6px;
            padding: 14px 18px;
            position: fixed;
            top: 40px;
            right: 20px;
            z-index: 10000;
            font-size: 15px;
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            opacity: 0;
            transform: translateY(-20px);
            /* border-left: 6px solid #28a745; */
        }

        .toastFirst {
            background: #d4edda;
            color: #155724;
            border-left: 6px solid #28a745;
        }

        .toastSecond {
            background: #f8d7da;
            color: #721c24;
            border-left: 6px solid #dc3545;

        }


        /* When visible */
        #toast.show {
            opacity: 1;
            transform: translateY(0);
            animation: fadeout 4s ease forwards;
        }

        /* Fade out animation */
        @keyframes fadeout {
            0% {
                opacity: 1;
            }

            75% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: translateY(-20px);
            }
        }
    </style>

</head>

<body>

    <?php
    if (isset($_GET['condition'])) {
        $CurrentStatus = $_GET['condition'];
        if ($CurrentStatus == 'approved') {
            echo "<div id='toast' class='show toastFirst'>✅ Submission Approved</div>";
        } else if (isset($_GET['condition']) == 'declined') {
            echo "<div id='toast' class='show toastSecond'>❌ Submission declined</div>";
        }
    } else {
        echo null;
    }
    ?>

    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
            <h1 class="h2 fw-bold">Submission Management</h1>
            <p class="text-muted mb-0">Review and approve editor submissions.</p>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mb-5">
        <!-- Controls Card -->
        <div class="controls-card">
            <div class="row g-3 align-items-center">
                <div class="col-md-5">
                    <div class="position-relative">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" class="form-control ps-5" placeholder="Search submissions..." id="searchInput">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row g-2">
                        <div class="col-sm-4">
                            <select class="form-select" id="statusFilter">
                                <option value="">All Statuses</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Declined">Declined</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-select" id="categoryFilter">
                                <option value="">All Categories</option>
                                <option value="Science">Science</option>
                                <option value="History">History</option>
                                <option value="Computer Science">Computer Science</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-select" id="subcategoryFilter">
                                <option value="">All Subcategories</option>
                                <option value="Physics">Physics</option>
                                <option value="Chemistry">Chemistry</option>
                                <option value="World War II">World War II</option>
                                <option value="Ancient Rome">Ancient Rome</option>
                                <option value="Data Structures">Data Structures</option>
                                <option value="Algorithms">Algorithms</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    off canvas help
                </div>
            </div>
        </div>

        <!-- Table View -->
        <div class="table-card d-block" id="tableView">
            <!-- Desktop Table -->
            <div class="d-none d-md-block">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Set ID</th>
                                <th>Editor Name</th>
                                <th>Main Category</th>
                                <th>Subcategory</th>
                                <th>Topic</th>
                                <th>Date Submitted</th>
                                <th>Status</th>
                                <th class="action-cell">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $fetchSubmissions = $submissionObj->fetching("submissions", "*", null, null);
                            if (!empty($fetchSubmissions)) {
                                foreach ($fetchSubmissions as $fetchSubmission) {
                                    $submissionID = $fetchSubmission['id'];
                                    $SystemID = $fetchSubmission['SystemID'];
                                    $editor_id = $fetchSubmission['editor_id'];
                                    $category_id = $fetchSubmission['category_id'];
                                    $sub_category_id = $fetchSubmission['sub_category_id'];
                                    $topic_id = $fetchSubmission['topic_id'];
                                    $status = $fetchSubmission['status'];
                                    $Date = $fetchSubmission['Date'];
                            ?>
                                    <tr>
                                        <td class="fw-semibold"><?= $SystemID ?></td>
                                        <td>
                                            <?php
                                            $fetchEditor = $submissionObj->fetching("profile", "*", null, "user_id = $editor_id");
                                            if (!empty($fetchEditor)) {
                                                foreach ($fetchEditor as $Names) {
                                                    $name = $Names['name'];
                                                    echo $name;
                                                }
                                            } else {
                                                echo null;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $fetchCategory = $submissionObj->fetching("categories", "*", null, "id = $category_id");
                                            if (!empty($fetchCategory)) {
                                                foreach ($fetchCategory as $Category) {
                                                    $category_name = $Category['category_name'];
                                                    echo $category_name;
                                                }
                                            } else {
                                                echo null;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $fetchSubCategory = $submissionObj->fetching("sub_categories", "*", null, "id = $sub_category_id");
                                            if (!empty($fetchSubCategory)) {
                                                foreach ($fetchSubCategory as $SubCategory) {
                                                    $sub_category_name = $SubCategory['sub_category_name'];
                                                    echo $sub_category_name;
                                                }
                                            } else {
                                                echo null;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $fetchTopics = $submissionObj->fetching("topics", "*", null, "id = $topic_id");
                                            if (!empty($fetchTopics)) {
                                                foreach ($fetchTopics as $Topics) {
                                                    $topic_name = $Topics['topic_name'];
                                                    echo $topic_name;
                                                }
                                            } else {
                                                echo null;
                                            }
                                            ?>
                                        </td>
                                        <td><?= date("M d, Y", strtotime($Date)) ?></td>
                                        <td>
                                            <?php
                                            if ($status == 'declined') {
                                                echo "<span class='status-badge status-declined'>Declined</span>";
                                            } else if ($status == 'approved') {
                                                echo "<span class='status-badge status-approved'>Approved</span>";
                                            } else {
                                                echo "<span class='status-badge status-pending'>Pending</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="../admin/pages/submissions/submission_details.php?id=<?= $submissionID ?>" class="action-btn text-decoration-none btn-view" title="View Details">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>

                    </table>
                </div>
            </div>

            <!-- Mobile Table (Cards) -->

            <!-- <div class="d-md-none">
                <div class="mobile-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="fw-bold mb-0">MCQ-001</h5>
                            <span class="text-muted">Sarah Chen</span>
                        </div>
                        <span class="status-badge status-approved">Approved</span>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <small class="text-muted">Category</small>
                            <p class="mb-0">Science → Physics</p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Date</small>
                            <p class="mb-0">Oct 26, 2023</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Topic</small>
                        <p class="mb-0">Quantum Mechanics</p>
                    </div>
                    <div>
                        <button class="card-view-btn" title="View Details">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mobile-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="fw-bold mb-0">MCQ-002</h5>
                            <span class="text-muted">Michael Rodriguez</span>
                        </div>
                        <span class="status-badge status-approved">Approved</span>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <small class="text-muted">Category</small>
                            <p class="mb-0">History → World War II</p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Date</small>
                            <p class="mb-0">Oct 25, 2023</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Topic</small>
                        <p class="mb-0 fst-italic text-muted">Not Provided</p>
                    </div>
                    <div>
                        <button class="card-view-btn" title="View Details">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mobile-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="fw-bold mb-0">MCQ-005</h5>
                            <span class="text-muted">Lisa Zhang</span>
                        </div>
                        <span class="status-badge status-pending">Pending</span>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <small class="text-muted">Category</small>
                            <p class="mb-0">History → Ancient Rome</p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Date</small>
                            <p class="mb-0">Oct 22, 2023</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Topic</small>
                        <p class="mb-0">Roman Empire</p>
                    </div>
                    <div>
                        <button class="btn btn-sm card-btn-view me-2" title="View Details">
                            <i class="bi bi-eye"></i>
                        </button>
                        <button class="btn btn-sm card-btn-approve me-2" title="Approve">
                            <i class="bi bi-check"></i>
                        </button>
                        <button class="btn btn-sm card-btn-decline" title="Decline">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                </div>

            </div> -->

        </div>

        <!-- Pagination -->
        <nav class="mt-4 d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <i class="bi bi-chevron-left"></i> Previous
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        Next <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <script>
        function showToast() {
            let toast = document.getElementById("toast");
            toast.classList.add("show");
            setTimeout(() => {
                toast.classList.remove("show");
            }, 3000); // disappears after 3 sec
        }

        showToast();
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>