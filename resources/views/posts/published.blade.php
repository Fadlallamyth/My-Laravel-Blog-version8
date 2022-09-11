@extends('layouts.app')
@section('title', 'المشاركات')
@section('content')
    <div class="maincontent">
        <div class="maincontainer">


            {{-- @if ($message = Session::get('published_success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif --}}


            <div class="handredpercent">
                <div class="divforbtnnewitem">
                    <a href="{{ route('posts.create') }}" class="mybtn bluecolor">
                        <span> <i class="fa fa-plus"></i> مشاركة جديدة </span>
                    </a>
                </div>
                <div class="divforbtndelete">
                    <button class="mybtn redcolor" id="deletespecifiec" disabled="disabled">
                        <span> <i class="fa fa-trash"></i> حذف الكل </span>
                    </button>
                </div>
                <div class="managingdiv">
                    <span class="manageitems"> إدارة </span>
                </div>
            </div>
            <div class="postsnumbers">
                <div class="postss">
                    <button> الكل ({{ $countallposts }}) </button>
                    <span class="arrowdown"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                </div>
                <div class="dropdowpubanddraf">
                    <ul>
                        <button onclick="window.location='{{ route('posts.index') }}'">
                            <li> الكل ( {{ $countallposts }} ) </li>
                        </button>

                        <button onclick="window.location='{{ route('published-posts') }}'">
                            <li> المنشورة ( {{ $postbyoneoronee }} )</li>
                        </button>

                        <button onclick="window.location='{{ route('drafts-posts') }}'">
                            <li> المسودة ( {{ $postbyoneorzeroo }} ) </li>
                        </button>
                    </ul>
                </div>
            </div>
            <div class="handredpercent">
                <div class="checkboxandselected">
                    <div class="manage-checkbox">
                        <input type="checkbox" name="buttoncheckallname" class="tocheckall">

                    </div>
                    <div class="selectall">
                        تحديد الكل | تم تحديد
                        <span id="count-checked-checkboxes" style="margin-right:5px;margin-left: 5px;"> 0 </span> من
                        {{ $countallposts }}
                    </div>
                </div>
            </div>
            {{-- ********************************************* --}}
            {{-- ********************************************* --}}
            {{-- ********************************************* --}}
            {{-- ********************************************* --}}
            @if ($published->count() > 0)
                @foreach ($published as $post)
                    <div class="handredpercent" id="pos{{ $post->id }}">
                        <div class="one-container">
                            <div class="checkboxarea" id="devel-generate-content-form">
                                <input type="checkbox" name="idp" class="willbecheck" value="{{ $post->id }}">
                            </div>

                            <div class="imagearea">
                                @if (!empty($post->image))
                                    <img src="{{ asset('/uploads/posts/' . $post->image) }}" alt="">
                                @else
                                    <img src="{{ asset('/uploads/default.png') }}" alt="">
                                @endif
                            </div>

                            <div class="conttitletimechars">
                                <div class="titleandcontrolarea">
                                    <div class="titlearea">

                                        @if (!empty($post->title))
                                            {{ $post->title }}
                                        @else
                                            بلا عنوان
                                        @endif
                                    </div>
                                    <div class="controlarea">
                                        <div class="admincontrolarea">
                                            <span class="fapadding">
                                                <span class="tomakehoverspan">
                                                    <a href="{{ route('posts.edit', $post->id) }}"> <i
                                                            class="fa fa-edit"></i>
                                                    </a>
                                                    <p class="showpost"> تعديل </p>
                                                </span>
                                            </span>

                                            <span class="fapadding">
                                                <span class="tomakehoverspan">
                                                    <a href="{{ $post->slug }}" target="_blank"><i class="fa fa-eye"></i></a>
                                                    <p class="showpost"> عرض </p>
                                                </span>
                                            </span>
                                            <span class="fapadding">
                                                <span class="tomakehoverspan">
                                                    <form class="submitdeletform"
                                                        data-route="{{ route('posts.destroy', $post->id) }}"
                                                        id="submit_form" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"> <i class="fa fa-trash"></i> </button>
                                                    </form>
                                                    <p class="showpost"> حذف </p>
                                                </span>
                                            </span>

                                            <span class="fapadding">
                                                <span class="tomakehoverspan">
                                                    <form action="{{ route('post.update', $post->id) }}" method="POST">
                                                        @csrf
                                                        @if ($post->publishandNot == '0')
                                                            <input type="hidden" name="updaterecord" value="1">
                                                            <p class="showpost"> العودة إلى المسودة </p>
                                                        @else
                                                            <input type="hidden" name="updaterecord" value="0">
                                                            <p class="showpost"> نشر </p>
                                                        @endif
                                                        <button type="submit"> <i class="fa fa-paper-plane"></i> </button>
                                                    </form>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="userprofilearea">
                                        <img src="images/avatar.JPG" alt="">
                                        <span class="aduserearea"> Fadlalla Abass </span>
                                    </div>

                                </div>
                                <div class="timeandcharsarea">
                                    <div class="timearea">
                                        @if ($post->publishandNot == '0')
                                            <i style="color: var(--redcolor)"> مسودة .</i>
                                        @else
                                            تم نشرها .
                                        @endif

                                        {{ $post->created_at->diffForHumans() }}

                                        @if (!empty($post->category->name))
                                            <span class="categoryarea">
                                                <a href="{{ route('posts.category', $post->category->link) }}">
                                                    {{ $post->category->name }} </a>
                                            </span>
                                        @endif

                                    </div>
                                    <div class="charsarea">
                                        <span class="fapadding" style="margin-right: 10px;">
                                            <span class="tomakehoverspan">
                                                <span class="barchart"> <i class="fa fa-bar-chart"></i> </span>
                                                <p class="showpost" style="left: 0px;"> الاحصاءات </p>
                                            </span>
                                        </span>

                                        <span class="fapadding" style="margin-right: 10px;">
                                            <span class="tomakehoverspan">
                                                <span class="facomments"> <i class="fa fa-comments"></i> </span>
                                                <p class="showpost" style="left: 9px;"> التعليقات </p>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <div class="noposts tcenter">
                    لا توجد مشاركات
                </div>
            @endif
            <div class="handredpercent">
                {{ $published->links() }}
            </div>
            <div class="nomorepages">
                @if($published->count() > 0 && !$published->hasMorePages())
                <span style="margin-right: 10px;display:block; text-align: center;">  لا مزيد من المشاركات </span>
                @endif
            </div>
            {{-- ********************************************* --}}
            {{-- ********************************************* --}}
            {{-- ********************************************* --}}
            {{-- ********************************************* --}}
        </div>
    </div>
@endsection
