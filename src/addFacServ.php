<?php
    include ('connMySQL.php');
    header("Content-type: text/html; charset=utf-8");
    $class = new connMySQL();
    $conn = $class->getConn();
    mysqli_query($conn,"SET NAMES 'UTF8'");

    $labNo = $_POST['addLabNo'];
    $facNo = $_POST['addFacNo'];
    $facName = $_POST['addFacName'];
    $facMod = $_POST['addFacMod'];
    $haveNum = $_POST['addHaveNum'];
    $dataInfo = $_POST['addDataInfo'];

    if(checkRepeat()) {
        if(insertFacValue())
            echo "success";
        else echo "insertFail";
    } else echo "repeatFail";

    function checkRepeat() {
        global $conn,$facNo;
        $sql = "select * from facinfo where FacNo = '$facNo'";
        $result = mysqli_query($conn,$sql);
        return !mysqli_num_rows($result);
    }

    function insertFacValue() {
        global $conn,$labNo,$facNo,$facName,$facMod,$haveNum,$dataInfo;
        $sql = "INSERT INTO facinfo VALUES ('$labNo','$facNo','$facName','$facMod',$haveNum,0,'$dataInfo')";
        return mysqli_query($conn,$sql);
    }