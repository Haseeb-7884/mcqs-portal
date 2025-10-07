<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Super Admin - Dashboard</title>

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
    integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Bootstrap 5 for category management -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/sb-admin-2.css" rel="stylesheet">

  <style>
    :root {
      --bg: #f7fafc;
      --card: #ffffff;
      --muted: #6b7280;
      --ink: #111827;
      --ring: #e5e7eb;
      --soft: 0 4px 20px rgba(0, 0, 0, .06);
      --radius: 14px;
    }

    .page-title {
      font-weight: 800;
      letter-spacing: .2px;
    }

    .page-sub {
      color: var(--muted);
    }

    .card-soft {
      border: 1px solid var(--ring);
      border-radius: var(--radius);
      background: var(--card);
      box-shadow: var(--soft);
    }

    .card-head {
      padding: 1rem 1.25rem;
      border-bottom: 1px solid var(--ring);
      position: sticky;
      top: 0;
      z-index: 1;
      background: var(--card);
    }

    .card-title {
      font-size: 1.125rem;
      font-weight: 700;
    }

    .table-wrap {
      max-height: 28rem;
      overflow: auto;
    }

    .table thead th {
      text-transform: uppercase;
      font-size: .72rem;
      letter-spacing: .06em;
      color: var(--muted);
      position: sticky;
      top: 0;
      background: #f9fafb;
      z-index: 2;
    }

    .row-alt:nth-child(odd) {
      background: #fff;
    }

    .row-alt:nth-child(even) {
      background: #fbfcfe;
    }

    .sub-row {
      background: #fbfbfd;
    }

    .sub-list .sub-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: .35rem .75rem;
      border: 1px dashed #e5e7eb;
      border-radius: .5rem;
      margin-bottom: .35rem;
    }

    .sub-indent {
      border-left: 2px solid #d1d5db;
      padding-left: .75rem;
    }

    .badge-soft {
      background: #eef2ff;
      color: #3730a3;
      font-weight: 600;
    }

    .btn-pill {
      border-radius: .6rem;
    }

    .form-card {
      max-height: 520px;
    }

    .form-card .card-body {
      overflow: auto;
    }

    .toast-ctr {
      position: fixed;
      top: 1rem;
      right: 1rem;
      z-index: 1080;
    }

    .toast-soft {
      border: 1px solid #bbf7d0;
      background: #f0fdf4;
      color: #14532d;
      border-radius: .75rem;
      padding: .6rem .8rem;
      box-shadow: var(--soft);
    }

    .pointer {
      cursor: pointer;
    }

    .action-buttons {
      display: flex;
      gap: 0.5rem;
    }

    .btn-icon {
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0;
    }

    .form-control {
      border-radius: 8px;
      padding: 0.75rem 1rem;
    }

    .form-label {
      font-weight: 500;
      margin-bottom: 0.5rem;
      color: #374151;
    }

    .category-form {
      padding: 0.5rem;
    }

    .category-form .mb-3 {
      margin-bottom: 1.25rem !important;
    }

    .form-buttons {
      margin-top: 1.5rem;
      padding-top: 1.25rem;
    }

    .btn-form {
      padding: 0.5rem 1.25rem;
      font-weight: 500;
    }

    .stats-box {
      background-color: #f9fafb;
      border-radius: 10px;
      padding: 1rem;
      margin-bottom: 1.25rem;
    }

    .stats-title {
      font-size: 0.875rem;
      color: #6b7280;
      margin-bottom: 0.25rem;
    }

    .stats-value {
      font-size: 1.125rem;
      font-weight: 600;
      color: #111827;
    }

    .btn-action {
      border: none;
      border-radius: 6px;
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s ease;
    }

    .btn-action:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-edit {
      background-color: #eef2ff;
      color: #4f46e5;
    }

    .btn-edit:hover {
      background-color: #e0e7ff;
    }

    .btn-delete {
      background-color: #fef2f2;
      color: #ef4444;
    }

    .btn-delete:hover {
      background-color: #fee2e2;
    }

    .btn-add {
      background-color: #f0fdf4;
      color: #22c55e;
    }

    .btn-add:hover {
      background-color: #dcfce7;
    }
  </style>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fa-solid fa-user-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Super Admin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa-solid fa-chart-pie"></i>
          <span>Overview</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="">Total Users</a>
            <a class="collapse-item" href="">Total MCQs uploaded</a>
            <a class="collapse-item" href="#">Total Quizzes attempted</a>
            <a class="collapse-item" href="#">Certificates issued</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fa-solid fa-users"></i>
          <span>Users</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="../users/users_routes.php?request=AllUsers">All Users</a>
            <a class="collapse-item" href="../users/users_routes.php?request=EditUsers">Edit Users</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
          aria-expanded="true" aria-controls="collapsePages">
          <i class="fa-solid fa-layer-group"></i>
          <span>Categories & Subjects</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Categories Management</h6>
            <a class="collapse-item" href="category_routes.php?request=ManageCategories">Manage Categories</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Subjects Management</h6>
            <a class="collapse-item" href="#">Organize subjects</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMcqs"
          aria-expanded="true" aria-controls="collapseMcqs">
          <!-- <i class="fas fa-fw fa-wrench"></i> -->
          <i class="fa-solid fa-circle-question"></i>
          <span>Requests & Submissions</span>
        </a>
        <div id="collapseMcqs" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">manage MCQs and users</h6>
            <a class="collapse-item" href="#">
              User Requests
            </a>
            <a class="collapse-item" href="../submissions/submission_routes.php?request=ManageSubmissions">
              MCQs Submissions
            </a>

          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCertificate"
          aria-expanded="true" aria-controls="collapseCertificate">
          <i class="fa-solid fa-award"></i>
          <span>Certificates</span>
        </a>
        <div id="collapseCertificate" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="#">Issued Certificates</a>
            <a class="collapse-item" href="#">Download certificates</a>
            <a class="collapse-item" href="#">Edit Templates</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContents"
          aria-expanded="true" aria-controls="collapseContents">
          <i class="fa-solid fa-file"></i>
          <span>Content</span>
        </a>
        <div id="collapseContents" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="#">Manage static pages</a>
            <a class="collapse-item" href="#">Announcements/Notices</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdds"
          aria-expanded="true" aria-controls="collapseAdds">
          <i class="fa-solid fa-bullhorn"></i>
          <span>Advertisements</span>
        </a>
        <div id="collapseAdds" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="#">Manage ad slots</a>
            <a class="collapse-item" href="#">Enable / Disable ads</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings"
          aria-expanded="true" aria-controls="collapseSettings">
          <i class="fa-solid fa-gear"></i>
          <span>Settings</span>
        </a>
        <div id="collapseSettings" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="#">General Settings</a>
            <a class="collapse-item" href="#">Email settings</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-dark" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                      placeholder="Search for..." aria-label="Search"
                      aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-dark" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header bg-dark">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header bg-dark">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                      problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how
                      would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with
                      the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                      alt="...">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                      told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid mb-0">
          <div class="container-xxl py-4 py-lg-5">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div>
                <h1 class="page-title mb-1">Manage Categories</h1>
                <p class="page-sub mb-0">Add, edit, or organize categories & subcategories. Optimized for PHP backend — minimal JS.</p>
              </div>
              <div class="d-none d-lg-flex gap-2">
                <button class="btn btn-outline-secondary btn-pill" id="resetAllBtn"><i class="bi bi-arrow-counterclockwise me-1"></i>Reset Form</button>
                <button class="btn btn-primary btn-pill" data-bs-toggle="offcanvas" data-bs-target="#helpCanvas"><i class="bi bi-question-circle me-1"></i>Help</button>
              </div>
            </div>

            <div class="row g-4">
              <!-- LEFT: Categories -->
              <div class="col-12 col-lg-7">
                <div class="card-soft h-100">
                  <div class="card-head d-flex align-items-center justify-content-between">
                    <h2 class="card-title mb-0">Categories & Subcategories</h2>
                    <div class="input-group input-group-sm" style="max-width: 260px;">
                      <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                      <input type="text" class="form-control" id="tableSearch" placeholder="Search category...">
                    </div>
                  </div>

                  <div class="table-wrap">
                    <table class="table align-middle mb-0" id="catTable">
                      <thead class="table-light">
                        <tr>
                          <th class="ps-4" style="width:45%">Category</th>
                          <th style="width:12%">Subs</th>
                          <th style="width:16%">Total MCQs</th>
                          <th style="width:27%">Actions</th>
                        </tr>
                      </thead>
                      <tbody id="categoryBody">
                        <!-- CATEGORY 1 -->
                        <tr class="row-alt category-row"
                          data-cat-id="cat1"
                          data-name="General Knowledge"
                          data-desc="Broad range of general knowledge topics"
                          data-subcount="4"
                          data-total="128">
                          <td class="ps-4">
                            <div class="d-flex align-items-start">
                              <button class="btn btn-light btn-sm me-2 chevron"
                                data-bs-toggle="collapse"
                                data-bs-target="#subs_cat1"
                                aria-expanded="false" aria-controls="subs_cat1">
                                <i class="bi bi-chevron-right"></i>
                              </button>
                              <div>
                                <div class="fw-semibold">General Knowledge</div>
                                <div class="text-muted small">Broad range of general knowledge topics</div>
                              </div>
                            </div>
                          </td>
                          <td><span class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis subcount">4</span></td>
                          <td><span class="badge rounded-pill bg-primary-subtle text-primary-emphasis total">128</span></td>
                          <td>
                            <div class="action-buttons">
                              <button class="btn btn-action btn-edit edit-cat" data-cat-id="cat1" title="Edit Category"><i class="bi bi-pencil-square"></i></button>
                              <button class="btn btn-action btn-delete del-cat" data-cat-id="cat1" data-cat-name="General Knowledge" title="Delete Category"><i class="bi bi-trash"></i></button>
                              <button class="btn btn-action btn-add add-sub" data-cat-id="cat1" data-cat-name="General Knowledge" title="Add Subcategory"><i class="bi bi-plus-lg"></i></button>
                            </div>
                          </td>
                        </tr>
                        <tr class="collapse sub-row" id="subs_cat1" data-parent-cat="cat1">
                          <td colspan="4" class="ps-5">
                            <div class="sub-list" id="sublist_cat1">
                              <div class="sub-item" data-sub-id="s1" data-mcq="45" data-name="Current Affairs">
                                <div class="d-flex align-items-center gap-2">
                                  <span class="text-muted">↳</span>
                                  <span class="sub-indent fw-semibold">Current Affairs</span>
                                  <span class="badge badge-soft ms-2">45 MCQs</span>
                                </div>
                                <div class="d-flex gap-1">
                                  <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat1" data-sub-id="s1"><i class="bi bi-pencil-square"></i></button>
                                  <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat1" data-sub-id="s1" data-sub-name="Current Affairs"><i class="bi bi-trash"></i></button>
                                </div>
                              </div>
                              <div class="sub-item" data-sub-id="s2" data-mcq="83" data-name="Pakistan Studies">
                                <div class="d-flex align-items-center gap-2">
                                  <span class="text-muted">↳</span>
                                  <span class="sub-indent fw-semibold">Pakistan Studies</span>
                                  <span class="badge badge-soft ms-2">83 MCQs</span>
                                </div>
                                <div class="d-flex gap-1">
                                  <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat1" data-sub-id="s2"><i class="bi bi-pencil-square"></i></button>
                                  <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat1" data-sub-id="s2" data-sub-name="Pakistan Studies"><i class="bi bi-trash"></i></button>
                                </div>
                              </div>
                              <div class="sub-item" data-sub-id="s3" data-mcq="0" data-name="Geography">
                                <div class="d-flex align-items-center gap-2">
                                  <span class="text-muted">↳</span>
                                  <span class="sub-indent fw-semibold">Geography</span>
                                  <span class="badge badge-soft ms-2">0 MCQs</span>
                                </div>
                                <div class="d-flex gap-1">
                                  <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat1" data-sub-id="s3"><i class="bi bi-pencil-square"></i></button>
                                  <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat1" data-sub-id="s3" data-sub-name="Geography"><i class="bi bi-trash"></i></button>
                                </div>
                              </div>
                              <div class="sub-item" data-sub-id="s4" data-mcq="0" data-name="Science">
                                <div class="d-flex align-items-center gap-2">
                                  <span class="text-muted">↳</span>
                                  <span class="sub-indent fw-semibold">Science</span>
                                  <span class="badge badge-soft ms-2">0 MCQs</span>
                                </div>
                                <div class="d-flex gap-1">
                                  <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat1" data-sub-id="s4"><i class="bi bi-pencil-square"></i></button>
                                  <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat1" data-sub-id="s4" data-sub-name="Science"><i class="bi bi-trash"></i></button>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <!-- CATEGORY 2 -->
                        <tr class="row-alt category-row"
                          data-cat-id="cat2"
                          data-name="English"
                          data-desc="English language and literature"
                          data-subcount="2"
                          data-total="67">
                          <td class="ps-4">
                            <div class="d-flex align-items-start">
                              <button class="btn btn-light btn-sm me-2 chevron" data-bs-toggle="collapse" data-bs-target="#subs_cat2" aria-expanded="false" aria-controls="subs_cat2">
                                <i class="bi bi-chevron-right"></i>
                              </button>
                              <div>
                                <div class="fw-semibold">English</div>
                                <div class="text-muted small">English language and literature</div>
                              </div>
                            </div>
                          </td>
                          <td><span class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis subcount">2</span></td>
                          <td><span class="badge rounded-pill bg-primary-subtle text-primary-emphasis total">67</span></td>
                          <td>
                            <div class="action-buttons">
                              <button class="btn btn-action btn-edit edit-cat" data-cat-id="cat2" title="Edit Category"><i class="bi bi-pencil-square"></i></button>
                              <button class="btn btn-action btn-delete del-cat" data-cat-id="cat2" data-cat-name="English" title="Delete Category"><i class="bi bi-trash"></i></button>
                              <button class="btn btn-action btn-add add-sub" data-cat-id="cat2" data-cat-name="English" title="Add Subcategory"><i class="bi bi-plus-lg"></i></button>
                            </div>
                          </td>
                        </tr>
                        <tr class="collapse sub-row" id="subs_cat2" data-parent-cat="cat2">
                          <td colspan="4" class="ps-5">
                            <div class="sub-list" id="sublist_cat2">
                              <div class="sub-item" data-sub-id="e1" data-mcq="40" data-name="Grammar">
                                <div class="d-flex align-items-center gap-2">
                                  <span class="text-muted">↳</span>
                                  <span class="sub-indent fw-semibold">Grammar</span>
                                  <span class="badge badge-soft ms-2">40 MCQs</span>
                                </div>
                                <div class="d-flex gap-1">
                                  <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat2" data-sub-id="e1"><i class="bi bi-pencil-square"></i></button>
                                  <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat2" data-sub-id="e1" data-sub-name="Grammar"><i class="bi bi-trash"></i></button>
                                </div>
                              </div>
                              <div class="sub-item" data-sub-id="e2" data-mcq="27" data-name="Vocabulary">
                                <div class="d-flex align-items-center gap-2">
                                  <span class="text-muted">↳</span>
                                  <span class="sub-indent fw-semibold">Vocabulary</span>
                                  <span class="badge badge-soft ms-2">27 MCQs</span>
                                </div>
                                <div class="d-flex gap-1">
                                  <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat2" data-sub-id="e2"><i class="bi bi-pencil-square"></i></button>
                                  <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat2" data-sub-id="e2" data-sub-name="Vocabulary"><i class="bi bi-trash"></i></button>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <!-- CATEGORY 3 -->
                        <tr class="row-alt category-row"
                          data-cat-id="cat3"
                          data-name="Computer Science"
                          data-desc="Programming and computer science fundamentals"
                          data-subcount="3"
                          data-total="92">
                          <td class="ps-4">
                            <div class="d-flex align-items-start">
                              <button class="btn btn-light btn-sm me-2 chevron" data-bs-toggle="collapse" data-bs-target="#subs_cat3" aria-expanded="false" aria-controls="subs_cat3">
                                <i class="bi bi-chevron-right"></i>
                              </button>
                              <div>
                                <div class="fw-semibold">Computer Science</div>
                                <div class="text-muted small">Programming and computer science fundamentals</div>
                              </div>
                            </div>
                          </td>
                          <td><span class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis subcount">3</span></td>
                          <td><span class="badge rounded-pill bg-primary-subtle text-primary-emphasis total">92</span></td>
                          <td>
                            <div class="action-buttons">
                              <button class="btn btn-action btn-edit edit-cat" data-cat-id="cat3" title="Edit Category"><i class="bi bi-pencil-square"></i></button>
                              <button class="btn btn-action btn-delete del-cat" data-cat-id="cat3" data-cat-name="Computer Science" title="Delete Category"><i class="bi bi-trash"></i></button>
                              <button class="btn btn-action btn-add add-sub" data-cat-id="cat3" data-cat-name="Computer Science" title="Add Subcategory"><i class="bi bi-plus-lg"></i></button>
                            </div>
                          </td>
                        </tr>
                        <tr class="collapse sub-row" id="subs_cat3" data-parent-cat="cat3">
                          <td colspan="4" class="ps-5">
                            <div class="sub-list" id="sublist_cat3">
                              <div class="sub-item" data-sub-id="c1" data-mcq="50" data-name="Programming">
                                <div class="d-flex align-items-center gap-2">
                                  <span class="text-muted">↳</span>
                                  <span class="sub-indent fw-semibold">Programming</span>
                                  <span class="badge badge-soft ms-2">50 MCQs</span>
                                </div>
                                <div class="d-flex gap-1">
                                  <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat3" data-sub-id="c1"><i class="bi bi-pencil-square"></i></button>
                                  <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat3" data-sub-id="c1" data-sub-name="Programming"><i class="bi bi-trash"></i></button>
                                </div>
                              </div>
                              <div class="sub-item" data-sub-id="c2" data-mcq="20" data-name="Networking">
                                <div class="d-flex align-items-center gap-2">
                                  <span class="text-muted">↳</span>
                                  <span class="sub-indent fw-semibold">Networking</span>
                                  <span class="badge badge-soft ms-2">20 MCQs</span>
                                </div>
                                <div class="d-flex gap-1">
                                  <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat3" data-sub-id="c2"><i class="bi bi-pencil-square"></i></button>
                                  <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat3" data-sub-id="c2" data-sub-name="Networking"><i class="bi bi-trash"></i></button>
                                </div>
                              </div>
                              <div class="sub-item" data-sub-id="c3" data-mcq="22" data-name="Databases">
                                <div class="d-flex align-items-center gap-2">
                                  <span class="text-muted">↳</span>
                                  <span class="sub-indent fw-semibold">Databases</span>
                                  <span class="badge badge-soft ms-2">22 MCQs</span>
                                </div>
                                <div class="d-flex gap-1">
                                  <button class="btn btn-sm btn-light edit-sub" data-cat-id="c3" data-sub-id="c3"><i class="bi bi-pencil-square"></i></button>
                                  <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="c3" data-sub-id="c3" data-sub-name="Databases"><i class="bi bi-trash"></i></button>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- RIGHT: Add/Edit Category -->
              <div class="col-12 col-lg-5">
                <div class="card-soft form-card" id="formCard">
                  <div class="card-head">
                    <h2 id="formTitle" class="card-title mb-0">Add New Category</h2>
                  </div>
                  <div class="card-body category-form">
                    <form id="categoryForm" novalidate>
                      <input type="hidden" id="editingCategoryId" value="">
                      <div class="mb-3">
                        <label class="form-label" for="catName">Category Name *</label>
                        <input id="catName" type="text" class="form-control" placeholder="Enter category name" required>
                        <div class="invalid-feedback">Category name is required.</div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="catDesc">Description</label>
                        <textarea id="catDesc" rows="4" class="form-control" placeholder="Enter category description (optional)"></textarea>
                      </div>
                      <div id="editStats" class="d-none stats-box">
                        <h6 class="mb-3 text-secondary">Category Statistics</h6>
                        <div class="row g-3">
                          <div class="col-6">
                            <div class="stats-title">Subcategories</div>
                            <div class="stats-value" id="statSubs">0</div>
                          </div>
                          <div class="col-6">
                            <div class="stats-title">Total MCQs</div>
                            <div class="stats-value" id="statMcqs">0</div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-end gap-2 form-buttons">
                        <button type="button" id="resetBtn" class="btn btn-outline-secondary btn-pill btn-form">Reset</button>
                        <button type="submit" id="saveBtn" class="btn btn-primary btn-pill btn-form">Add Category</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Toast -->
          <div class="toast-ctr">
            <div id="appToast" class="toast-soft d-none"><i class="bi bi-check-circle me-2"></i><span id="toastMsg">Done.</span></div>
          </div>
          <!-- Modals -->
          <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 id="deleteTitle" class="modal-title">Delete</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="deleteBody" class="modal-body small"></div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="subModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <form class="modal-content" id="subForm">
                <div class="modal-header">
                  <h5 id="subModalTitle" class="modal-title">Add Subcategory</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" id="subCatId">
                  <input type="hidden" id="subId">
                  <div class="mb-3">
                    <label class="form-label">Parent Category</label>
                    <input type="text" id="subParentName" class="form-control" disabled>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="subName">Subcategory Name *</label>
                    <input type="text" id="subName" class="form-control" required>
                  </div>
                  <div class="mb-0">
                    <label class="form-label" for="subMcq">MCQs (optional)</label>
                    <input type="number" id="subMcq" class="form-control" min="0" step="1" placeholder="e.g., 12">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" id="subSaveBtn">Save</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Offcanvas Help -->
          <div class="offcanvas offcanvas-end" tabindex="-1" id="helpCanvas" aria-labelledby="helpCanvasLabel">
            <div class="offcanvas-header">
              <h5 id="helpCanvasLabel">Category Management Guide</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <h6 class="mb-3">How to manage categories and subcategories:</h6>
              <ol class="mb-4">
                <li class="mb-2"><strong>Adding a Category</strong>: Fill out the form on the right side with a category name and optional description, then click "Add Category".</li>
                <li class="mb-2"><strong>Editing a Category</strong>: Click the <i class="bi bi-pencil-square text-primary"></i> edit icon next to any category to modify its details.</li>
                <li class="mb-2"><strong>Deleting a Category</strong>: Click the <i class="bi bi-trash text-danger"></i> delete icon to remove a category and all its subcategories.</li>
                <li class="mb-2"><strong>Adding Subcategories</strong>: Click the <i class="bi bi-plus-lg"></i> add icon next to any category to create subcategories under it.</li>
                <li class="mb-2"><strong>Managing Subcategories</strong>: Click the arrow next to a category to expand and view its subcategories. Use the edit and delete icons to manage them.</li>
                <li class="mb-2"><strong>Searching</strong>: Use the search box at the top to quickly find specific categories.</li>
              </ol>
              <div class="alert alert-info">
                <i class="bi bi-lightbulb me-2"></i>
                <span>Tip: Categories help organize your MCQs into logical groups for easier management and better user experience.</span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>

  <!-- Category Manager Script -->
  <script src="categoryManager.js"></script>
  <script>
    function loadData() {
      // Fetch updated content without reloading the whole page
      fetch(window.location.href, {
          cache: "no-cache"
        })
        .then(response => response.text())
        .then(html => {
          const parser = new DOMParser();
          const doc = parser.parseFromString(html, "text/html");
          const newData = doc.querySelector("#data-container").innerHTML;
          document.querySelector("#data-container").innerHTML = newData;
        })
        .catch(err => console.error("Error fetching data:", err));
    }

    // Refresh every 5 seconds
    setInterval(loadData, 2000);
  </script>
</body>

</html>