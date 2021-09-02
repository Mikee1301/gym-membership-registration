<?php
  session_start();
  if(isset($_POST['createBtn'])){
     $_SESSION['fname'] = $_POST['fname'];
     $_SESSION['lname'] = $_POST['lname'];
     $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['paymentStatus'] = "";
  }
  if($_SESSION['paymentStatus'] == "insufficient"){
    echo '<script>alert("Insufficient Balance")</script>';
    $_SESSION['paymentStatus'] = "";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Membership Plan</title>
  <link rel="stylesheet" type="text/css" href="./css/main.css? echo time();?>" />
</head>
<body>
  <div class="main-container">
    <div class="plan-card-container">
      <h2 class="card-title-plan">Choose Membership Plan</h2>
      <div class="plan-cards">
        <div class="plan-card" id="elitePlan"> 
          <div class="card-header">
            <h2 class="plan-title">elite plan</h2>
            <span class="currency">₱</span>
            <span class="price">300</span>
            <span class="rate">/month</span>
          </div>
          <h2 class="feature">All equipments</h2>
          <h2 class="feature">Weekly yoga</h2>
        </div>
        <div class="plan-card" id="strengthPlan">
        <div class="card-header">
            <h2 class="plan-title">Strength plan</h2>
            <span class="currency">₱</span>
            <span class="price">1000</span>
            <span class="rate">/month</span>
          </div>
          <h2 class="feature">All equipments</h2>
          <h2 class="feature">Weekly yoga</h2>
          <h2 class="feature">Weekly meal plan</h2>
          <h2 class="feature">Weekly 1on1 coaching</h2>
        </div>
      </div>
      <a class="backBtn" href="index.php"><img src="./img/left-arrow.png" alt=""></a>
    </div>
  </div>
  <div class="modal-box">
    <div class="card-header">
      <h2 class="modal-plan-title">elite plan</h2>
      <span class="currency">₱</span>
      <span class="modal-price">300</span>
      <span class="rate">/month</span>
    </div>
     <form action="memberCard.php" Method="POST">
        <input type="number" name="monthsToPay" id="monthsToPay" onkeyup="calc()" placeholder="Number of months to pay">
        <input type="text" name="total" id="total" placeholder="Total" readonly>
        <input type="number" name="payment" id="payment" placeholder="Payment">
        <input type="submit" id="proceedBtn" name ="proceed" value="Proceed">
     </form>
    </div>
<script>
    let boxModal = document.querySelector('.modal-box');
    let planContainer = document.querySelector('.plan-card-container');
    const elitePlan = document.querySelector("#elitePlan");
    const strengthPlan = document.querySelector("#strengthPlan");

    const modaltitle = document.querySelector('.modal-plan-title');
    const modalprice = document.querySelector('.modal-price');

    const payment = document.querySelector('#payment');
      const monthsToPay = document.querySelector('#monthsToPay');
      const totalToPay = document.querySelector('#total');
    function blur(){ 
      planContainer.classList.add('blur');
    }
    elitePlan.addEventListener('click', function(){
      boxModal.classList.add('open');
      modaltitle.innerText = "Elite Plan";
      modalprice.innerText = "300";
      blur();
    });
    
    strengthPlan.addEventListener('click', function(){
      boxModal.classList.add('open');
      modaltitle.innerText = "Strength Plan";
      modalprice.innerText = "1000";
      blur();
    });
  
    document.addEventListener('mouseup', function(e) {
      let box = document.querySelector('.modal-box');
      if (!box.contains(e.target)) {
        boxModal.classList.remove('open');
        planContainer.classList.remove('blur');
        totalToPay.value = "";
        monthsToPay.value = "";
      }
    });
   
    function calc(){
     

      totalToPay.value =  parseInt(monthsToPay.value) * parseInt(modalprice.textContent) ;

    }

</script>
</body>
</html>