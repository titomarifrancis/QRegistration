<?php
include 'template/header2.php';
include 'template/magic.php';
include 'dbconn.php';
?>
        <h2 class="text-center text-white">&nbsp;</h2>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="itemreg-column" class="col-md-12">
                    <div id="itemreg-box" class="col-md-12">
                        <form id="itemreg-form" class="form" action="itemregtr_processor.php" method="post">
                            <h3 class="text-center text-info">Item Registration Review Feedback</h3>
                            <div class="form-group">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Item Type</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Serial #</th>
                                        <th scope="col">Feedback</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<?php
$getItemReviewQuery= "select u.useritemid, i.itemtypedesc as itemtypedesc, u.brand as brand, u.model as model, u.serialnumber as serialnumber, u.color as color, u.img_front as ifront, u.img_back as iback, u.img_sn as isn, is_approved, refusal_note from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.userid=$loggedInUserId";
$getItemReviewStmt = $dbh->query($getItemReviewQuery) or die(print_r($dbh->errorInfo(), true));

foreach ($getItemReviewStmt as $getItemReviewRow)
{
    $userItemId = $getStudentItemsRow['useritemid'];
    $itemTypeDesc = $getStudentItemsRow['itemtypedesc'];
    $itemBrand = $getStudentItemsRow['brand'];
    $itemModel = $getStudentItemsRow['model'];
    $itemSN = $getStudentItemsRow['serialnumber'];
    $itemColor = $getStudentItemsRow['color'];
    $isApproved = $getStudentItemsRow['is_approved'];
    $refusalNote = $getStudentItemsRow['refusal_note'];
    $feedBack = 'Approved';
    if($isApproved == 'true')
    {
        $feedBack = "Approved";
    }
    elseif($isApproved != 'true')
    {
        $feedBack = "DENIED: $refusalNote";
    }
    else
    {
        $feedBack = "Pending";
    }
?>
                                        <tr>
                                            <td><?php echo $itemTypeDesc; ?></td>
                                            <td><?php echo $itemBrand; ?></td>
                                            <td><?php echo $itemModel; ?></td>
                                            <td><?php echo $itemColor; ?></td>
                                            <td><?php echo $itemSN; ?></td>

                                            <td><?php echo $feedBack;?></td>
                                        </tr>
<?php
}
?>
                                    </tbody>
                                </table>
								<a href="itemregtr.php" class="text-info">Back to Item Registration</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                                