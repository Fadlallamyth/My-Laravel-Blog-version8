@extends('layouts.app')
@section('title','تعديل صفحة')
@section('content')
<div class="maincontent">
    <div class="maincontainer">

        <div class="handredpercent">
            <button type="button" onclick="window.location='{{ route('posts.index') }}'" style="background: unset;border:unset;font-size: 28px;cursor: pointer;">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>   
            </button>
        </div>
        
        <form action="{{ route('pages.update',$editingpage) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="formrightdiv">
               <div class="insideform">
                <div class="mainformcontroller">
                    <input type="text" class="formcontrol" name="title" value="{{ $editingpage->title }}">
                </div>
                <div class="mainformcontroller">
                    <textarea rows="5" class="formcontrol" name="content" id="textarea">
                    {{$editingpage->content}}
                    </textarea>
                </div>
               </div>
            </div>
           
            <div class="formleftdiv">
                <div class="insideform">
                <div class="publishandbtnn">
                    <div class="mainformcontroller" style="background-color: var(--maincolor);padding: 7px;">
                        <div class="optselectpublish">
                        <div class="publishingoption">

                            <select name="publishandNot">
                            <option value="0" @if ($editingpage->publishandNot =='0') selected @endif >مسودة</option>    
                            <option value="1" @if ($editingpage->publishandNot =='1') selected @endif >نشر</option>
                            </select> 

                        </div> 
                        <div class="publishntn">
                            <button type="submit" class="mybtn bluecolor">
                               <span style="margin-left: 5px">  <i class="fa fa-paper-plane" aria-hidden="true"></i> </span> تحديث    
                            </button>    
                        </div>    
                        </div>
                    </div>
                    </div>

                    <div class="formrest">
                            <div class="mainformcontroller">
                                <img src="{{ asset('/uploads/posts/'.$editingpage->image) }}" alt="" style="width: 100%">
                            </div>
                            <div class="mainformcontroller">
                                <input type="file" class="formcontrol" name="image">
                            </div>
                            <div class="mainformcontroller">
                                <input type="text" class="formcontrol" name="slug" value="{{$editingpage->slug}}" readonly>
                            </div>
                           
                            <div class="mainformcontroller">
                                <textarea rows="5" name="description" class="formcontrol">{{$editingpage->description}}</textarea>
                            </div>
                    </div>
                </div>
               
            </div>

        </form>
        
    </div>
</div>
@endsection