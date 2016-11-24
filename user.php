<?php
/**
 * TrainingDragon
 *
 * PHP course project
 * url: /admin/user.php
 */


########   HERE SOME PHP SCRIPTING FOR THE PAGE    #########
include("../includes/utilities.php");
include("../includes/auth.php");

if(is_logged_in()) {

    ## make sure the form has been submitted
    if (isset($_POST['submit'])) {
        //trace($_POST);

        //store form data into vars
        $uName      = $_POST['uName'];
        $uLast      = $_POST['uLast'];
        $uEmail     = $_POST['uEmail'];

        //validating new password
        if (isset($_POST['uPsw']) && $_POST['uPsw'] != '') {
            $uPsw = $_POST['uPsw'];
            $uEncPsw = sha1($_POST['uPsw']);
        }

        $uAddr1     = $_POST['uAddr1'];
        $uAddr2     = $_POST['uAddr2'];
        $uCode      = $_POST['uCode'];
        $uCity      = $_POST['uCity'];
        $uCountry   = $_POST['uCountry'];
        $uPhone     = $_POST['uPhone'];

        #### detecting add / edit mode
        if (is_edit_mode()) {
            //EDIT MODE
            $e_id = (int)$_GET['e_id'];
            $eq = "
				UPDATE
					`" . DBN . "`.`user`
				SET
					`user`.`uName`      = '$uName',
					`user`.`uLast`      = '$uLast',
					`user`.`uEmail`     = '$uEmail',
				";
            //updating password only if a new one has been submitted
            if (isset($uEncPsw)) {
                $eq .= "
					`user`.`uPsw`   = '$uEncPsw',
					";
            }
            $eq .= "
					`user`.`uAddr1`     = '$uAddr1',
					`user`.`uAddr2`     = '$uAddr2',
					`user`.`uCode`      = '$uCode',
					`user`.`uCity`      = '$uCity',
					`user`.`uCountry`   = '$uCountry',
					`user`.`uPhone`     = '$uPhone'
				WHERE
					`user`.`uID`        = '$e_id'
			";
            //echo $eq;
            $eRes = $mysqli->query($eq);
            if ($mysqli->affected_rows === 1) {
                //edited
                displayMsg('User successfully edited.', 's');
            } else {
                //fail
                displayMsg('Could not edit user or user not modified', 'f');
            }//end check
        } else {
            //ADD MODE
            $aq = "
				INSERT INTO `" . DBN . "`.`user`
					(
					`user`.`uName`,
					`user`.`uLast`,
					`user`.`uEmail`,
					`user`.`uPsw`,
					`user`.`uAddr1`,
					`user`.`uAddr2`,
					`user`.`uCode`,
					`user`.`uCity`,
					`user`.`uCountry`,
					`user`.`uPhone`
					 )
				VALUES
					(
					'$uName',
					'$uLast',
					'$uEmail',
					'$uEncPsw',
					'$uAddr1',
					'$uAddr2',
					'$uCode',
					'$uCity',
					'$uCountry',
					'$uPhone'
					)
			";
            //echo $aq;
            $aRes = $mysqli->query($aq);
            if ($mysqli->affected_rows === 1) {
                displayMsg("User successfully added.", "s");
            } else {
                displayMsg("Could not add user.", "f");
            }//end check query
        }//end edit / add
    }//end form submitted

    #### prefill form if in edit mode
    if (is_edit_mode()) {
        $e_id = (int)$_GET['e_id'];
        ##fetching users details

        $q = "
			SELECT
				*
			FROM
				`" . DBN . "`.`user`
			WHERE
				`user`.`uID` = '$e_id'
		";
        //echo $q;
        $res = $mysqli->query($q);
        if ($res->num_rows === 1) {
            //we have a user
            $user = $res->fetch_assoc();
            //trace($user);
        } else {
            //fail
            displayMsg("Could not find user.", "f");
        }//end query check

    }//end PREFILL mode

}// is_logged_in


########   THIS IS THE BEGINNING OF THE MARKUP    #########

include("../includes/top.php");
include("../includes/header.php");
####
?>
    </header>

    <main>
        <?php include("../includes/adminNav.php");?>

        <section class="mainBody">
            <div class="container">
                <!-- ====================  FEEDBACK START =========-->
                <?php include("../includes/feedback.php");?>
                <!-- ====================  FEEDBACK END ===========-->
            </div><!--container-->
            <?php if(is_logged_in()){?>
                <div class="container">
                    <section class="editAddItem">
                        <div class="redDash"></div>
                        <h2 class="sectionTitle"><?php get_title("User");?></h2>
<form method="post" enctype="multipart/form-data" action="#" class="editAddForm editAddProd flexCont">
    <div class="formCol">
        <label for="uName">FIRST NAME</label>
        <input class="formField" type="text" id="uName" name="uName" value="<?php
        if(isset($user['uName'])){echo $user['uName'];}
        ?>">

        <label for="uLast">LAST NAME</label>
        <input class="formField" type="text" id="uLast" name="uLast" value="<?php
        if(isset($user['uLast'])){echo $user['uLast'];}
        ?>">

        <label for="uEmail">EMAIL</label>
        <input class="formField" type="email" id="uEmail" name="uEmail" value="<?php
        if(isset($user['uEmail'])){echo $user['uEmail'];}
        ?>">

        <label for="uPsw">PASSWORD</label>
        <input <?php if(is_edit_mode()){?>
            placeholder="leave empty to keep original password"
        <?php }?>  class="formField" type="text" id="uPsw" name="uPsw" value="">

        <label for="uPhone">PHONE</label>
        <input class="formField" type="text" id="uPhone" name="uPhone" value="<?php
        if(isset($user['uPhone'])){echo $user['uPhone'];}
        ?>">
    </div><!--/formCol-->

    <div class="formCol">
        <label for="uAddr1">ADDRESS 1</label>
        <input class="formField" type="text" id="uAddr1" name="uAddr1" value="<?php
        if(isset($user['uAddr1'])){echo $user['uAddr1'];}
        ?>">

        <label for="uAddr2">ADDRESS 2</label>
        <input class="formField" type="text" id="uAddr2" name="uAddr2" value="<?php
        if(isset($user['uAddr2'])){echo $user['uAddr2'];}
        ?>">

        <label for="uCode">POSTAL CODE</label>
        <input class="formField" type="text" id="uCode" name="uCode" value="<?php
        if(isset($user['uCode'])){echo $user['uCode'];}
        ?>">

        <label for="uCity">CITY</label>
        <input class="formField" type="text" id="uCity" name="uCity" value="<?php
        if(isset($user['uCity'])){echo $user['uCity'];}
        ?>">

        <label for="uCountry">COUNTRY</label>
        <input class="formField" type="text" id="uCountry" name="uCountry" value="<?php
        if(isset($user['uCountry'])){echo $user['uCountry'];}
        ?>">


        <button type="submit" name="submit" class="btn ckBtn smBtn blueBtn"><?php get_title("User");?></button>

    </div><!--/formCol-->
</form><!--/editAddForm-->

                    </section><!--/editAddItem-->
                </div><!--/container-->
            <?php }// is logged in ?>

        </section><!--/ mainBody-->
    </main>

<?php include ("../includes/footer.php");?>