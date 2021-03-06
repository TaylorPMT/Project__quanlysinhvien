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
            <div class="col col__notification title__col"><span class="title__text">Danh Sách Lớp Môn Học</span></div>
        </div>
        <div class="row my-5">
            <div class="col-md-12">
                @includeIf('frontend.modules.message')
                {{--  table đăng ký  --}}
                <div class="table-responsive">
                    <table class="table table-striped table__height" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col "> <span class="title__head"></span> </th>

                            <th scope="col "><span class="title__head">Lớp Học</span> </th>


                            <th scope="col "><span class="title__head">Nhóm</span> </th>
                            <th scope="col "><span class="title__head">Có Thể Đăng Ký</span> </th>
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

                            <td>{{ $item->ten_lop_mh }}</td>


                            <td> {{ $item->ten_nhom }}</td>
                            <td> {{ $item->soluongnhom }}</td>

                            <td>

                                <a href="{{ Route('registration_group',['id_group'=>$item->id_nhom,'id_monhoc'=>$item->id_monhoc])}}">Đăng ký</a>




                            </td>

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
        @php
        $filter=array();
        foreach ($list_lopmonhoc as $item)
            {



                    $filter[$item->id_giangvien]=$item->ten_giang_vien;
                    echo "<br>";


            }

            $filter=array_unique($filter);


        @endphp
            {{--  form đăng ký  --}}
        <div class="row">
            <div class="col-md-12">

                    <div class="form__box">
                        @foreach ($monHocYeuCau as $item)
                        <form action="{{ Route('post_create_group') }}" method="POST">
                            @csrf


                        <div class="form-group">
                                <label for="sel1">Chọn Giáo Viên Mở Lớp</label>
                                <select class="form-control" id="sel1" name="id_giang_vien">
                                @foreach ($filter as $key =>$value)


                                <option value="{{  $key }}">{{ $value}}</option>



                                @endforeach
                             </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1" class="form__tilte">Môn Học Yêu Cầu Mở Lớp </label>
                              <select class="form-control" id="exampleFormControlSelect1" name="id_monhoc">
                                <option value="{{ $item->id_monhoc }}">{{ $item->ten_monhoc}}</option>

                              </select>
                            </>


                            <div class="form-group btn__box-submit" style="margin-top:10px ">
                                <button type="submit" class="btn btn-success" name="submit">
                                    Gửi yêu Cầu
                                </button>
                               </>

                          </form>
                          @endforeach
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
