    <header>
        <div class="above_menu_header">
            <div class="open_blog_nav">
                <span class="blog_nav"> <i class="fa fa-bars"></i></span>
            </div>
            <div class="header_right">
                <div class="header_right_menu">
                    <h4 class="main_menu_title"> قائمة الصفحات </h4>
                    <ul>
                        @foreach ($pages as $page)
                            <li><a href="{{ $page->slug }}"> {{ $page->title }} </a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="header_left">
                <div class="header_left_menu">
                    <ul>
                        <li> <i class="fa fa-facebook"></i> </li>
                        <li> <i class="fa fa-twitter"></i> </li>
                        <li> <i class="fa fa-instagram"></i> </li>
                        <li> <i class="fa fa-whatsapp"></i> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="down_menu_header">
            <div class="down_menu_logo">
                <a href="/">
                    @if (!empty($website_logo) && $website_logo !== 'NULL' )
                    <img src="{{ asset('uploads/logo/'.$website_logo) }}" style="width: 100%;height:100%;object-fit:cover" alt="">
                    @else
                    {{ $website_name }}
                    @endif
                </a>
            </div>
            <div class="down_menu_links">
                <h4 class="main_menu_title"> القائمة الرئيسية </h4>
                <ul>
                    @foreach ($show_categories as $category)
                   @if ($category->posts->count() > 0)
                   <a href="{{ route('blog.category',$category->link) }}">
                    <li> {{$category->name}} </li>
                    </a>
                   @endif
                    @endforeach
                   
                </ul>
            </div>
            <div class="down_menu_search">
                <form action="\search\blog" method="get">
                    <input type="text" name="q" value="{{ $blog_query }}" class="formcontrol">
                    <span class="b_search_icon">
                        <button type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </form>
            </div>
        </div>
    </header>
