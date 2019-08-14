<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Topic;
class ReplyController extends Controller
{
    //
     public function __construct()
    {
      $this->middleware('checkid');
    }
    public function store(Request $request)
    {
    	$reply = new Reply;
    	$reply->name = htmlspecialchars($request->input('username'));
    	$reply->topic_id = $request->input('topic_id');
    	$reply->content = $request->input('quotecontent').$request->input("author").nl2br($request->input('content'));
    	$reply->bbsbigimage = $request->input('bbsbigimage');
    	$reply->user_id = $request->cookie('binggan');
    	$reply->user_ip = $request->ip();
    	$reply->save();
    	$topic = Topic::find($request->input('topic_id'));
   
    	$topic->reply_count = $topic->reply_count+1;
    	$topic->save();
    	return redirect('/t/'.$request->input('topic_id'));
    }
    public function getreply($id)
    {
        $reply = Reply::find($id);
        return response()->json([
            'code' => 200,
            'message' => '获取成功',
            'data' => $reply,
        ]);
    }
}
