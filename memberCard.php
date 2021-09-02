<?php
  session_start();
  if(isset($_POST['proceed'])){
    $payment = $_POST['payment'];
    $totalToPay = $_POST['total'];
    $monthsToPay = $_POST['monthsToPay'];
   if($totalToPay > $payment){

      header("Location: memberplan.php");
      $_SESSION['paymentStatus'] = "insufficient";

   }elseif($totalToPay <= $payment){

     $change = $payment - $totalToPay;
     echo "<script>alert('Change: $change' + '\\n' + 'Membership Cretaed' );</script>";

     //Date
     $cardRegisteredDate = date(" F, j Y");
     $cardExpirationDate =  date(" F, j Y ", strtotime("+$monthsToPay month"));

    //  Generate random numbers
    $date = date("Ym");
    $length = 5;
    $result = '';
    for($i = 0; $i < $length; $i++) {
        $result .= rand(0, 9);
    }

    $memeberId =   $date.$result;
   }
    
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=
  , initial-scale=1.0">
  <title>Membeship Card</title>
  <!-- <link rel="stylesheet" href="./css/main.css"> -->
  <link rel="stylesheet" type="text/css" href="./css/main.css? echo time();?>" />
</head>
<body>
  <div class="main-container">
    <div class="member-card">
      <span class="logo">miKe.</span>
      <h2 class="member-card-title">Membership Card</h2>
      <div class="member-info">
        <h2 class="info">Name: <span><?= $_SESSION['fname']." ".$_SESSION['lname'];?></span></h2>
        <h2 class="info">Mobile: <span><?= $_SESSION['phone'];?></span></h2>
        <h2 class="info">Address:<span><?= $_SESSION['address'];?></span></h2>

      </div>
      <div class="membership-info">
        <h2>Member id: <span><?= $memeberId?></span></h2>
        <h2>Plan Start:<span> <?= $cardRegisteredDate;?></span></h2>
        <h2>Plan end: <span><?= $cardExpirationDate;?></span></h2>
      </div>
      <div class="member-card-footer">
        <h2>San Jacinto,Pangasinan</h2>
        <h2>&copy;opyright miKe. creation 2021</h2>
      </div>
    </div>
    <button class="createNewBtn" type="submit"  onclick="window.location.href='./index.php';">Create New Membership</button>
  </div>
</body>
</html>