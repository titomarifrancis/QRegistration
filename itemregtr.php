<?php
include 'template/header.php';
include 'dbconn.php';

?>
<div>
            <header><h2>Item Registration</h2></header>
            <form>
                <div>
                    <div>
                        <h4>Item Details</h4>
                        <div>
                            <div>
                                <label>Item</label>
                                <select>
                                    <option value="">Select Your Option</option>
<?php
$getItemTypesQuery= "select itemtypeid, itemtypedesc from itemtype";
$getItemTypesStmt= $dbh->query($getItemTypesQuery) or die(print_r($dbh->errorInfo(), true));

foreach($getItemTypesStmt as $getItemTypesRow)
{
    $itemTypeId= $getItemTypesRow['itemtypeid'];
    $itemTypeDesc= $getItemTypesRow['itemtypedesc'];
?>
                                    <option value="<?php echo $itemTypeId; ?>"><?php echo $itemTypeDesc;?></option>
<?php
}
?>                            
                                </select>
                            </div>
                            
                            <div>
                                <label>Brand</label>
                                <input type="text" placeholder="e.g. Lenovo" required>
                            </div>

                            <div>
                                <label>Color</label>
                                <input type="text" placeholder="e.g. Black" required>
                            </div>

                            <div>
                                <label>Serial Number</label>
                                <input type="text" placeholder="e.g. ABC123" required>
                            </div>
                        </div>
                        <button>Submit</button>
                    </div> 
                </div>
            </form>
        </div>
<?php
include 'template/footer.php';