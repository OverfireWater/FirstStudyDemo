<?php
include "../Entiy/BookInfo.php";
class DBHelper{
    //��������ȡPDO�Ķ���ķ��� ����ֵ����һ��PDO
    function getPDO(){
        //�����ַ���  host=localhost ��ʾ���ݿ��������λ�ã�����
        //dbname=bookdb ���ݿ������
        $con_str="mysql:host=localhost;dbname=bookdb";
        //�û���
        $user_name="root";
        //����
        $user_pwd="root";
        //����PDO�Ķ���
        $pdo=new PDO($con_str,$user_name,$user_pwd);
        //�Ѵ����õĶ��󷵻س�ȥ
        return $pdo;
    }
//ʹ��PDO�������ݲ�ѯ�ķ��� ����ֵ��һ������
//�õ�����һ����ά���飬��Ҫ�������ά����ת��Ϊһά���飬�����д������
    function query_data($sql){
        //ͨ��getPDO����ȥ��ȡPDO�Ķ���
        $pdo=$this->getPDO();
        //��ȡ�Ķ�����һ�����飬��һ����ѯ�Ľ��
        $result=$pdo->query($sql);
        //�Ӳ�ѯ�Ľ�����õ�����
        $arr=$result->fetchAll(PDO::FETCH_NUM);
        return $arr;
    }
    //��query������ѯ���������������װΪԪ��Ϊbookinfo���͵�����
    function  arr_to_obj($sql){
        $arr=$this->query_data($sql);
        $arr_obj=null;
        for ($i=0;$i<count($arr);$i++){
            //����һ��ͼ��Ķ��� ���ҶԶ�������Ը�ֵ
            $bk=new BooKInfo($arr[$i][0],$arr[$i][1],$arr[$i][2],$arr[$i][3],$arr[$i][4],$arr[$i][5],$arr[$i][6]);
            $arr_obj[$i]=$bk;
        }
        return $arr_obj;
    }

}
