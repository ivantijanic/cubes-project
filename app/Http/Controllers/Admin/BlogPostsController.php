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
            'author' => 'required',
            'blog_post_photo' => 'image|mimes:jpeg|max:10240', //dimensions:min_width=800px,min_height=400px
            'title' => 'required',
            'tag_ids' => 'required|array|min:2|exists:tags,id',
            'description' => 'required',
            'body' => 'required',
            'published_at' => 'required',
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

        $post->tags()->sync($formData['tag_ids']);


        if ($request->hasFile('blog_post_photo')) {
            // file has been uploaded

            $uploadedFile = $request->file('blog_post_photo');

            // file name on local computer
            //dd($uploadedFile->getClientOriginalName());
            //file extension on local computer
            //dd($uploadedFile->getClientOriginalExtension());

            $postFileName = $post->id . '_' . $uploadedFile->getClientOriginalName();

            //move file to new location with new name

            $uploadedFile->move(
                    public_path('/storage/blog-posts-images'), $postFileName
            );

            $post->photo_filename = $postFileName;
            $post->save();
        }

        return redirect()->route('admin.posts')
                        ->with('systemMessage', 'Post has been added!');
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

    public function update($id) {

        $post = BlogPost::findOrFail($id);

        $request = request();

        $formData = $request->validate([
            'blog_category_id' => 'required|exists:blog_categories,id',
            'author' => 'required',
            'blog_post_photo' => 'image|mimes:jpeg|max:10240', //dimensions:min_width=800px,min_height=400px
            'title' => 'required',
            'tag_ids' => 'required|array|min:2|exists:tags,id',
            'description' => 'required',
            'body' => 'required',
            'published_at' => 'required',
        ]);

        $post->fill($formData);

        $post->save();

        //save chosen tag ids
        $post->tags()->sync($formData['tag_ids']);

        if ($request->hasFile('blog_post_photo')) {

            // new uploaded file
            $uploadedFile = $request->file('blog_post_photo');

            $publicStorage = \Storage::disk('public');

            //if old photo file exists delete old file
            if ($post->photo_filename && $publicStorage->exists('/blog-posts-images/' . $post->photo_filename)) {

                $publicStorage->delete('/blog-posts-images/' . $post->photo_filename);
            }

            //move new file to new location

            $newFileName = $post->id . '_' . $uploadedFile->getClientOriginalName();

            $uploadedFile->storeAs('/blog-posts-images', $newFileName, 'public');

            //update new file name in database
            $post->photo_filename = $newFileName;
            $post->save();
        }


        return redirect()->route('admin.posts')
                        ->with('systemMessage', 'Post has been saved');
    }

    public function delete() {
        $request = request();

        $post = BlogPost::findOrFail($request->input('id'));


        //delete from database
        $post->delete();

        // delete relations to tags table
        $post->tags()->detach();

        //see if photo file exists
        if (
                $post->photo_filename && \Storage::disk('public')
                        ->exists('/blog-posts-images/' . $post->photo_filename)
        ) {

            //delete photo from disk
            \Storage::disk('public')
                    ->delete('/blog-posts-images/' . $post->photo_filename);
        }

        return redirect()->route('admin.posts')
                        ->with('systemMessage', 'Post has been deleted');
    }

}
