<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Details</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/request_detials.css">

</head>
<body>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>