<!DOCTYPE html>
<html>
    <head>
        <title>Home QR Code</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="IE=edge,chrome=1" />
        <link rel="icon" href="lib/images/vnpt_icon.ico" type="image/x-icon">
        <link href="lib/css/app_style.css" rel="stylesheet"/>
        <script src="lib/js/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="lib/css/css/all.css">
        <link rel="stylesheet" type="text/css" href="lib/css/css/fontawesome.css">
        <link rel="stylesheet" type="text/css" href="lib/css/css/brands.css">
        <link rel="stylesheet" type="text/css" href="lib/css/css/solid.css">
        <link rel="stylesheet" href="lib/jqwidgets/styles/jqx.base.css" type="text/css" />
        <script type="text/javascript" src="lib/js/scripts/demos.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxcore.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxdata.js"></script> 
        <script type="text/javascript" src="lib/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxradiobutton.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxscrollbar.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxlistbox.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxdropdownlist.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxmenu.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.edit.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.selection.js"></script> 
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.grouping.js"></script> 
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.columnsresize.js"></script> 
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.filter.js"></script> 
        <script type="text/javascript" src="lib/jqwidgets/jqxdatetimeinput.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxtabs.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxcheckbox.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxcombobox.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxcalendar.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/globalization/globalize.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.sort.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.aggregates.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxwindow.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxloader.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxfileupload.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxnotification.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.pager.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxnumberinput.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxinput.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxtooltip.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxpanel.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxtree.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxexpander.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxsplitter.js"></script>
        <script type="text/javascript" src="lib/js/jBox.js"></script>
        <script type="text/javascript" src="lib/js/warning.js"></script>
        <script type="text/javascript" src="lib/js/cute-alert.js"></script>
        <link rel="stylesheet" type="text/css" href="lib/css/jBox.css">
        <link href="lib/css/style_cute.css" rel="stylesheet">

    </head>
    <style type="text/css">
        #top-up {
            font-size: 2.5rem;
            cursor: pointer;
            position: fixed;
            z-index: 9999;
            color:#004993;
            bottom: 20px;
            right: 15px;
            display: none;
        }
        #top-up:hover {
            color: #333
        }
        body {
            font-family: "Open Sans", sans-serif;
            height: 100vh;
            background: url("lib/images/bg_body_top.gif") 50% fixed;
            background-size: cover;
        }
        .jqx-rc-all > .jqx-fill-state-normal {
            width: 130px !important;
        }
        * {
            box-sizing: border-box;
        }
    </style>
<body>
    <div class="w3-container w3-green">
        <h1>QUẢN LÝ TẠO QR CODE</h1> 
        <!--<p>Thông tin</p> -->
    </div>
    <div class="w3-container">
        <div class="w3-col">
            <div class="w3-col">
                <div id="listqrcode"></div>
            </div>
            <div class="w3-col">
                <input type="hidden" id="id_qr_code" name="id_qr_code" />
                <input type="hidden" id="qr_madonvi" name="qr_madonvi" />
                <hr>
                <table style="width: 100%">
                    <tr>
                        <td align="center">
                            <input type="button" value="XEM DANH SÁCH" id='xemdanhsach' class="qt_button"/>
                            <input type="button" value="THÊM MỚI" id='themmoiqrcode' class="qt_button"/>
                            <input type="button" value="TẠO QR CODE" id='taoqrcode' class="qt_button"/>
                            <input type="button" value="CẬP NHẬT LOGO" id='logo_update' class="qt_button"/>
                            <input type="button" value="THOÁT" id='qr_thoat' class="qt_button"/>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="w3-col" id="contentqrcode">
            <img src='./lib/images/vnpt.png' style='position:relative;display:block;width:240px;height:240px;margin:30px auto;' id="QRCode">
        </div>
    </div>
    <div title="Về đầu trang" id="top-up">
    <i class="fas fa-arrow-circle-up"></i></div>
    
    <div id="qr_themmoi_thongtin" style="display:none;">
        <div id='qr_code_tinh_tp' disable=true>
        </div>
        <div id='qr_code_quan_huyen'>
        </div>
        <div id='qr_code_xa_phuong'>
        </div>
        <div id='qr_code_linh_vuc'>
        </div>
        <div id='qr_code_thu_tuc'>
        </div>
    </div>
    <script type="text/javascript">
        var source_listqrcode;
        var offset = 50;
        var duration = 500;
        var currentTab = 0;
        var trangthai = ""; //$("#session_u").val();
        $(document).ready(function () {
            var modal_them_thongtin = new jBox('Modal', {
                title: "THÊM THÔNG TIN QR MỚI",
                overlay: true,
                width: window.innerWidth/1.05,
                height: window.innerHeight/1.15  ,
                responsiveWidth: true,
                content: $('#qr_themmoi_thongtin'),
                animation: {
                    open: 'move:right',
                    close: 'slide:top'
                },
                position: {
                    x: 'center'
                },
                draggable: 'title',
                closeButton: 'title',
                fixed: true,
                closeOnClick: false,
                zIndex: 999999
            });
            

            $("#xemdanhsach").jqxButton({ width: 200, height: 40 });
            $("#taoqrcode").jqxButton({ width: 200, height: 40 });
            $("#qr_thoat").jqxButton({ width: 200, height: 40 });
            $("#logo_update").jqxButton({ width: 200, height: 40 });
            $("#themmoiqrcode").jqxButton({ width: 200, height: 40 });
            
            
            $(window).scroll(function () {
                if ($(this).scrollTop() > offset)
                $('#top-up').fadeIn(duration);else
                $('#top-up').fadeOut(duration);
            });
            $('#top-up').click(function () {
                $('body,html').animate({scrollTop: 0}, duration);
            });
            source_listqrcode = {
                datatype: "json",
                datafields: [
                    { name: 'ID'},
                    { name: 'ID_DON_VI'},
                    { name: 'TENDONVI'},
                    { name: 'TEN_LINH_VUC'},
                    { name: 'TEN_TINH'},
                    { name: 'TEN_HUYEN'},
                    { name: 'TEN_XA'},
                    { name: 'TEN_NHAN_VIEN'},
                    { name: 'TRANG_THAI'},
                    { name: 'TIME_CREATE'}
                ],
                url: 'go?for=loadlistqrcode&iddonvi='+ <?php echo $_SESSION["madv"] ?>,
                cache: false,
                pagesize: 50,
                pager: function (pagenum, pagesize, oldpagenum) {
                }
            };
            var dataAdapter = new $.jqx.dataAdapter(source_listqrcode);
            $("#listqrcode").jqxGrid({
                source: dataAdapter,
                width: '100%',
                height: '550',
                columnsresize: true,
                showfilterrow: true,
                filterable: true,
                editable: false,
                selectionmode: 'singlerow',
                showstatusbar: true,
                statusbarheight: 32,
                showaggregates: true,
                pageable: true,
                pagermode: 'simple',
                columns: [
                    { text: 'ID QR CODE', datafield: 'ID', width: 100, align: 'center', cellsalign: 'center'},
                    { text: 'Mã Đơn Vị', datafield: 'ID_DON_VI', width: 100, align: 'center', cellsalign: 'center'},
                    { text: 'Tên Đơn Vị', datafield: 'TENDONVI', width: 400, align: 'center', cellsalign: 'left'},
                    { text: 'Lĩnh Vực', datafield: 'TEN_LINH_VUC', width: 300, align: 'center', cellsalign: 'center'},
                    { text: 'Tên Tỉnh/Thành phố', datafield: 'TEN_TINH', width: 200, align: 'center', cellsalign: 'center'},
                    { text: 'Tên Quận/Huyện/Thị xã', datafield: 'TEN_HUYEN', width: 200, align: 'center', cellsalign: 'center'},
                    { text: 'Tên Xã/Phường/Trị trấn', datafield: 'TEN_XA', width: 200, align: 'center', cellsalign: 'center'},
                    { text: 'Người Tạo', datafield: 'TEN_NHAN_VIEN', width: 200, align: 'center', cellsalign: 'center'},
                    { text: 'Trạng Thái', datafield: 'TRANG_THAI', width: 200, align: 'center', cellsalign: 'center'},
                    { text: 'Thời Gian Tạo', datafield: 'TIME_CREATE', width: 200, align: 'center', cellsalign: 'center'}
                ]
            });
            $('#listqrcode').on('rowclick', function (event) {
                var args = event.args;
                var rowBoundIndex = args.rowindex;
                var selectedRowData_list_qrcode = $('#listqrcode').jqxGrid('getrowdata', rowBoundIndex);
                $("#id_qr_code").val(selectedRowData_list_qrcode.ID);
                $("#qr_madonvi").val(selectedRowData_list_qrcode.ID_DON_VI);
            });
            $("#xemdanhsach").click(function(){
                loadDS_qrCode();
            });
            $("#taoqrcode").click(function(){
                var idqrcode = $("#id_qr_code").val();
                var madonvi = $("#qr_madonvi").val();
                if (idqrcode){
                    location.href='#contentqrcode';
                    $.ajax({
                        type: 'POST',
                        url: 'go',
                        data: {
                            for: "_taomaqrcode",
                            idqrcode: idqrcode,
                            madonvi: madonvi
                        }
                    }).done(function(data){
                        $('#QRCode').attr('src', data);
                    });
                } else {
                    alert("Chưa chọn lĩnh vực cần tạo!");
                }
            });
            $("#themmoiqrcode").click(function(){
                modal_them_thongtin.open();
                var soure_list_tinh = {
                    datatype: "json",
                    datafields: [
                        { name: 'ID_TINH' },
                        { name: 'TEN_TINH' }
                    ],
                    url: "go?for=loadlisttinh",
                    async: false
                };
                var dataAdapter_tinh = new $.jqx.dataAdapter(soure_list_tinh, {autoBind: true, async: false});
                $("#qr_code_tinh_tp").jqxDropDownList({selectedIndex: 0, source: dataAdapter_tinh, displayMember: "TEN_TINH", valueMember: "ID_TINH", width: 250, height: 30, placeHolder: "Chọn Tỉnh"});

                var soure_list_huyen = {
                    datatype: "json",
                    datafields: [
                        { name: 'ID_HUYEN' },
                        { name: 'TEN_HUYEN' }
                    ],
                    url: "go?for=loadlisthuyen",
                    async: true
                };
                var dataAdapter_huyen = new $.jqx.dataAdapter(soure_list_huyen);
                $("#qr_code_quan_huyen").jqxDropDownList({source: dataAdapter_huyen, displayMember: "TEN_HUYEN", valueMember: "ID_HUYEN", placeHolder: "Chọn Quận huyện", width: 250, height: 30});


                $("#qr_code_xa_phuong").jqxDropDownList({ source: soure_list_xa, placeHolder: "Chọn Phường xã", width: 250, height: 30});
                $("#qr_code_linh_vuc").jqxDropDownList({ source: soure_list_linhvuc, placeHolder: "Chọn Lĩnh vực", width: 250, height: 30});
                $("#qr_code_thu_tuc").jqxDropDownList({ source: soure_list_thutuc, placeHolder: "Chọn Thủ tục", width: 250, height: 30});
            });
            $("#qr_thoat").click(function(){
                $.post("go", {for:"_logout"}, function(data) {
                    if(data){
                        location.reload();
                    }
                });
            });
            
        });
        function loadDS_qrCode(){
            var url_qrcode = "go?for=loadlistqrcode&iddonvi="+ <?php echo $_SESSION["madv"] ?>;
            source_listqrcode.url = url_qrcode;
            $("#listqrcode").jqxGrid('updatebounddata');
        }
    </script>
</body>
</html>

