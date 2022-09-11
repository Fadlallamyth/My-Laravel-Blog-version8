<div class="posts_left">
    <div class="inside_posts_left">
        <div class="sidebar_onediv">
            <h4> <span class="eyeclasseye"><i class="fa fa-eye"></i></span> الأكثر مشاهدة  </h4>
            <div class="details_sidebar_onediv">
                @foreach ($mosts_views as $p_post)
                    <div class="pupolasr_posts">
                        <div class="image_handler">
                            <div class="inside_image_handler imagehover">
                                <a href="{{ '/'.$p_post->slug }}">
                                    @if ($p_post->image)
                                        <img src="{{ URL::asset('uploads/posts/' . $p_post->image) }}" width="100%"
                                            alt="">
                                    @else
                                        <img src="{{ URL::asset('uploads/default.png') }}" width="100%"
                                            alt="">
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="title_handler">
                            <a href="">
                                {{ $p_post->title }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
