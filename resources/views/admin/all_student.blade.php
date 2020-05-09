@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh sách sinh viên trong lớp môn học
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
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Tên lớp môn học</th>
            
            
            
            
            
          </tr>
        </thead>
        <tbody>
          @foreach($all_student as $key => $student_pro)
          <tr>
            
            <td>{{ $student_pro->ten_lop_mh}}</td>
            <td> <a href="{{ Route('danhsach',['id_lopmh'=>$student_pro->id_lop_mh]) }}">Xem thêm</a> </td>
            
            {{-- <td>
              <a href="{{URL::to('/edit-student/'.$student_pro->id_sinhvien)}}" style="font-size: 20px;"class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa sinh viên này không?')" href="{{URL::to('/delete-student/'.$student_pro->id_sinhvien)}}" style="font-size: 20px;" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td> --}}
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