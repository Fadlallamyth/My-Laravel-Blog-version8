<div class="formmodal llhEMd label_one">
    <div class="mjANdc">
        <div class="x3wWge"></div>
        <div class="indideClas O2kaM g3VIld">
            <div class="indideClaslabels">
                <h3> إعداد "قائمة الصفحات" </h3>
                <form action="{{ route('labels.updatelabel1') }}" method="POST">
                    @csrf
                    <div class="mainformcontroller">
                        <label for=""> أكتب التصنيف الذي تود عرضه </label>
                        <input type="text" class="formcontrol" name="label" value="{{ $label->label }}">
                    </div>
                    <div class="mainformcontroller">
                        <label for=""> عدد المشاركات في التصنيف</label>
                        <input type="text" class="formcontrol" name="quantity1" value="{{ $label->quantity }}">
                    </div>
                    <div class="ctrlbtnlabales textleft">
                        <span class="cancelmenu">إلغاء</span>
                        <span class="confirmmenu"> <button type="submit"> حفظ </button> </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="ONJhl"></div>
    </div>
</div>

<div class="formmodal llhEMd label_two">
    <div class="mjANdc">
        <div class="x3wWge"></div>
        <div class="indideClas O2kaM g3VIld">
            <div class="indideClaslabels">
                <h3> إعداد "قائمة الصفحات" </h3>
                <form action="{{ route('labels.updatelabel1') }}" method="POST">
                    @csrf
                    <div class="mainformcontroller">
                        <label for=""> أكتب التصنيف الذي تود عرضه </label>
                        <input type="text" class="formcontrol" name="label2" value="{{ $label2->label }}">
                    </div>
                    <div class="mainformcontroller">
                        <label for=""> عدد المشاركات في التصنيف</label>
                        <input type="text" class="formcontrol" name="quantity2" value="{{ $label2->quantity }}">
                    </div>
                    <div class="ctrlbtnlabales textleft">
                        <span class="cancelmenu">إلغاء</span>
                        <span class="confirmmenu"> <button type="submit"> حفظ </button> </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="ONJhl"></div>
    </div>
</div>


<div class="formmodal llhEMd label_three">
    <div class="mjANdc">
        <div class="x3wWge"></div>
        <div class="indideClas O2kaM g3VIld">
            <div class="indideClaslabels">
                <h3> إعداد "قائمة الصفحات" </h3>
                <form action="{{ route('labels.updatelabel1') }}" method="POST">
                    @csrf
                    <div class="mainformcontroller">
                        <label for=""> أكتب التصنيف الذي تود عرضه </label>
                        <input type="text" class="formcontrol" name="label3" value="{{ $label3->label }}">
                    </div>
                    <div class="mainformcontroller">
                        <label for=""> عدد المشاركات في التصنيف</label>
                        <input type="text" class="formcontrol" name="quantity3" value="{{ $label3->quantity }}">
                    </div>
                    <div class="ctrlbtnlabales textleft">
                        <span class="cancelmenu">إلغاء</span>
                        <span class="confirmmenu"> <button type="submit"> حفظ </button> </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="ONJhl"></div>
    </div>
</div>

<div class="formmodal llhEMd label_four">
    <div class="mjANdc">
        <div class="x3wWge"></div>
        <div class="indideClas O2kaM g3VIld">
            <div class="indideClaslabels">
                <h3> إعداد "قائمة الصفحات" </h3>
                <form action="{{ route('labels.updatelabel1') }}" method="POST">
                    @csrf
                    <div class="mainformcontroller">
                        <label for=""> أكتب التصنيف الذي تود عرضه </label>
                        <input type="text" class="formcontrol" name="label4" value="{{ $label4->label }}">
                    </div>
                    <div class="mainformcontroller">
                        <label for=""> عدد المشاركات في التصنيف</label>
                        <input type="text" class="formcontrol" name="quantity4" value="{{ $label4->quantity }}">
                    </div>
                    <div class="ctrlbtnlabales textleft">
                        <span class="cancelmenu">إلغاء</span>
                        <span class="confirmmenu"> <button type="submit"> حفظ </button> </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="ONJhl"></div>
    </div>
</div>

<div class="formmodal llhEMd label_five">
    <div class="mjANdc">
        <div class="x3wWge"></div>
        <div class="indideClas O2kaM g3VIld">
            <div class="indideClaslabels">
                <h3> إعداد "قائمة الصفحات" </h3>
                <form action="{{ route('labels.updatelabel1') }}" method="POST">
                    @csrf
                    <div class="mainformcontroller">
                        <label for=""> أكتب التصنيف الذي تود عرضه </label>
                        <input type="text" class="formcontrol" name="label5" value="{{ $label5->label }}">
                    </div>
                    <div class="mainformcontroller">
                        <label for=""> عدد المشاركات في التصنيف</label>
                        <input type="text" class="formcontrol" name="quantity5" value="{{ $label5->quantity }}">
                    </div>
                    <div class="ctrlbtnlabales textleft">
                        <span class="cancelmenu">إلغاء</span>
                        <span class="confirmmenu"> <button type="submit"> حفظ </button> </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="ONJhl"></div>
    </div>
</div>

{{-- posts quantity --}}
<div class="formmodal llhEMd posts_quantity">
    <div class="mjANdc">
        <div class="x3wWge"></div>
        <div class="indideClas O2kaM g3VIld">
            <div class="indideClaslabels">
                <h3> إعداد المشاركات </h3>
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                 
                    <div class="mainformcontroller">
                        <label for=""> عدد المشاركات في الصفحة الرئيسية </label>
                        <input type="number" class="formcontrol" name="posts_quantity" value="{{ $posts_quantity }}">
                    </div>

                    <div class="mainformcontroller">
                        <label for=""> عدد المشاركات ذات صلة   </label>
                        <input type="number" class="formcontrol" name="related_posts_quantity" value="{{ $related_posts_quantity }}">
                    </div>
                    <div class="ctrlbtnlabales textleft">
                        <span class="cancelmenu">إلغاء</span>
                        <span class="confirmmenu"> <button type="submit"> حفظ </button> </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="ONJhl"></div>
    </div>
</div>

{{-- most views div --}}
<div class="formmodal llhEMd most_views_div">
    <div class="mjANdc">
        <div class="x3wWge"></div>
        <div class="indideClas O2kaM g3VIld">
            <div class="indideClaslabels">
                <h3> إعداد المشاركات </h3>
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                 
                    <div class="mainformcontroller">
                        <label for=""> عدد المشاركات المعروضة للأكثر مشاهدة   </label>
                        <input type="number" class="formcontrol" name="most_views_posts" value="{{ $most_views_quantity }}">
                    </div>
                    <div class="ctrlbtnlabales textleft">
                        <span class="cancelmenu">إلغاء</span>
                        <span class="confirmmenu"> <button type="submit"> حفظ </button> </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="ONJhl"></div>
    </div>
</div>


{{-- most views div --}}
<div class="formmodal llhEMd website_info">
    <div class="mjANdc">
        <div class="x3wWge"></div>
        <div class="indideClas O2kaM g3VIld">
            <div class="indideClaslabels">
                <h3> إعداد المشاركات </h3>
                <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                 
                    <div class="mainformcontroller">
                        <label for=""> عنوان المدونة  </label>
                        <input type="text" class="formcontrol" name="website_name" value="{{ $website_name }}">
                    </div>

                    <div class="mainformcontroller">
                        <label for=""> وصف المدونة  </label>
                        <input type="text" class="formcontrol" name="website_description" value="{{ $website_description }}">
                    </div>

                    <div class="mainformcontroller">
                        <label for=""> صورة المدونة  </label>
                        <img src="{{ '/uploads/logo/'.$website_logo }}" alt="" style="width: 100%;height:100px;object-fit:cover">
                    </div>

                    <div class="mainformcontroller">
                        <label for=""> تغيير </label>
                        <input type="file" class="formcontrol" name="website_logo">
                    </div>
                    
                    <div class="ctrlbtnlabales textleft">
                        <span class="cancelmenu">إلغاء</span>
                        <span class="confirmmenu"> <button type="submit"> حفظ </button> </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="ONJhl"></div>
    </div>
</div>
