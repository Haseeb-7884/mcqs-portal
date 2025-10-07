<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Submission - MCQ Management System</title>
    <meta name="description" content="Edit and update your MCQ submission questions, options, and correct answers">
    <meta name="keywords" content="MCQ, edit, submission, questions, answers, quiz">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/edit_questions.css">
    
</head>
<body>
    <div class="main-container">
        <div class="main-content">
            <div class="header-section">
                <div>
                    <a href="../pages/editor_routes.php" class="back-btn">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <h1 class="page-title">
                        <i class="fas fa-edit"></i> Edit Submission
                    </h1>
                    <p class="page-subtitle">Update questions, options, and correct answers for your MCQ set</p>
                </div>
                <div class="unsaved-changes">
                    <i class="fas fa-exclamation-triangle"></i>
                    Unsaved changes
                </div>
            </div>
            
            <div class="submission-details">
                <h2 class="section-title">
                    <i class="fas fa-info-circle"></i> Submission Details
                </h2>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="setId" class="form-label">Set ID</label>
                        <input type="text" class="form-control set-id-input" id="setId" value="SET-0005" readonly>
                        <small class="text-muted">This field cannot be modified</small>
                    </div>
                    <div class="col-md-4">
                        <label for="mainCategory" class="form-label">Main Category</label>
                        <select class="form-select" id="mainCategory">
                            <option value="Mathematics" selected>Mathematics</option>
                            <option value="Science">Science</option>
                            <option value="English">English</option>
                            <option value="History">History</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="subCategory" class="form-label">Sub Category</label>
                        <select class="form-select" id="subCategory">
                            <option value="Algebra" selected>Algebra</option>
                            <option value="Geometry">Geometry</option>
                            <option value="Calculus">Calculus</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3 class="h5 mb-0">MCQ Questions (5)</h3>
                <a href="#" class="add-field-btn">
                    Click on any field to edit
                </a>
            </div>
            
            <!-- Question 1 -->
            <div class="mcq-section">
                <div class="question-header">
                    <span class="question-number">Q1</span>
                </div>
                <label class="question-statement-label">Question Statement</label>
                <textarea class="question-statement" placeholder="Enter your question here...">What is the value of x in the equation 2x + 5 = 15?</textarea>
                
                <div class="options-grid">
                    <div class="option-item">
                        <input type="radio" name="q1_correct" value="A" class="option-radio">
                        <label class="option-label">Option A</label>
                        <input type="text" class="option-input" value="90">
                    </div>
                    <div class="option-item correct-answer">
                        <input type="radio" name="q1_correct" value="B" class="option-radio" checked>
                        <label class="option-label">Option B</label>
                        <input type="text" class="option-input" value="15">
                    </div>
                    <div class="option-item">
                        <input type="radio" name="q1_correct" value="C" class="option-radio">
                        <label class="option-label">Option C</label>
                        <input type="text" class="option-input" value="7.5">
                    </div>
                    <div class="option-item">
                        <input type="radio" name="q1_correct" value="D" class="option-radio">
                        <label class="option-label">Option D</label>
                        <input type="text" class="option-input" value="3">
                    </div>
                </div>
                <div class="correct-answer-indicator">
                    <i class="fas fa-check"></i> Correct Answer: Option B
                </div>
            </div>
            
            <!-- Question 2 -->
            <div class="mcq-section">
                <div class="question-header">
                    <span class="question-number">Q2</span>
                </div>
                <label class="question-statement-label">Question Statement</label>
                <textarea class="question-statement" placeholder="Enter your question here...">Which of the following is a quadratic equation?</textarea>
                
                <div class="options-grid">
                    <div class="option-item">
                        <input type="radio" name="q2_correct" value="A" class="option-radio">
                        <label class="option-label">Option A</label>
                        <input type="text" class="option-input" value="x + 2 = 0">
                    </div>
                    <div class="option-item">
                        <input type="radio" name="q2_correct" value="B" class="option-radio">
                        <label class="option-label">Option B</label>
                        <input type="text" class="option-input" value="x² + 3x + 2 = 0">
                    </div>
                    <div class="option-item correct-answer">
                        <input type="radio" name="q2_correct" value="C" class="option-radio" checked>
                        <label class="option-label">Option C</label>
                        <input type="text" class="option-input" value="x³ + x = 0">
                    </div>
                    <div class="option-item">
                        <input type="radio" name="q2_correct" value="D" class="option-radio">
                        <label class="option-label">Option D</label>
                        <input type="text" class="option-input" value="2x = 8">
                    </div>
                </div>
                <div class="correct-answer-indicator">
                    <i class="fas fa-check"></i> Correct Answer: Option C
                </div>
            </div>
            
            <!-- Question 3 -->
            <div class="mcq-section">
                <div class="question-header">
                    <span class="question-number">Q3</span>
                </div>
                <label class="question-statement-label">Question Statement</label>
                <textarea class="question-statement" placeholder="Enter your question here...">What is the slope of the line y = 3x + 7?</textarea>
                
                <div class="options-grid">
                    <div class="option-item correct-answer">
                        <input type="radio" name="q3_correct" value="A" class="option-radio" checked>
                        <label class="option-label">Option A</label>
                        <input type="text" class="option-input" value="3">
                    </div>
                    <div class="option-item">
                        <input type="radio" name="q3_correct" value="B" class="option-radio">
                        <label class="option-label">Option B</label>
                        <input type="text" class="option-input" value="7">
                    </div>
                    <div class="option-item">
                        <input type="radio" name="q3_correct" value="C" class="option-radio">
                        <label class="option-label">Option C</label>
                        <input type="text" class="option-input" value="10">
                    </div>
                    <div class="option-item">
                        <input type="radio" name="q3_correct" value="D" class="option-radio">
                        <label class="option-label">Option D</label>
                        <input type="text" class="option-input" value="1">
                    </div>
                </div>
                <div class="correct-answer-indicator">
                    <i class="fas fa-check"></i> Correct Answer: Option A
                </div>
            </div>
            
            <!-- Question 4 -->
            <div class="mcq-section">
                <div class="question-header">
                    <span class="question-number">Q4</span>
                </div>
                <label class="question-statement-label">Question Statement</label>
                <textarea class="question-statement" placeholder="Enter your question here...">Solve for y: dy = 8 = 12</textarea>
                
                <div class="options-grid">
                    <div class="option-item">
                        <input type="radio" name="q4_correct" value="A" class="option-radio">
                        <label class="option-label">Option A</label>
                        <input type="text" class="option-input" value="2">
                    </div>
                    <div class="option-item">
                        <input type="radio" name="q4_correct" value="B" class="option-radio">
                        <label class="option-label">Option B</label>
                        <input type="text" class="option-input" value="4">
                    </div>
                    <div class="option-item correct-answer">
                        <input type="radio" name="q4_correct" value="C" class="option-radio" checked>
                        <label class="option-label">Option C</label>
                        <input type="text" class="option-input" value="20">
                    </div>
                    <div class="option-item">
                        <input type="radio" name="q4_correct" value="D" class="option-radio">
                        <label class="option-label">Option D</label>
                        <input type="text" class="option-input" value="6">
                    </div>
                </div>
                <div class="correct-answer-indicator">
                    <i class="fas fa-check"></i> Correct Answer: Option C
                </div>
            </div>
            
            <!-- Question 5 -->
            <div class="mcq-section">
                <div class="question-header">
                    <span class="question-number">Q5</span>
                </div>
                <label class="question-statement-label">Question Statement</label>
                <textarea class="question-statement" placeholder="Enter your question here...">What is the factored form of x² - 9?</textarea>
                
                <div class="options-grid">
                    <div class="option-item">
                        <input type="radio" name="q5_correct" value="A" class="option-radio">
                        <label class="option-label">Option A</label>
                        <input type="text" class="option-input" value="(x - 3)(x - 3)">
                    </div>
                    <div class="option-item">
                        <input type="radio" name="q5_correct" value="B" class="option-radio">
                        <label class="option-label">Option B</label>
                        <input type="text" class="option-input" value="(x + 3)(x + 3)">
                    </div>
                    <div class="option-item correct-answer">
                        <input type="radio" name="q5_correct" value="C" class="option-radio" checked>
                        <label class="option-label">Option C</label>
                        <input type="text" class="option-input" value="(x - 3)(x + 3)">
                    </div>
                    <div class="option-item">
                        <input type="radio" name="q5_correct" value="D" class="option-radio">
                        <label class="option-label">Option D</label>
                        <input type="text" class="option-input" value="(3x - 9)">
                    </div>
                </div>
                <div class="correct-answer-indicator">
                    <i class="fas fa-check"></i> Correct Answer: Option C
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-actions">
        <div class="warning-message">
            You have unsaved changes! Don't forget to save.
        </div>
        <div class="action-buttons">
            <a href="#" class="btn-cancel">Cancel</a>
            <button type="button" class="btn-save" onclick="saveChanges()">
                <i class="fas fa-save"></i>
                Save Changes
            </button>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="../js/edit_mcqs.js"></script>

</body>
</html>