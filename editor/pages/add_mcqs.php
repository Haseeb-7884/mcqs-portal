<?php
include("../../includes/connection.php");
if (isset($_GET['setID']) || isset($_GET['status'])) {
    $QuestionObj = new backend();
    $setID = $_GET['setID'];
    $numMCQs = $_GET['numMCQs'];
    $fetchedStatus = !empty($_GET['status']) ? $_GET['status'] : null;
    if ($numMCQs == 0 || empty($numMCQs) || $numMCQs == -1) {
        // here have to redirect to a page when all submissions are added and limit get okay
        echo "All MCQs have been added Successfully";
    } // have to paste above 
    else {
?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>MCQ Questions Form</title>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
            <link rel="stylesheet" href="../css/add_mcqs.css">
        </head>

        <body>

            <div class="main-container">

            <form action="components/submission_manage.php" method="POST" enctype="multipart/form-data">

                <!-- Header Section -->
                <div class="header-section">
                    <h1 class="header-title">
                        <i class="fas fa-list-ul header-icon"></i>
                        <?php 
                        $fetcingSet = $QuestionObj->fetching("submissions","*",null,"id = '$setID'");
                        if(!empty($fetcingSet)){
                            $MCQsNumber = $fetcingSet[0]['totalMcqs'];
                            echo "MCQ Questions ($MCQsNumber)";
                        }
                        ?>
                    </h1>
                </div>

                    <!-- Question Card -->
                    <div class="question-card">
                        <!-- Question Header -->
                        <div class="question-header">
                            <h2 class="question-title">Question
                                <?php  
                                    $updatedNumber = $numMCQs - 1;
                                    $finalNum = $MCQsNumber - $updatedNumber;
                                    $updatdNum = $updatedNumber;
                                    if($finalNum == 0){
                                        echo $MCQsNumber;
                                    }else{
                                        echo $finalNum;
                                    }                                    
                                ?>
                            </h2>
                            <span class="mcq-badge">MCQ #<?php  
                                    $updatedNumber = $numMCQs - 1;
                                    $finalNum = $MCQsNumber - $updatedNumber;
                                    $updatdNum = $updatedNumber;
                                    if($finalNum == 0){
                                        echo $MCQsNumber;
                                    }else{
                                        echo $finalNum;
                                    }                                    
                                ?></span>
                        </div>

                        <input type="hidden" name="numMCQs" value="<?= $updatdNum ?>">
                        <input type="hidden" name="setID" value="<?= $setID ?>">

                        <!-- Question Statement -->
                        <div class="mb-4">
                            <label for="questionStatement" class="form-label">
                                Question Statement
                                <span class="required-asterisk">*</span>
                            </label>
                            <div class="textarea-wrapper">
                                <textarea name="questionStatement"
                                    class="form-control question-textarea"
                                    id="questionStatement"
                                    placeholder="Enter your question here..."
                                    required></textarea>
                                <i class="fas fa-check-circle textarea-icon"></i>
                            </div>
                        </div>

                        <!-- Options Row -->
                        <div class="options-row">
                            <div class="row">
                                <!-- Option A -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="option-group">
                                        <label for="optionA" class="form-label">
                                            Option A
                                            <span class="required-asterisk">*</span>
                                        </label>
                                        <input name="optionA"
                                            type="text"
                                            class="form-control"
                                            id="optionA"
                                            placeholder="Option A"
                                            required>
                                    </div>
                                </div>

                                <!-- Option B -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="option-group">
                                        <label for="optionB" class="form-label">
                                            Option B
                                            <span class="required-asterisk">*</span>
                                        </label>
                                        <input
                                            type="text" name="optionB"
                                            class="form-control"
                                            id="optionB"
                                            placeholder="Option B"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Option C -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="option-group">
                                        <label for="optionC" class="form-label">
                                            Option C
                                            <span class="required-asterisk">*</span>
                                        </label>
                                        <input
                                            type="text" name="optionC"
                                            class="form-control"
                                            id="optionC"
                                            placeholder="Option C"
                                            required>
                                    </div>
                                </div>

                                <!-- Option D -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="option-group">
                                        <label for="optionD" class="form-label">
                                            Option D
                                            <span class="required-asterisk">*</span>
                                        </label>
                                        <input
                                            type="text" name="optionD"
                                            class="form-control"
                                            id="optionD"
                                            placeholder="Option D"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Correct Answer Section -->
                        <div class="correct-answer-section">
                            <label class="form-label">
                                Correct Answer
                                <span class="required-asterisk">*</span>
                            </label>
                            <div class="radio-group">
                                <div class="radio-item">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="correctAnswer"
                                        id="correctA"
                                        value="A">
                                    <label class="form-check-label" for="correctA">
                                        Option A
                                    </label>
                                </div>
                                <div class="radio-item">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="correctAnswer"
                                        id="correctB"
                                        value="B">
                                    <label class="form-check-label" for="correctB">
                                        Option B
                                    </label>
                                </div>
                                <div class="radio-item">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="correctAnswer"
                                        id="correctC"
                                        value="C">
                                    <label class="form-check-label" for="correctC">
                                        Option C
                                    </label>
                                </div>
                                <div class="radio-item">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="correctAnswer"
                                        id="correctD"
                                        value="D">
                                    <label class="form-check-label" for="correctD">
                                        Option D
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Section -->
                    <?php
                    if ($numMCQs == 1) {
                    ?>
                        <div class="submit-section">
                            <button type="submit" name="finalSubmit" class="submit-btn">
                                <i class="fas fa-paper-plane"></i>
                                Submit All MCQs
                            </button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="submit-section">
                            <button type="submit" name="questionSubmit" class="submit-btn procede-btn">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                Procede With Next Submission
                            </button>
                        </div>
                    <?php
                    }
                    ?>
                </form>

            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>

<?php
    }
}
?>