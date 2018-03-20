@extends('front.layout')

@section('class_for_gread', 'blog blog-grid right-sidebar')

@section('content')

<div id="content" class="site-content" tabindex="-1" >
    <div class="col-full">
        <div class="pizzaro-breadcrumb">
            <nav class="woocommerce-breadcrumb" >
                <a href="{{url('/')}}">Home</a><span class="delimiter"><i class="po po-arrow-right-slider"></i></span>Page 1
            </nav>
        </div>
        <!-- .woocommerce-breadcrumb -->
        <div id="primary" class="content-area">
            <main id="main" class="site-main" >
                <div class="posts">

                    <!-- #post-## -->

                    @foreach($posts as $post)
                    <article id="post-{{$post->id}}" class="post-{{$post->id}} post type-post status-publish format-image has-post-thumbnail sticky hentry category-technology tag-event tag-festival tag-music tag-woocommerce post_format-post-format-image">
                        <header class="entry-header">
                            <div class="media-attachment">
                                <div class="post-thumbnail">
                                    <a href="{{route('blog-post', ['id' => $post->id])}}">
                                        <img width="1619" height="827" src="{{\Storage::disk('public')->url('/blog-posts-images/' . $post->photo_filename)}}" class="attachment-full size-full wp-post-image" alt="{{$post->title}}" />
                                    </a>
                                </div>
                            </div>
                            <h1 class="alpha entry-title">
                                <a href="{{route('blog-post', ['id' => $post->id])}}" rel="bookmark">{{$post->title}}</a>
                            </h1>
                            <div class="entry-meta">
                                <div class="cat-links">
                                    @foreach($categories as $category)
                                    @if($category->id == $post->blog_category_id)
                                    <a href="{{route('blog-post', ['id' => $post->id])}}" rel="category tag">{{$category->title}}</a>
                                    @endif
                                    @endforeach
                                </div>
                                <span class="posted-on">
                                    <a href="{{route('blog-post', ['id' => $post->id])}}" rel="bookmark">
                                        <time class="entry-date published" datetime="2016-10-13T14:53:25+00:00">{{$post->published_at}}</time>
                                    </a>
                                </span>
                                <div class="author">
                                    <div class="label">Posted by:</div>
                                    <a href="{{route('blog-post', ['id' => $post->id])}}" title="Posts by farook" rel="author">{{$post->author}}</a>
                                </div>
                            </div>
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <p>{{$post->description}}</p>
                            <div class="post-readmore">
                                <a href="{{route('blog-post', ['id' => $post->id])}}" class="read-more-text">Read More</a>
                            </div>
                            <span class="comments-link">
                                <a href="{{route('blog-post', ['id' => $post->id])}}">Leave a comment</a>
                            </span>
                        </div>
                    </article>
                    @endforeach




                </div>
                <!-- /.posts -->
                <nav id="post-navigation" class="navigation pagination"  aria-label="Post Navigation">
                    <span class="screen-reader-text">Posts navigation</span>
                    <div class="nav-links">
                        <ul class='page-numbers'>
                            {{$posts->Links()}}
<!--                            <li><span class='page-numbers current'>1</span></li>
                            <li><a class='page-numbers' href='#'>2</a></li>
                            <li><a class="next page-numbers" href="#">Next Page &nbsp;&nbsp;&nbsp;&rarr;</a></li>-->
                        </ul>
                    </div>
                </nav>
            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
        <div id="secondary" class="widget-area" role="complementary">
            <div id="pizzaro_about_widget-2" class="widget pizzaro_about_widget">
                <div class="about-image">
                    <img alt="" class="featured-image" src="assets/images/sidebar-about-1.jpg">
                    <img alt="" class="logo" src="assets/images/sidebar-about-2.png">
                </div>
                <div class="about-info">
                    <h2>Welcome</h2>
                    <p>Cras convallis nisl sit amet commodo molestie. Donec gravida, sem et ornare fringilla, metus dui aliquet est, gravida.</p>
                    <ul class="social-icons list-inline">
                        <li><a class="fa fa-facebook" href="#"></a></li>
                        <li><a class="fa fa-twitter" href="#"></a></li>
                        <li><a class="fa fa-instagram" href="#"></a></li>
                        <li><a class="fa fa-youtube" href="#"></a></li>
                    </ul>
                </div>
            </div>
            <div id="search-2" class="widget widget_search">
                <form role="search" method="get" class="search-form" action="blog-single.html">
                    <label>
                        <span class="screen-reader-text">Search for:</span>
                        <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" />
                    </label>
                    <input type="submit" class="search-submit" value="Search" />
                </form>
            </div>
            <div id="pizzaro_recent_posts_widget-2" class="widget pizzaro_recent_posts_widget">
                <span class="gamma widget-title">Recent Posts</span>
                <ul>
                    <li>
                        <div class="post-thumbnail">
                            <a href="blog-single.html">
                                <img width="300" height="153" src="assets/images/blog/blog-s-1.jpg" class="attachment-medium size-medium wp-post-image" alt="4" />
                            </a>
                        </div>
                        <div class="post-content">
                            <span class="comments-link">
                                <a href="blog-single.html">&nbsp;</a>
                            </span>
                            <span class="post-date">October 13, 2016</span>
                            <a class ="post-name" href="blog-single.html">Pizza Festival – Reopen</a>
                        </div>
                    </li>
                    <li>
                        <div class="post-thumbnail">
                            <a href="blog-single.html">
                                <img alt="" src="//placehold.it/370x220" />
                            </a>
                        </div>
                        <div class="post-content">
                            <span class="comments-link">
                                <a href="blog-single.html">&nbsp;</a>
                            </span>
                            <span class="post-date">October 13, 2016</span>
                            <a class ="post-name" href="blog-single.html">Music for Dinner &#8211; Audio Player</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="tag_cloud-2" class="widget widget_tag_cloud">
                <span class="gamma widget-title">Popular Tags</span>
                <div class="tagcloud">
                    <a href='#' class='tag-link-39 tag-link-position-1' title='1 topic'>amazon like</a>
                    <a href='#' class='tag-link-46 tag-link-position-2' title='1 topic'>audio</a>
                    <a href='#' class='tag-link-27 tag-link-position-3' title='5 topics'>awsome</a>
                    <a href='#' class='tag-link-28 tag-link-position-4' title='2 topics'>bootstrap</a>
                    <a href='#' class='tag-link-32 tag-link-position-5' title='3 topics'>buy it</a>
                    <a href='#' class='tag-link-33 tag-link-position-6' title='2 topics'>clean design</a>
                    <a href='#' class='tag-link-48 tag-link-position-7' title='1 topic'>event</a>
                    <a href='#' class='tag-link-47 tag-link-position-8' title='1 topic'>festival</a>
                    <a href='#' class='tag-link-45 tag-link-position-9' title='3 topics'>music</a>
                    <a href='#' class='tag-link-29 tag-link-position-10' title='4 topics'>template</a>
                    <a href='#' class='tag-link-42 tag-link-position-11' title='1 topic'>video</a>
                    <a href='#' class='tag-link-30 tag-link-position-12' title='4 topics'>woocommerce</a>
                    <a href='#' class='tag-link-31 tag-link-position-13' title='4 topics'>wordpress</a>
                </div>
            </div>
            <div id="woocommerce_products-2" class="widget woocommerce widget_products">
                <span class="gamma widget-title">Best Deals</span>
                <ul class="product_list_widget">
                    <li>
                        <a href="#" title="Orange Juice">
                            <img width="180" height="180" src="assets/images/blog/sidebar-product-1.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="28" />
                            <span class="product-title">Orange Juice</span>
                        </a>
                        <span class="widget-price">
                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#036;</span>1.90</span>
                        </span>
                    </li>
                    <li>
                        <a href="#" title="Cola Bottle">
                            <img width="180" height="180" src="assets/images/blog/sidebar-product-2.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="22" />
                            <span class="product-title">Cola Bottle</span>
                        </a>
                        <span class="widget-price">
                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#036;</span>2.90</span>
                        </span>
                    </li>
                    <li>
                        <a href="#" title="Hawaii Vegetarian Pizza">
                            <img width="180" height="180" src="assets/images/blog/sidebar-product-3.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="13" />
                            <span class="product-title">Hawaii Vegetarian Pizza</span>
                        </a>
                        <span class="widget-price">
                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#036;</span>39.80</span>&ndash;<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#036;</span>59.90</span>
                        </span>
                    </li>
                    <li>
                        <a href="#" title="Grand Italiano">
                            <img width="180" height="180" src="assets/images/blog/sidebar-product-4.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="2" />
                            <span class="product-title">Grand Italiano</span>
                        </a>
                        <span class="widget-price">
                            <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#036;</span>22.90</span></del>
                            <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#036;</span>19.90</span></ins>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- #secondary -->
    </div>
    <!-- .col-full -->
</div>

@endsection