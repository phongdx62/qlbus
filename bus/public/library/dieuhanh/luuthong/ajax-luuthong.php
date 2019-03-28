<?php
    include("../../../../models/m-dieuhanh.php");

    if(isset($_POST["matuyen"]))
    {
        $matuyen = addslashes(stripslashes($_POST["matuyen"]));
        $tentuyen = addslashes(stripslashes($_POST["tentuyen"]));
        $chieudi = addslashes(stripslashes($_POST["chieudi"]));
        $chieuve = addslashes(stripslashes($_POST["chieuve"]));

        if(isset($matuyen) && isset($chieudi) && isset($chieuve))
        {
            $lt = new m_dieuhanh();
            $lt->m_edit_luuthong($matuyen, $tentuyen, $chieudi, $chieuve);
            $lt->disconnect();
        }
    }

?>
<div id="add-luuthong">
    <form>
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm đường xe lưu thông">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" onclick="search_luuthong()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>
        <a style='color: #FF33FF;' href='#' id="add">Thêm lưu thông</a>
    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-luuthong.php");
                $lt = new m_dieuhanh();
                $lt->m_list_luuthong();
                $lt->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_luuthong(){
        $.ajax({
            url : "public/library/dieuhanh/luuthong/search-luuthong.php",
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
            $('#add-luuthong').load('public/library/dieuhanh/luuthong/add-luuthong.php');
        });
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.edit-luuthong', function(){
        var matuyen = $(this).attr('name');

        $.ajax({
            url: 'public/library/dieuhanh/luuthong/edit-luuthong.php',
            type: 'POST',
            data: {
                matuyen: matuyen
            },
            success: function(result){
                $('#add-luuthong').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_LT(){
        $.ajax({
            url: 'public/library/dieuhanh/luuthong/data-luuthong.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }

    function deleteItemLT(i) {
        var matuyen = $("#delete-lt"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/dieuhanh/luuthong/delete-luuthong.php',
                type: 'POST',
                data: {
                    matuyen: matuyen
                },
                success: function(data){
                    DisplayData_LT();
                }
            });
        }
    }
</script>