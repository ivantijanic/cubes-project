@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('admin.posts')}}">{{__('front.first_post')}}</a>
    </li>
    <li class="breadcrumb-item active">
        {{__('front.edit')}}
    </li>
</ol>
<h1>{{__('front.edit')}} {{__('front.page_blog')}} {{__('front.first_post')}}: {{$post->title}}</h1>
<hr>			
@include('admin.global-partials.system-messages')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> {{__('front.edit')}} {{__('front.page_blog')}} {{__('front.first_post')}}
    </div>
    <div class="card-body">
        <form class="row" action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <fieldset class="col-lg-6">
                <legend>General settings</legend>
                <hr>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>Blog Category</label>
                        <select class="form-control" name="blog_category_id">
                            <option>--- Choose Blog Category ---</option>
                            @foreach($blogCategories as $blogCategory)
                            <option
                                {{old('blog_category_id', $post->blog_category_id) == $blogCategory->id ? 'selected' : ''}}
                                value="{{$blogCategory->id}}"
                                >
                                {{$blogCategory->title}}
                            </option>
                            @endforeach
                        </select>
                        @if($errors->has('blog_category_id'))
                        <div class="form-errors text-danger">
                            @foreach($errors->get('blog_category_id') as $errorMessage)
                            <label class="error">{{$errorMessage}}</label>
                            @endforeach
                        </div>
                        @endif

                    </div>
                    <div class="form-group col-lg-6">
                        <label>Publish Date</label> 
                        <input name="published_at" placeholder="Enter publication date" required="required" class="form-control" type="text" value="{{old('published_at', $post->published_at)}}"> 
                        @if($errors->has('published_at'))
                        <div class="form-errors text-danger">
                            @foreach($errors->get('published_at') as $errorMessage)
                            <label class="error">{{$errorMessage}}</label>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Title</label> 
                    <input name="title" placeholder="Enter Title" required="required" class="form-control" type="text" value="{{old('title', $post->title)}}"> 
                    @if($errors->has('title'))
                    <div class="form-errors text-danger">
                        @foreach($errors->get('title') as $errorMessage)
                        <label class="error">{{$errorMessage}}</label>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Author</label> 
                    <input name="author" placeholder="Enter Author name" class="form-control" type="text" value="{{old('author', $post->author)}}"> 
                    @if($errors->has('author'))
                    <div class="form-errors text-danger">
                        @foreach($errors->get('author') as $errorMessage)
                        <label class="error">{{$errorMessage}}</label>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="row">
                    <fieldset class="col-lg-12">
                        <legend>Tags</legend>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <select name="tag_ids[]" class="form-control" multiple>
                                    @foreach($tags as $tag)
                                    <option
                                        value="{{$tag->id}}"
                                        @if(in_array($tag->id, old('tag_ids', $post->tags->pluck('id')->toArray())))
                                        selected
                                        @endif
                                        >
                                        {{$tag->title}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="form-group">
                <label>Description</label> 
                <textarea name="description" placeholder="Enter Description" class="form-control" rows="8">{{old('description', $post->description)}}</textarea>
                @if($errors->has('description'))
                <div class="form-errors text-danger">
                    @foreach($errors->get('description') as $errorMessage)
                    <label class="error">{{$errorMessage}}</label>
                    @endforeach
                </div>
                @endif
            </div> 
        </fieldset>
        <fieldset class="col-lg-6">
            <legend>Leading photo</legend>
            <hr>
            <div class="text-center mb-5">
                @if($post->image && \Storage::disk('public')->exists('/blog-posts/' . $post->image))
                <img 
                    class="img-fluid img-thumbnail" 
                    src="{{\Storage::disk('public')->url('/blog-posts/' . $post->image)}}" 
                    alt="placeholder">
                @else
                <img class="img-fluid img-thumbnail" src="http://via.placeholder.com/640x480" alt="placeholder">
                @endif





            </div>

            <div class="form-group">
                <label>Upload photo</label>
                <div class="custom-file">
                    <input name="blog_post_photo" type="file" class="custom-file-input" id="blog_post_photo">
                    <label class="custom-file-label" for="blog_post_photo">Choose photo</label>
                </div>
                @if($errors->has('blog_post_photo'))
                <div class="form-errors text-danger">
                    @foreach($errors->get('blog_post_photo') as $errorMessage)
                    <label class="error">{{$errorMessage}}</label>
                    @endforeach
                </div>
                @endif
            </div>
        </fieldset>
        <fieldset class="col-lg-12">
            <legend>Blog post content</legend>
            <hr>
            <div class="form-group">
                <textarea name="body" placeholder="Enter content" class="form-control" rows="20">{{old('body', $post->body)}}</textarea>
                @if($errors->has('body'))
                <div class="form-errors text-danger">
                    @foreach($errors->get('body') as $errorMessage)
                    <label class="error">{{$errorMessage}}</label>
                    @endforeach
                </div>
                @endif
            </div>
        </fieldset>
        <div class="form-group text-right col-lg-12">
            <hr>
            <button name="submit" type="submit" class="btn btn-secondary">Cancel</button>
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>




</div>
</div>
@endsection

@push('head_links')
<link href="{{url('/skins/admin/vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@push('footer_javascript')
<script src="{{url('/skins/admin/vendor/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
$('#row-form select[name="product_category_id"]').select2({

});

$('#row-form select[name="product_brand_id"]').select2({

});

$('#row-form select[name="tag_ids[]"]').select2({
    'placeholder': "Choose 3 or more tags",
    'allowClear': true
});
</script>

@endpush