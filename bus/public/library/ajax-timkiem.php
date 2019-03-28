<?php  
  if(isset($_POST["key"]))
  {
    $key = $_POST["key"];
    include("../../models/m-index.php");
    $index = new m_index();
    $index->timkiem($key);
    $num = $index->num_rows();
    if ($num > 0 && $key != "")
    {
      $row = $index->fetch_assoc();
?>
<section class="content-route">
  <?php  
    if($row["matuyen"]<10)
    {
      $row["matuyen"] = "0".$row["matuyen"];
    }
    $tieude = $row["matuyen"]." ".$row["tentuyen"];
  ?>
  <h4>Tuyến xe buýt số <?php echo $tieude; ?></h4>
  <table class="table table-borderless">
    <tbody>
      <tr>
        <th scope="row">Mã số tuyến:</th>
        <td><?php echo $row["matuyen"]; ?></td>
      </tr>

      <tr>
        <th scope="row" colspan="2">Chiều đi:</th>
        <td><?php echo $row["chieudi"]; ?></td>
      </tr>

      <tr>
        <th scope="row" colspan="2">Chiều về:</th>
        <td colspan="2"><?php echo $row["chieuve"]; ?></td>
      </tr>
      
      <tr>
        <th scope="row" colspan="2">Đơn vị đảm nhận: </th>
        <td>
          <ul>
            <li>Loại hình hoạt động: công cộng</li>
            <li>Cự ly: 22.4 km</li>
            <li>Loại xe: <?php $row["soghe"]; ?> chỗ</li>
            <li>Thời gian hoạt động: <?php echo $row["giobd"]."-".$row["giokt"]; ?> / CN: 5h00 - 21h00 Thời gian kế hoạch 1 lượt: <?php echo $row["tansuat"]; ?> phút</li>
            <li>Giá vé: <?php echo $row["dongia"]; ?>đ/lượt</li>
            <li>Số chuyến: <?php $row["soluongxe"]; ?> xe chuyến/ngày</li>
            <li>Thời gian chuyến: 45 phút</li>
            <li>Giãn cách chuyến: Ngày thường: 10 - 15 phút/chuyến/ Chủ nhật: 12-20 phút/chuyến phút</li>
          </ul>
        </td>

        
      </tr>
    </tbody>
  </table>
  <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59587.94583116671!2d105.80194401254816!3d21.022816135615788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1548514185334" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>
<?php  
    }
    else
    {
      echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
    }
  }
?>