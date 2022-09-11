@extends('layouts.app')
@section('title', 'التصنيفات')
@section('content')
    <div class="maincontent">
        <div class="maincontainer">
            <div class="handredpercent">
                <div class="divforbtnnewitem">
                    <a href="{{ route('categories.create') }}" class="mybtn bluecolor">
                        <span> <i class="fa fa-plus"></i> تصنيف جديد </span>
                    </a>
                </div>
                <div class="divforbtndelete">
                    <button class="mybtn redcolor" id="deletenultiplecats" disabled="disabled">
                        <span> <i class="fa fa-trash"></i> حذف الكل </span>
                    </button>
                </div>
                <div class="managingdiv">
                    <span class="manageitems"> إدارة </span>
                </div>
            </div>


            <div class="postsnumbers">
                التصنيفات ({{ $countallcategories }})
            </div>

            <div class="handredpercent">
                <div class="checkboxandselected">
                    <div class="manage-checkbox">
                        <input type="checkbox" name="buttoncheckallname" class="tocheckall">

                    </div>
                    <div class="selectall">
                        تحديد الكل | تم تحديد
                        <span id="count-checked-checkboxes" style="margin-right:5px;margin-left: 5px;"> 0 </span> من
                        {{ $countallcategories }}
                    </div>
                </div>
            </div>


            {{-- ********************************************* --}}
            {{-- ********************************************* --}}
            {{-- ********************************************* --}}
            {{-- ********************************************* --}}
            @if ($allcategories->count() > 0)
                @foreach ($allcategories as $category)
                    <div class="handredpercent" id="pos{{ $category->id }}">
                        <div class="one-container">
                            <div class="checkboxarea" id="devel-generate-content-form" style="margin-left: 5px">
                                <input type="checkbox" name="idp" class="willbecheck" value="{{ $category->id }}">
                            </div>

                            <div class="conttitletimechars" style="padding-right: 1px">
                                <div class="titleandcontrolarea" style="margin-bottom: 0px">
                                    <div class="titlearea" style="height: unset !important">

                                        @if (!empty($category->name))
                                            {{ $category->name }}
                                        @endif
                                    </div>
                                    <div class="controlarea">
                                        <span class="fapadding">
                                            <span class="tomakehoverspan">
                                                <form class="submitdeleteconecat"
                                                    data-route="{{ route('categories.destroy', $category->id) }}"
                                                    id="submit_form" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"> <i class="fa fa-trash"></i> </button>
                                                </form>
                                                <p class="showpost"> حذف </p>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="userprofilearea">
                                        <img src="images/avatar.JPG" alt="">
                                        <span class="aduserearea"> Fadlalla Abass </span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <div class="noposts tcenter">
                    لا توجد تصنيفات
                </div>
            @endif


            <div class="pagination_div">
                {{$allcategories->links()}}
            </div>

            <div class="nomorepages">
                @if($allcategories->count() > 0 && !$allcategories->hasMorePages())
                <span style="margin-right: 10px;display:block; text-align: center;">  لا مزيد من التصنيفات </span>
                @endif
            </div>
            {{-- ********************************************* --}}
            {{-- ********************************************* --}}
            {{-- ********************************************* --}}
            {{-- ********************************************* --}}




        </div>
    </div>
@endsection
