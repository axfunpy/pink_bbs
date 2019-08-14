<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
class TopicController extends Controller
{
    //
     public function __construct()
    {
      $this->middleware('checkid');
    }
    public function create(Request $request,$id)
    {
    	if(!$request->cookie('binggan'))
    	{
    		return "抱歉，您无权发布新帖子，由于您没有饼干，请领取一块新饼干：）";
    	}else
    	{
    		return view('topic.create')->with('id',$id);
    	}
    }
    public function store(Request $request)
    {
        if(!$request->cookie('binggan'))
        {
            return "抱歉，您无权发布新帖子，由于您没有饼干，请领取一块新饼干。在此之前，请先按下浏览器回退按钮保存您未发布的数据";
        }else
        {
            $request->validate([
        'title' => 'required|unique:topics',
        'content' => 'required',
        'username' => 'required',
    ]);
            $topic = new Topic;
            //实例化模型
            $topic->title = htmlspecialchars($request->input('title'));
            $topic->content = nl2br($request->input('content'));
            $topic->name = htmlspecialchars($request->input('username'));
            $topic->top = 0;
            $topic->forum_id = $request->input('fid');
            $topic->status = 0;
            $topic->bbsbigimage = $request->input('bbsbigimage');
            $topic->user_id = $request->cookie('binggan');
            $topic->user_ip = $request->ip();
            $topic->reply_count = 0;
            $topic->save();
            return redirect('/thread/list/'.$request->input("fid").'?user_token='.$request->cookie("binggan"));
        }
    }
    public function show(Topic $topic)
    {
        $reply = Topic::find($topic->id)->orderby('id','asc')->replys()->paginate(50);
        return view('topic.show')->with('topic',$topic)->with('reply',$reply);
    }
}
