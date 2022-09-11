<header>
    <div class="headerfixed">
        <div class="header">
            <div class="headernav">
                <span class="headernavbars">
                    <i class="fa fa-bars bigscreen"></i>
                    <i class="fa fa-bars smallscreen"></i>
                </span>
            </div>
            <div class="headersearch">
                @if (Route::is('posts.index') OR Route::is('search'))
                <form action="\search" method="get">
                    <button><i class="fa fa-search"></i></button>
                    <input type="text" name="q" value="{{ $postquery }}">
                </form>
                @endif

                @if (Route::is('pages.index') OR Route::is('pages-search'))
                <form action="\pages-search" method="get">
                    <button><i class="fa fa-search"></i></button>
                    <input type="text" name="q" value="{{ $pagequery }}">
                </form>
                @endif

                @if (Route::is('categories.index') OR Route::is('category-search'))
                <form action="\category-search" method="get">
                    <button><i class="fa fa-search"></i></button>
                    <input type="text" name="q" value="{{ $category_query }}">
                </form>
                @endif
               
            </div>
            <div class="headeruserinfo">
                <span class="useravatarimg"> <img src="{{ asset('images/2.jpg') }}" alt=""> </span>
            </div>
            <span class="usernameabove"> Fadlalla Abass </span>
            <div class="userinformation">
                <div class="imguserinfo">
                    <img src="images/2.jpg" alt="">
                </div>
    
                <div class="nameuserinfo"> Fadlalla Abass </div>
                <div class="emailuserinfo"> Fadlalla.Abass.cs@gmail.com </div>
                <div class="logandprofileinfo">
                    <span class="logoutuser"> تسجيل خروج </span>
                    <span class="profileuser"> الملف الشخصي </span>
                </div>
            </div>
        </div>
        <div class="rightcontent">
            <div class="rightnav">
                <div class="item-div-list">
                    <ul>
    
                        <li class="tcenter" style="margin-bottom: 25px;margin-top: 25px;font-size: 20px;">
                            <h3> <span> <i class="fa fa-dashboard"></i> لوحة التحكم </span> </h3>
                        </li>
    
                        <li>
                            <a href="">
                                <span> <i class="fa fa-edit"></i> الصلاحيات </span>
                            </a>
                        </li>
    
                        <li>
                            <a href="">
                                <span> <i class="fa fa-edit"></i> المستخدمين </span>
                            </a>
                        </li>
    
                        <li>
                            <a href="{{ route('posts.index') }}">
                                <span> <i class="fa fa-edit"></i> المشاركات </span>
                            </a>
                        </li>

    
                        <li>
                            <a href="{{ route('categories.index') }}">
                                <span> <i class="fa fa-edit"></i> التصنيفات </span>
                            </a>
                        </li>
    
                        <li>
                            <a href="{{ route('pages.index') }}">
                                <span> <i class="fa fa-edit"></i> الصفحات </span>
                            </a>
                        </li>
    
                        <li>
                            <a href="{{ route('labels.index') }}">
                                <span> <i class="fa fa-columns"></i> التنسيق </span>
                            </a>
                        </li>
    

                        <li>
                            <a href="{{ route('settings.index') }}"">
                                <span> <i class="fa fa-edit"></i> الاعدادات </span>
                            </a>
                        </li>

                         <li style="font-weight: 500;">
                            <a href="/" target="_blank">
                                <span> <i class="fa fa-eye"></i> عرض المدونة </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>