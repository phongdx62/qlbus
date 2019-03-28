<?php 
    include("../../../../models/m-admin.php");
    
    if(isset($_POST["id"]))
    {
        $id = addslashes(stripslashes($_POST["id"]));
        $ten = addslashes(stripslashes($_POST["ten"]));
        $diachi = addslashes(stripslashes($_POST["diachi"]));
        $sdt = addslashes(stripslashes($_POST["sdt"]));
        $cmnd = addslashes(stripslashes($_POST["cmnd"]));
        $email = addslashes(stripslashes($_POST["email"]));
        $capbac = addslashes(stripslashes($_POST["capbac"]));
        $status = addslashes(stripslashes($_POST["status"]));

        if(isset($ten) && isset($diachi) && isset($sdt) && isset($cmnd) && isset($email) && isset($capbac) && isset($status))
        {
            $user = new m_admin();
            $user->m_edit_user($id, $ten, $diachi, $sdt, $cmnd, $email, $capbac, $status);
            $user->disconnect();
        }      
    }
        
?>
<div id="add-user">
    <form action="#">
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm người dùng">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" name="ok" onclick="search_user()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>

    </div>
                    
    <div id="duoi">
        <table id="data">
            <?php
                include("table-user.php");
                $user = new m_admin();
                $user->m_list_user();
                $user->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_user(){
        $.ajax({
            url : "public/library/admin/user/search-user.php",
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
            $('#add-user').load('public/library/admin/user/add-user.php');
        });
    });
</script> -->

<script type="text/javascript">
    $(document).on('click', '.edit-user', function(){
        var id = $(this).attr('name');
        
        $.ajax({
            url: 'public/library/admin/user/edit-user.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function(result){
                $('#add-user').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_USER(){
        $.ajax({
            url: 'public/library/admin/user/data-user.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }
    function deleteItem(i) {
        var id = $("#delete-user"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/admin/user/delete-user.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data){
                    DisplayData_USER();
                }
            });
        }
    }
</script>