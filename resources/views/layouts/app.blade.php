<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>里岛-测试版</title>
<style type="text/css">
a{
color: #0000FF;
text-decoration: none;
}
 a:link {
color: #0000FF;
text-decoration: none;
}
a:visited {
 color: #0000FF;
text-decoration: none;
 }
 a:hover {
color: #FF0000;
text-decoration: none;
}
.container{
    width:800px;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
body{
    background:#FFE7F7;
    margin:0;
}
.footer{
    text-align:center;
    color:blue;
    font-size:12px;
    margin-top:30px;
}
.width_5 {
        width: 5px;
    }
    .width_300 {
        width: 300px;

    }
    .width_800 {
        width: 800px;
    }
    .width_468 {
        width: 468px;
    }
    @media screen and (max-width: 800px) {
        .width_800 {
            width: 100%;
        }

        .width_468 {
            width: 60%;
        }

        .width_300 {
            width: 40%;
        }

    }
</style>
</head>
<body>
    <table class="width_800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999">
    <tbody><tr align="right" bgcolor="#FEDAEE">
        <td colspan="5" bgcolor="#FCE0EB"><a href="/login">登入系统</a></font></td>
    </tr>
    <tr bgcolor="#666666">
        <td height="1" colspan="5"></td>
    </tr>
    <tr bgcolor="#F9CCDE">
        <td height="5"></td>
        <td></td>
        <td colspan="2"></td>
        <td class="width_5"></td>
    </tr>
    <tr bgcolor="#F9CCDE">
        <td class="width_5"></td>
        <td class="width_300">
           =w=
        </td>
        <td class="width_468" align="right" colspan="2">
            <!-- 谷歌新广告：论坛顶部频道页通发(编辑)---->
            <div style="width:100%;height:60px;">
              请各位注意不要在本站公开放出我们的网站地址，否则我们随时可能关站删库跑路一条龙服务
        </td>
        <td class="width_5"></td>
    </tr>
    <tr bgcolor="#F9CCDE">
        <td height="5"></td>
        <td></td>
        <td colspan="2"></td>
        <td></td>
    </tr>
</tbody></table>
 <div class="container">
@yield('content')
<div class="footer">
佛系种花嗷
    </div>
 </div> 
</body>
</html>
