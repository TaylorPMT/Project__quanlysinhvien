@extends('layouts.layoutsite')
@section('title','Đăng Kí Nhóm')
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
            <div class="col col__notification title__col"><span class="title__text">Danh Sách Các Môn Học</span></div>
        </div>
        <div class="row my-5">
            <div class="col-md-12">
                {{--  table đăng ký  --}}
                    <table class="table table-striped table__height" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col "> <span class="title__head">STT</span> </th>
                            <th scope="col "><span class="title__head">Tên Môn Đăng Ký </span> </th>
                            <th scope="col "><span class="title__head">Số Tiết</span> </th>
                            <th scope="col "><span class="title__head">Số Tính Chỉ</span> </th>
                            <th scope="col "><span class="title__head">Thao Tác</span> </th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($list_mon_hoc as $item)
                          <tr>
                            <th scope="row">{{ $item->id_monhoc }}</th>
                            <td>{{ $item->ten_monhoc }}</td>
                            <td>{{ $item->so_tiet }}</td>
                            <td>{{ $item->so_tinchi }}</td>
                            <td><a href="{{ Route('course_registration',['id_courser'=>$item->id_monhoc]) }}">Xem Lớp Môn Học</a></td>
                        </tr>

                          @endforeach


                        </tbody>
                    </table>
                </div>
                {{--  end table đăng ký  --}}
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
