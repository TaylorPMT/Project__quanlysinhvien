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


                </div>
            </div>
        </div>

    </div>
     <!-- =================================================================== -->
 </div>
</main>
@endsection