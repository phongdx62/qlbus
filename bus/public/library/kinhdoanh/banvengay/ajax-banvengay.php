<?php
    include("../../../../models/m-kinhdoanh.php");

    if(isset($_POST["magdvn"]))
    {
        $magdvn = addslashes(stripslashes($_POST["magdvn"]));
        $ngay = addslashes(stripslashes($_POST["ngay"]));
        $mapx = addslashes(stripslashes($_POST["mapx"]));
        $mavn = addslashes(stripslashes($_POST["mavn"]));
        $sovephatra = addslashes(stripslashes($_POST["sovephatra"]));
        $sovethuve = addslashes(stripslashes($_POST["sovethuve"]));
        $sovebanduoc = addslashes(stripslashes($_POST["sovebanduoc"]));

        if(isset($ngay) && isset($mapx) && isset($mavn) && isset($sovephatra) && isset($sovethuve) && isset($sovebanduoc))
        {
            $bvn = new m_kinhdoanh();
            $bvn->m_edit_bvn($magdvn, $ngay, $mapx, $mavn, $sovephatra, $sovethuve, $sovebanduoc);
            $bvn->disconnect();
        }
    }

?>
<div id="add-bvn">
    <form>
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm thông tin bán vé ngày">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" onclick="search_bvn()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>
        <a style='color: #FF33FF;' href='#' id="add">Thêm thông tin bán vé ngày</a>
    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-bvn.php");
                $bvn = new m_kinhdoanh();
                $bvn->m_list_bvn();
                $bvn->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_bvn(){
        $.ajax({
            url : "public/library/kinhdoanh/banvengay/search-bvn.php",
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
            $('#add-bvn').load('public/library/kinhdoanh/banvengay/add-bvn.php');
        });
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.edit-bvn', function(){
        var magdvn = $(this).attr('name');

        $.ajax({
            url: 'public/library/kinhdoanh/banvengay/edit-bvn.php',
            type: 'POST',
            data: {
                magdvn: magdvn
            },
            success: function(result){
                $('#add-bvn').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_BVN(){
        $.ajax({
            url: 'public/library/kinhdoanh/banvengay/data-bvn.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }

    function deleteItemBVN(i) {
        var magdvn = $("#delete-bvn"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/kinhdoanh/banvengay/delete-bvn.php',
                type: 'POST',
                data: {
                    magdvn: magdvn
                },
                success: function(data){
                    DisplayData_BVN();
                }
            });
        }
    }
</script>