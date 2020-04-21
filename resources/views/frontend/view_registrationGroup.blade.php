
@extends('layouts.layoutsite')
@section('title','Xem Nhóm Đã Đăng Ký')
@section('head')
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection
@section('main')
<main>
    <div class="my-3"></div>
    <div class="container main__notification">
        <div class="row">
            <div class="col col__notification title__col"><span class="title__text">Danh Sách Các Môn Học Đã Đăng Ký</span></div>
        </div>
        <div class="row my-5">
            <div class="col-md-12">
                {{--  table đăng ký  --}}
                    <table class="table table-striped table__height" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col "> <span class="title__head"></span> </th>
                            <th scope="col "><span class="title__head">Tên Môn Học</span> </th>
                            <th scope="col "><span class="title__head">Lớp Học</span> </th>
                            <th scope="col "><span class="title__head">Nhóm</span> </th>
                            <th scope="col "><span class="title__head">Số Tiết</span> </th>
                            <th scope="col "><span class="title__head">Số Tín Chỉ</span> </th>

                        </tr>
                        </thead>
                        <tbody>
                            {{-- //view đăng ký của sinh viên --}}
                        @foreach ($list_nhomdk as $item)


                          <tr>
                            <th scope="row"> <i class="fas fa-check text-success"></i></th>
                            <td>{{ $item->ten_monhoc }}</td>
                            <td>{{ $item->ten_lop_mh }}</td>
                            <td>{{ $item->ten_nhom }}</td>
                            <td>{{ $item->so_tiet }}</td>
                            <td>{{ $item->so_tinchi }}</td>

                        </tr>
                        @endforeach



                        </tbody>
                    </table>
                </div>
                {{--  end table đăng ký  --}}
        </div>
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
