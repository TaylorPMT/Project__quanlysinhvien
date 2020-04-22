@extends('layouts.layoutsite')
@section('title','Đăng Kí Nhóm')
@section('head')
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">


@endsection
@section('main')
<main>
    <div class="my-3"></div>
    <div class="container main__notification">
        <div class="row">
            <div class="col col__notification title__col"><span class="title__text">Danh Sách Các Môn Học</span></div>
        </div>
        <div class="row my-5">
            <div class="col-md-12">
                @includeIf('frontend.modules.message')
                {{--  table đăng ký  --}}
                <div class="container">
                    <table class="table table-striped table__height" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col "> <span class="title__head"></span> </th>
                            <th scope="col "><span class="title__head">Số Lượng </span> </th>
                            <th scope="col "><span class="title__head">Lớp Học</span> </th>
                            <th scope="col "><span class="title__head">Tên Môn Học</span> </th>
                            <th scope="col "><span class="title__head">Giảng Viên</span> </th>

                            <th scope="col "><span class="title__head">Nhóm</span> </th>
                            <th scope="col "><span class="title__head">Thao Tác</span> </th>
                        </tr>
                        </thead>

                        <tbody>

                          @foreach ($list_lopmonhoc as $item)

                          <tr>
                            <th scope="row">
                                @foreach ($nhom_da_dangky as $nhomdk)
                                    @if ($nhomdk->id_nhom_dk ==$item->id_nhom)
                                    <i class="fas fa-check text-success"></i>
                                    @else



                                    @endif

                                    @endforeach

                             </th>
                            <td>{{ $item->so_luong }}</td>
                            <td>{{ $item->ten_lop_mh }}</td>
                            <td>{{ $item->tenmonhoc }}</td>
                            <td>{{ $item->ten_giang_vien }}</td>
                                {{ $item->id_monhoc }}
                            <td> {{ $item->ten_nhom }}</td>
                            <td> <a href="{{ Route('registration_group',['id_group'=>$item->id_nhom,'id_monhoc'=>$item->id_monhoc])}}">Đăng ký</a></td>

                        </tr>

                          @endforeach


                        </tbody>
                    </table>
                </div>
                </div>
                {{--  end table đăng ký  --}}
        </div>
        {{--  message thông báo kết quả  --}}

        <div class="row">
            <div class="col col__notification title__col"><span class="title__text">Yêu Cầu Tạo Nhóm</span></div>
        </div>
            {{--  form đăng ký  --}}
        <div class="row">
            <div class="col-md-12">
                    <div class="form__box">
                        <form>
                            <div class="form-group">
                              <label for="exampleFormControlInput1" class="form__tilte">Nhập Tên Nhóm Cần Đăng Ký</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Điền Tên">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1" class="form__tilte">Chọn Môn Học</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>Tên Môn Học</option>
                                <option>Tên Môn Học</option>
                                <option>Tên Môn Học</option>
                                <option>Tên Môn Học</option>
                                <option>Tên Môn Học</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="exampleFormControlTextarea1" class="form__tilte">Lý Do Yêu Cầu</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
            {{--  end form đăng ký  --}}
    </div>
</main>
@endsection
@section('script')
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

@endsection
