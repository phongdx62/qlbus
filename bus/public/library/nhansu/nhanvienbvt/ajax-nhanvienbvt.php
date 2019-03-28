<?php
    include("../../../../models/m-nhansu.php");

    if(isset($_POST["manvbvt"]))
    {
        $manvbvt = addslashes(stripslashes($_POST["manvbvt"]));
        $tennvbvt = addslashes(stripslashes($_POST["tennvbvt"]));
        $diachi = addslashes(stripslashes($_POST["diachi"]));
        $sdt = addslashes(stripslashes($_POST["sdt"]));
        $cmnd = addslashes(stripslashes($_POST["cmnd"]));
        $ngaysinh = addslashes(stripslashes($_POST["ngaysinh"]));
        $luong = addslashes(stripslashes($_POST["luong"]));
        $madbvt = addslashes(stripslashes($_POST["madbvt"]));
        $anhnvbvt = addslashes(stripslashes($_POST["anhnvbvt"]));

        if(isset($tennvbvt) && isset($diachi) && isset($sdt) && isset($cmnd) && isset($ngaysinh) && isset($luong) && isset($madbvt) && isset($anhnvbvt))
        {
            $nvbvt = new m_nhansu();
            $nvbvt->m_edit_nvbvt($manvbvt, $tennvbvt, $diachi, $sdt, $cmnd, $ngaysinh, $luong, $madbvt, $anhnvbvt);
            $nvbvt->disconnect();
        }
    }

?>
<div id="add-nvbvt">
    <form action="#">
    <div class="row mb-2">
        <div class="col-md-4">
            <input class="form-control is-valid mt-4 w-80" type="text" id="key"  placeholder="Tìm kiếm nhân viên bán vé tháng">
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-success mt-4" type="submit" onclick="search_nvbvt()">Tìm kiếm</a>
        </div>
    </div>
    </form>
    <br>
    <div style='height: 40px;'>
        <a style='color: #FF33FF;' href='#' id="add">Thêm nhân viên bán vé tháng</a>
    </div>

    <div id="duoi">
        <table id="data">
            <?php
                include("table-nvbvt.php");
            	$nvbvt = new m_nhansu();
                $nvbvt->m_list_nvbvt();
                $nvbvt->disconnect();
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search_nvbvt(){
        $.ajax({
            url : "public/library/nhansu/nhanvienbvt/search-nvbvt.php",
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
            $('#add-nvbvt').load('public/library/nhansu/nhanvienbvt/add-nvbvt.php');
        });
    });
</script>

<script type="text/javascript">
    function ajax_add_nvbvt(){
        $.ajax({
            url : "public/library/nhansu/nhanvienbvt/ajax-add-nvbvt.php",
            type : "post",
            dataType:"text",
            data : {
                tennvbvt : $('#tennvbvt').val(),
                diachi : $('#diachi').val(),
                sdt : $('#sdt').val(),
                cmnd : $('#cmnd').val(),
                ngaysinh : $('#ngaysinh').val(),
                luong : $('#luong').val(),
                madbvt : $('#madbvt').val(),
                anhnvbvt : $('#anhnvbvt').val()
            },
            success : function (result){
                $('#nhansu').html(result);
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).on('click', '.edit-nvbvt', function(){
        var manvbvt = $(this).attr('name');

        $.ajax({
            url: 'public/library/nhansu/nhanvienbvt/edit-nvbvt.php',
            type: 'POST',
            data: {
                manvbvt: manvbvt
            },
            success: function(result){
                $('#add-nvbvt').html(result);
            }
        })
    });
</script>

<script type="text/javascript">
    function DisplayData_NVBVT(){
        $.ajax({
            url: 'public/library/nhansu/nhanvienbvt/data-nvbvt.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data').html(response);
            }
        })
    }

    function deleteItemNVBVT(i) {
        var manvbvt = $("#delete-nvbvt"+i).attr('name');
        if(confirm("Bạn có thực sự muốn xóa không?"))
        {
            $.ajax({
                url: 'public/library/nhansu/nhanvienbvt/delete-nvbvt.php',
                type: 'POST',
                data: {
                    manvbvt: manvbvt
                },
                success: function(data){
                    DisplayData_NVBVT();
                }
            });
        }
    }
</script>