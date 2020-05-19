@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thông tin môn học
                        </header>
                        <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span style="color:blue" class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body">
                            @foreach ($edit_subject as $key => $subject_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-student/'.$subject_value->id_monhoc)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên môn học</label>
                                    <input type="text" value="{{$subject_value->ten_monhoc}}" name="subject_name" class="form-control" id="exampleInputEmail1" placeholder="Tên môn học">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số tiết</label>
                                    <input type="text" value="{{$subject_value->so_tiet}}" name="subject_secretion" class="form-control" id="exampleInputEmail1" placeholder="Số tiết">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số tín chỉ</label>
                                    <input type="text" value="{{$subject_value->so_tinchi}}" name="subject_credits" class="form-control" id="exampleInputEmail1" placeholder="Số tín chỉ">
                                </div>
                                
                                <button type="submit" name="update_subject" class="btn btn-info">Cập nhật thông tin </button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection