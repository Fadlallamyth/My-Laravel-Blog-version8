@extends('front.layouts.app')
@section('title', $title_or_blog)
@section('front_content')
    <div class="maincontainer">
        <div class="posts_content">
            <div class="posts_right">
                <div class="inside_posts_right">
                    <div class="blog_p_padding">
                        <div class="blog_post_div">
                            <div class="main_h1_title">
                                <h1> {{ $this_post->title }} </h1>
                            </div>
                        </div>
                        <div class="blog_post_div">
                            Fadlalla Abass
                            |
                            {{ $this_post->created_at->diffForHumans() }}
                            @if (!empty($this_post->category->name))
                                |{{ $this_post->category->name }}
                            @endif
                        </div>
                        <div class="blog_post_div">
                            @if ($this_post->image)
                                <img src="{{ URL::asset('uploads/posts/' . $this_post->image) }}" width="100%"
                                    alt="">
                            @else
                                <img src="{{ URL::asset('uploads/default.png') }}" width="100%" alt="">
                            @endif
                        </div>
                        <div class="blog_post_div">
                            {!! $this_post->content !!}
                        </div>
                        <div class="pinterest-img">
                            <a href="{{  $this_post->slug }}"></a>
                        </div>
                       
                    </div>

                    <div class="share-buttons">
                        <div class="share-btn-container">
                            <div class="btn0social">
                                <b> مشاركة: </b>
                            </div>
                            <div class="btn0social">
                            <a href="" class="facebook-btn" target="_blank" onclick="window.open(this.href,'name','toolbar=0,status=0,width=668,height=534')">
                                <i class="fa fa-facebook"></i>
                            </a>
                            </div>

                            <div class="btn0social">
                            <a href="" class="twitter-btn" target="_blank" onclick="window.open(this.href,'name','toolbar=0,status=0,width=668,height=534')">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                      
                            <div class="btn0social">
                            <a href="#" class="pinterest-btn" target="_blank" onclick="window.open(this.href,'name','toolbar=0,status=0,width=668,height=534')">
                              <i class="fa fa-pinterest"></i>
                            </a>
                        </div>
                      
                            <div class="btn0social">
                            <a href="#" class="linkedin-btn" target="_blank" onclick="window.open(this.href,'name','toolbar=0,status=0,width=668,height=534')">
                              <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                      
                            <div class="btn0social">
                            <a href="#" class="whatsapp-btn" class="pinterest-btn" target="_blank" onclick="window.open(this.href,'name','toolbar=0,status=0,width=668,height=534')">
                            
                              <i class="fa fa-whatsapp"></i>
                            </a>
                        </div>
                          </div>
                    </div>

                </div>
                
    

                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                @if ($relatedPosts)
                @if ($relatedPosts->count() > 0)
                    <div class="related_container">
                        <div class="static_bg_header">
                            <p> مواضيع ذات صلة </p>
                        </div>
                        <div class="big_div">
                          
                            @foreach ($relatedPosts as $re_post)
                                <div class="div333">
                                    <a href="{{ $re_post->slug }}">
                                    <div class="related_holder">
                                        <div class="image_related">
                                            <div class="ins_image_related imagehover">
                                            
                                                @if ($re_post->image)
                                                    <img src="{{ URL::asset('uploads/posts/' . $re_post->image) }}"
                                                        alt="" width="100%">
                                                @else
                                                    <img src="{{ URL::asset('uploads/default.png/') }}" alt=""
                                                        width="100%">
                                                @endif
                                            </div>
                                        </div>
                                        <span class="re_title">
                                            <p>  {{ $re_post->title }} </p>
                                        </span>
                                    </div>
                                    </a>

                                </div>
                            @endforeach
                        </div>
                    </div>

                @endif
                @endif
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}
                {{-- related posts --}}


                <div class="comments">

                    @foreach ($this_post->comments as $comment)
                        <div class="comments_holder">
                            <div class="comments_area">
                                <div class="user_comment_img"> <img src="{{ asset('images/1.jpg') }}" alt="">
                                </div>
                                <div class="comment_details">
                                    <div class="user_comment_name"> Fadlalla Abass </div>
                                    <div class="user_comment_time"> منذ 10 ساعات </div>
                                </div>
                            </div>
                            {{ $comment->comment }}
                        </div>
                    @endforeach


                    <div class="comments_form">
                        <div class="form_holder">
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <div class="m-bottom">
                                    <textarea type="text" class="formcontrol" name="comment"></textarea>
                                    <input type="hidden" value="{{ $this_post->id }}" name="post_id">
                                </div>
                                <div class="m-bottom"> <button class="bluecolor">تعليق</button> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @include('front.layouts.front_templates.sidebar')
        </div>
    </div>
@endsection
