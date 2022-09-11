@extends('layouts.app')
@section('title', 'الاعدادات')
@section('content')
    <div class="maincontent">
        <div class="maincontainer">
            <h4> الاعدادات الاساسية </h4>

            <form action="{{ route('settingsss.storesettings') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mainformcontroller">
                    <input type="text" class="formcontrol" name="website_name" placeholder="العنوان" value="{{ $settings->website_name }}">
                </div>
                
                <div class="mainformcontroller">
                    <textarea rows="5" class="formcontrol" name="website_description" style="resize: none;" placeholder="وصف الموقع">{{ $settings->website_description }}</textarea>
                </div>

                <div class="mainformcontroller" style="display: flex">
                    <div class="settings_image" style="width: 50%;margin-left: 10px;display: flex;align-items: center;">
                        <input type="file" name="website_logo" class="formcontrol" style="height: 100%;">
                    </div>
                    <div class="curr_settings_image" style="width: 50%;">
                        <img src="{{ asset('/uploads/logo/'.$settings->website_logo) }}" style="width: 100%;height: 100px;object-fit: cover;" alt="">
                    </div>
                </div>

                <div class="mainformcontroller">
                    <button class="mybtn bluecolor"> 
                    <i class="fa fa-plus"> تحديث </i>    
                    </button>
                </div>

            </form>


        </div>
    </div>
@endsection
