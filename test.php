<?php
// example of how to use advanced selector features
include('simple_html_dom.php');


$html = file_get_html('http://www.localsearch.ae/en/category/Clinics/1198');
?>

<table border="1">
    <tr>
        <th>name</th>
        <th>phone</th>
    </tr>

<?php
foreach($html->find('.results ul li') as $doc){
    echo '<tr>';
    echo '<td>'.$doc->find('h2 a',0)->innertext.'</td>';
    echo '<td>'.$doc->find('.socialBar .call',0)->value.'</td>';
    echo '<tr>';
}


?>


</table>
