@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thông tin lớp môn học
                        </header>
                        <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body">
                            @foreach ($edit_classsub as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-classsub/'.$edit_value->id_lop_mh)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên lớp môn học</label>
                                    <input type="text" value="{{$edit_value->ten_lop_mh}}" name="classsub_name" class="form-control" id="exampleInputEmail1" placeholder="Tên lớp môn học">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" value="{{$edit_value->soluong}}" name="classsub_amount" class="form-control" id="exampleInputEmail1" placeholder="Số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                    <input type="date" value="{{$edit_value->Ngay_bd}}" name="classsub_start" class="form-control" id="exampleInputEmail1" placeholder="Số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày kết thúc</label>
                                    <input type="date" value="{{$edit_value->Ngay_kt}}" name="classsub_end" class="form-control" id="exampleInputEmail1" placeholder="Số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên môn học</label>
                                     <select name="subject_id" class="form-control input-sm m-bot15" >
                                       @foreach($account_classsub as $key => $cate)
                                       @if($cate->id_monhoc==$edit_value->id_monhoc)
                                        <option selected value="{{$cate->id_monhoc}}">{{$cate->ten_monhoc}}</option>
                                        @else
                                        <option value="{{$cate->id_monhoc}}">{{$cate->ten_monhoc}}</option>
                                        @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên giảng viên</label>
                                     <select name="lecturer_id" class="form-control input-sm m-bot15" >
                                       @foreach($account_classsublec as $key => $cate)
                                       @if($cate->id_giangvien==$edit_value->id_giangvien)
                                        <option selected value="{{$cate->id_giangvien}}">{{$cate->ten_giangvien}}</option>
                                        @else
                                        <option value="{{$cate->id_giangvien}}">{{$cate->ten_giangvien}}</option>
                                        @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <button type="submit" name="update_classsub" class="btn btn-info">Cập nhật thông tin </button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection