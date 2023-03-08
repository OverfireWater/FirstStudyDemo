<?php
            $file=$_FILES['file'];
//            $result=move_uploaded_file($file['tmp_name'],("up/".$file['name']));
//            if ($result){
                exit(json_encode(array("code"=>0,"msg"=>"ok")));
//            }else{
//                exit(json_encode(array("code"=>1,"msg"=>"false","file"=>$file,"size"=>$file['size']),0));
//            }