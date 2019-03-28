<?php
    include("../../../../models/m-nhansu.php");

    if(isset($_POST["matx"]))
    {
        $matx = addslashes(stripslashes($_POST["matx"]));
        $tentx = addslashes(stripslashes($_POST["tentx"]));
        $diachi = addslashes(stripslashes($_POST["diachi"]));
        $sdt = addslashes(stripslashes($_POST["sdt"]));
        $cmnd = addslashes(stripslashes($_POST["cmnd"]));
        $ngaysinh = addslashes(stripslashes($_POST["ngaysinh"]));
        $luong = addslashes(stripslashes($_POST["luong"]));
        $loaibang = addslashes(stripslashes($_POST["loaibang"]));
        $matuyen = addslashes(stripslashes($_POST["matuyen"]));
        $anhtx = addslashes(stripslashes($_POST["anhtx"]));

        if(isset($tentx) && isset($diachi) && isset($sdt) && isset($cmnd) && isset($ngaysinh) && isset($luong) && isset($loaibang) && isset($matuyen) && isset($anhtx))
        {
            $tx = new m_nhansu();
            $tx->m_edit_tx($matx, $tentx, $diachi, $sdt, $cmnd, $ngaysinh, $luong, $loaibang, $matuyen, $anhtx);
            $tx->disconnect();
        }
    }

?>
<div id="add-tx">
    <form action="#">
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm tài xế">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" name="ok" onclick="search_tx()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>
        <a style='color: #FF33FF;' href='#' id="add">Thêm tài xế</a>
    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-tx.php");
                $tx = new m_nhansu();
                $tx->m_list_tx();
                $tx->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_tx(){
        $.ajax({
            url : "public/library/nhansu/taixe/search-tx.php",
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
            $('#add-tx').load('public/library/nhansu/taixe/add-tx.php');
        });
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.edit-tx', function(){
        var matx = $(this).attr('name');

        $.ajax({
            url: 'public/library/nhansu/taixe/edit-tx.php',
            type: 'POST',
            data: {
                matx: matx
            },
            success: function(result){
                $('#add-tx').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_TX(){
        $.ajax({
            url: 'public/library/nhansu/taixe/data-tx.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }

    function deleteItemTX(i) {
        var matx = $("#delete-tx"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/nhansu/taixe/delete-tx.php',
                type: 'POST',
                data: {
                    matx: matx
                },
                success: function(data){
                    DisplayData_TX();
                }
            });
        }
    }
</script>