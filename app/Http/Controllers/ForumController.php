<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use Cache;
class ForumController extends Controller
{
    //
    public function index()
    {
    	//$forum = new Forum;
    	/*$list = Cache::remember('board', 24*80*3600, function () {
    return forum::all();
});
*/
$list = Forum::all();
    
    	return view('forum.index')->with('list',$list);
    }
    public function show(Request $request,$id)
    {
    	if(isset($_GET['user_token']))
    	{
    		if($_GET['user_token'] == $request->cookie('binggan') && $_GET['user_token'] != "")
    		{
    		$list = Forum::find($id)->topics()->orderby('top','desc')->orderby('updated_at','desc')->paginate(30);
    		return view('forum.list')->with('list',$list)->with('forumid',$id);
    		}else
    		{
    			return redirect('/guest');
    		}

    	}else
    	{
    		return "抱歉，参数不完全";
    	}
    }

}
