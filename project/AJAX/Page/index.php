<html>

<head>
    <title>ajax</title>
    <style>
        img{
            display: none;
        }
    </style>
</head>
<script>
 function sendDate(){
     var httprequest=new XMLHttpRequest();

     httprequest.onreadystatechange=function (){

         if(httprequest.status==200 && httprequest.readyState==4){

             var res=httprequest.responseText;

            if(res=="w"){
                document.getElementById('r').style.display="block";
                document.getElementById('w').style.display="none";
            }else {
                document.getElementById('w').style.display="block";
                document.getElementById('r').style.display="none";
            }
         }
     }

     var txt=document.getElementById('name').value;
     httprequest.open("GET","../Ajax_services/Ajax_services.php?name="+txt,true);
     httprequest.send();
 }



</script>
<body>

    <input type="text"  id="name" onkeyup="sendDate()">
    <img id="r" width="25px" height="25px" src="../pic/1.png">
    <img id="w" width="25px" height="25px" src="../pic/2.png">


</body>
</html>