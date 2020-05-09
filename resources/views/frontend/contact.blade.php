@extends('layouts.layoutsite')
@section("title","Gửi Yêu Cầu")
@section('head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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
	<div class="container main__notification">
<div class="row">
            <div class="col col__notification title__col"><span class="title__text">Danh Sách Các Yêu Cầu Của Bạn</span></div>
        </div>
        <div class="row my-5">
            <div class="col-md-12" >
                {{--  table yêu cầu --}}
                <div class="col ">  @includeIf('frontend.modules.message') </div>

              
                    <table class="table table-striped table__height" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col "> <span class="title__head1">STT</span> </th>
                            <th scope="col "><span class="title__head1">Nội Dung </span> </th>
                            <th scope="col "><span class="title__head1">Trạng Thái</span> </th>
                      
                        </tr>
                        </thead>
                        <tbody>
                         @foreach ($list_phanhoi as  $item)
                          @if($item->trang_thai < 1)
                          <tr>
                            <th scope="row">{{ $item->id_phanhoi }}</th>
                            <td>{{ $item->noi_dung }}</td>
                            <td >{{ ($item->trang_thai === 1) ? 'Đã duyệt':'Chưa Duyệt'}}</td>
                            
                        </tr>
                        
                       @endif
                          @endforeach
                        </tbody>
                    </table>
                  

                </div>
                

                <div>
                  <button type="button" ><a href="{{ Route('getdanhsach',['id_lop_mh'=>$item->id_lop_mh]) }}">Danh Sách Đã Duyệt</a>  </button>

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
                        <form role="form" action="{{ Route('postcontactStudent',['id_giangvien'=>$id_giangvien,'id_lop_mh'=>$id_lop_mh]) }}" method="POST">
                              @csrf
                            <div class="form-group">
                              <label for="exampleFormControlInput1" class="form__tilte1">Nội Dung Yêu Cầu</label><br>
                              <textarea class="form-control"   name ="noidung" rows="5"></textarea>
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
