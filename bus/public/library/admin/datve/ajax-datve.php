<?php
    include("../../../../models/m-admin.php");

    if(isset($_POST["madv"]))
    {
        $madv = addslashes(stripslashes($_POST["madv"]));
        $xacnhan = addslashes(stripslashes($_POST["xacnhan"]));

        if(isset($xacnhan))
        {
            $datve = new m_admin();
            $datve->m_edit_datve($madv, $xacnhan);
            $datve->disconnect();
        }
    }

?>
<div id="add-datve">
    <form action="#">
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm đặt vé">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" name="ok" onclick="search_datve()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>

    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-datve.php");
                $datve = new m_admin();
                $datve->m_list_datve();
                $datve->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_datve(){
        $.ajax({
            url : "public/library/admin/datve/search-datve.php",
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

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#add').click(function(e) {
            e.preventDefault();
            $('#add-datve').load('public/library/admin/datve/add-datve.php');
        });
    });
</script> -->

<script type="text/javascript">
    $(document).on('click', '.edit-dv', function(){
        var madv = $(this).attr('name');

        $.ajax({
            url: 'public/library/admin/datve/edit-datve.php',
            type: 'POST',
            data: {
                madv: madv
            },
            success: function(result){
                $('#add-datve').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_DV(){
        $.ajax({
            url: 'public/library/admin/datve/data-datve.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }
    function deleteItemDV(i) {
        var madv = $("#delete-dv"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/admin/datve/delete-datve.php',
                type: 'POST',
                data: {
                    madv: madv
                },
                success: function(data){
                    DisplayData_DV();
                }
            });
        }
    }
</script>