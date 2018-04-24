<!DOCTYPE html>
<html>
<head>
    <style>
        table{
            border: 1px solid #9dc1d3;
        }

        table tr{
            height: 50px;
        }

        table td{
            padding-left: 30px;
        }

        .content{
            margin: auto;
        }
    </style>
    <script src="{{asset('')}}admins/js/jquery-3.3.1.min.js"></script>">
    <script src="{{asset('')}}admins/js/printThis.js"></script>
</head>
<body>
    <div>
        <button class="print-hd">In Hóa Đơn</button>
    </div>
    <div class="content" align="center">
        <h1>Hóa đơn</h1>
        <h4>Tên khách hàng : {{@$hoa_don->nguoiDung->ten_nd}}</h4>
        <h4>Người lập hóa đơn : {{$ten_nv}}</h4>
        <h4>Ngày đặt hàng : {{@$hoa_don->ngay_dat_hang}}</h4>
        <h4>Thời gian in:  {{$date}}</h4>

        <table>
            <tr>
                <td>STT</td>
                <td>Tên hàng</td>
                <td>Số lượng</td>
                <td>Giá</td>
                <td>Thành tiền</td>
            </tr>
            @foreach($chi_tiet_hd as $key => $row)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{@$row->sanPham->ten_sp}}</td>
                    <td>{{$row->so_luong_ban}}</td>
                    <td>{{$row->gia_sp}}</td>
                    <td>{{$row->thanh_tien}}</td>
                </tr>
            @endforeach
            <tr>
                <td>Tổng tiền</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$hoa_don->tong_tien}}</td>
            </tr>
        </table>
    </div>

</body>
<script>
    $(document).on('click', '.print-hd', function(){
        $('.content').printThis({
            importCSS: true,            // import page CSS
            importStyle: true,         // import style tags
        });
    });
</script>
</html>