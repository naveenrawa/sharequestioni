<?php

include('common_function.php');

if (isset($_POST['formvalue'])) {

    //$timer = $_POST['GeTtime'];
    $offset = $_POST['formvalue'];
    $conn = dbconnect();
    //$sid = $_SESSION["sid"];
    //$_SESSION['gettimer'] = $timer;
    $sql1 = mysqli_query($conn, "SELECT qu.id,qu.question,qu.option_a,qu.option_b,qu.option_c,qu.option_d FROM quiz as qu LIMIT 1 offset $offset");

    //$query = mysqli_query($conn, "SELECT count(qu.id) as total,st.student_name FROM questions as qu join student_detail as st on qu.subject=st.subject where st.id=$sid ");

    $row = mysqli_fetch_assoc($sql1);
    //echo "<pre>";print_r($row);echo "</pre>";die;
    if ($row['id'] == '') {
        echo "<input type='hidden' value='finish' id='finish_value'>";
    }
    $currentquid = $offset + 1;
    $flag = 0;

    if (!empty($_SESSION['value'])) {
        if ($_SESSION['value'] > $currentquid) {
            //echo "<input type='hidden' value='redirect' id='redirect_page'>";
            //exit();
        }
    }
    $_SESSION['value'] = $currentquid;
    //$flage = $get['student_name'];
    ?>
    <p class="font-large">Question <?php //echo $currentquid . ' of ' . $get['total']; ?></p>
    <p class="questions"><span class="question_number"><?php echo $currentquid; ?>.</span>
        <label><?php echo $row['question']; ?></label>
    </p>
    <div class="question-block">
        <ul>
            <li>
                <input type="radio" value="<?php echo $row['option_a']; ?>" name="radiog_lite" id="answer1" class="css-checkbox radio_btn" />
                <label for="answer1" class="css-label radGroup1">
                    <?php echo $row['option_a']; ?>
                </label>
            </li>
            <li>
                <input type="radio" value="<?php echo $row['option_b']; ?>" name="radiog_lite" id="answer2" class="css-checkbox radio_btn"  />
                <label for="answer2" class="css-label radGroup1">
                    <?php echo $row['option_b']; ?>
                </label>
            </li>
            <?php if ($row['option_c']) { ?>
                <li>
                    <input type="radio" value="<?php echo $row['option_c']; ?>" name="radiog_lite" id="answer3" class="css-checkbox radio_btn" />
                    <label for="answer3" class="css-label radGroup1">
                        <?php echo $row['option_c']; ?>
                    </label>
                </li>

                <li>
                    <input type="radio" value="<?php echo $row['option_d']; ?>" name="radiog_lite" id="answer4" class="css-checkbox radio_btn" />
                    <label for="answer4" class="css-label radGroup1">
                        <?php echo $row['option_d']; ?>
                    </label>
                </li>
            <?php } ?>
            <input type="hidden" value="<?php echo $row['id']; ?>" id="qid">
        </ul>
    </div>
    <?php

    if (isset($_POST['SaveAns'])) {
    //$conn = dbconnect();

        $qid = $_POST['SaveQuid'];
        $sid = $_SESSION['uname'];
        $uid = $_SESSION['uid'];
        
        $rev_id=!empty($_SESSION['frid'])?encrypt_decrypt($_SESSION['frid'],"decrypt"):'0';
        $SaveAnswer = $_POST['SaveAns'];
    
        //echo "select id from student_report where user_id=$uid and qu_id=$qid and review_id=0";
        $CheckQuery = mysqli_query($conn, "select id from student_report where user_id=$uid and qu_id=$qid and review_id=0");
        $frow = mysqli_fetch_assoc($CheckQuery);
        $getid = isset($frow['id'])?$frow['id']:'';
        //echo $getid."-----".$rev_id;
        if (empty($getid) && $rev_id==0) {
            if(!checkDuplicate($uid,$qid,$rev_id)){
                $insert = mysqli_query($conn, "insert into student_report(user_id,qu_id,student_answer,review_id)value('$uid','$qid','$SaveAnswer','$rev_id')");
            }
        }elseif(empty($getid) && $rev_id!=0){
            if(!checkDuplicate($uid,$qid,$rev_id)){
                $insert = mysqli_query($conn, "insert into student_report(user_id,qu_id,student_answer,review_id)value('$uid','$qid','$SaveAnswer','$rev_id')");
            }
        }
    }
    exit();
}
