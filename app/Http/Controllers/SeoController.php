<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SeoController extends Controller
{
    //
    protected $limit =2;

    public function index(){

//        $posts = Post::all();
        $posts = Post::with('author','tags','comments')->published()->get();


//        $pds = Post::orderBy('view_count', 'desc')->first();
        $pds = Post::with('author','tags','comments')->published()->orderBy('view_count', 'desc')->first();

        $pcs = Post::with('author','tags','comments')->published()->popular()->get()->sortByDesc('view_count')->take($this->limit);
        $tags = Tag::all();

        return view("seo.hd",compact('posts','pcs','pds','tags'));
    }

    public function show($id){

        $post = Post::with('author','tags','comments')->findOrFail($id);
        $post->increment('view_count');
        $postComments = $post->comments()->Paginate(3);
        return view("blog.bmain",compact('post','postComments'));
    }

    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Post::class, 'title')

            ->perform($request->input('query'));

        return view('seo.sh', compact('searchResults'));
    }

    public function tag(Tag $tag)
    {
//        $tagName = $tag->title;

        $posts = $tag->posts()
            ->with('author')->published()->get();


        return view("seo.hd", compact('posts'));
    }

}
