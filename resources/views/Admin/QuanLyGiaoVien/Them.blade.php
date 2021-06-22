
@extends('Admin.layout.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      

<!-- them hoc vien moi -->


  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm học viên</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mã số</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Mã số học viên">
                  </div>
                   <div class="row">
                   
                    <div class="col-3">
                                <div class="form-group">
                                    <label>Tỉnh</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>ASC</option>
                                        <option>DESC</option>
                                    </select>
                                </div>
                            </div>
                      <div class="col-3">
                                <div class="form-group">
                                    <label>Huyện</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>ASC</option>
                                        <option>DESC</option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-3">
                                <div class="form-group">
                                    <label>Xã</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>ASC</option>
                                        <option>DESC</option>
                                    </select>
                                </div>
                            </div>
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mã đối tượng</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Đối tượng thuộc mã">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Họ tên học viên</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Tên học viên">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Căn cước học viên</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Căn cước học viên">
                  </div>
                  <div class="form-group">
                  <label>Số điện thoại</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                  <label for="exampleInputEmail1">Ngày sinh</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>

                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>

                   
                     <label for="exampleInputEmail1">Giới tính</label>


                      <div class="input-group">
                <select class="form-control" id="exampleSelectBorder">
                    <option>Nam</option>
                    <option>Nữ</option>
                    <option>Khác</option>
                  </select>
                   
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Đồng ý</button>
                </div>
              </form>
            </div>




<!-- kết thúc them  -->
 @endsection