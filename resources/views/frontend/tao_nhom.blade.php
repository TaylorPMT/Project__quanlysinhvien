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
            <div class="col col__notification title__col"><span class="title__text">Danh Sách Sinh Viên Đã Đăng Ký Môn Học {{ $f_lop_monhoc_ten->ten_lop_mh }}</span></div>
        </div>
        <div class="row my-5">
            <div class="table-responsive">
                <form action="{{ Route('tao_nhom_post',['id_monhoc'=>$id_monhoc]) }}" method="POST">
                    @csrf
                {{--  table đăng ký  --}}
                    <table class="table table-striped table__height" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col "> <span class="title__head"></span> </th>
                            <th scope="col "> <span class="title__head">Mã Sinh Viên</span> </th>
                            <th scope="col "><span class="title__head">Tên Sinh Viên </span> </th>
                            <th scope="col "><span class="title__head">Giới Tính</span> </th>

                        </tr>
                        </thead>

                        <tbody>

                            @foreach ($l_sinhvien as $item)

                        <tr>
                            <th scope="row">
                                <input type="checkbox" value="{{ $item->id_sinhvien }}" name="id_sinhvien[]"/>
                            </th>
                            <td>{{ $item->id_sinhvien }}</td>
                            <td>{{ $item->ten_sinhvien }}</td>
                            <td>{{ $item->gioi_tinh ==0 ? "Nữ " : "Nam"  }}</td>

                         </tr>


                            @endforeach




                        </tbody>


                    </table>
                    <div class="col text-center">
                        <button type="submit" >Đăng Ký Nhóm</button>
                    </div>
                </form>
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
