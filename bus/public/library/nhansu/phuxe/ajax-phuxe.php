<?php
    include("../../../../models/m-nhansu.php");

    if(isset($_POST["mapx"]))
    {
        $mapx = addslashes(stripslashes($_POST["mapx"]));
        $tenpx = addslashes(stripslashes($_POST["tenpx"]));
        $diachi = addslashes(stripslashes($_POST["diachi"]));
        $sdt = addslashes(stripslashes($_POST["sdt"]));
        $cmnd = addslashes(stripslashes($_POST["cmnd"]));
        $ngaysinh = addslashes(stripslashes($_POST["ngaysinh"]));
        $luong = addslashes(stripslashes($_POST["luong"]));
        $matuyen = addslashes(stripslashes($_POST["matuyen"]));
        $anhpx = addslashes(stripslashes($_POST["anhpx"]));

        if(isset($tenpx) && isset($diachi) && isset($sdt) && isset($cmnd) && isset($ngaysinh) && isset($luong) && isset($matuyen) && isset($anhpx))
        {
            $px = new m_nhansu();
            $px->m_edit_px($mapx, $tenpx, $diachi, $sdt, $cmnd, $ngaysinh, $luong, $matuyen, $anhpx);
            $px->disconnect();
        }
    }

?>
<div id="add-px">
    <form action="#">
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm phụ xe">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" onclick="search_px()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>
        <a style='color: #FF33FF;' href='#' id="add">Thêm phụ xe</a>
    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-px.php");
            	$px = new m_nhansu();
                $px->m_list_px();
                $px->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_px(){
        $.ajax({
            url : "public/library/nhansu/phuxe/search-px.php",
            type : "post",
            dataType:"text",
            data : {
                key : $('#key').val()
            },
            success : function (result){
                $('#duoi').html(result);
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#add').click(function(e) {
            e.preventDefault();
            $('#add-px').load('public/library/nhansu/phuxe/add-px.php');
        });
    });
</script>

<script type="text/javascript">
    function ajax_add_px(){
        $.ajax({
            url : "public/library/nhansu/phuxe/ajax-add-px.php",
            type : "post",
            dataType:"text",
            data : {
                tenpx : $('#tenpx').val(),
                diachi : $('#diachi').val(),
                sdt : $('#sdt').val(),
                cmnd : $('#cmnd').val(),
                ngaysinh : $('#ngaysinh').val(),
                luong : $('#luong').val(),
                matuyen : $('#matuyen').val(),
                anhpx : $('#anhpx').val()
            },
            success : function (result){
                $('#nhansu').html(result);
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).on('click', '.edit-px', function(){
        var mapx = $(this).attr('name');

        $.ajax({
            url: 'public/library/nhansu/phuxe/edit-px.php',
            type: 'POST',
            data: {
                mapx: mapx
            },
            success: function(result){
                $('#add-px').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_PX(){
        $.ajax({
            url: 'public/library/nhansu/phuxe/data-px.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }

    function deleteItemPX(i) {
        var mapx = $("#delete-px"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/nhansu/phuxe/delete-px.php',
                type: 'POST',
                data: {
                    mapx: mapx
                },
                success: function(data){
                    DisplayData_PX();
                }
            });
        }
    }
</script>