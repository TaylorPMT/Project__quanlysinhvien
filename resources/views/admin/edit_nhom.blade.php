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
                        @foreach($data as $value)
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-nhom/'.$value->id_nhom)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên nhóm</label>
                                    <input type="text" name="tenNhom" value="{{$value->ten_nhom}}" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="number" name="quantity" value="{{$value->so_luong}}" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                
                                <button type="submit" name="add_classsub" class="btn btn-info">Sửa</button>
                            </form>
                            </div>

                        </div>
                        @endforeach
                    </section>

            </div>
@endsection