@extends('layouts.app')
@section('content')
<style>
.image_pic {
        background: url(http://bbs.jjwxc.net/notebook/bbsbigimage.jpg) no-repeat 0 0;
        width: 46px;
        height: 46px;
        display: inline-block;
    }
     .image_div{
        display: inline-block;
        min-width: 16%;
    }
    .image1 {background-position: 0 0;}
    .image2 {background-position: -46px 0;}
    .image6 {background-position: -96px 0;}
    .image12 {background-position: -144px 0;}
    .image16 {background-position: 0 -46px;}
    .image14 {background-position: -47px -46px;}
    .image8 {background-position: -96px -46px;}
    .image7 {background-position: -143px -46px;}
    .image13 {background-position: 0 -93px;}
    .image9 {background-position: -47px -93px;}
    .image10 {background-position: -96px -93px;}
    .image15 {background-position: -143px -94px;}
</style>
<form action="/create/topic" method="POST">
    {{csrf_field()}}

    <input type="hidden" value="{{$id}}" name="fid" />
<div align="center">发布新主题-><a href="/thread/list/{{$id}}?user_token={{Request::cookie('binggan')}}">返回版块</a></div>
<table id="postform" class="width_760" border="0" align="center">
	<tr>
		<td>
			<table border="4" align="center" cellpadding="4" cellspacing="0" bordercolor="#FFF9E1" bordercolorlight="#808000">
				<tr><td style="width:18%">昵称:</td><td align="left"><input name="username" type="text" value="=&nbsp;=" size="20" maxlength="20" ></td></tr>
				<tr> <td bgcolor="#FFFFCC" valign=top>选择图案：<br></td>
				<td  bgcolor="#FFE7F7">
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="1" checked="checked" ><div class="image_pic  image1"></div></div>		
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="2" ><div class="image_pic  image2"></div></div>
				<div class="image_div"><input " type="radio" name="bbsbigimage" value="6" ><div class="image_pic  image6"></div></div>
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="8" ><div class="image_pic  image8"></div></div>
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="14" ><div class="image_pic  image14"></div></div>
				
				</td></tr>
				<tr> 
                        <td valign="top">主题：</td>
                        <td><input name="title" type="text" size="60" maxlength="90"> </td>
                    </tr>
                    <tr> 
                    <td width="18%" valign="top">内容：</td>
                    <td width="82%">
                                                    <textarea name="content" rows="15" style="width:426px;"></textarea>

                                                <br><font size="-1" color="red">请注意,本站讨论话题敏感，为了防止恶意带节奏，我们将会在您的马甲后面增加小尾巴。<br/>如果本站数据库中已存在相同标题的帖子，您的帖子将无法发布出去</font>
                    </td>
                </tr>
                <tr>
                	 <td colspan="2">
                	<div align="center">
                	<button type="submit" >提交</button>
                </div>
            </td>
                </tr>
			</table>
                <tr>
		</td>
	</tr>
</table>
</form>
@endsection