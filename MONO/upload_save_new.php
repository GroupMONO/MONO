<?php
	session_start();

    if(!isset($_SESSION['id']) || (trim($_SESSION['id'])=='')){
        header("location: index.php");
        exit();
    }
    $session_id=$_SESSION['id'];

	include 'dbConfig.php';
	$errmsg=array();
	$errflag=false;

	$fileStatus=$_POST["status"];
	$fileComment=$_POST["comment"];
	$id_class=$_POST["id_class"];

	$targetDir="uploads/";
	$fileName=basename($_FILES["file"]["name"]);
	$targetFilePath=$targetDir . $fileName;
	$fileType=pathinfo($targetFilePath,PATHINFO_EXTENSION);

	if ($fileComment  == '') {
		$errmsg_arr[]=' file comment is missing';
		$errflag = true;
	}

	if($errflag){
		$_SESSION['ERRMSG_ARR']=$errmsg_arr;
		session_write_close();
		echo("</script>location.href = 'class_cc.php'</script>");
    	exit();
	}

	if(isset($_POST["upload"])&& !empty($_FILES["file"]["name"])){
		$allowTypes=array('docx', 'doc', 'pdf', 'xls', 'xlsx');
		if(in_array($fileType, $allowTypes)){
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
				$insert=$db->query("INSERT into file (fname,fcomment,fstatus,ccid,class_id) VALUES ('".$fileName."','".$fileComment."','".$fileStatus."','".$session_id."','".$id_class."')");
				if($insert){
					$_SESSION["ERRMSG_ARR"]=$errmsg_arr;
					session_write_close();
					?>

       				<script type="text/javascript">
                          window.location="view_class_cc.php<?php echo '?id='.$id_class; ?>";                          
                        </script>
                        <?php
                        exit();
				}else{
					$errmsg_arr[]='record was not saved in the database but file was uploaded';
					$errflag=true;
					if($errflag){
						$_SESSION["ERRMSG_ARR"]=$errmsg_arr;
						session_write_close();
        			header("<script>location.href = 'class_cc.php'</script>");
        			exit();
					}
					
				}
			}else{
				$errmsg_arr[]='upload of file ' . $fileName . 'was unsuccessful';
					$errflag=true;
					if($errflag){
						$_SESSION["ERRMSG_ARR"]=$errmsg_arr;
						session_write_close();
        			header("<script>location.href = 'class_cc.php'</script>");
        			exit();
					}
			}
			}else{
				$errmsg_arr[]='File must in DOC, DOCX, PDF, XLS & XLSX type';
					$errflag=true;
					if($errflag){
						$_SESSION["ERRMSG_ARR"]=$errmsg_arr;
						session_write_close();
        			header("<script>location.href = 'class_cc.php'</script>");
        			exit();
					}
			}
		}else{
			$errmsg_arr[]='No file uploaded';
					$errflag=true;
					if($errflag){
						$_SESSION["ERRMSG_ARR"]=$errmsg_arr;
						session_write_close();
        			header("<script>location.href = 'class_cc.php'</script>");
        			exit();
					}
		}
	echo $statusMsg;
?>