@extends('layouts.layoutsite')
@section("title","Gửi Yêu Cầu")
@section('head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

@endsection
@section('main')
<main>
     <div class="my-3"></div>
     <div class="row">
            <div class="col col__notification"> 

                <ul class="navbar-nav mr-auto">
                 <li class="nav-item ">
                    <a class="nav-link nav__link-href" href="{{ Route('talkpageStudent') }}">Thảo Luận
                        
                    </a>
                 </li>


            </ul>


            </div>
        </div>
    <div class="container main__notification">

	<form  action="{{ Route('Post_postsStudent') }}" method="POST" >
               @csrf
        <input name="_token" type="hidden" >
                    

                    <div class="wmd-panel form-group">
                        
                        <label for="wmd-input">Nội Dung 
                        	<span class="text-danger">*</span>
                        </label>

                        

                        <textarea class="form-control wmd-input autoresize" id="wmd-input" placeholder="Nội dung chi tiết..." rows="8" minlength="100" required="1" name="content" cols="50"></textarea>
                        
                       

                        <div id="wmd-preview" class="wmd-preview"></div>
                    </div>
                     <div class="wmd-panel form-group">

                     <input type="file" id="myFile" name="filename2">
                     </div>

                    
                    <div class="form-group">
                        <button class="btn btn-primary">Đăng</button>
                        
                    </div>
                </form>
            </div>
	
</main>

@endsection
