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
            <div class="col col__notification title__col"><span class="title__text">Danh Sách  Lớp Môn Học</span></div>
        </div>

        <div class="row my-5">

                <div class="col ">  @includeIf('frontend.modules.message') </div>

            <div class="table-responsive">
                {{--  table đăng ký  --}}
                <form action="{{ Route('post_dang_ky') }}" method="POST">
                    @csrf
                    <table class="table table-striped table__height" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col "> <span class="title__head"><input type="checkbox" id="select_all"
                                @if (isset($arr))
                                    {{  " disabled " }}
                                @endif
                                /> Chọn Hết </span> </th>
                            <th scope="col "><span class="title__head">Tên Môn </span> </th>

                            <th scope="col "><span class="title__head">Số Lượng</span> </th>

                            <th scope="col "><span class="title__head">Số Tính Chỉ</span> </th>
                            <th scope="col "><span class="title__head">Ngày Bắt Đầu</span> </th>
                            <th scope="col "><span class="title__head">Thao Tác</span> </th>
                        </tr>
                        </thead>

                        <tbody>
                            {{-- đăng ký môn form action  --}}


                          @foreach ($list_lopMonHoc as $item)

                          <tr>
                            <th scope="row">


                              <input type="checkbox" class="checkbox" value="{{ $item->id_lop_mh }}" name="id_lop_monhoc[]"
                                @php
                                if(isset($arr))
                                {
                                if(in_array($item->id_lop_mh,$arr))
                                    {
                                        echo "checked ";
                                        echo "disabled ";
                                    }
                                }

                                @endphp

                              />


                            </th>
                            <td>{{ $item->ten_lop_mh }}</td>

                            <td>{{ $item->so_tinchi }}</td>
                            <td>{{ $item->soluong }}</td>
                            <td>{{ $item->Ngay_bd }}</td>
                            <td><a href="">Hủy Đăng Ký</a></td>
                        </tr>

                          @endforeach


                            {{-- end form  --}}
                        </tbody>


                    </table>
                  <div class="col text-center" >
                    <button class="btn btn-sm btn-success" style="height: 30px; width: 50px;" type="submit">Đăng Ký</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#select_all').on('click',function(){
            if(this.checked ){
                $('.checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                 $('.checkbox').each(function(){
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#select_all').prop('checked',true);
            }else{
                $('#select_all').prop('checked',false);
            }
        });
    });
</script>
<script>
    function disableInput()
    {
        document.getElementsByClassName('checkbox').disabled=true;
    }
</script>
@endsection
