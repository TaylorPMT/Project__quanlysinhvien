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
           
           <button  ><a href="{{ Route('postsStudent') }}">Tạo Bài Viết</a></button>
          

        </div>
      
     
        <div class="row">
        	<div class="col-md-12 col__box-notification">
        	  <div class="my-3"></div>

              <div class="mb-3 item-feed bg-white border rounded  p-3">
            <article>
    <header>
        <div class="d-flex mb-2 align-items-center font-size-point95rem">
    
    <div class="text-muted mx-1 font-size-point85rem">•</div>

    <div class="by-line">
        <span class="text-muted">Tạo bởi</span>
        <a href="#" title="Minh Phạm" class="text-decoration-none text-dark font-weight-500">tên người tạo</a>
        <span class="text-muted d-none d-sm-inline">time</span>
    </div>
</div>
        <div class="mb-2 clearfix">
            
            <h2 class="h-link mb-0">
                <span>tiêu đề</span>
            </h2>
        </div>
    </header>

    <div class="content mt-1">
        <p>nội dung </p>
    </div>
    
    
       <div class="">
        <div class="">
            <div aria-label="Write a comment…"  role="button" tabindex="0">
                
                    <div  data-novc="1"></div>
                </div></div><div ><div class="_25-w"><div class="_17pg"><div class="_17pg"><div class="_1rwk"><form class=" _129h l9j0dhe7"><div aria-hidden="true"  role="button" tabindex="-1"></div><div class=" _3d2q _7c_r _4w79" data-novc="1"><div class="_5rp7"><div class="_5rpb"><div aria-describedby="placeholder-c411j" aria-label="Viết bình luận..." class="notranslate _5rpu" contenteditable="true" role="textbox" spellcheck="true" style="outline: none; user-select: text; white-space: pre-wrap; overflow-wrap: break-word;"><div data-contents="true"><div class="" data-block="true" data-editor="c411j" data-offset-key="99krf-0-0"><div data-offset-key="99krf-0-0" class="_1mf _1mj"><span data-offset-key="99krf-0-0"><span data-text="true"> </span></span></div></div></div></div></div></div></div></form></div></div></div></div></div></div>
       



         

    
 
    </article>  
       </div>
    </div>
 </div>
</main>
@endsection