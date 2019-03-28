<?php
    include("../../../../models/m-dieuhanh.php");

    if(isset($_POST["mahd"]))
    {
        $mahd = addslashes(stripslashes($_POST["mahd"]));
        $ngay = addslashes(stripslashes($_POST["ngay"]));
        $ca = addslashes(stripslashes($_POST["ca"]));
        $bienso = addslashes(stripslashes($_POST["bienso"]));
        $matuyen = addslashes(stripslashes($_POST["matuyen"]));
        $matx = addslashes(stripslashes($_POST["matx"]));
        $mapx = addslashes(stripslashes($_POST["mapx"]));

        if(isset($mahd) && isset($ca) && isset($bienso) && isset($matuyen) && isset($matx) && isset($mapx))
        {
            $hd = new m_dieuhanh();
            $hd->m_edit_hoatdong($mahd, $ngay, $ca, $bienso, $matuyen, $matx, $mapx);
            $hd->disconnect();
        }
    }

?>
<div id="add-hoatdong">
    <form>
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm hoạt động xe">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" onclick="search_hoatdong()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>
        <a style='color: #FF33FF;' href='#' id="add">Thêm hoạt động</a>
    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-hoatdong.php");
                $hd = new m_dieuhanh();
                $hd->m_list_hoatdong();
                $hd->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_hoatdong(){
        $.ajax({
            url : "public/library/dieuhanh/hoatdong/search-hoatdong.php",
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
            $('#add-hoatdong').load('public/library/dieuhanh/hoatdong/add-hoatdong.php');
        });
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.edit-hoatdong', function(){
        var mahd = $(this).attr('name');

        $.ajax({
            url: 'public/library/dieuhanh/hoatdong/edit-hoatdong.php',
            type: 'POST',
            data: {
                mahd: mahd
            },
            success: function(result){
                $('#add-hoatdong').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_HD(){
        $.ajax({
            url: 'public/library/dieuhanh/hoatdong/data-hoatdong.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }

    function deleteItemHD(i) {
        var mahd = $("#delete-hd"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/dieuhanh/hoatdong/delete-hoatdong.php',
                type: 'POST',
                data: {
                    mahd: mahd
                },
                success: function(data){
                    DisplayData_HD();
                }
            });
        }
    }
</script>