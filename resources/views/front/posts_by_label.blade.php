@if ($front_all_posts->currentPage() == '1')
    @if ($get_one_cat)
        <div class="posts_by_label">
            <div class="by_label_header">
                <div class="label_name">
                    {{ $get_one_cat->name }}
                </div>
                <div class="label_readmore">
                    <a href=" {{ route('blog.category', $get_one_cat->link) }}">
                        إقرأ المزيد
                    </a>
                </div>
            </div>
            <div class="label_posts">
                @foreach ($get_one_cat->posts->take('9') as $post)
                    <div class="one_label_div">
                        <div class="label_image imagehover">
                            <a href="{{ '/' . $post->slug }}">
                                @if ($post->image)
                                    <img src="{{ '/uploads/posts/' . $post->image }}" alt="">
                                @else
                                    <img src="{{ URL::asset('uploads/default.png') }}" width="100%" alt="">
                                @endif
                            </a>
                            <div class="label_date"> {{ $post->created_at->diffForHumans() }} </div>
                        </div>
                        <div class="label_title"> <a href="{{ '/' . $post->slug }}">{{ $post->title }}</a> </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endif

{{-- *******************************
************************************
************************************
************************************
******************************* --}}
@if ($front_all_posts->currentPage() == '1')
    @if ($get_second_cat)
        <div class="posts_by_label">
            <div class="by_label_header">
                <div class="label_name">
                    {{ $get_second_cat->name }}
                </div>
                <div class="label_readmore">
                    <a href=" {{ route('blog.category', $get_second_cat->link) }}">
                        إقرأ المزيد
                    </a>
                </div>
            </div>
            <div class="label_posts">
                @foreach ($get_second_cat->posts->take('9') as $sec_post)
                    <div class="one_label_div">
                        <div class="label_image imagehover">
                            <a href="{{ '/' . $sec_post->slug }}">
                                @if ($sec_post->image)
                                    <img src="{{ '/uploads/posts/' . $sec_post->image }}" alt="">
                                @else
                                    <img src="{{ URL::asset('uploads/default.png') }}" width="100%" alt="">
                                @endif
                            </a>
                            <div class="label_date"> {{ $sec_post->created_at->diffForHumans() }} </div>
                        </div>
                        <div class="label_title"> <a href="{{ '/' . $sec_post->slug }}">{{ $sec_post->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endif


{{-- *******************************
************************************
************************************
************************************
******************************* --}}
@if ($front_all_posts->currentPage() == '1')
    @if ($get_third_cat)
        <div class="posts_by_label">
            <div class="by_label_header">
                <div class="label_name">
                    {{ $get_third_cat->name }}
                </div>
                <div class="label_readmore">
                    <a href=" {{ route('blog.category', $get_third_cat->link) }}">
                        إقرأ المزيد
                    </a>
                </div>
            </div>
            <div class="label_posts">
                @foreach ($get_third_cat->posts->take('9') as $third_post)
                    <div class="one_label_div">
                        <div class="label_image imagehover">
                            <a href="{{ '/' . $third_post->slug }}">
                                @if ($third_post->image)
                                    <img src="{{ '/uploads/posts/' . $third_post->image }}" alt="">
                                @else
                                    <img src="{{ URL::asset('uploads/default.png') }}" width="100%" alt="">
                                @endif
                            </a>
                            <div class="label_date"> {{ $third_post->created_at->diffForHumans() }} </div>
                        </div>
                        <div class="label_title"> <a href="{{ '/' . $third_post->slug }}">{{ $third_post->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endif
{{-- *******************************
************************************
************************************
************************************
******************************* --}}
