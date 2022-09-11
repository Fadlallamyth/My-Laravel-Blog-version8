@extends('front.layouts.app')
@section('title','التصنيف: '.$category->name)
@section('front_content')
    <div class="maincontainer">
        <div class="posts_content">
            <div class="posts_right">
                
                
                @foreach ($category->posts()->paginate('6') as $post)
                    {{-- repeated Class --}}
                    <div class="inside_posts_right">
                        <div class="post_image imagehover">
                            <a href="{{ '/'.$post->slug }}">
                                @if ($post->image)
                                    <img src="{{ URL::asset('uploads/posts/' . $post->image) }}" width="100%" alt="">
                                @else
                                    <img src="{{ URL::asset('uploads/default.png') }}" width="100%" alt="">
                                @endif
                            </a>
                        </div>
                        <div class="post_details">

                            <a href="{{ '/'.$post->slug }}">
                                <div class="hundred_post_details p_title">
                                    {{ Str::substr($post->title, 0, 70) }}
                                </div>
                                <div class="hundred_post_details p_user_time">
                                    Fadlalla Abass
                                    |
                                    {{ $post->created_at->diffForHumans() }}
                                    |
                                    {{ $post->category->name }}
                                </div>
                                <div class="hundred_post_details p_snip">
                                    {{-- {{ Str::substr(strip_tags($post->content, 0, 150)) }} --}}

                                    {!! strip_tags(Str::substr($post->content, 0, 160) . ($end = '...')) !!}

                                </div>
                                <div class="hundred_post_details p_read_more">
                                    <a href="{{ '/'.$post->slug }}" class="bluecolor"> إقرأ
                                        المزيد
                                    </a>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{-- repeated Class --}}
                @endforeach

                <div class="pagination_div_posts">
                    {{ $category->posts()->paginate('6')->links() }}
                </div>
                
            </div>

            @include('front.layouts.front_templates.sidebar')
        </div>
    </div>
@endsection
