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

</head>

<body>
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
                                <th>ID</th>
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
                            <tr>
                                <td class="fw-semibold">MCQ-001</td>
                                <td>Sarah Chen</td>
                                <td>Science</td>
                                <td>Physics</td>
                                <td>Quantum Mechanics</td>
                                <td>Oct 26, 2023</td>
                                <td><span class="status-badge status-approved">Approved</span></td>
                                <td>
                                    <button class="action-btn btn-view" title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">MCQ-002</td>
                                <td>Michael Rodriguez</td>
                                <td>History</td>
                                <td>World War II</td>
                                <td><span class="fst-italic text-muted">Not Provided</span></td>
                                <td>Oct 25, 2023</td>
                                <td><span class="status-badge status-approved">Approved</span></td>
                                <td>
                                    <button class="action-btn btn-view" title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">MCQ-003</td>
                                <td>Emily Johnson</td>
                                <td>Computer Science</td>
                                <td>Data Structures</td>
                                <td>Binary Trees</td>
                                <td>Oct 24, 2023</td>
                                <td><span class="status-badge status-declined">Declined</span></td>
                                <td>
                                    <button class="action-btn btn-view" title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">MCQ-004</td>
                                <td>David Kim</td>
                                <td>Science</td>
                                <td>Chemistry</td>
                                <td><span class="fst-italic text-muted">Not Provided</span></td>
                                <td>Oct 23, 2023</td>
                                <td><span class="status-badge status-declined">Declined</span></td>
                                <td>
                                    <button class="action-btn btn-view" title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">MCQ-005</td>
                                <td>Lisa Zhang</td>
                                <td>History</td>
                                <td>Ancient Rome</td>
                                <td>Roman Empire</td>
                                <td>Oct 22, 2023</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>
                                    <button class="action-btn btn-view me-1" title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="action-btn btn-approve me-1" title="Approve">
                                        <i class="bi bi-check"></i>
                                    </button>
                                    <button class="action-btn btn-decline" title="Decline">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">MCQ-006</td>
                                <td>James Wilson</td>
                                <td>Computer Science</td>
                                <td>Algorithms</td>
                                <td>Sorting Algorithms</td>
                                <td>Oct 21, 2023</td>
                                <td><span class="status-badge status-approved">Approved</span></td>
                                <td>
                                    <button class="action-btn btn-view" title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mobile Table (Cards) -->
            <div class="d-md-none">
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
            </div>
        </div>

      
        <div id="cardView" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 d-none">
            <!-- Card 1 -->
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="card-title fw-bold">MCQ-001</h5>
                                <h6 class="card-subtitle text-muted">Sarah Chen</h6>
                            </div>
                            <span class="status-badge status-approved">Approved</span>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Main Category</small>
                            <p class="mb-2">Science</p>

                            <small class="text-muted">Subcategory</small>
                            <p class="mb-2">Physics</p>

                            <small class="text-muted">Topic</small>
                            <p class="mb-2">Quantum Mechanics</p>

                            <small class="text-muted">Date Submitted</small>
                            <p class="mb-0">Oct 26, 2023</p>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent d-flex justify-content-between">
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-eye me-1"></i> View Details
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="card-title fw-bold">MCQ-002</h5>
                                <h6 class="card-subtitle text-muted">Michael Rodriguez</h6>
                            </div>
                            <span class="status-badge status-approved">Approved</span>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Main Category</small>
                            <p class="mb-2">History</p>

                            <small class="text-muted">Subcategory</small>
                            <p class="mb-2">World War II</p>

                            <small class="text-muted">Topic</small>
                            <p class="mb-2 fst-italic text-muted">Not Provided</p>

                            <small class="text-muted">Date Submitted</small>
                            <p class="mb-0">Oct 25, 2023</p>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent d-flex justify-content-between">
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-eye me-1"></i> View Details
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 5 (Pending) -->
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="card-title fw-bold">MCQ-005</h5>
                                <h6 class="card-subtitle text-muted">Lisa Zhang</h6>
                            </div>
                            <span class="status-badge status-pending">Pending</span>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Main Category</small>
                            <p class="mb-2">History</p>

                            <small class="text-muted">Subcategory</small>
                            <p class="mb-2">Ancient Rome</p>

                            <small class="text-muted">Topic</small>
                            <p class="mb-2">Roman Empire</p>

                            <small class="text-muted">Date Submitted</small>
                            <p class="mb-0">Oct 22, 2023</p>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent d-flex justify-content-between">
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-eye me-1"></i> View Details
                        </button>
                        <div>
                            <button class="btn btn-sm card-btn-approve me-1" title="Approve">
                                <i class="bi bi-check"></i>
                            </button>
                            <button class="btn btn-sm card-btn-decline" title="Decline">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>