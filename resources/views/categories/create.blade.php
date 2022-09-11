@extends('layouts.app')
@section('title', 'إنشاء تصنيف')
@section('content')

    @if ($message = Session::get('success_msg'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="maincontent">
        <div class="maincontainer">

            <div class="handredpercent">
                <button type="button" onclick="window.location='{{ route('posts.index') }}'"
                    style="background: unset;border:unset;font-size: 28px;cursor: pointer;">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
            </div>

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <h3> اضافة صنف جديد </h3>
                <div class="mainformcontroller">
                    <div class="categoriesform">
                        <div class="inputcatname">
                            <input type="text" class="formcontrol @error('name') is-invalid @enderror" name='name'
                                value="{{ old('name') }}" placeholder="اسم التصنيف">
                            @error('name')
                                <div class="alertdanger">أكتب اسم التصنيف</div>
                            @enderror
                        </div>
                        <div class="inputcatslug">
                            <input type="text" class="formcontrol @error('link') is-invalid @enderror" name="link"
                                value="{{ old('link') }}" placeholder="url مثل : news">
                            @error('link')
                                <div class="alertdanger">url مطلوب أو غير صحيح</div>
                            @enderror
                        </div>
                        <div class="inputcatbtn">
                            <button type="submit" class="mybtn bluecolor">
                                <span style="margin-left: 10px"> <i class="fa fa-trash"></i> </span> اضافة
                            </button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
