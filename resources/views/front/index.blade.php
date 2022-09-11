@extends('front.layouts.app')
@section('title', 'الرئيسية')
@section('front_content')
    <div class="maincontainer">
        <div class="posts_content">
            {{-- including news ticker --}}
            @include('front.news_ticker')
            {{-- by Label --}}
            {{-- by Label --}}
            {{-- by Label --}}
            {{-- by Label --}}
            @if ($front_all_posts->currentPage() == '1')
                @if ($header_post_label)
                    <div class="posts_by_label" style="margin-top: 20px">
                        <div class="by_label_header">
                            <div class="label_name">
                                {{ $header_post_label->name }}
                            </div>
                            <div class="label_readmore">
                                <a href=" {{ route('blog.category', $header_post_label->link) }}">
                                    إقرأ المزيد
                                </a>
                            </div>
                        </div>
                        <div class="label_posts">
                            @foreach ($header_post_label->posts->take('9') as $post)
                                <div class="one_label_div">
                                    <div class="label_image imagehover">
                                        <a href="{{ '/' . $post->slug }}">
                                            @if ($post->image)
                                                <img src="{{ '/uploads/posts/' . $post->image }}" alt=""
                                                    style="height: 218px">
                                            @else
                                                <img src="{{ URL::asset('uploads/default.png') }}" width="100%"
                                                    alt="">
                                            @endif
                                        </a>
                                        <div class="label_date"> {{ $post->created_at->diffForHumans() }} </div>
                                    </div>
                                    <div class="label_title"> <a href="{{ '/' . $post->slug }}">{{ $post->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif
            {{-- by Label --}}
            {{-- by Label --}}
            {{-- by Label --}}
            {{-- by Label --}}
            {{-- / including news ticker --}}
            <div class="posts_right">
                @include('front.posts_by_label')
                {{-- ****************************************
                *********************************************
                *********************************************
                *********** اخر الموضوعات ******************
                *********************************************
                *********************************************
                *********************************************
                **************************************** --}}
                @foreach ($front_all_posts as $post)
                    {{-- repeated Class --}}
                    <div class="inside_posts_right">
                        <div class="post_image imagehover">
                            <a href="{{ '/' . $post->slug }}">
                                @if ($post->image)
                                    <img src="{{ URL::asset('uploads/posts/' . $post->image) }}" width="100%"
                                        alt="">
                                @else
                                    <img src="{{ URL::asset('uploads/default.png') }}" width="100%" alt="">
                                @endif
                            </a>
                        </div>
                        <div class="post_details">

                            <a href="{{ '/' . $post->slug }}">
                                <div class="hundred_post_details p_title">
                                    {{ Str::substr($post->title, 0, 70) }}
                                </div>
                                <div class="hundred_post_details p_user_time">
                                    Fadlalla Abass
                                    |
                                    {{ $post->created_at->diffForHumans() }}

                                    @if (!empty($post->category->name))
                                        | {{ $post->category->name }}
                                    @endif
                                </div>
                                <div class="hundred_post_details p_snip">
                                {!! strip_tags(Str::substr($post->content, 0, 160) . ($end = '...')) !!}
                                </div>
                                <div class="hundred_post_details p_read_more">
                                    <a href="{{ $post->slug }}" class="bluecolor"> إقرأ
                                        المزيد
                                    </a>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- ************************************
                *********************************************
                *********************************************
                *********** / اخر الموضوعات ****************
                *********************************************
                *********************************************
                *********************************************
                **************************************** --}}
                @endforeach
                <div class="pagination_div_posts">
                    {{ $front_all_posts->links() }}
                </div>
                <div class="nomorepages">
                    @if(!$front_all_posts->hasMorePages())
                    <span style="margin-right: 10px;display:block; text-align: center;">  لا مزيد من المشاركات </span>
                    @endif
                </div>
            </div>
            @include('front.layouts.front_templates.sidebar')
            {{-- by Label --}}
            {{-- by Label --}}
            {{-- by Label --}}
            {{-- by Label --}}
            @if ($front_all_posts->currentPage() == '1')
                @if ($get_fourth_cat)
                    <div class="posts_by_label" style="margin-top: 20px">
                        <div class="by_label_header">
                            <div class="label_name">
                                {{ $get_fourth_cat->name }}
                            </div>
                            <div class="label_readmore">
                                <a href=" {{ route('blog.category', $get_fourth_cat->link) }}">
                                    إقرأ المزيد
                                </a>
                            </div>
                        </div>
                        <div class="label_posts">
                            @foreach ($get_fourth_cat->posts->take('9') as $fourth_post)
                                <div class="one_label_div">
                                    <div class="label_image imagehover">
                                        <a href="{{ '/' . $fourth_post->slug }}">
                                            @if ($fourth_post->image)
                                                <img src="{{ '/uploads/posts/' . $fourth_post->image }}" alt=""
                                                    style="height: 218px">
                                            @else
                                                <img src="{{ URL::asset('uploads/default.png') }}" width="100%"
                                                    alt="">
                                            @endif
                                        </a>
                                        <div class="label_date"> {{ $fourth_post->created_at->diffForHumans() }} </div>
                                    </div>
                                    <div class="label_title"> <a
                                            href="{{ '/' . $fourth_post->slug }}">{{ $fourth_post->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif
            {{-- by Label --}}
            {{-- by Label --}}
            {{-- by Label --}}
            {{-- by Label --}}
        </div>
    </div>
@endsection
