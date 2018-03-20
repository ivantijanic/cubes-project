<section id="comments" class="comments-area" aria-label="Post Comments">
    <div id="respond" class="comment-respond">
        <span id="reply-title" class="gamma comment-reply-title">Leave a Reply
            <small>
                <a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a>
            </small>
        </span>
        <form  id="commentform" class="comment-form" novalidate action="" method="post">
            {{csrf_field()}}
            <p class="comment-notes">
                <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
            </p>

            <p class="comment-form-comment">
                <label for="comment">Comment</label>
                <textarea id="comment" name="body" cols="45" rows="8" maxlength="65525">{{old('body')}}</textarea>
                @if($errors->has('comment'))
            <div class="form-errors text-danger">
                @foreach($errors->get('comment') as $errorMessage)
                <label class="error">{{$errorMessage}}</label>
                @endforeach
            </div>
            @endif
            </p>
            <p class="comment-form-author">
                <label for="author">Name <span class="required">*</span></label>
                <input id="author" name="visitor_name" type="text" value="{{old('visitor_name')}}" size="30" maxlength="245" aria-required='true' required='required' />
                @if($errors->has('author'))
            <div class="form-errors text-danger">
                @foreach($errors->get('author') as $errorMessage)
                <label class="error">{{$errorMessage}}</label>
                @endforeach
            </div>
            @endif
            </p>
            <p class="comment-form-email">
                <label for="email">Email <span class="required">*</span></label>
                <input id="email" name="email" type="email" value="{{old('email')}}" size="30" maxlength="100" aria-describedby="email-notes" aria-required='true' required='required' />
                @if($errors->has('email'))
            <p class="form-errors text-danger">
                @foreach($errors->get('email') as $errorMessage)
                <label class="error">{{$errorMessage}}</label>
                @endforeach
            </p>
            @endif
            </p>

            <p class="form-submit">
                <input name="submit" type="submit" id="submit" class="submit" value="Post Comment" />
                <input type='hidden' name='blog_post_id' value='{{$post->id}}' id='comment_post_ID' />
<!--                                    <input type='hidden' name='comment_parent' id='comment_parent' value='0' />-->
            </p>
            <p>
                @include('front.global-partials.system-messages')
            </p>
        </form>

    </div>
    <!-- #respond -->
</section>

<!-- #ubacio sam ja -->
<div id="content" class="demos">
    <div class="container">
        <div class="row">
            <!--Blog Roll Content-->

            <div class="col-md-8 blog-post">

                <div class="comments" id="comments">
                    <h3>
                        Latest comments {{$post->title}}
                    </h3>
                    <ul class="media-list list-unstyled">
                        @foreach($comments as $comment)
                        <li class="media row">
                            <div class="col-sm-2 hidden-xs">
                                <img src="http://via.placeholder.com/100x100" alt="Visitor name" class="media-object img-polaroid" />
                            </div>
                            <div class="col-sm-10">
                                <div class="media-body">
                                    <ul class="list-inline meta text-muted">
                                        <li><i class="glyphicon glyphicon-calendar"></i> <span class="visible-desktop">Created:</span> {{$comment->created_at}}</li>
                                        <li><i class="glyphicon glyphicon-user"></i> <span class="visible-desktop">By</span> {{$comment->visitor_name}}</li>
                                    </ul>
                                    <h5 class="media-heading">
                                        <a href="{{route('blog-post', ['id' => $comment->blog_post_id])}}">
                                            {{$post->title}}
                                        </a>
                                    </h5>
                                    <p>{{$comment->body}}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    {{$comments->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #ubacio sam ja -->
