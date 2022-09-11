@extends('layouts.app')
@section('title', 'إنشاء صفحة')
@section('content')
    <div class="maincontent">
        <div class="maincontainer">

            <div class="handredpercent">
                <button type="button" onclick="window.location='{{ route('pages.index') }}'"
                    style="background: unset;border:unset;font-size: 28px;cursor: pointer;">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
            </div>

            <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="formrightdiv">
                    <div class="insideform">
                        <div class="mainformcontroller">
                            <input type="text" class="formcontrol" name="title" placeholder="العنوان" value="{{ old('title') }}">
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
                                        <select name="publishandNot" id="">
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
                                <input type="file" class="formcontrol" name="image">
                            </div>
                            <div class="mainformcontroller">
                                <input type="text" class="@error('slug') @enderror formcontrol" name="slug" value="{{old('slug')}}" placeholder="الرابط">
                                @error('slug')
                                <div class="alertdanger">
                                    الرابط غير صحيح 
                                </div>
                            @enderror
                            </div>

                            <div class="mainformcontroller">
                                <textarea rows="5" name="description" class="formcontrol" style="resize: none;" placeholder="الوصف">{{old('description')}}</textarea>
                            </div>
                        </div>
                    </div>

                </div>

            </form>

        </div>
    </div>
@endsection
