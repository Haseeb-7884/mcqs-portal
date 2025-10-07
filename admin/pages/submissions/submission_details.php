<?php
include("../../../includes/connection.php");
$SubmissionObject = new backend();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript Quiz Interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/submissions_detials.css">
</head>

<body>
    <div class="quiz-container">
        <!-- Submission Details Header -->
        <div class="submission-header">
            <h2>Submission Details</h2>
            <div class="detail-row">
                <?php
                if (isset($_GET['id'])) {
                    $Submit_id = $_GET['id'];
                }
                $fetchSubmit = $SubmissionObject->fetching("submissions", "*", null, "id = $Submit_id");
                if (!empty($fetchSubmit)) {
                    $SystemID = $fetchSubmit[0]['SystemID'];
                    $categoryID = $fetchSubmit[0]['category_id'];
                    $topic_id = $fetchSubmit[0]['topic_id'];
                    $editor_id = $fetchSubmit[0]['editor_id'];
                }
                ?>
                <div class="detail-item">
                    <div class="detail-label">Category</div>
                    <div class="detail-value">
                        <?php
                        $fetchCategory = $SubmissionObject->fetching("categories", "*", null, "id = $categoryID");
                        if (!empty($fetchCategory)) {
                            $categoryName = $fetchCategory[0]['category_name'];
                            echo $categoryName;
                        } else {
                            echo null;
                        }
                        ?>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Subcategory</div>
                    <div class="detail-value">
                        <?php
                        $fetchSubCategory = $SubmissionObject->fetching("sub_categories", "*", null, "category_id = $categoryID");
                        if (!empty($fetchSubCategory)) {
                            $fetchSubCategory = $fetchSubCategory[0]['sub_category_name'];
                            echo $fetchSubCategory;
                        } else {
                            echo null;
                        }
                        ?>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Topic</div>
                    <div class="detail-value">
                        <?php
                        $fetchTopic = $SubmissionObject->fetching("topics", "*", null, "id = $topic_id");
                        if (!empty($fetchTopic)) {
                            $fetchtopic = $fetchTopic[0]['topic_name'];
                            echo $fetchtopic;
                        } else {
                            echo null;
                        }
                        ?>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Set ID</div>
                    <div class="detail-value"><?= $SystemID ?></div>
                </div>
            </div>
        </div>

        <?php
        // $Submit_id
        $fetchQuestions = $SubmissionObject->fetching("mcqs", "*", null, "set_id = $Submit_id");
        if (!empty($fetchQuestions)) {
            $TotalMCQs = count($fetchQuestions);
        ?>
            <!-- Questions Section -->
            <div class="questions-section">
                <h3 class="section-title">Multiple Choice Questions (<?= $TotalMCQs ?>)</h3>

                <?php
                $counter = 1;
                foreach ($fetchQuestions as $AllQuestions) {
                    $QuestionText = $AllQuestions['QuestionText'];
                    $options_id = $AllQuestions['options_id'];

                    $fetchingOptions = $SubmissionObject->fetching("options", "*", null, "id = $options_id");
                    if(!empty($fetchingOptions)){
                        foreach($fetchingOptions as $options){
                            $A = $options['A'];
                            $B = $options['B'];
                            $C = $options['C'];
                            $D = $options['D'];
                            $correct_option = $options['correct_option'];
?>
                    <div class="question-card">
                        <div class="question-header">
                            <div class="question-number"><?= $counter . "<br>" ?></div>
                            <div class="question-text"><?=$QuestionText?></div>
                        </div>
                        <div class="options-grid">
                            <div class="option-item">
                                <span class="option-label">A</span>
                                <span class="option-text"><?=$A?></span>
                            </div>
                            <div class="option-item">
                                <span class="option-label">B</span>
                                <span class="option-text"><?=$B?></span>
                            </div>
                            <div class="option-item">
                                <span class="option-label">C</span>
                                <span class="option-text"><?=$C?></span>
                            </div>
                            <div class="option-item">
                                <span class="option-label">D</span>
                                <span class="option-text"><?=$D?></span>
                            </div>
                        </div>
                        <div class="correct-answer">Correct Answer: <span>
                            <?php 
                            if($correct_option == "A"){
                                echo "A";
                            }elseif($correct_option == "B"){
                                echo "B";
                            }elseif($correct_option == "C"){
                                echo "C";
                            }elseif($correct_option == "D"){
                                echo "D";
                            }
                            ?>
                        </span></div>
                    </div>
                    <?php                             
                        } // optinons foreach ends here
                    }
                ?>
                <?php
                $counter++;
                } // foreach ends here
                ?>
            </div>
        <?php
        }
        ?>

    </div>

    <!-- Fixed Action Buttons -->   
    <div class="action-buttons">
        <a href="../../index.php?RequestFarward=ManageSubmissions" class="btn-return text-decoration-none">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 12L6 8l4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Return Back
        </a>
        <div class="action-buttons-right">
            <a href="../../index.php?submission=declined" class="btn-decline text-decoration-none">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4L4 12M4 4l8 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
                Decline
            </a>
            <a href="../../index.php?submission=approved" class="btn-approve text-decoration-none">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 4L6 11l-3-3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Approve
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>