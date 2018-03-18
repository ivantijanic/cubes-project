<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\Tag;

class BlogPostsController extends Controller {

    public function index() {
        $posts = BlogPost::orderBy('published_at', 'desc')->get();

        return view('admin.blog-posts.index', [
            'posts' => $posts
        ]);
    }

    public function add() {

        $blogCategories = BlogCategory::orderBy('title')->get();
$tags = Tag::orderBy('title')->get();

        return view('admin.blog-posts.add', [
            'blogCategories' => $blogCategories,
            'tags' => $tags,
        ]);
    }

    public function insert() {

        $request = request();

        $formData = $request->validate([
            'blog_category_id' => 'required|exists:blog_categories,id',
            'published_at' => 'present',
            'title' => 'required',
            'author' => 'present',
            'description' => 'present',
            'blog_post_photo' => 'image|mimes:jpeg|max:10240|dimensions:min_width=800px,min_height=400px',
            'body' => 'present',
        ]);

        $post = new BlogPost($formData);

        $post->save();

//		foreach ($formData['tag_ids'] as $tagId) {
//			\DB::table('products_tags')->insert([
//				'product_id' => $product->id,
//				'tag_id' => $tag
//			]);
//		}
        // attach - kreiraju se nove veze 
        // detach - brisu se postojece veze 
        // sync - detach + attach
        //   $product->tags()->sync($formData['tag_ids']);

        if ($request->hasFile('blog_post_photo')) {
            // file has been uploaded

            $uploadedFile = $request->file('blog_post_photo');

            // file name on local computer
            //dd($uploadedFile->getClientOriginalName());
            //file extension on local computer
            //dd($uploadedFile->getClientOriginalExtension());

            $newFileName = $post->id . '_' . $uploadedFile->getClientOriginalName();

            //move file to new location with new name

            $uploadedFile->move(
                    public_path('/skins/blog-posts'), $newFileName
            );

            $post->image = $newFileName;
            $post->save();
        }

        return redirect()->route('admin.posts')
                        ->with('systemMessage', 'Product has been added!');
    }

    public function edit($id) {
        $post = BlogPost::findOrFail($id);

        $blogCategories = BlogCategory::orderBy('title')->get();
$tags = Tag::orderBy('title')->get();

        return view('admin.blog-posts.edit', [
            'post' => $post,
            'blogCategories' => $blogCategories,
            'tags' => $tags,
        ]);
    }

    public function upload() {
        
    }

    public function delete() {
        
    }

}
