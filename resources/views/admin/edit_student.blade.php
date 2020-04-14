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
                                echo '<span class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body">
                            @foreach ($edit_student as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-student/'.$edit_value->id_sinhvien)}}" method="post">
                                    {{ csrf_field() }}
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
                                <button type="submit" name="update_student" class="btn btn-info">Cập nhật thông tin </button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection