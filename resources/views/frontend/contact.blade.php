@extends('layouts.layoutsite')
@section("title","Gửi Yêu Cầu")
@section('head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

@endsection
@section('main')
<main>
	<div class="container main__notification">
<div class="row">
            <div class="col col__notification title__col"><span class="title__text">Danh Sách Các Yêu Cầu Của Bạn</span></div>
        </div>
        <div class="row my-5">
            <div class="col-md-12">
                {{--  table yêu cầu --}}
                    <table class="table table-striped table__height" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col "> <span class="title__head1">STT</span> </th>
                            <th scope="col "><span class="title__head1">Nội Dung </span> </th>
                            <th scope="col "><span class="title__head1">Tên Giáo Viên</span> </th>
                            
                            <th scope="col "><span class="title__head1">Trạng Thái</span> </th>
                        </tr>
                        </thead>
                        <tbody>
                         @foreach ($list_phanhoi as $item)
                          <tr>
                            <th scope="row">{{ $item->id_phanhoi }}</th>
                            <td>{{ $item->noi_dung }}</td>
                            <td>{{ $item->tengv}}</td>
                          <td>{{ $item->trang_thai}}</td>
                            
                        </tr>

                          @endforeach

                        

                        </tbody>
                    </table>
                </div>
                {{--  end table Yêu cầu  --}}
        </div>

	<div class="row">
      <div class="col col__notification title__col"><span class="title__text">Gửi Yêu Cầu Cho Giáo Viên</span>
      </div>
    </div>

     {{--  form gửi yêu cầu  --}}

     <div class="row">
            <div class="col-md-12">
                    <div class="form__box">
                        <form role="form" action="" method="post" class="beta-form-checkout">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                              <label for="exampleFormControlInput1" class="form__tilte1">Nội Dung Yêu Cầu</label>
                              <input type="text" class="form-control" id="noidung" placeholder="Điền Chủ Đề" >
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1" class="form__tilte1">Tên Giảng Viên</label>
                              <select class="form-control" id="giangvien">
                          @foreach ($list_gv as $list)
                                <option>{{$list->ten_giangvien}}</option>
                         @endforeach
                              </select>
                            </div>

                             <div class="form-group">
                              <label for="exampleFormControlInput1" class="form__tilte1">Trạng Thái</label>
                              <input type="text" class="form-control" id="trangthai" value ="0" readonly >
                            </div>

                         
                            <div class="form-group btn__box-submit">
                                <button type="submit" class="btn btn-success">
                                    Gửi yêu Cầu
                                </button>
                                 
                            </div>
                          </form>
                    </div>
            </div>
        </div>
        {{--  end form gửi yêu cầu  --}}

</div>

	
</main>

@endsection
