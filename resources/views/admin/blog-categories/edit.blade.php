@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('admin.categories')}}">{{__('front.categories')}}</a>
    </li>
    <li class="breadcrumb-item active">
        {{__('front.edit')}}
    </li>
</ol>
<h1>{{__('front.edit')}} {{__('front.first_blog')}} {{__('front.first_category')}}: {{$category->name}}</h1>
<hr>			
@include('admin.global-partials.system-messages')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> {{__('front.edit')}} {{__('front.first_blog')}} {{__('front.first_category')}}
    </div>
    <div class="card-body">
        <form action="" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>{{__('front.title')}}</label> 
                <input name="title" placeholder="Enter Category" required 
                       class="form-control here" type="text" value="{{old('title', $category->title)}}"> 
                @if($errors->has('title'))
                <div class="form-errors text-danger">
                    @foreach($errors->get('title') as $errorMessage)
                    <label class="error">{{$errorMessage}}</label>
                    @endforeach
                </div>
                @endif
            </div> 
            <div class="form-group text-right">
                <a href="{{route('admin.categories')}}" class="btn btn-secondary">{{__('front.cancel')}}</a>
                <button name="submit" type="submit" class="btn btn-primary">{{__('front.save')}}</button>
            </div>
        </form>
    </div>
</div>
@endsection