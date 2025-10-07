<?php
// include("../../../includes/connection.php");

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

    .model_container {
      z-index: 9999;
      position: absolute;
      top: 15%;
      max-width: 1300px;
      transform: scale(0.7);
      opacity: 0;
      animation: popup 0.3s ease-out forwards;
      /* background: rgba(255, 255, 255, 0.85); */
      background: #f8f9fc;
      background: none;
      backdrop-filter: blur(3px);
      border-radius: 8px;
      padding: 80px;
    }

    @keyframes popup {
      from {
        transform: scale(0.7);
        opacity: 0;
      }

      to {
        transform: scale(1);
        opacity: 1;
      }
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

    .card-custom {
      border-radius: 12px;
      border: 1px solid #e5e7eb;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .form-label {
      font-size: 0.9rem;
      color: #4b5563;
      margin-bottom: 6px;
    }

    .form-control,
    .form-select {
      font-size: 0.9rem;
      padding: 10px 12px;
    }

    .form-control:disabled {
      background-color: #f3f4f6;
      color: #6b7280;
    }

    .btn-custom {
      /* padding: 10px 18px; */
      font-size: 0.9rem;
      border-radius: 8px;
      transition: all 0.2s;
    }

    .btn-cancel:hover {
      background: #f3f4f6;
    }

    .btn-save {
      background: #2563eb;
      color: #fff;
    }

    .btn-save:hover {
      background: #1d4ed8;
    }

    #toast {
      min-width: 300px;
      max-width: 400px;
      /* background: #d4edda;
      color: #155724; */
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
  if (isset($_GET['CurrentStatus'])) {
    $CurrentStatus = $_GET['CurrentStatus'];
    if ($CurrentStatus == 'updated') {
      echo "<div id='toast' class='show toastFirst'>✅ User updated Successfully</div>";
    } else if (isset($_GET['CurrentStatus']) == 'deleted') {
      echo "<div id='toast' class='show toastSecond'>🗑️ User Deleted Successfully</div>";
    }
  } else {
    echo null;
  }
  ?>

  <div class="container py-5">
    <!-- Header -->
    <header class="mb-4">
      <h1 class="h3 fw-bold">User Management</h1>
      <p class="text-muted">Manage and monitor all users in your system</p>
    </header>

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
          $fetchingUserRecords = $UsersObjEdit->fetching("users", "*", null, null);
          if (!empty($fetchingUserRecords)) {
            echo "Showing " . count($fetchingUserRecords) . " of " . count($fetchingUserRecords) . " users";
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
              <th>Date Joined</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $fetchingUsers = $UsersObjEdit->fetching("users", "*", null, null);
            if (!empty($fetchingUsers)) {
              foreach ($fetchingUsers as $AllUsers) {
                $id = $AllUsers['id'];
                $formattedId = "USR-" . str_pad($id, 4, "0", STR_PAD_LEFT);
                $email = $AllUsers['email'];
                $role = $AllUsers['role'];
                $Date = $AllUsers['Date'];
            ?>

                <tr>
                  <td style="font-size: 13px;"><?= $formattedId ?></td>
                  <td><strong><?php
                              $fetchNames = $UsersObjEdit->fetching("profile", "*", null, "user_id = $id");
                              if (!empty($fetchNames)) {
                                $names = $fetchNames[0]['name'];
                                echo !empty($names) ? $names : "<p class='text-danger'>Profile Incompelete</p>";
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
                    $fetchStatus = $UsersObjEdit->fetching("profile", "*", null, "user_id = $id AND status = 'active'");
                    if (!empty($fetchStatus)) {
                      $status = $fetchNames[0]['status'];
                      echo "<span class='status-badge status-active'>Active</span>";
                    } else {
                      echo "<span class='status-badge status-inactive'>Inactive</span>";
                    }
                    ?>
                  </td>
                  <td><?= date("n/j/Y", strtotime($Date)); ?></td>
                  <td class="text-end">
                    <a href="index.php?UserID=<?= $id ?>&request=view&RequestFarward=EditUsers" class="action-btn text-decoration-none action-view" title="View"><i class="bi bi-eye"></i></a>
                    <?php
                    if ($role == 2) {
                      echo null;
                    } else {
                      echo "<a href='index.php?UserID=$id&request=edit&RequestFarward=EditUsers' class='action-btn text-decoration-none action-edit' title='Edit'><i class='bi bi-pencil'></i></a>";
                    }
                    ?>
                    <?php
                    if ($role == 2) {
                      echo null;
                    } else {
                      echo "<a href='index.php?UserID=$id&request=delete&RequestFarward=EditUsers' class='action-btn text-decoration-none action-delete' title='Delete'><i class='bi bi-trash'></i></a>";
                    }
                    ?>

                  </td>

                </tr>

            <?php
              } // loop ends here
            } // if ends here
            ?>

            <!-- You can copy rows for other users -->
          </tbody>

        </table>

      </div>
    </div>

    <?php
    if (isset($_GET['UserID']) && isset($_GET['request'])) {
      $UserID = $_GET['UserID'];
      $request = $_GET['request'];

      if ($request == 'view') {
    ?>
        <!-- Model Code -->
        <div class="container-fluid model_container">
          <div class="card card-custom p-4 w-100">
            <!-- Header -->
            <h4 class="mb-4">View User <p class="text-muted mt-2" style="font-size:13px;"><span class="text-danger fw-bold">Note: </span>This is a read-only preview of the user.</p>
            </h4>

            <!-- Form -->
            <form>
              <?php
              $fetchingUsers = $UsersObjEdit->fetching("users", "*", null, "id = $UserID");
              if (!empty($fetchingUsers)) {
                $email = $fetchingUsers[0]['email'];
                $ID = $fetchingUsers[0]['id'];
                $currentRole = $fetchingUsers[0]['role'];
                $Date = $fetchingUsers[0]['Date'];
                $formattedID = "USR-" . str_pad($ID, 4, "0", STR_PAD_LEFT);
                $fetchingName = $UsersObjEdit->fetching("profile", "*", null, "user_id = $UserID");
                if (!empty($fetchingName)) {
                  $name = $fetchingName[0]['name'];
                }
              }
              ?>
              <div class="row g-3 mb-3">
                <div class="col-md-3">
                  <label class="form-label">User ID</label>
                  <input type="text" class="form-control" value="<?= $formattedID ?>" disabled>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Full Name</label>
                  <input type="text" class="form-control" disabled value="<?= !empty($name) ? $name : null ?>">
                </div>
                <div class="col-md-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" disabled value="<?= $email ?>">
                </div>
                <div class="col-md-3">
                  <label class="form-label">Role</label>
                  <select class="form-select" disabled name="role">
                    <?php
                    if ($currentRole == 1) {
                      echo "<option value='1' selected>Editor</option>";
                      echo "<option value='0'>User</option>";
                    } else {
                      echo "<option value='1'>Editor</option>";
                      echo "<option value='0' selected>User</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <input type="hidden" value="<?= $UserID ?>" name="userID">

              <!-- Second Row - 4 Columns -->
              <div class="row g-3 mb-3">
                <div class="col-md-3">
                  <label class="form-label">Status</label>
                  <select class="form-select" disabled name="status">
                    <?php
                    if ($status == 'active') {
                      echo "<option value='active' selected>Active</option>";
                      echo "<option value='inactive'>Inactive</option>";
                    } else {
                      echo "<option value='active'>Active</option>";
                      echo "<option value='inactive' selected>Inactive</option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="col-md-3">
                  <!-- Extra field (can be reused if needed for future inputs/adsense placement) -->
                </div>
                <div class="col-md-3">
                  <!-- Extra field -->
                </div>
              </div>

              <!-- Footer Buttons -->
              <div class="d-flex justify-content-end gap-2 border-top pt-3">
                <a href="index.php?RequestFarward=EditUsers" class="btn text-decoration-none bg-warning text-dark btn-custom btn-cancel">
                  Return Back
                </a>
              </div>
            </form>
          </div>
        </div>
      <?php
      } else if ($request == 'edit') {
        echo "Edit User";
      ?>

        <!-- Model Code -->
        <div class="container-fluid model_container">

          <!-- Form -->
          <form action="index.php" method="POST">

            <div class="card card-custom p-4 w-100">
              <!-- Header -->
              <h4 class="mb-4">Edit User</h4>

              <input type="hidden" value="<?= $UserID ?>" name="userID">

              <?php
              $fetchingUsers = $UsersObjEdit->fetching("users", "*", null, "id = $UserID");
              if (!empty($fetchingUsers)) {
                $email = $fetchingUsers[0]['email'];
                $ID = $fetchingUsers[0]['id'];
                $currentRole = $fetchingUsers[0]['role'];
                $Date = $fetchingUsers[0]['Date'];
                $formattedID = "USR-" . str_pad($ID, 4, "0", STR_PAD_LEFT);
                $fetchingName = $UsersObjEdit->fetching("profile", "*", null, "user_id = $UserID");
                if (!empty($fetchingName)) {
                  $name = $fetchingName[0]['name'];
                  $status = $fetchingName[0]['status'];
                }
              }

              ?>

              <div class="row g-3 mb-3">
                <div class="col-md-3">
                  <label class="form-label">User ID</label>
                  <input type="text" class="form-control" disabled value="<?= $formattedID ?>">
                </div>
                <div class="col-md-3">
                  <label class="form-label">Full Name <span class="text-danger">*</span></label>
                  <input type="text" name="name" class="form-control" value="<?= !empty($name) ? $name : null ?>" required disabled>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Email <span class="text-danger">*</span></label>
                  <input type="email" name="email" class="form-control" value="<?= $email ?>" required disabled>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Role</label>
                  <select class="form-select" name="role">
                    <?php
                    if ($currentRole == 1) {
                      echo "<option value='1' selected>Editor</option>";
                      echo "<option value='0'>User</option>";
                    } else {
                      echo "<option value='1'>Editor</option>";
                      echo "<option value='0' selected>User</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <!-- Second Row - 4 Columns -->
              <div class="row g-3 mb-3">
                <div class="col-md-3">
                  <label class="form-label">Status</label>
                  <select class="form-select" name="status">
                    <?php
                    if ($status == 'active') {
                      echo "<option value='active' selected>Active</option>";
                      echo "<option value='inactive'>Inactive</option>";
                    } else {
                      echo "<option value='active'>Active</option>";
                      echo "<option value='inactive' selected>Inactive</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <!-- Extra field (can be reused if needed for future inputs/adsense placement) -->
                </div>
                <div class="col-md-3">
                  <!-- Extra field -->
                </div>
              </div>

              <!-- Footer Buttons -->
              <div class="d-flex justify-content-end gap-2 border-top pt-3">
                <a href="index.php?RequestFarward=EditUsers" class="btn text-decoration-none btn-outline-secondary btn-custom btn-cancel">Cancel</a>
                <input type="submit" name="submit_record" class="btn btn-save btn-custom"></input>
              </div>
            </div>
          </form>
        </div>
      <?php
      } else if ($request == 'delete') {
      ?>
        <!-- Model Code -->
        <div class="container-fluid model_container">
          <!-- Form -->
          <form action="index.php" method="POST">

            <div class="card card-custom p-4 w-100">
              <!-- Header -->
              <h4 class="mb-4">Delete User<p class="text-muted mt-2" style="font-size:13px;"><span class="text-danger fw-bold">Note: </span>Are you sure you want to delete this user? This action cannot be undone.</p>
              </h4>

              <input type="hidden" value="<?= $UserID ?>" name="userID">

              <?php
              $fetchingUsers = $UsersObjEdit->fetching("users", "*", null, "id = $UserID");
              if (!empty($fetchingUsers)) {
                $email = $fetchingUsers[0]['email'];
                $ID = $fetchingUsers[0]['id'];
                $currentRole = $fetchingUsers[0]['role'];
                $Date = $fetchingUsers[0]['Date'];
                $formattedID = "USR-" . str_pad($ID, 4, "0", STR_PAD_LEFT);
                $fetchingName = $UsersObjEdit->fetching("profile", "*", null, "user_id = $UserID");
                if (!empty($fetchingName)) {
                  $name = $fetchingName[0]['name'];
                  $status = $fetchingName[0]['status'];
                }
              }

              ?>

              <div class="row g-3 mb-3">
                <div class="col-md-3">
                  <label class="form-label">User ID</label>
                  <input type="text" class="form-control" disabled value="<?= $formattedID ?>">
                </div>
                <div class="col-md-3">
                  <label class="form-label">Full Name <span class="text-danger">*</span></label>
                  <input type="text" name="name" class="form-control" value="<?= !empty($name) ? $name : null ?>" required disabled>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Email <span class="text-danger">*</span></label>
                  <input type="email" name="email" class="form-control" value="<?= $email ?>" required disabled>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Role</label>
                  <select class="form-select" name="role">
                    <?php
                    if ($currentRole == 1) {
                      echo "<option value='1' selected>Editor</option>";
                      echo "<option value='0'>User</option>";
                    } else {
                      echo "<option value='1'>Editor</option>";
                      echo "<option value='0' selected>User</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <!-- Second Row - 4 Columns -->
              <div class="row g-3 mb-3">
                <div class="col-md-3">
                  <label class="form-label">Status</label>
                  <select class="form-select" name="status">
                    <?php
                    if ($status == 'active') {
                      echo "<option value='active' selected>Active</option>";
                      echo "<option value='inactive'>Inactive</option>";
                    } else {
                      echo "<option value='active'>Active</option>";
                      echo "<option value='inactive' selected>Inactive</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <!-- Extra field (can be reused if needed for future inputs/adsense placement) -->
                </div>
                <div class="col-md-3">
                  <!-- Extra field -->
                </div>
              </div>

              <!-- Footer Buttons -->
              <div class="d-flex justify-content-end gap-2 border-top pt-3">
                <a href="index.php?RequestFarward=EditUsers" class="btn text-decoration-none btn-custom btn-warning">Return Back</a>
                <input type="submit" name="delete_record" class="btn btn-danger btn-custom" value="Confirm Delete"></input>
              </div>
            </div>
          </form>
        </div>
    <?php
      } else {
        echo null;
      }
    }
    ?>

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