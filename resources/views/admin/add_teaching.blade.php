@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm lịch giảng dạy mới
                        </header>
                        <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-teaching')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiết bắt đầu</label>
                                    <input type="text" name="teaching_start" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiết kết thúc</label>
                                    <input type="text" name="teaching_end" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lịch dạy</label>
                                    <input type="date" name="teaching_schedule" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên giảng viên</label>
                                     <select name="lecturer_id" class="form-control input-sm m-bot15">
                                       @foreach($account_lecturer as $key => $cate)
                                        <option value="{{$cate->id_giangvien}}">{{$cate->ten_giangvien}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên Lớp MH</label>
                                     <select name="classsub_id" class="form-control input-sm m-bot15">
                                       @foreach($account_classsub as $key => $cate)
                                        <option value="{{$cate->id_lop_mh}}">{{$cate->ten_lop_mh}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                
                                
                                <button type="submit" name="add_teaching" class="btn btn-info">Thêm lịch giảng dạy</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection