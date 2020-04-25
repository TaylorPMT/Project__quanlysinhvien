@extends('layouts.layoutsite')
@section("title","Thảo Luận")
@section('head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

@endsection
@section('main')
<main>
	   <div class="my-3"></div>
    <div class="container main__notification">
        <div class="row">
            <div class="col col__notification">Bài Viết</div>
           
           <button  ><a href="{{ Route('postsStudent') }}" >Tạo Bài Viết</a></button>
        </div>
          
        <div class="my-3"></div>
        <!-- =================================================================== -->
        	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                     <h2 class="tieude">tiêu đề</h2> 
                     <div class="noidung" >
                         noi dung
                     </div> 
                     <div class="like">

                       <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                       <i class="fas fa-thumbs-down"></i>
                       


                     </div>
                          <!-- ======================================================-->
                     <div class="panel-body">
              <div id="fb-root" class=" fb_reset">
                <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
                    <div></div>
                </div>
            </div>
<div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop" data-href="https://mynukeviet.net/Kien-thuc-lap-trinh-NukeViet/huong-dan-them-chuc-nang-binh-luan-comment-cho-module-nukeviet-60.html" data-num-posts="5" data-width="100%" data-colorscheme="light" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;color_scheme=light&amp;container_width=739&amp;height=100&amp;href=https%3A%2F%2Fmynukeviet.net%2FKien-thuc-lap-trinh-NukeViet%2Fhuong-dan-them-chuc-nang-binh-luan-comment-cho-module-nukeviet-60.html&amp;locale=vi_VN&amp;sdk=joey" style="width: 100%;">
    <span style="vertical-align: bottom; width: 100%; height: 273px;">
        <iframe name="f383022f97ec404" width="1000px" height="100px" data-testid="fb:comments Facebook Social Plugin" title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/plugins/comments.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D46%23cb%3Df2054707f56112c%26domain%3Dmynukeviet.net%26origin%3Dhttps%253A%252F%252Fmynukeviet.net%252Ff99727f8f885d%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=739&amp;height=100&amp;href=https%3A%2F%2Fmynukeviet.net%2FKien-thuc-lap-trinh-NukeViet%2Fhuong-dan-them-chuc-nang-binh-luan-comment-cho-module-nukeviet-60.html&amp;locale=vi_VN&amp;sdk=joey" style="border: none; visibility: visible; width: 100%; height: 273px;" class="">
            
        </iframe></span>
</div>
  <!-- =================================================================== -->
</div>

                </div>
            </div>
        </div>

    </div>
     <!-- =================================================================== -->
 </div>
</main>
@endsection