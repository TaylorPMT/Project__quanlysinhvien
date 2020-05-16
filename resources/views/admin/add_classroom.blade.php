@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm lớp học mới
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
                                <form role="form" action="{{URL::to('/save-classroom')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên lớp</label>
                                    <input type="text" name="classroom_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" name="classroom_amount" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên giảng viên</label>
                                     <select name="lecturer_id" class="form-control input-sm m-bot15">
                                       @foreach($account_classroom as $key => $cate)
                                        <option value="{{$cate->id_giangvien}}">{{$cate->ten_giangvien}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên sinh viên</label>
                                     <select name="student_id" class="form-control input-sm m-bot15">
                                       @foreach($account_student as $key => $cate)
                                        <option value="{{$cate->id_sinhvien}}">{{$cate->ten_sinhvien}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_classroom" class="btn btn-info">Thêm lớp học</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection