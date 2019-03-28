<?php
    include("../../../../models/m-dieuhanh.php");

    if(isset($_POST["bienso"]))
    {
        $bienso = addslashes(stripslashes($_POST["bienso"]));
        $biensomoi = addslashes(stripslashes($_POST["biensomoi"]));
        $hangsx = addslashes(stripslashes($_POST["hangsx"]));
        $namsx = addslashes(stripslashes($_POST["namsx"]));
        $nhacc = addslashes(stripslashes($_POST["nhacc"]));
        $soghe = addslashes(stripslashes($_POST["soghe"]));
        $matuyen = addslashes(stripslashes($_POST["matuyen"]));
        $anhxe = addslashes(stripslashes($_POST["anhxe"]));

        if(isset($bienso) && isset($hangsx) && isset($namsx) && isset($nhacc) && isset($soghe) && isset($matuyen) && isset($anhxe))
        {
            $xe = new m_dieuhanh();
            $xe->m_edit_xe($bienso, $biensomoi, $hangsx, $namsx, $nhacc, $soghe, $matuyen, $anhxe);
            $xe->disconnect();
        }
    }

?>
<div id="add-xe">
    <form method="post">
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm xe">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" name="ok" onclick="search_xe()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>
        <a style='color: #FF33FF;' href='#' id="add">Thêm xe</a>
    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-xe.php");
                $xe = new m_dieuhanh();
                $xe->m_list_xe();
                $xe->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_xe(){
        $.ajax({
            url : "public/library/dieuhanh/xe/search-xe.php",
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
            $('#add-xe').load('public/library/dieuhanh/xe/add-xe.php');
        });
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.edit-xe', function(){
        var bienso = $(this).attr('name');

        $.ajax({
            url: 'public/library/dieuhanh/xe/edit-xe.php',
            type: 'POST',
            data: {
                bienso: bienso
            },
            success: function(result){
                $('#add-xe').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_Xe(){
        $.ajax({
            url: 'public/library/dieuhanh/xe/data-xe.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }

    function deleteItemXe(i) {
        var bienso = $("#delete-xe"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/dieuhanh/xe/delete-xe.php',
                type: 'POST',
                data: {
                    bienso: bienso
                },
                success: function(data){
                    DisplayData_Xe();
                }
            });
        }
    }
</script>