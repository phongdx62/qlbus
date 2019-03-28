<?php
    include("../../../../models/m-kinhdoanh.php");

    if(isset($_POST["magdvt"]))
    {
        $magdvt = addslashes(stripslashes($_POST["magdvt"]));
        $ngay = addslashes(stripslashes($_POST["ngay"]));
        $manvbvt = addslashes(stripslashes($_POST["manvbvt"]));
        $mavt = addslashes(stripslashes($_POST["mavt"]));
        $sovephatra = addslashes(stripslashes($_POST["sovephatra"]));
        $sovethuve = addslashes(stripslashes($_POST["sovethuve"]));
        $sovebanduoc = addslashes(stripslashes($_POST["sovebanduoc"]));

        if(isset($ngay) && isset($manvbvt) && isset($mavt) && isset($sovephatra) && isset($sovethuve) && isset($sovebanduoc))
        {
            $bvt = new m_kinhdoanh();
            $bvt->m_edit_bvt($magdvt, $ngay, $manvbvt, $mavt, $sovephatra, $sovethuve, $sovebanduoc);
            $bvt->disconnect();
        }
    }

?>
<div id="add-bvt">
    <form>
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm thông tin bán vé tháng">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" onclick="search_bvt()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>
        <a style='color: #FF33FF;' href='#' id="add">Thêm thông tin bán vé tháng</a>
    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-bvt.php");
                $bvt = new m_kinhdoanh();
                $bvt->m_list_bvt();
                $bvt->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_bvt(){
        $.ajax({
            url : "public/library/kinhdoanh/banvethang/search-bvt.php",
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
            $('#add-bvt').load('public/library/kinhdoanh/banvethang/add-bvt.php');
        });
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.edit-bvt', function(){
        var magdvt = $(this).attr('name');

        $.ajax({
            url: 'public/library/kinhdoanh/banvethang/edit-bvt.php',
            type: 'POST',
            data: {
                magdvt: magdvt
            },
            success: function(result){
                $('#add-bvt').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_BVT(){
        $.ajax({
            url: 'public/library/kinhdoanh/banvethang/data-bvt.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }

    function deleteItemBVT(i) {
        var magdvt = $("#delete-bvt"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/kinhdoanh/banvethang/delete-bvt.php',
                type: 'POST',
                data: {
                    magdvt: magdvt
                },
                success: function(data){
                    DisplayData_BVT();
                }
            });
        }
    }
</script>