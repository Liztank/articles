<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Article_Rating;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Article::all();
        return $res;
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $article_id
     * @return \Illuminate\Http\Response
     */
    public function rateArticle(Request $request, $article_id)
    {
        $rating =Article::find($article_id);
        $rating->rated_by=auth()->user()->id;
        $rating->rating=$request->input('id');
        $rating->rating=$request->input('rating');

        $res = Article_Rating::create($article);

        if($res['id']!==null){
            return response(['message'=>'success'
            , 'code'=>200,'data'=>$res]);
        }else {
            return response(['Error'=>
            'Error occured when trying to perform rate action',
            'code'=>400]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'subject' => 'required',
            'body' => 'required'
        ]);

        $article = new Article;
        $article->author=$request->input('author');
        $article->body=$request->input('body');
        $article->subject=$request->input('subject');
        
        $res = $article->save();

        if($res==1){
            $data = Article::orderBy('created_at','desc')->take(1)->get();
            return response(['message'=>'success'
            , 'code'=>200,'data'=>$data]);
        }else {
            return response(['Error'=>
            'Error occured when trying to add new article',
            'code'=>400]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $article_id
     * @return \Illuminate\Http\Response
     */
    public function show($article_id)
    {
        $article = Article::find($article_id);
        return response(['message'=>'success'
            , 'code'=>200,'data'=>$article]);  
    }

    public function search($search_term){

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article_id)
    {
        $user = auth()->user()->id;
        
        $article =Article::find($article_id);

        if(!$user=$article['author']){
            return response()->json(['error'=>'Unauthorised'],401);
        }
        $article->author=$user;
        $article->body=$request->input('body');
        $article->subject=$request->input('subject');
        $article->rating=$request->input('rating');
        
        $res = $article->save();
        if($res==1){
            $data = Article::orderBy('updated_at','desc')->take(1)->get();
            return response(['message'=>'success','code'=>200,
            'data'=>$data]);
        }else {
            return response(['message'=>'Error updating article','code'=>400]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $article_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($article_id)
    {
        $article =Article::find($article_id);
        $user = auth()->user()->id;

        if(!$user==$article['author']){
            return response(['message'=>'You do not have permission to perform this action',
        'code'=>400]);
        }

        $article->delete();

        return response(['message'=>'Article deleted successful',
        'code'=>200]);
    }
}
