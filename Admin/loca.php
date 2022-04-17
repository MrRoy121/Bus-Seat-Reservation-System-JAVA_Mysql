
<?php
    include 'lib/Database.php';
    $db=new Database();
    
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

        $us1query="UPDATE tbl_buslocation 
                SET
                lat='$lat',
                lng='$lng'
                WHERE no='1'";
        $addseat1=$db->update($us1query);
        
        if($addseat1){
              echo  "Updated Successfully";
        }
        
}
?>
<form class="form" action="" method="post" enctype="multipart/form-data">
    <table>
            <tr>
                <td>Latitude</td>
                <td><input type="text" name="lat" placeholder="S1"/> </td>
            </tr>
            <tr>
                <td>Longitude</td>
                <td> <input type="text" name="lng" placeholder="S2"/> </td>
            </tr> 
            <tr>
                <td></td>
                <td><input class='btn'type="submit" value="submit" /></td>
            </tr>
        </table>
</form>
