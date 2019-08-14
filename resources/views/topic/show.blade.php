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
        min-width: 18%;
    }
     .read{
     	line-height: 30px;
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
<table id="boardname" width="800" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:5px;">
	<tr><td width="800">
		<div style="width:300px;float:left;">
			<a href="/thread/list/{{$topic->forum_id}}?user_token={{Request::cookie('binggan')}}">返回主题列表</a>
		</div>
		 <div style="width:250px;float: right">
		 	授权代码:{{Request::cookie('binggan')}}
		 </div>
	</td></tr>
</table>
<table width="800" border="0" align="center" cellspacing="0" style="table-layout:fixed;word-wrap:break-word;margin-top:5px;">
	<tbody>
		<tr>
			 <td bgcolor="#E8F3FF" >主题:{{$topic->title}}</td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr><td><div class="image_pic {{$topic->bbsbigimage}}" style="display: inline-block;"></div></td></tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr><td style="padding-bottom:0.25em">{!! $topic->content !!}</td></tr>
		<tr><td style="color:#99CC00;">№0&nbsp;☆☆☆<font color=#000>{{$topic->name}}|</font><font color=gray>{{Str::limit(md5($topic->user_id.$topic->id),8,'')}}</font>于&nbsp;<font color=#000>{{$topic->created_at}}&nbsp;留言</font>☆☆☆</td></tr>
	</tbody>
</table>
<div align="center"><hr width="800" color="#99CC00" size="1"></div>
<table width="800" align="center" cellspacing="0">
	<tbody>
		@foreach($reply as $rlist)
		<tr class="comment_{{$rlist->id}}">
			<td colspan="2">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr><td width="400"><div class="image_pic image{{$rlist->bbsbigimage}}" style="display: inline-block;"></div></td></tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr class="reply_{{$rlist->id}}">
			<td colspan="2">
				 <table width="760" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;word-wrap:break-word;">
				 	<tbody><tr>
				 		 <td class="read">
				 		 	<div style="max-height:900px;overflow: hidden;text-overflow: ellipsis">
				 		 		{!! $rlist->content !!}
				 		 	</div>
				 		 </td>
				 	</tr>
				 </tbody>
				 </table>
			</td>
		</tr>
		<tr><td style="color:#99CC00;">№{{$rlist->id}}&nbsp;☆☆☆<font color=#000>{{$rlist->name}}|</font><font color=gray>{{Str::limit(md5($rlist->user_id.$topic->id),8,'')}}</font>于&nbsp;<font color=#000>{{$rlist->created_at}}&nbsp;留言</font>☆☆☆<span style="float:right;"><a href="javascript:;" Onclick="quotereply({{$rlist->id}},'{{Str::limit(md5($rlist->user_id.$topic->id),8,'')}}')">引用</a></span></td></tr>
		<tr><td colspan="2"><div align="center"><hr width="100%" color="#99CC00" size="1"></div></td></tr>
		@endforeach
	</tbody>
</table>
<div align="center">{{$reply->links('vendor.pagination.default')}}</div>
<form method="POST" action="/reply/store">
	{{csrf_field()}}
	<input type="hidden" name="topic_id" value="{{$topic->id}}" />
<div align="center" style="margin-top:120px;">发表新回应<span id="status"></span></div>
<table id="postform" border="0" align="center">
	<tr>
		<td>
			<table width=680  border="4" align="center" cellpadding="4" cellspacing="0" bordercolor="#FFF9E1" bordercolorlight="#808000">
				<tr><td style="width:18%">昵称:</td><td align="left"><input name="username" type="text" value="=&nbsp;=" size="20" maxlength="20" ></td></tr>
				<tr> <td bgcolor="#FFFFCC" valign=top>选择图案：<br></td>
				<td  bgcolor="#FFE7F7">
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="1" checked="checked" ><div class="image_pic  image1"></div></div>		
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="2" ><div class="image_pic  image2"></div></div>
				<div class="image_div"><input " type="radio" name="bbsbigimage" value="6" ><div class="image_pic  image6"></div></div>
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="12" ><div class="image_pic  image12"></div></div>
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="16" ><div class="image_pic  image16"></div></div>
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="8" ><div class="image_pic  image8"></div></div>
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="7" ><div class="image_pic  image7"></div></div>
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="13" ><div class="image_pic  image13"></div></div>
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="9" ><div class="image_pic  image9"></div></div>
				<div class="image_div"><input  type="radio" name="bbsbigimage" value="15" ><div class="image_pic  image15"></div></div>
				</td></tr>
				
                    <tr> 
                    <td width="18%" valign="top">内容：</td>
                    <td width="82%">
                                                    <textarea name="content" rows="15" style="width:426px;" ></textarea>
<input type="hidden" value="" name="author" id="author" />
<input type="hidden" value="" name="quotecontent" id="content" />
                                                <br><font size="-1" color="red">请注意,本站讨论话题敏感，为了防止恶意带节奏，我们将会在您的马甲后面增加小尾巴。</font>
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
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	function quotereply(id,user)
	{
		$.ajax({
			'url' : '/getreply/'+id,
			'type': 'get',
			success:function(data){
				$("#content").val('<font color=gray>'+data.data.content+'</font><br/>');
				$("#author").val("<font color=gray>№"+data.data.id+"&nbsp;☆☆☆"+data.data.name+"|"+user+"于"+data.data.created_at+"&nbsp;留言☆☆☆<br/></font>");
				window.scrollTo(0, document.documentElement.scrollHeight-document.documentElement.clientHeight);
				$("#status").text("-您正在回应>>№."+id);
			}
		})
	}
</script>
@endsection