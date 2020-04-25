@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm lớp môn học mới
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
                                <form role="form" action="{{URL::to('/save-classsub')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên lớp môn học</label>
                                    <input type="text" name="classsub_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" name="classsub_amount" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên môn học</label>
                                     <select name="subject_id" class="form-control input-sm m-bot15">
                                       @foreach($account_classsub as $key => $cate)
                                        <option value="{{$cate->id_monhoc}}">{{$cate->ten_monhoc}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                
                                
                                <button type="submit" name="add_classsub" class="btn btn-info">Thêm lớp môn học</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection