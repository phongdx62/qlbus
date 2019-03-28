<?php
    include("../../../../models/m-nhansu.php");

    if(isset($_POST["madbvt"]))
    {
        $madbvt = addslashes(stripslashes($_POST["madbvt"]));
        $tendbvt = addslashes(stripslashes($_POST["tendbvt"]));
        $diachi = addslashes(stripslashes($_POST["diachi"]));
        $sdt = addslashes(stripslashes($_POST["sdt"]));

        if(isset($tendbvt) && isset($diachi) && isset($sdt))
        {
            $dbvt = new m_nhansu();
            $dbvt->m_edit_dbvt($madbvt, $tendbvt, $diachi, $sdt);
            $dbvt->disconnect();
        }
    }

?>
<div id="add-dbvt">
    <form action="#">
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm điểm bán vé tháng">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" onclick="search_dbvt()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>
        <a style='color: #FF33FF;' href='#' id="add">Thêm điểm bán vé tháng</a>
    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-dbvt.php");
            	$dbvt = new m_nhansu();
                $dbvt->m_list_dbvt();
                $dbvt->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_dbvt(){
        $.ajax({
            url : "public/library/nhansu/diembvt/search-dbvt.php",
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
            $('#add-dbvt').load('public/library/nhansu/diembvt/add-dbvt.php');
        });
    });
</script>

<script type="text/javascript">
    function ajax_add_nvbvt(){
        $.ajax({
            url : "public/library/nhansu/diembvt/ajax-add-dbvt.php",
            type : "post",
            dataType:"text",
            data : {
                tendbvt : $('#tendbvt').val(),
                diachi : $('#diachi').val(),
                sdt : $('#sdt').val()
            },
            success : function (result){
                $('#nhansu').html(result);
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).on('click', '.edit-dbvt', function(){
        var madbvt = $(this).attr('name');

        $.ajax({
            url: 'public/library/nhansu/diembvt/edit-dbvt.php',
            type: 'POST',
            data: {
                madbvt: madbvt
            },
            success: function(result){
                $('#add-dbvt').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_DBVT(){
        $.ajax({
            url: 'public/library/nhansu/diembvt/data-dbvt.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }

    function deleteItemDBVT(i) {
        var madbvt = $("#delete-dbvt"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/nhansu/diembvt/delete-dbvt.php',
                type: 'POST',
                data: {
                    madbvt: madbvt
                },
                success: function(data){
                    DisplayData_DBVT();
                }
            });
        }
    }
</script>