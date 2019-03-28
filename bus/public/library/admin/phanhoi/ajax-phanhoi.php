<?php
    include("../../../../models/m-admin.php");

    if(isset($_POST["maph"]))
    {
        $maph = addslashes(stripslashes($_POST["maph"]));
        $id = addslashes(stripslashes($_POST["id"]));
        $noidung = addslashes(stripslashes($_POST["noidung"]));

        if(isset($id) && isset($noidung))
        {
            $phanhoi = new m_admin();
            $phanhoi->m_edit_user($maph, $id, $noidung, $sdt, $cmnd, $email, $capbac, $status);
            $phanhoi->disconnect();
        }
    }

?>
<div id="add-phanhoi">
    <form action="#">
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm phản hồi">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" name="ok" onclick="search_phanhoi()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>

    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-phanhoi.php");
                $phanhoi = new m_admin();
                $phanhoi->m_list_phanhoi();
                $phanhoi->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_phanhoi(){
        $.ajax({
            url : "public/library/admin/phanhoi/search-phanhoi.php",
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
    $(document).on('click', '.edit-ph', function(){
        var maph = $(this).attr('name');

        $.ajax({
            url: 'public/library/admin/phanhoi/traloi-phanhoi.php',
            type: 'POST',
            data: {
                maph: maph
            },
            success: function(result){
                $('#admin').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_PH(){
        $.ajax({
            url: 'public/library/admin/phanhoi/data-phanhoi.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }
    function deleteItemPH(i) {
        var maph = $("#delete-ph"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/admin/phanhoi/delete-phanhoi.php',
                type: 'POST',
                data: {
                    maph: maph
                },
                success: function(data){
                    DisplayData_PH();
                }
            });
        }
    }
</script>