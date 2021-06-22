
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
              <li class="breadcrumb-item active">Dữ liệu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Mã số</th>
                    <th>Tỉnh</th>
                    <th>Huyện</th>
                    <th>Xã</th>
                    <th>Họ Tên</th>
       
                    <th>Số điện thoại</th>
                    <th>Ngày Sinh</th>
                    <th>Giới Tính</th>
                                 <th>Chức năng</th>
                  </tr>
                  </thead>
                  <tbody>
                     @foreach($quanlyhocvien as $hv)
             <tr>

                    <td>{{$hv->HV_MASO}}</td>
                    <td>{{$hv->TEN_TINH}}</td>
                    <td>{{$hv->TEN_HUYEN}}</td>
                    <td>{{$hv->TEN_XA}}</td>
                    <td>{{$hv->HV_HOTEN}}</td>
                    <td>{{$hv->HV_SDT}}</td>
                    <td>{{$hv->HV_NGAYSINH}}</td>
                    <td>{{$hv->HV_GIOITINH}}</td>
                    <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm show" href="{{ URL:: to('show/'.$hv -> HV_MASO)}}" id="{{$hv -> HV_MASO}}" data-toggle="modal" data-target="#exampleModal">
                              <i class="fas fa-eye">
                              </i>

                          </a>
                          <a class="btn btn-info btn-sm" href="#">
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
    <!-- /.card-body -->
  </div>
  <!-- Thông tin học viên -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết học viên</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row mb-3">
              <div class="col-md-4">Mã số học viên:</div>
              <input class="col-md-8" type="text" name="id" id="id" disabled>
            </div>
            <div class="row mb-3">
              <div class="col-md-4">Họ và tên:</div>
              <input class="col-md-8" type="text" name="name" id="name" disabled>
            </div>
            <div class="row mb-3">
              <div class="col-md-4">Ngày sinh:</div>
               <input class="col-md-8" type="text" name="dob" id="dob" disabled> <!-- Date Of Birth -->
            </div>
            <div class="row mb-3">
              <div class="col-md-4">Giới tính:</div>
              <input class="col-md-8" type="text" name="sex" id="sex" disabled>
            </div>
          
            <div class="row mb-3">
              <div class="col-md-4">SĐT:</div>
              <input class="col-md-8" type="text" name="phone" id="phone" disabled>
            </div>
            <div class="row mb-3">
              <div class="col-md-4">Địa chỉ:</div>
              <input class="col-md-8" type="text" name="address" id="address" disabled>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
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


