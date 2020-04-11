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
                            <th scope="col "><span class="title__head1">Chủ Đề Yêu Cầu </span> </th>
                            <th scope="col "><span class="title__head1">Tên Giáo Viên</span> </th>
                            <th scope="col "><span class="title__head1">Ngày Gửi</span> </th>
                            <th scope="col "><span class="title__head1">Tình Trạng</span> </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="title__head2">
                            <th scope="row">1</th>
                            <td>Xin Nghỉ Học</td>
                            <td>Trần Văn Hùng</td>
                            <td>25/11/2020</td>
                            <td>chưa duyệt</td>
                        </tr>
                        <tr class="title__head2">
                            <th scope="row">2</th>
                            <td>Xin Làm Bài Kiểm Tra Giữa Kỳ Lại</td>
                            <td>Trịnh Thanh Duy</td>
                            <td>14/2/2020</td>
                            <td>đã duyệt</td>
                        </tr>
                        <tr class="title__head2">
                            <th scope="row">3</th>
                            <td>Xin Đổi Giờ Học</td>
                            <td>Trần văn Hùng</td>
                            <td>8/3/2020</td>
                            <td>Chưa Duyệt</td>
                        </tr>
                        

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
                        <form>
                            <div class="form-group">
                              <label for="exampleFormControlInput1" class="form__tilte1">Chủ Đề Yêu Cầu</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Điền Chủ Đề" >
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1" class="form__tilte1">Tên Giảng Viên</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>Trần Văn Hùng</option>
                                <option>Bùi Bằng</option>
                                <option>Trịnh Thanh Duy</option>
                                <option>Đỗ Thị Mỹ Dung</option>
                                <option>Hồ Đình Khả</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="exampleFormControlTextarea1" class="form__tilte1">Nội Dung Yêu Cầu</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group btn__box-submit">
                                <button type="submit" class="btn btn-success">
                                    Gửi yêu Cầu
                                </button>
                                 <button type="submit" class="btn btn-success">
                                    Hủy
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
