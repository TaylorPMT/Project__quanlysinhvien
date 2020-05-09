@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh sách sinh viên
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        
                     
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        
      </div>
    </div>
    <div class="table-responsive">
      <?php
          $message = Session::get('message');
              if ($message){
                  echo '<span class="text-alert">' .$message.'</span>';
                  Session::put('message',null);
              }
      ?>
      <div><a href="{{ URL::to('/add-student') }}">Thêm sinh viên</a></div>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Tên sinh viên</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Trạng thái</th>
            
            
           
          </tr>
        </thead>
        <tbody>
          @foreach($l_ds_thanhvien as $key => $cate_pro)
          <tr>
            
            <td>{{ $cate_pro->ten_sinhvien}}</td>
            <td>{{ $cate_pro->gioi_tinh}}</td>
            <td>{{ $cate_pro->dia_chi}}</td>
            <td>{{ $cate_pro->sdt}}</td>
            <td>{{ $cate_pro->email}}</td>
            <td><span class="text-ellipsis">
              <?php
              if($cate_pro->trang_thai==0){
                ?>
                  <a href="{{URL::to('/unactive-student/'.$cate_pro->id_sinhvien)}}"><span style="font-size:24px;color:red;" class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                  <?php
              }else{
                ?>
                  <a href="{{URL::to('/active-student/'.$cate_pro->id_sinhvien)}}"><span style="font-size:24px;color:green" class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                  <?php
              }
              ?>
            </span></td>
            
            <td>
              <a href="{{URL::to('/edit-student/'.$cate_pro->id_sinhvien)}}" style="font-size: 20px;"class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa sinh viên này không?')" href="{{URL::to('/delete-student/'.$cate_pro->id_sinhvien)}}" style="font-size: 20px;" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection