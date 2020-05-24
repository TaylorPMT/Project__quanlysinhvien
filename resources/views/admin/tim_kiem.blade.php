@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
  Danh Sách Các Phản Hồi
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        
                     
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        
      </div>
    </div>
        <div align="center">
            <form action="{{URL::to('/search')}}" method="get">
            <input type="text" size='75' placeholder="Nhap ma hoac ten sinh vien" name="key" value="{{\Request::get('key')}}">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="table-responsive">
      <?php
          $message = Session::get('message');
              if ($message){
                  echo '<span class="text-alert">' .$message.'</span>';
                  Session::put('message',null);
              }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Mã Số Sinh Viên</th>
            <th>Tên Sinh Viên</th>
          </tr>
        </thead>
        <tbody>
         @foreach($data as $key => $item)
          <tr>
            <td>{{ $item->ma_sinhvien }}</td>
            <td>{{ $item->ten_sinhvien }}</td>
          </tr>                  
        @endforeach
        </tbody>
      </table>
      
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