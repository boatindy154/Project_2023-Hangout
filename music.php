<?php include('partials-front/menu.php');
session_start();
$userlevel = $_SESSION['userlevel'];
     
if($userlevel!='M'){
    Header("Location: form_login.php");
}
$music = "SELECT * FROM tbl_music ";
$rsmusic = mysqli_query($conn, $music);
$sn = 1;

?>
  <script src="sweetalert2.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

<style>
    .btn {
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
}
        .btn-primary {
    background-color: #ff6b81;
    color: white;
    cursor: pointer;
    vertical-align: top;
}
.btn-primary:hover{
    color: white;
    background-color: #ff4757;

}
a {
      color: white;

    }
        a:hover {
      color: #ff7b00;
      text-decoration: none;
    }
@media screen and (min-width: 601px) {
  h3 {
    font-size: 1.5rem;
  }
}

@media screen and (max-width: 600px) {
  h3 {
    font-size: 1.2rem;
    text-align: left;
  }
}</style>
<!-- music sEARCH Section Starts Here -->
<section class=" food-search text-center" style="background-image: url(images/111.png); background-attachment: fixed;">
    <div class="overlay" ></div>
    <div class="container " style="padding: 6% 0; position: relative;">

        <form action="" method="POST">
            <input type="search" name="song" placeholder="Request for Music.." required>
            <input type="submit" name="submit" value="Request" class="btn btn-primary">
        </form>
    </div>
    <!-- music sEARCH Section Ends Here -->
    <div class="container food-menu" style="position: relative; padding: 1% ">
        <h2 class="text-center text-white">Music</h2>
        <?php 
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>
        <?php foreach ($rsmusic as $row) {

        ?>
            <div class="">
                <div class="food-menu-desc text-white text-center" style="margin-left: 14%; float: left;">
                    <h3 class="" style="float: left; padding-bottom:2% "><?php echo $sn++; ?>. <?php echo $row['song']; ?> </h4>
                        <br>
                </div>
            </div>
        <?php } ?>
    </div>

    </div>
    <div class="clearfix"></div>
    <br><br><br><br>

</section>
<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        $song = $_POST['song'];
        $music_date = date("Y-m-d h:i:sa");
        $status = "1";
        $customer_name = $_SESSION['full_name'];
        // $customer_name = 
        // $username = $_POST['username'];
        // $password = md5($_POST['password']); //Password Encryption with MD5

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_music SET 
            song='$song',
            music_date='$music_date',
            status='$status',
            customer_name='$customer_name'

            
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        <?php if($res==TRUE) 
        { 
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            //Redirect Page to Manage Admin?>
            <script type="text/javascript">
                
	        // window.location="music.php";
            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'ขอเพลงสำเร็จ',
                                showConfirmButton: false,
                                timer: 5000
                              }).then((result) => {
                                if (result.isDismissed) {
                                    window.location.href = 'music.php';
                                }
                              });
            </script>
            
        <?php } 
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            //Redirect Page to Add Admin
            header('location:index.php');
        }

    }?>
    




































<?php include('partials-front/footer.php'); ?>