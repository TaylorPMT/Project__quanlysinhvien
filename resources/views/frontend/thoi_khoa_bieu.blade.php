@extends('layouts.layoutsite')
@section('title','Đăng Kí Nhóm')
@section('head')
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
//<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                    <table class="table table-striped table__height" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col "> <span class="title__head"></span> </th>

                            <th scope="col "><span class="title__head">Lớp Học</span> </th>



                            <th scope="col "><span class="title__head">Ngày Học</span> </th>
                            <th scope="col "><span class="title__head">Ngày Kết Thúc</span> </th>
                            <th scope="col "><span class="title__head">Nhóm</span> </th>
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
                            @foreach ($list_dk_nhom as $list_dk)



                                @if ($list_dk->id_lopmonhoc == $item->id_lopmonhoc)


                              <a  href="{{  Route('getRequest',['id'=>$list_dk->id_lopmonhoc,'id_monhoc'=>$item->id_monhoc]) }}" class="btn btn-info btn-sm modal-global"><i class="glyphicon glyphicon-eye-open"></i> Xem Danh Sách </a>


                                @include('frontend.modules.bootmodal');

                                @endif

                             @endforeach




                             </td>

                        </tr>

                          @endforeach
                          {{ csrf_field() }}

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
            {{--  end form đăng ký  --}}
    </div>
    {{--  modal box dk nhom   --}}

</div>

    {{--  end modal box  --}}
</main>
@endsection
@section('script')
<script src="{{ asset('js/ajax.js') }}">

</script>

<script>
    $(document).ready( function () {
      $('#myTable').DataTable();
  } );
  </script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

@endsection
