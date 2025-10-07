<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Submissions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/my_submissions.css">
    <link rel="stylesheet" href="css/add_submission.css">



</head>

<body>



    <div class="main-container">

        <div class="header-section">
            <div class="header-title">
                <i class="fas fa-file-alt header-icon"></i>
                <h1 class="title-text">MCQ Editor - My Submissions</h1>
            </div>
            <p class="subtitle-text">Here you can view all the MCQ sets you have submitted for approval.</p>
        </div>

        <div class="search-container">
            <div class="row g-3">
                <div class="col-md-8">
                    <div class="position-relative">
                        <!-- <i class="fas fa-search search-icon"></i> -->
                        <input type="text" id="searchInput" class="form-control search-input" placeholder="Search by Set ID, Category, or Status...">
                    </div>
                </div>
                <div class="col-md-4">
                    <select id="statusFilter" class="form-select status-filter">
                        <option value="">All Status</option>
                        <option value="approved">Approved</option>
                        <option value="pending">Pending</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="results-info" id="resultsInfo">
            Showing 5 of 5 submissions
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th class="set-id-col">Set ID</th>
                        <th class="main-category-col">Main Category</th>
                        <th class="sub-category-col">Sub Category</th>
                        <th class="mcqs-col">MCQs</th>
                        <th class="status-col">Status</th>
                        <th class="date-col">Submission Date</th>
                        <th class="date-col">Approval Date</th>
                        <th class="actions-col d-none">Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    $logID = $_SESSION['id'];
                    // echo $logID;
                    $fetchedObj = new backend();
                    $fetchingSubmissions = $fetchedObj->fetching("submissions", "*", null, "editor_id = $logID");
                    if (!empty($fetchingSubmissions)) {
                        foreach ($fetchingSubmissions as $fetchedSubmissionsDetails) {
                            $SystemID = $fetchedSubmissionsDetails['SystemID'];
                            $editor_id = $fetchedSubmissionsDetails['editor_id'];
                            $category_id = $fetchedSubmissionsDetails['category_id'];
                            $totalMcqs = $fetchedSubmissionsDetails['totalMcqs'];
                            
                            $date = $fetchedSubmissionsDetails['Date'];
                            $dt = new DateTime($date);

                            $status = $fetchedSubmissionsDetails['status'];
                        }
                    ?>
                        <tr data-set-id="<?= $SystemID ?>" data-main-category="Science" data-sub-category="Physics" data-status="pending">
                            <td><strong><?= $SystemID ?></strong></td>
                            <td>
                                <!-- $category_id -->
                                <?php
                                $fetchingCategories = $fetchedObj->fetching("categories", "*", null, "id = $category_id");
                                if (!empty($fetchingCategories)) {
                                    foreach ($fetchingCategories as $fetchedCategories) {
                                        $category_name = $fetchedCategories['category_name'];
                                        echo $category_name;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $fetchingSubCategories = $fetchedObj->fetching("sub_categories", "*", null, "category_id = $category_id");
                                if (!empty($fetchingSubCategories)) {
                                    foreach ($fetchingSubCategories as $fetchedSubCategories) {
                                        $sub_category_name = $fetchedSubCategories['sub_category_name'];
                                        echo $sub_category_name;
                                    }
                                }
                                ?>
                            </td>
                            <td class="text-center"><?= $totalMcqs ?></td>
                            <td>
                                <?php
                                if ($status == "pending") {
                                    echo "<span class='status-badge status-pending'>Pending</span>";
                                } else if ($status == "approved") {
                                    echo "<span class='status-badge status-approved'>Approved</span>";
                                } else {
                                    echo "<span class='status-badge status-rejected'>Rejected</span>";
                                }
                                ?>

                            </td>
                            <td>
                                <?= $dt->format("M d, Y, h:i A"); ?>
                            </td>
                            <td>—</td>
                            <td class="text-center d-none">
                                <a href="#" class="view-btn">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    <?php
                    }

                    // for loops ends
                    ?>
                    <!-- <tr data-set-id="SET-0001" data-main-category="Mathematics" data-sub-category="Algebra" data-status="approved">
                        <td><strong>SET-0001</strong></td>
                        <td>Mathematics</td>
                        <td>Algebra</td>
                        <td class="text-center">25</td>
                        <td><span class="status-badge status-approved">Approved</span></td>
                        <td>Jan 15, 2024, 03:30 PM</td>
                        <td>Jan 16, 2024, 07:22 PM</td>
                        <td class="text-center d-none">
                            <a href="#" class="view-btn">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr> -->
                    <!-- <tr data-set-id="SET-0003" data-main-category="English" data-sub-category="Grammar" data-status="rejected">
                        <td><strong>SET-0003</strong></td>
                        <td>English</td>
                        <td>Grammar</td>
                        <td class="text-center">20</td>
                        <td><span class="status-badge status-rejected">Rejected</span></td>
                        <td>Jan 18, 2024, 09:45 PM</td>
                        <td>Jan 19, 2024, 04:30 PM</td>
                        <td class="text-center d-none">
                            <a href="#" class="view-btn">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr> -->

                </tbody>
            </table>

            <div id="noResults" class="no-results" style="display: none;">
                <i class="fas fa-search"></i>
                <h5>No submissions found</h5>
                <p>Try adjusting your search criteria or filters.</p>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Minimal JavaScript for search functionality
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const tableBody = document.getElementById('tableBody');
        const resultsInfo = document.getElementById('resultsInfo');
        const noResults = document.getElementById('noResults');
        const allRows = Array.from(tableBody.querySelectorAll('tr'));
        const totalRows = allRows.length;

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value.toLowerCase();
            let visibleCount = 0;

            allRows.forEach(row => {
                const setId = row.getAttribute('data-set-id').toLowerCase();
                const mainCategory = row.getAttribute('data-main-category').toLowerCase();
                const subCategory = row.getAttribute('data-sub-category').toLowerCase();
                const status = row.getAttribute('data-status').toLowerCase();

                const matchesSearch = searchTerm === '' ||
                    setId.includes(searchTerm) ||
                    mainCategory.includes(searchTerm) ||
                    subCategory.includes(searchTerm) ||
                    status.includes(searchTerm);

                const matchesStatus = statusValue === '' || status === statusValue;

                if (matchesSearch && matchesStatus) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Update results info
            resultsInfo.textContent = `Showing ${visibleCount} of ${totalRows} submissions`;

            // Show/hide no results message
            if (visibleCount === 0) {
                noResults.style.display = 'block';
                tableBody.parentElement.style.display = 'none';
            } else {
                noResults.style.display = 'none';
                tableBody.parentElement.style.display = 'table';
            }
        }

        // Add event listeners
        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
    </script>
</body>

</html>