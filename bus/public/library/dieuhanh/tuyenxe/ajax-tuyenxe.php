<?php
    include("../../../../models/m-dieuhanh.php");

    if(isset($_POST["matuyen"]))
    {
        $matuyen = addslashes(stripslashes($_POST["matuyen"]));
        $tentuyen = addslashes(stripslashes($_POST["tentuyen"]));
        $giobd = addslashes(stripslashes($_POST["giobd"]));
        $giokt = addslashes(stripslashes($_POST["giokt"]));
        $tansuat = addslashes(stripslashes($_POST["tansuat"]));
        $soluongxe = addslashes(stripslashes($_POST["soluongxe"]));

        if(isset($matuyen) && isset($giobd) && isset($giokt) && isset($tansuat) && isset($soluongxe))
        {
            $tx = new m_dieuhanh();
            $tx->m_edit_tuyenxe($matuyen, $tentuyen, $giobd, $giokt, $tansuat, $soluongxe);
            $tx->disconnect();
        }
    }

?>
<div id="add-tuyenxe">
    <form method="post">
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm tuyến xe">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" onclick="search_tuyenxe()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>
        <a style='color: #FF33FF;' href='#' id="add">Thêm tuyến xe</a>
    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-tuyenxe.php");
                $tx = new m_dieuhanh();
                $tx->m_list_tuyenxe();
                $tx->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_tuyenxe(){
        $.ajax({
            url : "public/library/dieuhanh/tuyenxe/search-tuyenxe.php",
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
            $('#add-tuyenxe').load('public/library/dieuhanh/tuyenxe/add-tuyenxe.php');
        });
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.edit-tuyenxe', function(){
        var matuyen = $(this).attr('name');

        $.ajax({
            url: 'public/library/dieuhanh/tuyenxe/edit-tuyenxe.php',
            type: 'POST',
            data: {
                matuyen: matuyen
            },
            success: function(result){
                $('#add-tuyenxe').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_Tuyen(){
        $.ajax({
            url: 'public/library/dieuhanh/tuyenxe/data-tuyenxe.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }

    function deleteItemTuyen(i) {
        var matuyen = $("#delete-tuyen"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/dieuhanh/tuyenxe/delete-tuyenxe.php',
                type: 'POST',
                data: {
                    matuyen: matuyen
                },
                success: function(data){
                    DisplayData_Tuyen();
                }
            });
        }
    }
</script>