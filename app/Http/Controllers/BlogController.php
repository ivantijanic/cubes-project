<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\Comment;

class BlogController extends Controller {

    public function blogPosts() {

        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(3);
        $categories = BlogCategory::all();

        return view('front.blog.blog-posts', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function singleBlogPost($id) {

        $post = BlogPost::findOrFail($id);
        
        

        $categories = BlogCategory::query()
                ->orderBy('title', 'asc')
                ->get();

        $tags = $post->tags()->get();

        $comments = Comment::query()
                ->where('blog_post_id', '=', $id)
                ->orderBy('created_at', 'desc')
                ->paginate(5);

        return view('front.blog.single-blog-post', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
            'comments' => $comments
        ]);
    }
    
    public function comment(){
        
         $request = request();
 
        $formData = $request->validate([
            'body' => 'required',
            'visitor_name' => 'required',
            'email' => 'required|email',
            'blog_post_id' => 'required|exists:blog_posts,id',
        ]);


        $comment = new Comment($formData);
        $comment->save();

        
        return redirect()->back()
                        ->with('systemMessage', 'Comment has been added!');
        
        
    }

}
