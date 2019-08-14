@extends('layouts.app')
@section('content')
<style>
.msglink{margin-top:5px;margin-bottom:5px;}
</style>
<div class="msglink"><a href="/newtopic/{{$forumid}}">发布新主题</a>&nbsp;</div>
<table id='msglist' width="800" border="0" align="center" cellpadding="0" cellspacing="1"  bgcolor="#999933">
            <tr align="center"  bgcolor="#E8F3FF">
                <td width="32" height="32" valign="middle"><font size="-1">类别</font></td>
                <td bgcolor="#E8F3FF"><font size="-1">主题</font></td>
                <td width="110"><font size="-1">作者</font></td>
                <td width="100"><font size="-1">发帖时间</font></td>
                <td width="36"><font size="-1" title="热帖回复门槛338">回复</font></td>
                <td width="100"><font size="-1" >回复时间</font></td>
            </tr>
       @foreach($list as $tlist)               
 <tr valign="middle" bgcolor="#FFE7F7" id="boardtr_{{$tlist->id}}">
                    <td height="32" valign="middle">
                        <table width="32" border="0" cellspacing="2" cellpadding="0">
                            <tr><td align="center"><font size=-1 color=#669900>@if($tlist->top == 1) 公告 @else 闲聊 @endif</font></td></tr>
                        </table>
                    </td>
                    <td>
                        <table width="400" border="0" cellspacing="5" cellpadding="0" style="table-layout:fixed;word-wrap:break-word;">
                            <tr>
                                <td class="subjecttd" rel="5265014">
                                    <a  href="/t/{{$tlist->id}}" target="_blank">@if($tlist->top ==1)<font color=red>{{$tlist->title}}</font> @else {{$tlist->title}}@endif &nbsp;
                                    </a>
                                     </td></tr></table></td>
                    <td>&nbsp;{{$tlist->name}}</td>
                    <td align="right" ><font size="-1">{{$tlist->created_at}}</font></td>
                    <td align="right"><font size=-1>{{$tlist->reply_count}}</font></td>
                    <td align="right" ><font size=-1>{{$tlist->updated_at}}</font></td>
                </tr>
        @endforeach
        </table>


<div align="center">
	{{$list->appends(['user_token' => Request::cookie("binggan")])->links('vendor.pagination.default')}}
</div>
@endsection