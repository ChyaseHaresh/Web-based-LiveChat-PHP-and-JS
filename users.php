<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<style>
.dropdown {
  position: relative;
  /* display: inline-block; */
}

.dropdown-content {
  display: none;
    background-color: dimgrey;

  /* position: absolute;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown p{
  color: white;
  font-weight: bold;
  padding: 7px 15px;
  border-radius: 5px;
  font-size: 12px;
  background: darkgrey;
  display: block;
}
.dropdown p:hover{
  text-decoration: underline;
}
.dropdown a{
  text-decoration: none;
  color: white;
}
</style>
<body>
  <div class="wrapper">
    <section class="users">
      <header style="border: 2px solid #FDFEFE;">
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" style="border: 2px solid #1ABC9C;" alt="">
          <div class="details">
            <span style="font-weight: bold;"><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><a style="text-decoration: underline; color:dimgrey" href="update.php">Edit Profile</a></p>
          </div>
        </div>
        <div class="dropdown">
          <button style="font-size: 30px; border:none; background:none; color:dimgrey;"><i class="fas fa-caret-square-down"></i></button>
            <div class="dropdown-content">
              <p><a href="update.php">Setting</a></p>
              <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>

            </div>
          </div>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list" style="border-top:2px solid #ECF0F1;">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
