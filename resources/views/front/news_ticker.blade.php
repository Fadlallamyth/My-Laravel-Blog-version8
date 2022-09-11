 {{-- header_tricker --}}
 <div class="header_tricker">
    <div class="tricker_text">
        <div class="title_head">
            أخر الاخبار |
        </div>
        <div class="text_head">
            <ul id="news">
                @foreach ($front_all_posts as $post)
                    <li>
                        <a href="{{ '/' . $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
{{-- header_tricker --}}