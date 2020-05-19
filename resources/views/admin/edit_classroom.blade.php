@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thông tin lớp
                        </header>
                        <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span style="color:blue" class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body">
                            @foreach ($edit_classroom as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-classroom/'.$edit_value->id_lop)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên lớp</label>
                                    <input type="text" value="{{$edit_value->ten_lop}}" name="classroom_name" class="form-control" id="exampleInputEmail1" placeholder="Tên lớp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" value="{{$edit_value->so_luong}}" name="classroom_amount" class="form-control" id="exampleInputEmail1" placeholder="Số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên giảng viên</label>
                                     <select name="lecturer_id" class="form-control input-sm m-bot15" >
                                       @foreach($account_classroom as $key => $cate)
                                       @if($cate->id_giangvien==$edit_value->id_giangvien)
                                        <option selected value="{{$cate->id_giangvien}}">{{$cate->ten_giangvien}}</option>
                                        @else
                                        <option value="{{$cate->id_giangvien}}">{{$cate->ten_giangvien}}</option>
                                        @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên sinh viên</label>
                                     <select name="student_id" class="form-control input-sm m-bot15" >
                                       @foreach($account_student as $key => $cate)
                                       @if($cate->id_sinhvien==$edit_value->id_sinhvien)
                                        <option selected value="{{$cate->id_sinhvien}}">{{$cate->ten_sinhvien}}</option>
                                        @else
                                        <option value="{{$cate->id_sinhvien}}">{{$cate->ten_sinhvien}}</option>
                                        @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <button type="submit" name="update_classroom" class="btn btn-info">Cập nhật thông tin </button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection