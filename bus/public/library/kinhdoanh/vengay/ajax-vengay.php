<?php
    include("../../../../models/m-kinhdoanh.php");

    if(isset($_POST["mavn"]))
    {
        $mavn = addslashes(stripslashes($_POST["mavn"]));
        $tenvn = addslashes(stripslashes($_POST["tenvn"]));
        $dongia = addslashes(stripslashes($_POST["dongia"]));
        $matuyen = addslashes(stripslashes($_POST["matuyen"]));

        if(isset($tenvn) && isset($dongia) && isset($matuyen))
        {
            $vn = new m_kinhdoanh();
            $vn->m_edit_vn($mavn, $tenvn, $dongia, $matuyen);
            $vn->disconnect();
        }
    }

?>
<div id="add-vn">
    <form action="#">
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm vé ngày">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" onclick="search_vn()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>
        <a style='color: #FF33FF;' href='#' id="add">Thêm vé ngày</a>
    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-vn.php");
                $vn = new m_kinhdoanh();
                $vn->m_list_vn();
                $vn->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_vn(){
        $.ajax({
            url : "public/library/kinhdoanh/vengay/search-vn.php",
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
            $('#add-vn').load('public/library/kinhdoanh/vengay/add-vn.php');
        });
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.edit-vn', function(){
        var mavn = $(this).attr('name');

        $.ajax({
            url: 'public/library/kinhdoanh/vengay/edit-vn.php',
            type: 'POST',
            data: {
                mavn: mavn
            },
            success: function(result){
                $('#add-vn').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_VN(){
        $.ajax({
            url: 'public/library/kinhdoanh/vengay/data-vn.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }
    function deleteItemVN(i) {
        var mavn = $("#delete-vn"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/kinhdoanh/vengay/delete-vn.php',
                type: 'POST',
                data: {
                    mavn: mavn
                },
                success: function(data){
                    DisplayData_VN();
                }
            });
        }
    }
</script>
