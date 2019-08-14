@extends('layouts.app')
@section('content')
 <table width="800" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#999999">
    <tr align="center">
        <td width="127" bgcolor="#FFFFFF"><a href="/">版块列表</a></td>
        <td width="127" bgcolor="#FFFFFF"> <font color=blue>user_id:{{Request::cookie('binggan')}}</font></td>
        @if(!Request::cookie('binggan'))
             <td width="127" bgcolor="#FFFFFF"> <a href="/get_user_token">获取授权</a></td>
        @endif

</tr>
 </table>
<table width="800" height="119" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
            <tbody><tr bgcolor="#FFCC99">
                <td width="20%" rowspan="2" align="center" valign="middle" bgcolor="#FFCC99"><font size="-1">版块</font>      </td>
                <td valign="bottom" bgcolor="#FFCC99"></td>
                <td width="20%" rowspan="2" align="center" valign="middle" bgcolor="#FFCC99">
                    <font size="-1">版主</font></td>
            </tr>
            <tr bgcolor="#FFCC99">
                <td valign="bottom" bgcolor="#FFCC99"><div align="center"><font size="-1">版规</font></div></td>
            </tr>
                                <tr bgcolor="#FFF5EC">
                        <td colspan="3" align="left"> &nbsp; <a href="#10" name="10"><font color="#FF0000" size="-1">--+　交流区　+--</font></a>
                        </td>
                    </tr>
                    @foreach($list as $list)
                                            <tr>
                            <td height="60" rowspan="2" valign="MIDDLE" bgcolor="#FFCC99">
                                <center>
                                     <a href="/thread/list/{{$list->id}}?user_token={{Request::cookie('binggan')}}">{{$list->name}}</a>
                                </center>
                            </td>
                            <td height="35" valign="MIDDLE" bgcolor="#FFCC99">&nbsp;<font color="#999999" size="-1">{{$list->content}}　</font></td>
                            <td height="35" valign="MIDDLE" bgcolor="#FFCC99">&nbsp;<font size="-1">{{$list->admin_name}}</font></td>
                        </tr>
                        <tr>
                            <td height="35" colspan="2" valign="MIDDLE" bgcolor="#FFCC99">&nbsp;<font size="-1"></font></td>
                        </tr>
                        @endforeach
                    </tbody></table>
@endsection