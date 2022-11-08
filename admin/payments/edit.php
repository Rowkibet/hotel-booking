<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\payments.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Update Payment</title>
</head>
<body>
   <!-- navigation bar -->
   <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

<div class="admin-wrapper">
        <!-- left sidebar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
            <!-- // left sidebar -->
    
    <div class="admin-content">

        <button class="btn"><a href="<?php echo BASE_URL . "/admin/payments/index.php"?>">All Payments</a></button>

        <!-- auth form -->
        <div class="form-container">
            <div class="auth-form">
                <div class="form-header">
                    <h2>Update Payment</h2>
                </div>

                <form action="edit.php" method="post" novalidate>

                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                    <input type="hidden" name="id" value= "<?php echo $payment_id ?>" id="">

                    <div class="form-control">
                        <label for="">Receipt No</label>
                        <input type="text" name="receipt_no" value= "<?php echo $receipt_no; ?>" id="">
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="">Date</label>
                        <input type="date" name="date" value= "<?php echo $payment_date; ?>" id="">
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="">Amount</label>
                        <input type="text" name="amount_paid" value= "<?php echo $payment_amount; ?>" id="">
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control date">
                        <label for="">Payment Method</label>
                        <select name="payment_type_id" id="">
                            <option value=""></option>
                            <?php foreach($payment_types as $key => $payment_type): ?>
                                <?php if(!empty($payment_type_id) && $payment_type_id == $payment_type['id']): ?>
                                    <option selected value="<?php echo $payment_type['id']; ?>"><?php echo $payment_type['p_type']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $payment_type['id']; ?>"><?php echo $payment_type['p_type']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <button type="submit" name="update-payment" class="btn submit-btn">Submit</button>

                </form>
            </div>
        </div>
        <!-- // auth form -->
    </div>
</div>

<!--<script src="js/addFlight.js"></script> -->
 
</body>
</html>