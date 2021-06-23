@extends('Admin.layout.index')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách học viên</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách học viên</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>



  <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Mã số</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($quanlyhocvien as $hv)
          <tr>

            <td>{{$hv->HV_MASO}}</td>
            <td>{{$hv->HV_HOTEN}}</td>
            <td>{{$hv->HV_GIOITINH}}</td>
            <td>{{$hv->HV_NGAYSINH}}</td>
            <td>{{$hv->HV_SDT}}</td>
            <td>{{$hv->TEN_XA}}, {{$hv->TEN_HUYEN}}, {{$hv->TEN_TINH}}</td>
            <td class="project-actions text-center">
              <a class="btn btn-info btn-sm show" id="{{$hv -> HV_MASO}}" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-pencil-alt">
                </i>
              </a>

              <a class="btn btn-danger btn-sm" href="xoa/{{$hv->id}}">
                <i class="fas fa-trash">
                </i>
              </a>
            </td>
          </tr>
          @endforeach
      </table>
    </div>
    <ul class=" alert text-danger">
      @foreach ( $errors -> all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    <!-- /.card-body -->
  </div>
  <!-- Thông tin học viên -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin học viên</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="js_form_hocvien" action="hocvien/edit" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <!-- sua loi 419 -->
            {{csrf_field()}}
            <div class="card-body">
              <input type="hidden" class="form-control" id="maso" name="maso" placeholder="">
              <div class="form-group">
                <label for="exampleInputEmail1">Họ tên học viên</label>
                <input type="text" class="form-control" id="tenhv" name="tenhv" placeholder="Tên học viên">
              </div>
              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">CMND/CCCD:</label>
                  <input type="text" class="form-control" id="cmnd" name="cmnd" placeholder="CMND/CCCD">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Dân tộc:</label>
                  <input type="text" class="form-control" id="dantoc" name="dantoc" placeholder="Kinh">
                </div>
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
                  <label for="exampleInputEmail1">Nghề nghiệp:</label>
                  <input type="text" class="form-control" id="nghenghiep" name="nghenghiep" placeholder="Nghề nghiệp, nơi làm việc hiện tại">
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
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Số điện thoại:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" id="sodienthoai" name="sodienthoai" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Mã đối tượng:</label>
                  <select class="form-control" id="madoituong" name="madoituong">
                    @foreach ($doituong_all as $doituong)
                    <option value="{{ $doituong -> DT_MASO}}">{{ $doituong -> DT_TEN }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <label for="exampleInputEmail1">Nguyên quán:</label>
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
              <label for="exampleInputEmail1">Hộ khẩu thường trú</label>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <span>Tỉnh/Thành Phố</span>
                  <select class="form-control js_thuongtru_tinh" id="thuongtru_tinh" name="tinh" placeholder="Tỉnh/Thành Phố">
                    <option>Mời chọn tỉnh/thành phố</option>
                    @foreach ($tinh_all as $tinh)
                    <option>{{ $tinh -> TEN_TINH }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <span>Quận/Huyện</span>
                  <select class="form-control js_thuongtru_huyen" id="thuongtru_huyen" name="huyen" placeholder="Quận/Huyên">
                    <option>Mời chọn quận/huyện</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <span>Phường/Xã</span>
                  <select class="form-control" id="thuongtru_xa" name="xa" placeholder="Phường/Xã">
                    <option>Mời chọn phường/xã</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Thông tin người thân:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Lịch sử đào tạo:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Đồng ý</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>

        </form>

      </div>
    </div>
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@endsection