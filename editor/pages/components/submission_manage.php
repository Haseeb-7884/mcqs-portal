<?php
include("../../../includes/connection.php");
if (isset($_SESSION['id'])) {

    if (isset($_POST['submit-form'])) {

        $editorID = $_SESSION['id'];
        date_default_timezone_set('Asia/Karachi');
        $current_datetime = date('Y-m-d H:i:s');

        $category_id = $_POST['category_id'];
        $subcategory_id = $_POST['subcategory_id'];
        $topic_id = $_POST['topic_id'];
        $numMCQs = $_POST['numMCQs'];
        $setID = $_POST['setID'];
        $numMCQs = $_POST['numMCQs'];

        $insert_obj = new backend();

        $AddSubmission = $insert_obj->insertion(
            "submissions",
            array(
                "SystemID" => $setID,
                "category_id" => $category_id,
                "editor_id" => $editorID,
                "sub_category_id" => $subcategory_id,
                "topic_id" => $topic_id,
                "totalMcqs" => $numMCQs,
                "Date" => $current_datetime,
                "status" => "pending",
            )
        );

        if (!empty($AddSubmission)) {
            $lastInsertedID = $insert_obj->getLastInsertedId();
            header("location: ../add_mcqs.php?setID=$lastInsertedID&numMCQs=$numMCQs");
        } else {
            echo "Failed in fetching";
        }
    }

    // 
    if (isset($_POST['questionSubmit'])) {
        $setID = $_POST['setID'];
        $numMCQs = $_POST['numMCQs'];
        $questionStatement = $_POST['questionStatement'];
        $optionA = $_POST['optionA'];
        $optionB = $_POST['optionB'];
        $optionC = $_POST['optionC'];
        $optionD = $_POST['optionD'];
        $correctAnswer = $_POST['correctAnswer'];

        $AddStatement = new backend();

        $fetcingID = $AddStatement->fetching("submissions", "*", null, "id = $setID");
        if (!empty($fetcingID)) {
            
            $fetched_set_id = $fetcingID[0]['id'];

            $AddOptions = $AddStatement->insertion("options", array(
                "A" => $optionA,
                "B" => $optionB,
                "C" => $optionC,
                "D" => $optionD,
                "correct_option" => $correctAnswer
            ));

            if (!empty($AddOptions)) {
                $InsertedOptionID = $AddStatement->getLastInsertedId();

                $AddQuestion = $AddStatement->insertion("mcqs", array(
                    "QuestionText"=>$questionStatement,
                    "set_id"=>$fetched_set_id,
                    "options_id"=>$InsertedOptionID
                ));

                if (!empty($AddQuestion)) {
                    header("location: ../add_mcqs.php?setID=$setID&numMCQs=$numMCQs");
                }
            }
        } // fetchingSetID if ends here 

    } else {
        echo "Return to the submissions page";
        // header("location: ../add_submission.php");
    }

    // 
    if(isset($_POST['finalSubmit'])){
        $setID = $_POST['setID'];
        $numMCQs = $_POST['numMCQs'];
        $questionStatement = $_POST['questionStatement'];
        $optionA = $_POST['optionA'];
        $optionB = $_POST['optionB'];
        $optionC = $_POST['optionC'];
        $optionD = $_POST['optionD'];
        $correctAnswer = $_POST['correctAnswer'];

        $AddStatement = new backend();

        $fetcingID = $AddStatement->fetching("submissions", "*", null, "id = $setID");
        if (!empty($fetcingID)) {
            
            $fetched_set_id = $fetcingID[0]['id'];

            $AddOptions = $AddStatement->insertion("options", array(
                "A" => $optionA,
                "B" => $optionB,
                "C" => $optionC,
                "D" => $optionD,
                "correct_option" => $correctAnswer
            ));

            if (!empty($AddOptions)) {
                $InsertedOptionID = $AddStatement->getLastInsertedId();

                $AddQuestion = $AddStatement->insertion("mcqs", array(
                    "QuestionText"=>$questionStatement,
                    "set_id"=>$fetched_set_id,
                    "options_id"=>$InsertedOptionID
                ));

                if (!empty($AddQuestion)) {
                    header("location: ../add_mcqs.php?setID=$setID&numMCQs=$numMCQs");
                }
            }
        } // fetchingSetID if ends here 
    }

} else {
    header("location: ../../../website/modules/login/login.php");
}
?>