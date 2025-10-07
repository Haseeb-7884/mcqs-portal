<?php
$AllUsersRecords = new backend();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="User Management Dashboard - Manage and monitor all users in your system. Responsive and SEO-optimized with AdSense support.">
  <title>User Management</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <style>
    body {
      background-color: #f9fafb;
    }

    .role-badge {
      padding: 3px 10px;
      border-radius: 8px;
      font-size: 12px;
      font-weight: 500;
    }

    .role-admin {
      background: #f3e8ff;
      color: #6b21a8;
    }

    .role-editor {
      background: #dbeafe;
      color: #1d4ed8;
    }

    .role-user {
      background: #f3f4f6;
      color: #374151;
    }

    .status-badge {
      padding: 3px 10px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 500;
    }

    .status-active {
      background: #dcfce7;
      color: #166534;
    }

    .status-inactive {
      background: #fee2e2;
      color: #991b1b;
    }

    .stats-card {
      border: 1px solid #e5e7eb;
      border-radius: 12px;
      padding: 20px;
      background: #fff;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
    }

    .stats-card p {
      margin: 0;
    }

    /* Table */
    .custom-table-container {
      border: 1px solid #e5e7eb;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
    }

    .custom-table thead th {
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      font-weight: 600;
      color: #111827;
      background-color: #f9fafb;
      border-bottom: 1px solid #e5e7eb;
    }

    .custom-table tbody tr:nth-child(odd) {
      background-color: #ffffff;
    }

    .custom-table tbody tr:nth-child(even) {
      background-color: #fdfdfd;
    }

    .custom-table tbody tr:hover {
      background-color: #f3f4f6;
    }

    .action-btn {
      border: none;
      background: transparent;
      padding: 4px;
      margin-left: 4px;
      border-radius: 6px;
      transition: all 0.2s;
    }

    .action-btn:hover {
      background-color: #f3f4f6;
    }

    .action-btn i {
      font-size: 16px;
    }

    .action-view {
      color: #374151;
    }

    .action-edit {
      color: #2563eb;
    }

    .action-delete {
      color: #dc2626;
    }
  </style>
</head>

<body>

  <div class="container py-3">
    <!-- Header -->
    <header class="mb-4">
      <h1 class="h3 fw-bold">User Management</h1>
      <p class="text-muted">Manage and monitor all users in your system</p>
    </header>

    <?php
    $fetchingUserRecords = $AllUsersRecords->fetching("users", "*", null, null);
    if (!empty($fetchingUserRecords)) {
      $AllUsers = count($fetchingUserRecords);
    }
    $fetchingActive = $AllUsersRecords->fetching("profile", "*", null, "status = 'active'");
    if (!empty($fetchingActive)) {
      $ActiveUsers = count($fetchingActive);
    }

    $fetchingInactive = $AllUsersRecords->fetching("profile", "*", null, "status = 'inactive'");
    if (!empty($fetchingInactive)) {
      $InactiveUsers = count($fetchingInactive);
    }

    ?>
    <!-- Stats -->
    <div class="row mb-4 g-3">
      <div class="col-md-3 col-6">
        <div class="stats-card">
          <p class="text-muted small">Total Users</p>
          <p class="h4 fw-bold"><?= !empty($AllUsers) ? $AllUsers : 0 ?></p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="stats-card">
          <p class="text-muted small">Active Users</p>
          <p class="h4 fw-bold text-success"><?= !empty($ActiveUsers) ? $ActiveUsers : 0 ?></p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="stats-card">
          <p class="text-muted small">Admins</p>
          <p class="h4 fw-bold text-primary">1</p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="stats-card">
          <p class="text-muted small">Inactive</p>
          <p class="h4 fw-bold text-danger"><?= !empty($InactiveUsers) ? $InactiveUsers : 0 ?></p>
        </div>
      </div>
    </div>


    <!-- Search & Filters -->
    <div class="card shadow-sm mb-4 border-0">
      <div class="card-body">
        <div class="row g-3 align-items-center">
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
              <input type="text" class="form-control border-start-0" placeholder="Search users...">
            </div>
          </div>
          <div class="col-md-3">
            <select class="form-select">
              <option selected>All Roles</option>
              <option>Admin</option>
              <option>Editor</option>
              <option>User</option>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-select">
              <option selected>All Status</option>
              <option>Active</option>
              <option>Inactive</option>
            </select>
          </div>
        </div>
        <div class="mt-3 text-muted small">
          <?php
          $fetchingUserData = $AllUsersRecords->fetching("users", "*", null, null);
          if (!empty($fetchingUserData)) {
            echo "Showing " . count($fetchingUserData) . " of " . count($fetchingUserData) . " users";
          }
          ?>
        </div>
      </div>
    </div>

    <!-- Users Table -->
    <div class="custom-table-container mb-4">
      <div class="table-responsive">
        <table class="table custom-table align-middle mb-0">
          <thead>
            <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th class="text-end">Date Joined</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getUser = $AllUsersRecords->fetching("users", "*", null, null);
            if (!empty($getUser)) {
              foreach ($getUser as $UsersRecords) {
                $id = $UsersRecords['id'];
                $formattedId = "USR-" . str_pad($id, 4, "0", STR_PAD_LEFT);
                $email = $UsersRecords['email'];
                $role = $UsersRecords['role'];
                $Date = $UsersRecords['Date'];

            ?>
                <tr>
                  <td><?= $formattedId ?></td>
                  <td><strong><?php
                              $fetchNames = $AllUsersRecords->fetching("profile", "*", null, "user_id = $id");
                              if (!empty($fetchNames)) {
                                $names = $fetchNames[0]['name'];
                                echo $names;
                              } else {
                                echo "<p class='text-danger'>Profile Incompelete</p>";
                              }
                              ?></strong></td>
                  <td><?= $email ?></td>
                  <td>
                    <?php
                    if ($role == 2) {
                      echo "<span class='role-badge role-admin'>Admin</span>";
                    } else if ($role == 1) {
                      echo "<span class='role-badge role-editor'>Editor</span>";
                    } else {
                      echo "<span class='role-badge role-user'>User</span>";
                    }
                    ?>
                  </td>
                  <td>
                    <?php
                    $fetchingStatus = $AllUsersRecords->fetching("profile", "*", null, "user_id = $id");
                    if (empty($fetchingStatus)) {
                      echo "<span class='status-badge status-inactive'>Inactive</span>";
                    } else {
                      $status = $fetchingStatus[0]['status'];
                      if ($status = 'active') {
                        echo "<span class='status-badge status-active'>Active</span>";
                      } else {
                        echo "<span class='status-badge status-inactive'>Inactive</span>";
                      }
                    }
                    ?>
                  </td>
                  <td class="text-end"><?= date("n/j/Y", strtotime($Date)); ?></td>
                </tr>
            <?php
              }
            }
            ?>

            <!-- <tr>
              <td>USR002</td>
              <td><strong>Sarah Johnson</strong></td>
              <td>sarah.j@company.com</td>
              <td><span class="role-badge role-editor">Editor</span></td>
              <td><span class="status-badge status-active">Active</span></td>
              <td class="text-end">2/20/2023</td>
            </tr>
            <tr>
              <td>USR003</td>
              <td><strong>Michael Chen</strong></td>
              <td>m.chen@company.com</td>
              <td><span class="role-badge role-user">User</span></td>
              <td><span class="status-badge status-inactive">Inactive</span></td>
              <td class="text-end">3/10/2023</td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>