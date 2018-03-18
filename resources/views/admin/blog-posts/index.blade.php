@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('admin.posts')}}">{{__('front.first_blog')}} {{__('front.page_posts')}}</a>
    </li>
</ol>
<h1>{{__('front.first_blog')}} {{__('front.page_posts')}} {{__('front.list')}}</h1>
<hr>			
@include('admin.global-partials.system-messages')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> {{__('front.first_blog')}} {{__('front.page_posts')}} {{__('front.list')}}

        <div class="btn-group btn-group-sm float-right">
            <a class="btn btn-secondary" href="{{route('admin.posts.add')}}">
                <i class="fa fa-plus"></i>
                {{__('front.add')}} {{__('front.first_blog')}} {{__('front.first_post')}}
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('front.first_publish')}} {{__('front.date')}}</th>
                        <th>{{__('front.first_category')}}</th>
                        <th>{{__('front.title')}}</th>
                        <th>{{__('front.first_author')}}</th>
                        <th class="text-center">{{__('front.actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->published_at}}</td>
                        <td>{{optional($post->blogCategories)->title}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->author}}</td>
                        <td style="text-align: center">
                            <div class="btn-group" >
                                <a class="btn btn-secondary" 
                                   href="{{route('admin.posts.edit', ['id' => $post->id])}}" 
                                   title="edit"
                                   >
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button class="btn btn-secondary"
                                        title="delete" 
                                        data-action="delete"
                                        data-id="{{$post->id}}"
                                        >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<form class="modal fade" id="delete-record-modal" 
      tabindex="-1" role="dialog" aria-hidden="true"
      method="post" action="{{route('admin.posts.delete')}}"
      >
    {{csrf_field()}}
    <input type="hidden" name="id" value="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('front.posts')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{__('front.delete_?')}}{{__('front.blog')}} {{__('front.low_post')}}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('front.cancel')}}</button>
                <button type="submit" class="btn btn-danger">{{__('front.delete')}}</button>
            </div>
        </div>
    </div>
</form>

@endsection
@push('footer_javascript')
<script>
    $('#dataTable').on('click', '[data-action="delete"]', function (e) {

        e.preventDefault();

        var target = $(this);

        var id = target.attr('data-id');

        var deletePopup = $('#delete-record-modal');

        deletePopup.find('[name="id"]').val(id);

        deletePopup.modal('show');
    });

</script>
@endpush