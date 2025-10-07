<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor Requests Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/css/request_management.css">
    <!-- <link rel="stylesheet" href="../admin/css/request_detials.css"> -->
</head>

<body>
    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
            <h1 class="h2 fw-bold">Editor Requests</h1>
            <p class="text-muted mb-0">Manage user requests to become editors</p>
        </div>
    </header>

    <div class="main-container py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Search and Filters -->
                    <div class="search-container">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent"><i class="bi bi-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search by name, email, or user ID...">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex flex-wrap gap-2 justify-content-md-end">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary dropdown-toggle filter-dropdown" type="button" data-bs-toggle="dropdown">
                                            All Statuses
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">All Statuses</a></li>
                                            <li><a class="dropdown-item" href="#">Pending</a></li>
                                            <li><a class="dropdown-item" href="#">Approved</a></li>
                                            <li><a class="dropdown-item" href="#">Declined</a></li>
                                        </ul>
                                    </div>

                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary dropdown-toggle filter-dropdown" type="button" data-bs-toggle="dropdown">
                                            <i class="bi bi-calendar me-1"></i> Date
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">Last 7 days</a></li>
                                            <li><a class="dropdown-item" href="#">Last 30 days</a></li>
                                            <li><a class="dropdown-item" href="#">Custom range</a></li>
                                        </ul>
                                    </div>

                                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#helpOffcanvas">
                                        <i class="bi bi-question-circle me-1"></i> Help
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bulk Actions (Initially Hidden) -->
                    <div class="bulk-actions" id="bulkActions">
                        <div class="d-flex align-items-center">
                            <span class="me-3"><strong id="selectedCount">3</strong> requests selected</span>
                            <button class="btn btn-sm btn-success me-2"><i class="bi bi-check-circle me-1"></i> Approve Selected</button>
                            <button class="btn btn-sm btn-danger me-2"><i class="bi bi-x-circle me-1"></i> Decline Selected</button>
                            <button class="btn btn-sm btn-outline-secondary" onclick="clearSelections()"><i class="bi bi-x me-1"></i> Clear Selection</button>
                        </div>
                    </div>

                    <!-- Table View -->
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 30px;" class="pb-4">
                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                        </th>
                                        <th scope="col">USER</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">DATE REQUESTED</th>
                                        <th scope="col">CURRENT ROLE</th>
                                        <th scope="col">REQUESTED ROLE</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input class="form-check-input row-checkbox" style="visibility: hidden;" type="checkbox" data-id="1">
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar me-2">SC</div>
                                                <div>Sarah Chen</div>
                                            </div>
                                        </td>
                                        <td>sarah.chen@example.com</td>
                                        <td>Jan 15, 2024</td>
                                        <td>User</td>
                                        <td>Editor</td>
                                        <td><span class="status-badge status-pending">Pending</span></td>
                                        <td>
                                            <a href="index.php?UserID=<?$id?>&request=edit&RequestFarward=EditUsers" class="text-decoration-none me-2 btn btn-sm action-btn view-btn">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a class="btn btn-sm action-btn decline-btn">
                                                <i class="bi bi-x-lg"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>
                                            <input class="form-check-input row-checkbox" style="visibility: hidden;" type="checkbox" data-id="2">
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar me-2">MR</div>
                                                <div>Michael Rodriguez</div>
                                            </div>
                                        </td>
                                        <td>m.rodriguez@example.com</td>
                                        <td>Jan 14, 2024</td>
                                        <td>User</td>
                                        <td>Editor</td>
                                        <td><span class="status-badge status-approved">Approved</span></td>
                                        <td>
                                            <button class="btn btn-sm action-btn view-btn" data-bs-toggle="modal" data-bs-target="#detailModal" data-user="Michael Rodriguez">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-sm action-btn decline-btn">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>
                                            <input class="form-check-input row-checkbox" style="visibility: hidden;" type="checkbox" data-id="3" checked>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar me-2">EJ</div>
                                                <div>Emily Johnson</div>
                                            </div>
                                        </td>
                                        <td>emily.j@example.com</td>
                                        <td>Jan 16, 2024</td>
                                        <td>User</td>
                                        <td>Editor</td>
                                        <td><span class="status-badge status-pending">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm action-btn view-btn" data-bs-toggle="modal" data-bs-target="#detailModal" data-user="Emily Johnson">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-sm action-btn decline-btn">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>
                                            <input class="form-check-input row-checkbox" style="visibility: hidden;" type="checkbox" data-id="4" checked>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar me-2">DK</div>
                                                <div>David Kim</div>
                                            </div>
                                        </td>
                                        <td>david.kim@example.com</td>
                                        <td>Jan 12, 2024</td>
                                        <td>User</td>
                                        <td>Editor</td>
                                        <td><span class="status-badge status-declined">Declined</span></td>
                                        <td>
                                            <button class="btn btn-sm action-btn view-btn" data-bs-toggle="modal" data-bs-target="#detailModal" data-user="David Kim">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-sm action-btn decline-btn">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>
                                            <input class="form-check-input row-checkbox" style="visibility: hidden;" type="checkbox" data-id="5" checked>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar me-2">AS</div>
                                                <div>Alexandra Smith</div>
                                            </div>
                                        </td>
                                        <td>alex.smith@example.com</td>
                                        <td>Jan 17, 2024</td>
                                        <td>User</td>
                                        <td>Editor</td>
                                        <td><span class="status-badge status-pending">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm action-btn view-btn" data-bs-toggle="modal" data-bs-target="#detailModal" data-user="Alexandra Smith">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-sm action-btn decline-btn">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>
                                            <input class="form-check-input row-checkbox" style="visibility: hidden;" type="checkbox" data-id="6">
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar me-2">JW</div>
                                                <div>James Wilson</div>
                                            </div>
                                        </td>
                                        <td>james.w@example.com</td>
                                        <td>Jan 13, 2024</td>
                                        <td>User</td>
                                        <td>Editor</td>
                                        <td><span class="status-badge status-approved">Approved</span></td>
                                        <td>
                                            <button class="btn btn-sm action-btn view-btn" data-bs-toggle="modal" data-bs-target="#detailModal" data-user="James Wilson">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-sm action-btn decline-btn">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                      


                        <!-- model code starts here -->
                        <div class="request-details-modal">
                            <!-- Header -->
                            <div class="modal-header-custom">
                                <h5 class="modal-title">Request Details</h5>
                                <a class="close-btn">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>

                            <!-- User Info Section -->
                            <div class="user-section">
                                <div class="user-info">
                                    <div class="user-avatar">E</div>
                                    <div class="user-details">
                                        <div class="user-name">Emily Johnson</div>
                                        <div class="duplicate-name">Emily Johnson</div>
                                        <div class="user-email">
                                            <i class="fas fa-envelope email-icon"></i>
                                            emily.j@example.com
                                        </div>
                                        <div class="user-id">User ID: user-003</div>
                                    </div>
                                    <span class="status-badge">Pending</span>
                                </div>
                            </div>

                            <!-- Role Change Section -->
                            <div class="role-change-section">
                                <h6 class="section-title">Role Change Request</h6>
                                <div class="role-change-container">
                                    <div class="role-labels">
                                        <span class="role-label">Current Role</span>
                                        <span class="role-label">Requested Role</span>
                                    </div>
                                    <div class="role-change-display">
                                        <div class="role-item">
                                            <i class="fas fa-user icon-user"></i>
                                            <span class="current-role">User</span>
                                        </div>
                                        <i class="fas fa-arrow-right arrow-icon"></i>
                                        <div class="role-item">
                                            <i class="fas fa-edit icon-editor"></i>
                                            <span class="requested-role">Editor</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="request-date">
                                    <i class="fas fa-calendar-alt calendar-icon"></i>
                                    Requested on Tuesday, January 16, 2024 at 02:45 PM
                                </div>
                            </div>

                            <!-- Reason Section -->
                            <div class="reason-section">
                                <h6 class="section-title">Reason for Request</h6>
                                <p class="reason-text">I've been an active contributor for the past year and understand the platform well.</p>
                            </div>

                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <button class="btn-approve-model">
                                    <i class="fas fa-check"></i>
                                    Approve Request
                                </button>
                                <button class="btn-decline-model">
                                    <i class="fas fa-times"></i>
                                    Decline Request
                                </button>
                            </div>
                        </div>

                        <!-- model code ends here -->


                    </div>
                </div>
            </div>
        </div>
  </div>

        <!-- Help Offcanvas -->
        <div class="offcanvas offcanvas-end help-offcanvas" tabindex="-1" id="helpOffcanvas" aria-labelledby="helpOffcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="helpOffcanvasLabel">Editor Requests Help</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <h6>How to manage editor requests</h6>
                <p>This interface allows you to review and manage requests from users who want to become editors.</p>

                <h6>Searching and filtering</h6>
                <p>Use the search box to find users by name, email, or user ID. Filter requests by status or date range using the filter buttons.</p>

                <h6>Reviewing requests</h6>
                <p>Click the "View" button next to any request to see detailed information including the user's reason for requesting editor status.</p>

                <h6>Approving or declining requests</h6>
                <p>In the detail view, you can approve or decline individual requests. You can also select multiple requests and use the bulk actions toolbar to approve or decline them in bulk.</p>

                <h6>Adding notes</h6>
                <p>You can add administrative notes in the detail view for future reference.</p>

                <div class="alert alert-info mt-4">
                    <i class="bi bi-info-circle"></i> For more assistance, contact your system administrator.
                </div>
            </div>
        </div>

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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Basic functionality for selection and bulk actions
            document.addEventListener('DOMContentLoaded', function() {
                // Select all checkbox functionality
                const selectAll = document.getElementById('selectAll');
                const checkboxes = document.querySelectorAll('.row-checkbox');

                selectAll.addEventListener('change', function() {
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = selectAll.checked;
                    });
                    updateBulkActions();
                });

                // Individual checkbox functionality
                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', updateBulkActions);
                });

                // Modal data loading based on user
                const detailModal = document.getElementById('detailModal');
                if (detailModal) {
                    detailModal.addEventListener('show.bs.modal', function(event) {
                        const button = event.relatedTarget;
                        const userName = button.getAttribute('data-user');
                        const modalTitle = detailModal.querySelector('.modal-title');
                        const detailUserName = detailModal.querySelector('#detailUserName');

                        modalTitle.textContent = userName + ' - Request Details';
                        detailUserName.textContent = userName;

                        // In a real app, you would fetch user-specific data here
                        // For this example, we're using hardcoded data
                    });
                }

                // Initialize with 3 selected as shown in the example
                updateBulkActions();
            });

            function updateBulkActions() {
                const checkboxes = document.querySelectorAll('.row-checkbox:checked');
                const bulkActions = document.getElementById('bulkActions');
                const selectedCount = document.getElementById('selectedCount');

                if (checkboxes.length > 0) {
                    bulkActions.style.display = 'block';
                    selectedCount.textContent = checkboxes.length;
                } else {
                    bulkActions.style.display = 'none';
                }
            }

            function clearSelections() {
                const checkboxes = document.querySelectorAll('.row-checkbox');
                const selectAll = document.getElementById('selectAll');

                checkboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                selectAll.checked = false;

                updateBulkActions();
            }
        </script>
</body>

</html>