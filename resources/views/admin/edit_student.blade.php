@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thông tin sinh viên
                        </header>
                        <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span style="color:blue" class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body">
                            @foreach ($edit_student as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-student/'.$edit_value->id_sinhvien)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã số sinh viên</label>
                                    <input type="text" value="{{$edit_value->ma_sinhvien}}" name="student_ma" class="form-control" id="exampleInputEmail1" placeholder="Mã sinh viên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sinh viên</label>
                                    <input type="text" value="{{$edit_value->ten_sinhvien}}" name="student_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sinh viên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giới tính</label>
                                    <input type="text" value="{{$edit_value->gioi_tinh}}" name="student_sex" class="form-control" id="exampleInputEmail1" placeholder="Giới tính">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" value="{{$edit_value->dia_chi}}" name="student_address" class="form-control" id="exampleInputEmail1" placeholder="Địa chỉ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" value="{{$edit_value->sdt}}" name="student_phone" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                     <select name="student_cate" class="form-control input-sm m-bot15" >
                                       @foreach($account_product as $key => $cate)
                                       @if($cate->id==$edit_value->id_taikhoan)
                                        <option selected value="{{$cate->id}}">{{$cate->email}}</option>
                                        @else
                                        <option value="{{$cate->id}}">{{$cate->email}}</option>
                                        @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                     <select name="student_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" name="update_student" class="btn btn-info">Cập nhật thông tin </button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection