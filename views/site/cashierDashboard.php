<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$this->title = 'CashierDashboard';
$this->params['breadcrumbs'][] = $this->title;

// print_r(Url::base(true));die;
?>


<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<style>
  article {
  float: right;
  padding: 5px;
  width: 30%;

  height: 300px; /* only for demonstration, should be removed */
}
.button4 {
  float:left;
  border-radius: 8px;
  font-size: 15px;
  width:240px;
  background-color:#2e8b57;
  padding: 10px 10px 5px 5px;
}
.button5 {
  float:left;
  border-radius: 8px;
  font-size: 14px;
  width:100px;
  background-color:#2e8b57;
  padding: 10px 10px 5px 5px;
}


</style>
<h2>Invoice</h2>
<div class="body-content">

 
<div class="row">

	<div class="col-lg-12">
    
  <form>
  <div class="form-row">
    <div class="col-md-2">
      <input type="text" class="form-control" placeholder="Date" value="<?php echo date("Y-m-d");?>">
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" placeholder="Time"  value="<?php echo time(" ");?>" >
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" placeholder="Invoice No">
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" placeholder="Customer Id">
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" placeholder="Cashier:">
    </div>
  </div>
</form>
</div> 
</div>



<div class="row">
<div class="col-md-8" >
  <div class="bar">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item ID</th>
      <th scope="col">Discount</th>
      <th scope="col">Qty</th>
      <th scope="col">Item Name</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>

</div>
</div>
<br><br><br>
  <article>
  <div class="col-md-12" >
  <form>
  <div class="row">
   <div class="col-md-12" >
    <div class="col-md-6">Net Amount:
      <input type="text" class="form-control" >
    </div>
    <div class="col-md-6">No Of Items:
      <input type="text" class="form-control" >
    </div>
  </div>  
</div><br>
<div class="row">
   <div class="col-md-12" >
    <div class="col-md-6">Discount:
      <input type="text" class="form-control" >
    </div>
    <div class="col-md-6">Total Amount:
      <input type="text" class="form-control">
    </div>
  </div>  
</div><br>
<div class="row">
   <div class="col-md-12" >
    <div class="col-md-6">Paid:
      <input type="text" class="form-control">
    </div>
    <div class="col-md-6">Balance:
      <input type="text" class="form-control" >
    </div>
  </div>  
</div>
  
</form>
  
</div>
</article>
</div>


<div class="row">
	<div class="col-lg-9">
  <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
       <div class="form-row">
     <div class="col-lg-3">Item Name:
           
           <select id="mySelect" onchange="myFunction()" input type="text" class="form-control">
           <option value="" disabled selected>Select your option</option>
           <?foreach($list as $product):?>
           <option value="<?=$product['Id']?>"><?= $product['Name']?></option>
           <?endforeach;?> 
            </select>
     </div>
    </div> 
   
    <div class="form-row">
    <div class="col-lg-2" >  Unit Price:<input id="sub" type=text  class="form-control"></div></div>
  
     <div class="form-row">
     <div class="col-lg-2">  Quantity<input type="text" id="quantity" class="form-control" > </div> </div>
     <div class="form-row">
     <div class="col-lg-2">Discount<input type="text" id="discount" class="form-control"> </div> </div>
     <div class="form-row">
     <div class="col-lg-2">Total<input type="text" id="total" class="form-control" > </div> </div>
     
     <div class>
         <?= Html::submitButton('Add', ['class' => 'btn btn-primary',
            'name' => 'registration-button', 'submit'=>"saveFunction()"]) ?>
      </div>
      <?php ActiveForm::end(); ?>
    
</div>
</div>
<br>
<div class="col-lg-12">
<div class="row">
	<div class="col-lg-8">
<button class="button button4">Add
</button>
<button class="button button4">Remove</button>
<button class="button button4">Clear</button>
</div>


<div class="col-sm-4">
<button class="button button5">Vouchers</button>
<button class="button button5">Credit</button>
<button class="button button5">Save & print</button>


</div>
</div>


</div>
</body>
</html>



<script>

function myFunction() {
  
  var x = document.getElementById("mySelect").value;
  // alert(x)
  $.ajax({  
        type: "POST",  
        url:  "site/add",  //site/add
        data: {'id': x},
     
        success: function(data) {  
            console.log(data)
            document.getElementById("sub").value = data;
           

           // document.getElementById("div").innerHtml = "<tr><td>name</td></tr>";
            //total =total + ptotal
        }  
    });  
  
}

function saveFunction() {
  
  var x = document.getElementById("mySelect").value;
  var quantity = document.getElementById("quantity").value;
  var discount = document.getElementById("discount").value;
  var total = document.getElementById("total").value;
  // alert(x)
  $.ajax({  
        type: "POST",  
        url:  "site/save",  //site/add
        data: {'id': x, 'quantity': quantity, 'discount': discount, 'total': total},
     
        success: function(data) {  
            console.log(data)
            // document.getElementById("sub").value = data;
           

           // document.getElementById("div").innerHtml = "<tr><td>name</td></tr>";
            //total =total + ptotal
        },
        error: function(error){
          console.log(error)
        },
        statusCode:{

        }
    });  
  
}

</script>
