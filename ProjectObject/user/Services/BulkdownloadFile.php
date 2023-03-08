<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_POST['file_id']!=""){
    $fileid=$_POST['file_id'];
    $date=date("Y").date("m").date("d").date("H").date("i").date("s");
    $arr=implode(",",$fileid);
    $sql="select * from fileInfo where id in ({$arr})";
    $file_arr=$DB->queryData($sql);

    $truename=$date.".zip";
    $file_array=array();
    for ($i=0;$i<count($file_arr);$i++){
        $filebase=$file_arr[$i]['filename'];
        $file_array[$i]=$filebase;
        $file_status=$file_arr[0]['filestatus'];
        $file_status_array[$i]=$file_status;
    }
    if (in_array('0',$file_status_array)){
        echo "<script>alert('当前选择的文件中有违规文件，请重新选择！');history.back();</script>";
    }else{
        $zip=new ZipArchive();
        if ($zip->open($truename,ZipArchive::CREATE)==true){
            foreach ($file_array as $val){
                $zip->addFile($val,basename($val));
            }
            $zip->close();
        }
        $truename=urlencode($truename);
        header("Content-type: application/zip");
        header("Content-Disposition: attachment;filename=".$truename);
        header("Content-Transfer-Encoding: binary");
        header('Pragma: no-cache');
        header('Expires: 0');
        readfile($truename);
        unlink($truename);
    }

}else{
    echo "<script>alert('There is no data transfer!!!');history.back()</script>";
}