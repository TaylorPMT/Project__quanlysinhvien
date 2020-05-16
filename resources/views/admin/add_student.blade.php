@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sinh viên mới
                        </header>
                        <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span style="color:blue" class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-student')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sinh viên</label>
                                    <input type="text" name="student_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giới tính</label>
                                    <input type="text" name="student_sex" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="student_address" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="student_phone" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                     <select name="student_cate" class="form-control input-sm m-bot15">
                                       @foreach($account_product as $key => $cate)
                                        <option value="{{$cate->id}}">{{$cate->email}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Lop</label>
                                     <select name="student_class" class="form-control input-sm m-bot15">
                                       @foreach($lop_monhoc as $key => $value)
                                        <option value="{{$value->id_lop_mh}}">{{$value->ten_lop_mh}}</option>
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
                                
                                
                                <button type="submit" name="add_student" class="btn btn-info">Thêm sinh viên</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection