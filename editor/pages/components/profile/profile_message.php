<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Profile | Editor Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../editor/css/profile_message.css">
</head>

<body>

    <?php
    if (isset($_GET['profile_id'])) {
    ?>
        <!-- profile seaction -->
        <div class="profile-container">
            <h2 class="profile-title">Editor Profile</h2>

            <form action="../editor/pages/components/profile/profile_manage.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <!-- Profile Picture Section -->
                    <div class="col-md-3">
                        <div class="profile-picture-container">
                            <label class="form-label">Profile Picture</label>
                            <div class="profile-picture" id="profilePicture">
                                <i class="fas fa-camera"></i>
                            </div>
                            <input type="file" id="profileImageInput" name="profile_image" accept="image/*" style="display: none;">
                            <button type="button" class="choose-image-btn" onclick="document.getElementById('profileImageInput').click();">
                                <i class="fas fa-upload me-2"></i>Choose Image
                            </button>
                        </div>
                    </div>

                    <!-- Form Fields Section -->
                    <div class="col-md-9">
                        <div class="row g-3">
                            <!-- Full Name -->
                            <div class="col-md-4">
                                <label class="form-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" name="full_name" class="form-control" placeholder="Enter your full name" required>
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-4">
                                <label class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                    <input type="tel" name="phone_number" class="form-control" placeholder="+92 300 1234567" required>
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="col-md-4">
                                <label class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    
                                    <?php
                                    $logID = $_GET['profile_id'];
                                    echo "<input type='hidden' value='$logID' name='user_id'>";
                                    $profileObj = new backend();
                                    $fetchingProfileStatus = $profileObj->fetching("users", "*", null, "id = $logID");
                                    if (!empty($fetchingProfileStatus)) {
                                        $fetchingProfileStatus = $fetchingProfileStatus[0]['email'];
                                    }
                                    ?>
                                    <input type="email" name="email_address" class="form-control" value="<?= $fetchingProfileStatus ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-end gap-2 btn-group-mobile">
                            <button type="button" class="btn-cancel btn-sm" onclick="resetForm();">Cancel</button>
                            <button type="submit" name="editor_profile_submit" class="btn-save btn-sm ms-3">Save Profile</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- profile seaction ends -->

    <?php
    } else {
        echo null;
    }
    ?>


    <div class="main_container">
        <div class="header">
            <i class="fas fa-user-edit"></i>
            <h1>Profile Incomplete</h1>
            <p>Editor Account Detected</p>
        </div>

        <div class="content">
            <div class="message">
                <h2 class="text-danger fw-bold"><i class="fas fa-exclamation-circle text-danger"></i> Attention Required</h2>
                <p>It seems your profile is not completed. Please complete your profile first before exploring the dashboard.</p>
            </div>

            <div class="profile-status">
                <div class="status-item complete">
                    <i class="fas fa-check-circle"></i>
                    <span>Account Created</span>
                </div>
                <div class="status-item incomplete">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Profile Incomplete</span>
                </div>
            </div>

            <p class="action-info">Click the button below to complete your profile</p>
            <?php
            $log_id = $_SESSION['id'];
            ?>
            <a href="index.php?profile_id=<?= $log_id ?>" class="btn">
                <i class="fas fa-user-edit"></i> Complete Profile Now
            </a>

            <div class="footer">
                <div class="footer-item">
                    <i class="fas fa-lock"></i>
                    <span>Secure Connection</span>
                </div>
                <div class="footer-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Encrypted Session</span>
                </div>
                <div class="footer-item">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Protected Dashboard</span>
                </div>
            </div>
        </div>
    </div>



</body>
<script>
    // Handle image preview when file is selected
    document.getElementById('profileImageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const profilePicture = document.getElementById('profilePicture');
                profilePicture.innerHTML = `<img src="${e.target.result}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">`;
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle cancel button - reset form
    function resetForm() {
        // Reset the form
        document.querySelector('form').reset();

        // Reset profile picture
        document.getElementById('profilePicture').innerHTML = '<i class="fas fa-camera"></i>';
    }
</script>

</html>