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
             @foreach($list_tl as $tl)
            <div class="card">
                
                <div class="card-body">
                   <h5> đăng bởi :<a href="#" style="font-size: 16px;">{{$tl->tensv}}</a></h5>
                     <h3 class="tieude">{{$tl->noi_dung}}</h3> 
                     
                     <div class="binhluan">

                        <form role="form" action="{{ Route('postComments',['$tl->id_binhluan'])}}" method="POST">
                            @csrf
                             <div class="form-group">
                             
                             
                                <textarea class="form-control"   name ="noidung" rows="5"></textarea> 
                            </div>

                            
                                <button type="submit" class="btn btn-success">
                                    Bình Luận
                                </button>
                                 
                           
 
                        </form>

                     
                     </div>
                     
                     
                          
                  </div>
                

                </div>
                <div class="my-5"></div>         
                @endforeach
            </div>
           



        </div>

    </div>
     <!-- =================================================================== -->
 </div>
</main>
@endsection