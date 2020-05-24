@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Nhóm Mới
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
                                <form role="form" action="{{URL::to('/post-add-nhom')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên nhóm</label>
                                    <input type="text" name="tenNhom" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Lớp môn học</label>
                                     <select name="monhoc" class="form-control input-sm m-bot15">
                                       @foreach($lop_monhoc as $key => $value)
                                        <option value="{{$value->id_lop_mh}}">{{$value->ten_lop_mh}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_classsub" class="btn btn-info">Thêm nhóm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection