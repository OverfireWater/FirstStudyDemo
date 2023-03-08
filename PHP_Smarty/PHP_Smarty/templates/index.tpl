<!DOCTYPE html>
<html lang="en">
{config_load file="configs.conf"}
<head>
    <meta charset="UTF-8">
    <title>{#title#}</title>
</head>
<body bgcolor="{#color#}" >

{foreach key=k item=ite from=$value}
    {$k}: {$ite->getName()},{$ite->getSex()},{$ite->getTel()}


<table>
    <tr>
        <td></td>
    </tr>
</table>
{/foreach}
</body>
</html>