<html >
<head>
    <title>地区下拉选择表</title>
</head>
<script>
    function getadd1(sel){
        var add1=sel;

        var index=add1.selectedIndex;
        var opt=add1.options[index];
        return opt.value;

    }

    function  send_data(sel,type){
        //这是针对新版的浏览器内核
        var httprequest=new XMLHttpRequest();
        //IE5 IE6
        // httprequest=new ActiveXObject(Mic...)
        //状态发生改变 （有和后台进行数据交互动作） 下面代码只有再状态发生改变的时候才会被执行
        httprequest.onreadystatechange=function (){
            if(httprequest.readyState==4 && httprequest.status==200){
                //获取响应的数据并展示再页面或者进行什么处理
                var txt=httprequest.responseText;
                //获取下拉列表
                var add2=null;
                //传递了一个参数表示：如果为1 表示为第二个下拉列表添加选项 如果为2的时候表示为第三个下拉列表添加选项
                if(type==1){
                    add2=document.getElementById("add2");
                }else{
                    add2=document.getElementById("add3");
                }
                //设置下拉列表长度为0 清空
                if (add2!=null){
                    add2.length=0;
                }
                //后台数据通过-拆分为数组
                var arr=txt.split('-');
                //循环遍历这个数组
                for (var i=0;i<arr.length-1;i++){
                    //使用数组的内容来创建下拉列表项
                    var str=arr[i];// 101:大同
                    var opt=new Option();
                    opt.text=str.split(':')[1];
                    opt.value=str.split(':')[0];
                    //添加到add2下拉列表
                    add2.options.add(opt);
                }
            }
        }
        var id=getadd1(sel);
        httprequest.open("GET","../Services/Services.php?id="+id,true);
        httprequest.send();
    }

</script>
<body>
<?php
include "../Services/Services.php";
$db=new DBhelper();
$arr=$db->Query(" SELECT * from area_Servies where pid=0");

?>
<select id="add1" onchange="send_data(this,1)">
    <option>选择市/直辖市</option>
    <?php
        foreach ($arr as $k){
        ?>
    <option value="<?=$k['id']?>"><?=$k['name']?></option>
    <?php
        }
    ?>
</select>
<select id="add2" onclick="send_data(this,2)">
    <option value="">选择市</option>
</select>
<select id="add3" >
    <option>选择区</option>
</select>
</body>
</html>