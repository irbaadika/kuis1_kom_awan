<?php
 $conn = new mysqli('localhost','root','','kuis1_kom_awan'); 
 if(isset($_POST['submit'])){
  $sql = $conn->prepare(
   "
    INSERT INTO mahasiswa
    (
     nama,
     gender,
     email,
     ttl,
     alamat,
     agama,
     hobi,
     no_hp
    )
    VALUES
    (?,?,?,?,?,?,?,?)
   "
  );
  
  $nama   = $_POST['nama'];
  $gender  = $_POST['gender'];
  $email  = $_POST['email'];
  $ttl   = $_POST['ttl'];
  $alamat  = $_POST['alamat'];
  $agama   = $_POST['agama'];
  $hobi   = $_POST['hobi'];
  $hp    = $_POST['hp_1'] . $_POST['hp_2'];
  
  $sql->bind_param("ssssssss", $nama, $gender, $email, $ttl, $alamat,$agama,$hobi,$hp);
  
  if($sql->execute()){
   Header('Location: index.php');
  }else{
   echo "ada Error";
  }
  
  $sql->close();
  $conn->close();
 }
?>
<form method="POST" action="">
 <table>
  <tr>
   <td>
    Nama :
   </td>
   <td>
    <input type="text" placeholder="Nama" name="nama">
   </td>
  </tr>
  <tr>
   <td>
    Gender :
   </td>
   <td>
    <input type="radio" name="gender" value="Laki-laki">Laki-laki
    <input type="radio" name="gender" value="Perempuan">Perempuan
   </td>
  </tr>
  <tr>
   <td>
    Email :
   </td>
   <td>
    <input type="text" placeholder="Email" name="email">
   </td>
  </tr>
  <tr>
   <td>
    TTL :
   </td>
   <td>
    <input type="text" placeholder="TTL" name="ttl">
   </td>
  </tr>
  <tr>
   <td>
    Alamat :
   </td>
   <td>
    <input type="mail" placeholder="Alamat" name="alamat">
   </td>
  </tr>
  <tr>
   <td>
    Agama :
   </td>
   <td>
    <select name="agama">
     <option>Islam</option>
     <option>Kristen</option>
     <option>Protestan</option>
     <option>Hindu</option>
     <option>Budha</option>
    </select>
   </td>
  </tr>
  
  <tr>
   <td>
    Hobi :
   </td>
   <td>
    <input type="text" placeholder="Hobi" name="hobi">
   </td>
  </tr>
  <tr>
   <td>
    No HP :
   </td>
   <td>
    <select name="hp_1">
     <option>+62</option>
     <input type="phone" placeholder="" name="hp_2">
    </select>
   </td>
  </tr>
  <tr>
   <td>
    <input type="Submit" value="Submit" name="submit">
   </td>
  </tr>
 </table>
</form>
<br/>

<table border="1">
 <tr>
  <th>Nama</th>
  <th>Gender</th>
  <th>Email</th>
  <th>TTL</th>
  <th>Alamat</th>
  <th>Agama</th>
  <th>Hobi</th>
  <th>No.HP</th>
 </tr>
 <?php
  $sql = "SELECT * FROM mahasiswa";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) :
      while($row = $result->fetch_assoc()) :
 ?>
 <tr>
  <td>
   <?php
    echo $row['nama']
   ?>
  </td>
  <td>
   <?php
    echo $row['gender']
   ?>
  </td>
  <td>
   <?php
    echo $row['email']
   ?>
  </td>
  <td>
   <?php
    echo $row['ttl']
   ?>
  </td>
  <td>
   <?php
    echo $row['alamat']
   ?>
  </td>
  <td>
   <?php
    echo $row['agama']
   ?>
  </td>
  <td>
   <?php
    echo $row['hobi']
   ?>
  </td>
  <td>
   <?php
    echo $row['no_hp']
   ?>
  </td>
 </tr>
 <?php
   endwhile;
  endif;
 ?>
</table>