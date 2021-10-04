<?php include('partials-front/menu.php');
session_start();

$music = "SELECT * FROM tbl_music ";
$rsmusic = mysqli_query($conn, $music);
$sn = 1;

?>

<!-- music sEARCH Section Starts Here -->
<section class=" food-search text-center" style="background-image: url(images/111.png); background-attachment: fixed;">
    <div class="overlay" style="padding-bottom: 84%;"></div>
    <div class="container " style="padding: 6% 0; position: relative;">

        <form action="" method="POST">
            <input type="search" name="song" placeholder="Request for Music.." required>
            <input type="submit" name="submit" value="Request" class="btn btn-primary">
        </form>
    </div>
    <!-- music sEARCH Section Ends Here -->
    <div class="container food-menu" style="position: relative; background: linear-gradient(180deg, rgba(0, 0, 0, 0.8) 0%, rgba(47, 26, 2, 0.8) 100%);
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 20px; height: 700px;">
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
                    <h3 class="" style="float: left; padding-bottom:2%"><?php echo $sn++; ?>. <?php echo $row['song']; ?> </h4>
                        <br>
                </div>
            </div>
        <?php } ?>
    </div>

    </div>
    <div class="clearfix"></div>
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
            $_SESSION['add'] = "<div class='success'>User Added Successfully.</div>";
            //Redirect Page to Manage Admin?>
            <script type="text/javascript">
	        window.location="music.php";
            </script>

        <?php } 
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            //Redirect Page to Add Admin
            header('location:index.php');
        }

    }?>
    




































<?php include('partials-front/footer.php'); ?>