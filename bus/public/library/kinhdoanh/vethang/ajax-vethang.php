<?php
    include("../../../../models/m-kinhdoanh.php");

    if(isset($_POST["mavt"]))
    {
        $mavt = addslashes(stripslashes($_POST["mavt"]));
        $tenvt = addslashes(stripslashes($_POST["tenvt"]));
        $dongia = addslashes(stripslashes($_POST["dongia"]));
        $ghichu = addslashes(stripslashes($_POST["ghichu"]));

        if(isset($tenvt) && isset($dongia) && isset($ghichu))
        {
            $vt = new m_kinhdoanh();
            $vt->m_edit_vt($mavt, $tenvt, $dongia, $ghichu);
            $vt->disconnect();
        }
    }

?>
<div id="add-vt">
    <form action="#">
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm vé tháng">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" onclick="search_vt()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>
        <a style='color: #FF33FF;' href='#' id="add">Thêm vé tháng</a>
    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-vt.php");
                $vt = new m_kinhdoanh();
                $vt->m_list_vt();
                $vt->disconnect();
            ?>  
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_vt(){
        $.ajax({
            url : "public/library/kinhdoanh/vethang/search-vt.php",
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
            $('#add-vt').load('public/library/kinhdoanh/vethang/add-vt.php');
        });
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.edit-vt', function(){
        var mavt = $(this).attr('name');

        $.ajax({
            url: 'public/library/kinhdoanh/vethang/edit-vt.php',
            type: 'POST',
            data: {
                mavt: mavt
            },
            success: function(result){
                $('#add-vt').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_VT(){
        $.ajax({
            url: 'public/library/kinhdoanh/vethang/data-vt.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }

    function deleteItemVT(i) {
        var mavt = $("#delete-vt"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/kinhdoanh/vethang/delete-vt.php',
                type: 'POST',
                data: {
                    mavt: mavt
                },
                success: function(data){
                    DisplayData_VT();
                }
            });
        }
    }
</script>