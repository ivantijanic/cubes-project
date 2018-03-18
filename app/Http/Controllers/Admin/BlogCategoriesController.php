<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;

class BlogCategoriesController extends Controller {

    public function index() {
        $categories = BlogCategory::all();

        return view('admin.blog-categories.index', [
            'categories' => $categories,
        ]);
    }

    public function add() {
        return view('admin.blog-categories.add');
    }

    public function insert() {
        $request = request();

        $formData = $request->validate([
            'title' => 'required|string|min:2',
        ]);

        $category = BlogCategory::create($formData);

        return redirect()
                        ->route('admin.categories')
                        ->with('systemMessage', 'Category has been added');
    }

    public function edit($id) {
        $category = BlogCategory::findOrFail($id);

        return view('admin.blog-categories.edit', [
            'category' => $category,
        ]);
    }

    public function upload($id) {
        $formData = request()->validate([
            'title' => 'required|string|min:2',
        ]);

        $category = BlogCategory::findOrFail($id);
        $category->fill($formData)
                ->save();

        return redirect()->route('admin.categories')
                        ->with('systemMessage', 'Category has been edit');
    }

    public function delete() {

        $id = request()->input('id');

        $category = BlogCategory::findOrFail($id);

        if ($category->blogPosts()->count() == 0) {

            $category->delete();
        } else {
            return redirect()
                            ->back()
                            ->with('systemMessage', 'Category can not be deleted because it contains one of more blog posts');
        }



        return redirect()
                        ->back()
                        ->with('systemMessage', 'Category has been deleted');
    }

}
