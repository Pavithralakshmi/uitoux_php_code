<?php
	include_once 'db.php';
$student_id_array=$mark_1_array=$mark_2_array=$mark_3_array=$mark_id_array=array();
if(isset($_POST['save_record'])){
//	echo "<pre>";
//    print_r($_POST);
//	echo "</pre>";
	$student_id_array = $_POST['student_id'];
	$mark_1_array = $_POST['mark_1'];
	$mark_2_array = $_POST['mark_2'];
	$mark_3_array = $_POST['mark_3'];
	$total_array = $_POST['total'];
	if(isset($_POST['mark_id'])){
	$mark_id_array = $_POST['mark_id'];
    }else {
		$mark_id_array = 'NULL';
	}

//		if($student_id_array[0] != '0' && $student_id_array[0] !='' && $total_array[1] !='0'){
foreach ($total_array as $key => $value) {
    $mid=$mark_id_array[$key];
    if (isset($mark_id_array[$key]) && isset($value) != '0' && isset($student_id_array[$key])!='') {
		$work_sql = "UPDATE `tb_student_marks` SET `student_id` = '$student_id_array[$key]',`mark_1` = '$mark_1_array[$key]',`mark_2` = '$mark_2_array[$key]',`mark_3` = '$mark_3_array[$key]',`total` = '$value' where `mark_id`='$mid'";
	}else{
        if($student_id_array[$key] != '') {
            $work_sql = "INSERT INTO `tb_student_marks`(`student_id`, `mark_1`, `mark_2`, `mark_3`, `total`, `rank`)
                    VALUES ('$student_id_array[$key]','$mark_1_array[$key]','$mark_2_array[$key]','$mark_3_array[$key]','$value','0')";
        }
    }
		$work_result = mysqli_query($mysqli, $work_sql);
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Student Database Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
	<script type="text/javascript" src="https://cdn.rawgit.com/viljamis/responsive-nav.js/master/responsive-nav.min.js"></script>
	<link href="common_css.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<div class="ui container">
    <header>
        <div class="container">
            <a href="#home" class="logo">Fixed Responsive Nav</a>
            <nav class="nav-collapse">
                <ul>
                    <li class="menu-item active"><a href="#home">Home</a></li>
                    <li class="menu-item"><a href="#about">Registration</a></li>
                    <li class="menu-item"><a href="#projects">Mark Entry</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container container-bottom">
       <section>
            <form method="post" action="">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tbl_posts">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mark - 1</th>
                            <th scope="col">Mark - 2</th>
                            <th scope="col">Mark - 3</th>
                            <th scope="col">Total</th>
                            <th scope="col">Rank</th>
                        </tr>
                        </thead>
                        <tbody id="tbl_posts_body">
						<?php
//						$sql1 = "SELECT  * from `tb_student_marks` order by `mark_id` ASC";
						$sql1 = "SELECT    student_id,
          total,
       mark_id,
          mark_1,
           mark_2,
            mark_3,
          @curRank := @curRank + 1 AS rank
FROM      tb_student_marks p, (SELECT @curRank := 0) r
ORDER BY  total DESC;";
						$result = mysqli_query($mysqli, $sql1);
						$i=1;
						while ($row = mysqli_fetch_assoc($result)) {
						$mark_id = $row['mark_id'];
						$student_id = $row['student_id'];
						$mark_1 = $row['mark_1'];
						$mark_2 = $row['mark_2'];
						$mark_3 = $row['mark_3'];
						$total = $row['total'];
						$rank = $row['rank'];
						?>
                                <input type="hidden" value="<?php echo $mark_id; ?>" name="mark_id[]">
                            <tr id="rec-<?php echo $mark_id; ?>" class="fieldGroup">
                                <td><span class="sn"><?php echo $i; ?></span>.</td>
                                <td><input type="text" class="form-control student_id" required name="student_id[]" value="<?php echo
									$student_id; ?>" placeholder="0"></td>
                                <td><input type="text" class="form-control mark_1" min="0" required max="100" minlength="1" maxlength="3"
                                           name="mark_1[]" value="<?php echo $mark_1; ?>"
                                           onkeyup="mark_1(this)" placeholder="0"></td>
                                <td><input type="text" class="form-control mark_2" min="0" required max="100" minlength="1" maxlength="3"
                                           name="mark_2[]" value="<?php echo $mark_2; ?>" onkeyup="mark_2(this)"
                                           placeholder="0"></td>
                                <td><input type="text" class="form-control mark_3" min="0" required max="100" minlength="1" maxlength="3"
                                           name="mark_3[]" value="<?php echo $mark_3; ?>" onkeyup="mark_3(this)" placeholder="0"></td>
                                <td><input type="text" class="form-control sumUnit" name="total[]" value="<?php echo
                                    $total; ?>"
                                           readonly
                                           style="padding: unset;"></td>
                                <td><input type="text" class="form-control rank" name="rank[]" value="<?php echo
                                    $rank; ?>"
                                           readonly
                                           style="padding: unset;"></td>
                            </tr>
                        <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
                <div class="well clearfix">
                    <input type="submit" class="btn btn-success pull-left save-record" name="save_record" value="save_record">
<!--                    <a class="btn btn-success pull-left save-record" data-added="0" id="save_record" onClick="checkVal(this.form); return false;"><i-->
<!--                                class="glyphicon-->
<!--                    glyphicon-check"></i>  Save</a>-->
                    <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
                </div>
            </form>
<!--                <input type="submit" class="btn btn-success pull-left save-record" name="dsa" value="dsa">-->
        </section>
        <div style="display:none;">
            <table id="sample_table">
<form class="ui form">
                    <tr id="fieldGroup" class="fieldGroup">
                        <td><span class="sn"></span>.</td>
                        <td><input type="text" class="form-control student_id" name="student_id[]"
                                   placeholder="Name"></td>
                        <td><input type="text" class="form-control mark_1" min="0" max="100" minlength="1" maxlength="3"
                                   name="mark_1[]" value="0"
                                   onkeyup="mark_1(this)" placeholder="0"></td>
                        <td><input type="text" class="form-control mark_2" min="0" max="100" minlength="1" maxlength="3"
                                   name="mark_2[]" value="0" onkeyup="mark_2(this)" placeholder="0"></td>
                        <td><input type="text" class="form-control mark_3" min="0" max="100" minlength="1" maxlength="3"
                                   name="mark_3[]" value="0"  onkeyup="mark_3(this)" placeholder="0"></td>
                        <td><input type="text" value="0" class="form-control sumUnit" name="total[]" readonly></td>
                    </tr>
</form>
            </table>
        </div>
    </div>
</div>
</body>
<script>
    var nav = responsiveNav(".nav-collapse");
    jQuery(document).delegate('a.add-record', 'click', function(e) {
        e.preventDefault();
        var content = jQuery('#sample_table tr'),
            size = jQuery('#tbl_posts >tbody >tr').length + 1,
            element = null,
            element = content.clone();
        element.attr('id', 'rec-'+size);
        element.find('.delete-record').attr('data-id', size);
        element.appendTo('#tbl_posts_body');
        element.find('.sn').html(size);
    });
    function mark_1(mark_1){
        var regex=/^[0-9]+$/;
        if(!mark_1.value.match(regex)){
            mark_1.value = mark_1.value.replace(/[^0-9\.]/g,'');
            return false;
        }else{
            var fieldGroup  = $(mark_1).parents(".fieldGroup");
            var mark_1   = fieldGroup.find(".mark_1").val();
            var mark_2    = fieldGroup.find(".mark_2").val();
            var mark_3    = fieldGroup.find(".mark_3").val();
            mark_1 = parseInt(mark_1);
            mark_2 = parseInt(mark_2);
            mark_3 = parseInt(mark_3);
            var sumUnit= fieldGroup.find(".sumUnit");
            sumUnit.val(mark_1+mark_2+mark_3);
        }
    }
    function mark_2(mark_2){
        var regex=/^[0-9]+$/;
        if(!mark_2.value.match(regex)){
            mark_2.value = mark_2.value.replace(/[^0-9\.]/g,'');
            return false;
        }else{
            var fieldGroup  = $(mark_2).parents(".fieldGroup");
            var mark_1   = fieldGroup.find(".mark_1").val();
            var mark_2    = fieldGroup.find(".mark_2").val();
            var mark_3    = fieldGroup.find(".mark_3").val();
            mark_1 = parseInt(mark_1);
            mark_2 = parseInt(mark_2);
            mark_3 = parseInt(mark_3);
            var sumUnit     = fieldGroup.find(".sumUnit");
            sumUnit.val(mark_1+mark_2+mark_3);
        }
    }
    function mark_3(mark_3){
        var regex=/^[0-9]+$/;
        if(!mark_3.value.match(regex)){
            mark_3.value = mark_3.value.replace(/[^0-9\.]/g,'');
            return false;
        }else{
            var fieldGroup  = $(mark_3).parents(".fieldGroup");
            var mark_1   = fieldGroup.find(".mark_1").val();
            var mark_2    = fieldGroup.find(".mark_2").val();
            var mark_3    = fieldGroup.find(".mark_3").val();
            mark_1 = parseInt(mark_1);
            mark_2 = parseInt(mark_2);
            mark_3 = parseInt(mark_3);
            var sumUnit     = fieldGroup.find(".sumUnit");
            sumUnit.val(mark_1+mark_2+mark_3);
        }
    }

    $(document).keypress(
        function(event){
            if (event.which == '13') {
                event.preventDefault();
            }
        });
</script>
</html>
