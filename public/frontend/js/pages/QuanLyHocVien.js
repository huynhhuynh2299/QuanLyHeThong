$(document).ready(function () {
    $(".show").click(function (e) {
        const id = $(this).attr("id");

        $.get("show/" + id, function (data) {
            const data_HocVien = data[0];

            // Gán data vào modal qua id
            $("#id").val(data_HocVien["HV_MASO"]);
            $("#name").val(data_HocVien["HV_HOTEN"]);
            $("#dob").val(data_HocVien["HV_NGAYSINH"]);
            $("#sex").val(data_HocVien["HV_GIOITINH"]);
            $("#phone").val(data_HocVien["HV_SDT"]);
            $("#address").val(
                data_HocVien["TEN_XA"] +
                    "," +
                    data_HocVien["TEN_HUYEN"] +
                    "," +
                    data_HocVien["TEN_TINH"]
            );
        });
        e.preventDefault();
    });
});