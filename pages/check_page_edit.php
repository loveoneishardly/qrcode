<!DOCTYPE html>
<html>
    <head>
        <title>Check Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="lib/images/vnpt_icon.ico" type="image/x-icon">
        <link href="lib/css/app_style.css" rel="stylesheet"/>
        <script src="lib/js/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    </head>
    <style type="text/css">
    </style>
    <body onload="check_page_loading()">
        <script>
            function check_page_loading(){
                // var url = window.location.href;
                var urlParams = new URLSearchParams(window.location.search);
                const madonvi = urlParams.get('param2');
                const idqrcode = urlParams.get('param1');
                $.ajax({
                    type: 'POST',
                    url: 'go',
                    data: {
                        for: "_get_info_idqrcode",
                        madonvi: madonvi,
                        idqrcode: idqrcode
                    }
                }).done(function(data){
                    var val = JSON.parse(data);
                    if (val.length > 0){
                        window.location.href = val[0].DUONG_DAN;
                    } else {
                        alert('Có lỗi xảy ra khi quét mã QR! Vui lòng kiểm tra lại hoặc liên hệ ADMIN quản lý!');
                    }
                });
            }
        </script>
    </body>
</html>