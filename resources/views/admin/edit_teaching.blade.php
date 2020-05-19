@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thông tin lịch giảng dạy
                        </header>
                        <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span style="color:blue" class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body">
                            @foreach ($edit_teaching as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-teaching/'.$edit_value->id_giangday)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiết bắt đầu</label>
                                    <input type="text" value="{{$edit_value->tiet_bd}}" name="teaching_start" class="form-control" id="exampleInputEmail1" placeholder="Tiết bắt đầu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiết kết thúc</label>
                                    <input type="text" value="{{$edit_value->tiet_kt}}" name="teaching_end" class="form-control" id="exampleInputEmail1" placeholder="Tiết kết thúc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lịch dạy</label>
                                    <input type="date" value="{{$edit_value->lich_day}}" name="teaching_schedule" class="form-control" id="exampleInputEmail1" placeholder="Lịch dạy">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên lớp</label>
                                     <select name="classsub_id" class="form-control input-sm m-bot15" >
                                       @foreach($account_classsub as $key => $cate)
                                       @if($cate->id_lop_mh==$edit_value->id_lopmonhoc)
                                        <option selected value="{{$cate->id_lop_mh}}">{{$cate->ten_lop_mh}}</option>
                                        @else
                                        <option value="{{$cate->id_lop_mh}}">{{$cate->ten_lop_mh}}</option>
                                        @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <button type="submit" name="update_teaching" class="btn btn-info">Cập nhật thông tin </button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection