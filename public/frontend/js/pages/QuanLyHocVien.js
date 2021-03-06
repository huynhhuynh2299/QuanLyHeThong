$(document).ready(function () {
    // Show thông tin học viên
    $(".show").click(function (e) {
        const id = $(this).attr("id");

        $.get("hocvien/" + id, function (data) {
            const data_HocVien = data;
            const dc_ThuongTru = data["THUONG_TRU"];
            const dc_NguyenQuan = data["NGUYEN_QUAN"];
            const data_DSChungChi = data["DS_CHUNGCHI"];

            // Gán data vào modal qua id
            $("#id").val(data_HocVien["HV_MASO"]);
            $("#HV_HOTEN").val(data_HocVien["HV_HOTEN"]);
            $("#HV_CMND").val(data_HocVien["HV_CMND"]);
            $("#HV_DANTOC").val(data_HocVien["HV_DANTOC"]);
            $("#HV_HOCVAN").val(data_HocVien["HV_HOCVAN"]);
            $("#HV_NGHENGHIEP").val("");
            $("#HV_NGAYSINH").val(data_HocVien["HV_NGAYSINH"]);
            // xử lý selected
            $("#HV_GIOITINH option").each(function () {
                if ($(this).val() == data_HocVien["HV_GIOITINH"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#HV_SDT").val(data_HocVien["HV_SDT"]);

            $("#id_DOITUONG option").each(function () {
                if ($(this).val() == data_HocVien["id_DOITUONG"]) {
                    $(this).prop("selected", true);
                }
            });
            // Nguyên quán

            $("#HV_DIACHI_NQ").val(dc_NguyenQuan["DIA_CHI"]);

            $("#nguyenquan_tinh option").each(function () {
                if ($(this).val() == dc_NguyenQuan["TINH"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#nguyenquan_huyen option").each(function () {
                if ($(this).val() == dc_NguyenQuan["HUYEN"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#nguyenquan_xa option").each(function () {
                if ($(this).val() == dc_NguyenQuan["XA"]) {
                    $(this).prop("selected", true);
                }
            });

            // Thường trú

            $("#HV_DIACHI_TT").val(dc_ThuongTru["DIA_CHI"]);

            $("#thuongtru_tinh option").each(function () {
                if ($(this).val() == dc_ThuongTru["TINH"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#thuongtru_huyen option").each(function () {
                if ($(this).val() == dc_ThuongTru["HUYEN"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#thuongtru_xa option").each(function () {
                if ($(this).val() == dc_ThuongTru["XA"]) {
                    $(this).prop("selected", true);
                }
            });

            //   Danh sách chứng chỉ

            let html_ItemDSChungChi = "";

            $.each(data_DSChungChi, function (index, value) {
                if (value.CC_DANHAN == "YES") {
                    html_ItemDSChungChi +=
                        "<tr>" +
                        "<td>" +
                        value.CC_TEN +
                        "</td>" +
                        "<td>" +
                        value.CC_XEPLOAI +
                        "</td>" +
                        "<td>" +
                        value.CC_SOHIEU +
                        "</td>" +
                        "<td>" +
                        value.CC_NGAYCAP +
                        "</td>" +
                        "<td>" +
                        value.CC_NGAYNHAN +
                        "</td>" +
                        "</tr>";
                } else {
                    html_ItemDSChungChi +=
                        "<tr>" +
                        "<td>" +
                        value.CC_TEN +
                        "</td>" +
                        "<td>" +
                        value.CC_XEPLOAI +
                        "</td>" +
                        "<td>" +
                        value.CC_SOHIEU +
                        "</td>" +
                        "<td>" +
                        value.CC_NGAYCAP +
                        "</td>" +
                        "<td>  Chưa nhận  </td>" +
                        "</tr>";
                }
            });
            $("#ds_chunngchi").html("").append(html_ItemDSChungChi);
        });
        e.preventDefault();
    });

    $(".edit").click(function (e) {
        const id = $(this).attr("id");

        $.get("hocvien/" + id, function (data) {
            const data_HocVien = data;
            const dc_ThuongTru = data["THUONG_TRU"];
            const dc_NguyenQuan = data["NGUYEN_QUAN"];

            // Gán data vào modal qua id
            $("#id_HV").val(data_HocVien["id"]);
            $("#HV_HOTEN_EDIT").val(data_HocVien["HV_HOTEN"]);
            $("#HV_CMND_EDIT").val(data_HocVien["HV_CMND"]);
            $("#HV_DANTOC_EDIT").val(data_HocVien["HV_DANTOC"]);
            $("#HV_HOCVAN_EDIT").val(data_HocVien["HV_HOCVAN"]);
            $("#HV_NGHENGHIEP_EDIT").val("");
            $("#HV_NGAYSINH_EDIT").val(data_HocVien["HV_NGAYSINH"]);
            // xử lý selected
            $("#HV_GIOITINH_EDIT option").each(function () {
                if ($(this).val() == data_HocVien["HV_GIOITINH"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#HV_SDT_EDIT").val(data_HocVien["HV_SDT"]);

            $("#id_DOITUONG_EDIT option").each(function () {
                if ($(this).val() == data_HocVien["id_DOITUONG"]) {
                    $(this).prop("selected", true);
                }
            });
            // Nguyên quán

            $("#HV_DIACHI_NQ_EDIT").val(dc_NguyenQuan["DIA_CHI"]);
            $("#id_HV_DIACHI_NQ_EDIT").val(dc_NguyenQuan['id']);

            $("#nguyenquan_tinh_EDIT option").each(function () {
                if ($(this).val() == dc_NguyenQuan["id_TINH"]) {
                    console.log(dc_NguyenQuan["TINH"])
                    $(this).prop("selected", true);
                }
            });

            $("#nguyenquan_huyen_EDIT option").each(function () {
                if ($(this).val() == dc_NguyenQuan["id_HUYEN"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#nguyenquan_xa_EDIT option").each(function () {
                if ($(this).val() == dc_NguyenQuan["id_XA"]) {
                    $(this).prop("selected", true);
                }
            });

            // Thường trú

            $("#HV_DIACHI_TT_EDIT").val(dc_ThuongTru["DIA_CHI"]);
            $("#id_HV_DIACHI_TT_EDIT").val(dc_ThuongTru['id']);


            $("#thuongtru_tinh_EDIT option").each(function () {
                if ($(this).val() == dc_ThuongTru["id_TINH"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#thuongtru_huyen_EDIT option").each(function () {
                if ($(this).val() == dc_ThuongTru["id_HUYEN"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#thuongtru_xa_EDIT option").each(function () {
                if ($(this).val() == dc_ThuongTru["id_XA"]) {
                    $(this).prop("selected", true);
                }
            });
        });
        e.preventDefault();
    });

    // Location
    // Nguyên quán

    $(".js_nguyenquan_tinh").change(function (e) {
        const id_TINH = $(this).val();

        $.get("location/all_huyen=true", { id_TINH: id_TINH }, function (data) {
            let html_huyen = "<option> Mời chọn quận/huyện </option>";
            let html_xa = "<option>Mời chọn phường/xã</option>";
            let element_huyen = "#nguyenquan_huyen_EDIT";
            let element_xa = "#nguyenquan_xa_EDIT";

            $.each(data, function (index, value) {
                html_huyen +=
                    "<option value=" +
                    value.id +
                    "   >" +
                    value.TEN_HUYEN +
                    "</option>";
            });

            $(element_huyen).html("").append(html_huyen);
            $(element_xa).html("").append(html_xa);
        });
        e.preventDefault();
    });

    $(".js_nguyenquan_huyen").change(function (e) {
        const id_HUYEN = $(this).val();

        $.get("location/all_xa=true", { id_HUYEN: id_HUYEN }, function (data) {
            let html = "<option>Mời chọn phường/xã</option>";
            let element = "#nguyenquan_xa_EDIT";

            $.each(data, function (index, value) {
                html +=
                    "<option value=" +
                    value.id +
                    " >" +
                    value.TEN_XA +
                    "</option>";
            });

            $(element).html("").append(html);
        });
        e.preventDefault();
    });

    // Thường trú

    $(".js_thuongtru_tinh").change(function (e) {
        const id_TINH = $(this).val();

        $.get("location/all_huyen=true", { id_TINH: id_TINH }, function (data) {
            let html_huyen = "<option> Mời chọn quận/huyện </option>";
            let html_xa = "<option>Mời chọn phường/xã</option>";
            let element_huyen = "#thuongtru_huyen_EDIT";
            let element_xa = "#thuongtru_xa_EDIT";

            $.each(data, function (index, value) {
                html_huyen +=
                    "<option value=" +
                    value.id +
                    "   >" +
                    value.TEN_HUYEN +
                    "</option>";
            });

            $(element_huyen).html("").append(html_huyen);
            $(element_xa).html("").append(html_xa);
        });
        e.preventDefault();
    });

    $(".js_thuongtru_huyen").change(function (e) {
        const id_HUYEN = $(this).val();

        $.get("location/all_xa=true", { id_HUYEN: id_HUYEN }, function (data) {
            let html = "<option>Mời chọn phường/xã</option>";
            let element = "#thuongtru_xa_EDIT";

            $.each(data, function (index, value) {
                html +=
                    "<option value=" +
                    value.id +
                    " >" +
                    value.TEN_XA +
                    "</option>";
            });
            $(element).html("").append(html);
        });
        e.preventDefault();
    });
});
