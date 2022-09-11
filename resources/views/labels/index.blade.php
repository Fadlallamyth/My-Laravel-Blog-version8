@extends('layouts.app')
@section('title', 'المشاركات')
@section('content')
    <div class="maincontent">
        <div class="maincontainer">
            {{-- Header four pages - social media - head - main menu --}}
            <div class="big_div">
                <div class="col100">
                    <div class="big_div">
                        <div class="col50">
                            <div class="label_div">
                                <div class="inside_label">
                                    <div class="label_title"> الصفحات </div>
                                    <div class="lable_edit"> <i class="fa fa-edit"></i> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col50">
                            <div class="label_div">
                                <div class="inside_label">
                                    <div class="label_title"> التواصل الاجتماعي </div>
                                    <div class="lable_edit"> <i class="fa fa-edit"></i> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col50">
                            <div class="label_div">
                                <div class="inside_label">
                                    <div class="label_title"> رأس الصفحة </div>
                                    <div class="lable_edit"> <span id="website_info"> <i class="fa fa-edit"></i> </span> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col50">
                            <div class="label_div">
                                <div class="inside_label">
                                    <div class="label_title"> القائمة الرئيسية </div>
                                    <div class="lable_edit"> <i class="fa fa-edit"></i> </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- / end Header four pages - social media - head - main menu --}}


            <div class="big_div">
                <div class="col100">
                    <div class="big_div">
                        <div class="col50">
                            <div class="label_div">
                                <div class="inside_label">
                                    <div class="mainpostlabel">
                                        المشاركات
                                        <span class="editmainpostsapan" id="posts_quantity"> تعديل </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col100">
                                <div class="label_div">
                                    <div class="inside_label">
                                        <div class="label_title"> {{ $label->label }} </div>
                                        <div class="lable_edit"> <span id="label_one"> <i class="fa fa-edit"></i> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col100">
                                <div class="label_div">
                                    <div class="inside_label">
                                        <div class="label_title"> {{ $label2->label }} </div>
                                        <div class="lable_edit"> <span id="label_two"> <i class="fa fa-edit"></i> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col100">
                                <div class="label_div">
                                    <div class="inside_label">
                                        <div class="label_title"> {{ $label3->label }} </div>
                                        <div class="lable_edit"> <span id="label_three"> <i class="fa fa-edit"></i> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col100">
                                <div class="label_div">
                                    <div class="inside_label">
                                        <div class="label_title"> {{ $label4->label }} </div>
                                        <div class="lable_edit"> <span id="label_four"> <i class="fa fa-edit"></i> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col100">
                                <div class="label_div">
                                    <div class="inside_label">
                                        <div class="label_title"> {{ $label5->label }} </div>
                                        <div class="lable_edit"> <span id="label_five"> <i class="fa fa-edit"></i> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col50">
                            <div class="label_div">
                                <div class="inside_label">
                                    <div class="label_title"> الأكثر مشاهدة</div>
                                    <div class="lable_edit"> <span id="most_views_span"> <i class="fa fa-edit"></i> </span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('labels.modals')
            </div>

        @endsection
