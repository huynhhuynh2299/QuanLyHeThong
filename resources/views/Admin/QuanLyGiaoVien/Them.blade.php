@extends('Admin.layout.index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm giáo viên</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Thêm giáo viên</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <hr>
  <form class="js_form_hocvien" action="giaovien/add" method="POST" enctype="multipart/form-data">
      <!-- sua loi 419 -->
      {{csrf_field()}}
      <div class="card-body">
        <input type="hidden" class="form-control" id="maso" name="maso" placeholder="">
        <div class="form-group">
          <label for="exampleInputEmail1">Họ tên giáo viên</label>
          <input type="text" class="form-control" id="tenhv" name="tenhv" placeholder="Tên giáo viên">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Trình độ học vấn:</label>
            <div class="input-group">
              <select class="form-control" id="hocvan" name="hocvan">
                <option>Trung học cơ sở</option>
                <option>Trung học phổ thông</option>
                <option>Cao đẳng</option>
                <option>Trung cấp</option>
                <option>Đại học</option>
              </select>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label>Số điện thoại:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="text" class="form-control" id="sodienthoai" name="sodienthoai" data-inputmask='"mask": "(999) 999-9999"' data-mask>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Ngày sinh:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="date" class="form-control" data-inputmask-alias="datetime" id="ngaysinh" name="ngaysinh" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Giới tính:</label>
            <div class="input-group">
              <select class="form-control" id="gioitinh" name="gioitinh">
                <option>Nam</option>
                <option>Nữ</option>
                <option>Khác</option>
              </select>
            </div>
          </div>
        </div>
        <label for="exampleInputEmail1">Địa chỉ:</label>
        <div class="form-row">
          <div class="form-group col-md-4">
            <span>Tỉnh/Thành Phố</span>
            <select class="form-control js_nguyenquan_tinh" id="nguyenquan_tinh" name="nguyenquan_tinh" placeholder="Tỉnh/Thành Phố">
              <option>Mời chọn tỉnh/thành phố</option>
              @foreach ($tinh_all as $tinh)
              <option>{{ $tinh -> TEN_TINH }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <span>Quận/Huyện</span>
            <select class="form-control js_nguyenquan_huyen" id="nguyenquan_huyen" name="nguyenquan_huyen" placeholder="Quận/Huyên">
              <option>Mời chọn quận/huyện</option>
              @foreach ($huyen_all as $huyen)
              <option>{{ $huyen -> TEN_HUYEN }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <span>Phường/Xã</span>
            <select class="form-control" id="nguyenquan_xa" name="nguyenquan_xa" placeholder="Phường/Xã">
              <option>Mời chọn phường/xã</option>
              @foreach ($xa_all as $xa)
              <option>{{ $xa -> TEN_XA }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Username:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="username" name="username">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Password:</label>
            <div class="input-group">
              <input type="password" class="form-control" id="password" name="password">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-end">
        <div class="col-3">
          <button type="submit" class="btn btn-primary">Lưu</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
  </form>
</div>




<!-- kết thúc them  -->
@endsection