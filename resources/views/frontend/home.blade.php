@extends('layouts.layoutsite')
@section("title","Trang Chủ")
@section('head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

@endsection
@section('main')
<main>
    <div class="my-3"></div>
    <div class="container main__notification">
        <div class="row">
            <div class="col col__notification">Thông Báo Tin Quản Lý Phòng Đào Tạo</div>
        </div>
        <div class="row">
             
        	<div class="col-md-12 col__box-notification">
    @foreach ($list_thong_bao as $item)
               
       <div class="navigate-base"><br>
     <table class="classTable"  border="0" width="100%">
       <tbody>
      <tr>
        <td align="left">
            <a class="tieude" href="{{$item->noi_dung}}">
                <span style="font-size: 15pt; color: #000000;">{{$item->tieu_de}} </span></a>

                <a class="chitiet" href="{{$item->noi_dung}}"><span style="font-size: 14px" > (xem chi tiết)</span></a>
        </td>
    </tr>
       </tbody>
    </table>
        </div>


                @endforeach
        	</div>
                                                      
            </div>

               
        	</div>


    
</main>
@endsection
