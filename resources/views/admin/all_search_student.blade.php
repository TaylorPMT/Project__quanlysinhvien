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
     <form action="{{URL::to('/search-student')}}" method="post">
      {{ csrf_field() }}
        <input type="text" name="maSV"/>
        <input type="hidden" name="id_class" value="{{ $id }}">
        <button type="submit">Search</button>
      </form>
    <div class="table-responsive">
      <?php
          $message = Session::get('message');
         
              if ($message){
                echo '<span style="color:blue" class="text-alert">' .$message.'</span>';
                  Session::put('message',null);
              }
              
      ?>
     
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Mã sinh viên</th>         
            <th></th> 
          </tr>
        </thead>
        <tbody>
          @foreach($data as $value)
          <tr>
            <td>{{ $value->ma_sinhvien }}</td>
            <td><a href="{{ URL::to('add-student-to-class/'.$id.'/'.$value->id_sinhvien) }}">Add</a></td>
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