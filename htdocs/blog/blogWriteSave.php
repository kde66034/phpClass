<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
?> 

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    $myMemberID = $_SESSION['myMemberID'];
    $blogAuthor = $_SESSION['youName'];
    $blogCate = $_POST['blogCate'];
    $blogTitle = $_POST['blogTitle'];
    $blogContents = nl2br($_POST['blogContents']);
    $blogView = 1;
    $blogLike = 0;
    $regTime = time();

    $blogImgFile = $_FILES['blogFile'];
    $blogImgSize = $_FILES['blogFile']['size'];
    $blogImgType = $_FILES['blogFile']['type'];
    $blogImgName = $_FILES['blogFile']['name'];
    // 이차배열 확인 : 배열안에 배열
    $blogImgTmp = $_FILES['blogFile']['tmp_name'];

    echo $blogImgType;

    // echo "<pre>";
    // var_dump($blogImgFile);
    // echo "</pre>";

    // array(5) {
    //     ["name"]=>
    //     string(32) "8ya4fsoirvuohf66h09iovw27hha.png"
    //     ["type"]=>
    //     string(9) "image/png"
    //     ["tmp_name"]=>
    //     string(44) "C:\Users\LINE\AppData\Local\Temp\php7ACC.tmp"
    //     ["error"]=>
    //     int(0)
    //     ["size"]=>
    //     int(441989)
    // }

    // 이미지 파일명 확인
    $fileTypeExtension = explode("/", $blogImgType)
    $fileType = $fileTypeExtension[0];  // image
    $fileExtension = $fileTypeExtension[1]; // png

    // 이미지 사이즈 확인
    if($blogImgSize > 1000000){
        echo "<script>alert('이미지 용량이 1MB를 초과했습니다.'); history.back(1)</script>";
        exit;
    }

    // 이미지 타입 확인
    if($fileType == "image"){
        if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
            $blogImgDir = "../assets/img/blog/";
            $blogImgName = "Img_".time().rand(1,99999)."."."{fileExtension}";
            // 
        } else {
            echo "<script>alert('지원하는 이미지 파일이 아닙니다.'); history.back(1)</script>";
        }
    } else if ($fileType == "" || $fileType == null){
        echo "이미지를 첨부하지 않았습니다.";
    }
?>

</body>
</html>