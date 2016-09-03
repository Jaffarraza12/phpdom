<?php
include("include/connection.php");
if(isset($_POST)) {

    include('simple_html_dom.php');


    $html = file_get_html($_POST['searchtxt']);
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="col-lg-10"><input class="form-control" name="searchtxt" id="searchtxt" value="<?php echo $_POST['searchtxt'] ?>" size="100"/></div>
            <div class="col-lg-2"><input type="submit" name="search" value="get listing"class="btn btn-primary" class="form-control" /></div>
           </form>

        </div>


    </div>
    <br/>
     <div class="clearfix"></div>

    <div class="container">
        <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <div class="input-icon input-icon-lg ">
                    <select class="form-control" name="category" id="category" >
                        <option>Category</option>
                        <?php
                            $sql = mysqli_query($con,"SELECT * from `parcategory`");
                            while($row = mysqli_fetch_object($sql)){
                                  echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                            }
                      ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="loadHtml">

                </div>
            </div>
        </div>
        <div class="col-lg-9">
        <table class="table table-condensed">
            <?php
            if($_POST) {
                echo '<thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                    <th width="40%">Response</th>
                </tr>
                </thead>
                <tbody>';
                $i=0;
                foreach ($html->find('.results ul li') as $doc) {
                    echo '<tr>';
                    echo '<td>' . $doc->find('h2 a', 0)->innertext . '</td>';
                    echo '<td><button data-url="' . $doc->find('h2 a', 0)->href. '" name="save" class="save btn btn-success">Save</button> </td>';
                    echo '<td><div style="display: none" class="alert alert-success resp_yes_'.$i.'"></div><div style="display: none"  class="alert alert-danger resp_no_'.$i.'"></div> </td>';
                    echo '<tr>';
                    $i++;
                }
                echo '</tbody>';
            } else {
                echo '<tbody>';
                echo '<tr>';
                echo '<td align="center" colspan="3">Enter URL to get Listing</td>';
                echo '<tr>';
                echo '</tbody>';
            }


            ?>


        </table>
        </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="app.js"></script>
<script src="unit.js"></script>
<script>
    $(document).ready(function () {
            unit.init();
    })

</script>
</body>
</html>
