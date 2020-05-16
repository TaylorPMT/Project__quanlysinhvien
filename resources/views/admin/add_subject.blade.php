@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm môn học mới
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
                                <form role="form" action="{{URL::to('/save-subject')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên môn học</label>
                                    <input type="text" name="subject_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số tiết</label>
                                    <input type="text" name="subject_secretion" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số tín chỉ</label>
                                    <input type="text" name="student_credits" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                
                                
                                
                                
                                <button type="submit" name="add_subject" class="btn btn-info">Thêm môn học</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection