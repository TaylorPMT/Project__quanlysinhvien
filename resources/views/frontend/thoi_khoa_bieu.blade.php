@extends('layouts.layoutsite')
@section('title','Đăng Kí Nhóm')
@section('head')
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready( function () {
      $('#myTable').DataTable();
  } );
  </script>
@endsection
@section('main')
<main>
    <div class="my-3"></div>
    <div class="container main__notification">

        <div class="row">
            <div class="col col__notification title__col" style="width: 470px;"><span class="title__text">Thời Khóa Biểu</span></div>
        </div>
            {{--  form đăng ký  --}}
        <div class="row">
            <div class="col-md-12">
                  <div class="col ">  @includeIf('frontend.modules.message') </div>

                <div class="table-responsive my-5">
                    <table class="table table-striped table__height myTable" >
                        <thead>
                        <tr>
                            <th scope="col "> <span class="title__head"></span> </th>

                            <th scope="col "><span class="title__head">Lớp Học</span> </th>



                            <th scope="col "><span class="title__head">Ngày Học</span> </th>
                            <th scope="col "><span class="title__head">Ngày Kết Thúc</span> </th>
                            <th scope="col "><span class="title__head"></span> </th>
                            <th scope="col "><span class="title__head">Nhóm</span> </th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>

                          @foreach ($list_thoikhoabieu as $item)

                          <tr>
                            <th scope="row">


                             </th>

                            <td>{{ $item->ten_lop_mh }}</td>


                            <td> {{ $item->Ngay_bd }}</td>

                            <td>

                               {{ $item->Ngay_kt }}



                            </td>


                            <td>

                            <td class="text-center">








                            @foreach ($list_dk_nhom as $list_dk)


                                    @if ($list_dk->id_lopmonhoc == $item->id_lopmonhoc)



                                                <a  href="{{  Route('getRequest',['id'=>$list_dk->id_lopmonhoc,'id_monhoc'=>$item->id_monhoc]) }}" class="btn btn-info btn-sm modal-global " style="width: 50%"><i class="glyphicon glyphicon-eye-open"></i> Xem Danh Sách </a>


                                                @include('frontend.modules.bootmodal');




                                    @endif




                             @endforeach




                             </td>
                             <td>

                              <a  class="btn btn-sm btn-danger" href="{{ Route('contactStudent',['id_giangvien'=>$item->id_giangvien,'id_lop_mh'=>$item->id_lop_mh]) }}"> Gửi yêu Cầu  id giang vien </td>

                        </tr>

                          @endforeach
                          {{ csrf_field() }}

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col col__notification title__col" style="width: 470px;"><span class="title__text">Danh Sách Yêu Cầu</span>
            </div>
        </div>
            {{--  end form  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="col ">  @includeIf('frontend.modules.message') </div>

              <div class="table-responsive my-5">
                  <table class="table table-striped table__height myTable" >
                      <thead>
                      <tr>
                          <th scope="col "> <span class="title__head"></span> </th>

                          <th scope="col "><span class="title__head">Lớp Học</span> </th>



                          <th scope="col "><span class="title__head">Ngày Học</span> </th>
                          <th scope="col "><span class="title__head">Ngày Kết Thúc</span> </th>
                          <th scope="col "><span class="title__head"></span> </th>
                          <th scope="col "><span class="title__head">Xem Danh Sách Sinh Viên</span> </th>

                      </tr>
                      </thead>

                      <tbody>

                        @foreach ($list_ds_yeu_cau as $item)

                        <tr>
                         <td></td>

                          <td>{{ $item->ten_lop_mh }}</td>


                          <td> {{ $item->Ngay_bd }}</td>

                          <td>

                             {{ $item->Ngay_kt }}



                          </td>


                          <td>

                          <td class="text-center">

                            <a href="{{ route('dssvdk',['id_nhom'=>$item->id_nhom]) }}" id="listStudent" class="btn btn-sm btn-default" style="padding: 4px;
                            background: #17a2b8; color:#fff" data-toggle="modal" data-target="#myModal">
                                Xem Danh Sách
                            </a>











                           </td>

                      </tr>

                        @endforeach
                        {{ csrf_field() }}

                      </tbody>
                  </table>
              </div>

          </div>
        </div>


    </div>
    {{--  modal box dk nhom   --}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <h3 class="text-center">Danh Sách Sinh Viên Trong Nhóm</h3>
                <table class="table table-dark my-3">
                    <thead>
                      <tr>
                        <th scope="col">Danh Sách Sinh Viên Trong Nhóm</th>
                        <th scope="col">Trạng Thái</th>

                      </tr>
                    </thead>
                    <tbody id="tableBody">

                    </tbody>
                  </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

    </div>
</div>

    {{--  end modal box  --}}
</main>
@endsection
@section('script')
<script src="{{ asset('js/ajax.js') }}">

</script>
<script>
    $('#listStudent').click(function(e){
        e.preventDefault;
        var url= $(this).attr('href');
        $.ajax({
                url:url,
                type:'GET',
                dataType:'json',
                success:function(data){
                    console.log(data);
                    $('#tableBody').empty();
                    $.each(data, function(i, v){

                      var $tr = $('<tr>').append(


                        $('<td>').html(v.ten_sinhvien),

                        $('<td>').html((v.trang_thai ==0) ?"Chưa Duyệt":"Đã Duyệt")

                      ).appendTo('#tableBody');

                    })
                }

        });
    })
</script>
<script>
    $(document).ready( function () {
      $('.myTable').DataTable();
  } );
  </script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/pagination.min.js') }}"></script>

@endsection
