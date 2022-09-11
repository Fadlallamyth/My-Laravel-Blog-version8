@extends('layouts.app')
@section('title', 'إنشاء مشاركة')
@section('content')
    <div class="maincontent">
        <div class="maincontainer">

            <div class="inside_form_fixed">
                <div class="handredpercent">
                    <button type="button" onclick="window.location='{{ route('posts.index') }}'"
                        style="background: unset;border:unset;font-size: 28px;cursor: pointer;">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </div>

                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"
                    class="do_you_want_publish">
                    @csrf
                    <div class="formrightdiv">
                        <div class="insideform">
                            <div class="mainformcontroller">
                                <input type="text" class="formcontrol" name="title" placeholder="العنوان"
                                    value="{{ old('title') }}">
                            </div>
                            <div class="mainformcontroller">
                                <textarea rows="5" class="formcontrol" name="content" id="textarea" style="resize: none;" placeholder="الموضوع">{{ old('content') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="formleftdiv">
                        <div class="insideform">
                            <div class="publishandbtnn">
                                <div class="mainformcontroller" style="background-color:var(--maincolor);padding: 7px;">
                                    <div class="optselectpublish">
                                        <div class="publishingoption">
                                            <select name="publishandNot" id="publishornot">
                                                <option value="0">مسودة</option>
                                                <option value="1">نشر</option>
                                            </select>
                                        </div>
                                        <div class="publishntn">
                                            <button type="submit" class="mybtn bluecolor">
                                                <span style="margin-left: 5px"> <i class="fa fa-paper-plane"
                                                        aria-hidden="true"></i> </span> نشر
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="formrest">
                                <div class="mainformcontroller">

                                    <select name="category_id" id="" class="selectdiv">
                                        <option disabled selected> تصنيف</option>
                                        @foreach ($allcategories as $onecategory)
                                            <option value="{{ $onecategory->id }}"> {{ $onecategory->name }} </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mainformcontroller">
                                    <input type="file" class="formcontrol" name="image">
                                </div>
                                <div class="mainformcontroller">
                                    <input type="text" min="2" max="10" class="formcontrol" name="slug"
                                        id="slug" value="{{ old('slug') }}" placeholder="الرابط">
                                    <p><span class="emsg hidden">Please Enter a Valid Name</span></p>
                                </div>

                                <style>
                                    .emsg {
                                        color: red;
                                    }

                                    .hidden {
                                        visibility: hidden;
                                    }
                                </style>

                                <div class="mainformcontroller" class="textareaexcep">
                                    <textarea rows="5" maxlength="150" name="description" class="formcontrol" style="resize: none;"
                                        placeholder="الوصف">{{ old('description') }}</textarea>
                                    <span style="float:left;margin-right:5px">/ 150</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection
