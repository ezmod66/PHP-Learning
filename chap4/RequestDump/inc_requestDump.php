<?php
//create table to display request auto global name/value values
// table consisting  of 2 columns. name | value
// loop through each to print out 
// format output stripslashes() htmlentities()
?>

<table>
    <th>
    <td> key name:</td>
    <td> Value value</td>
    </th>
    <?php
    foreach ($_REQUEST as $rkey => $rval) {
        $cleanKey = stripslashes(htmlentities($rkey));
        $cleanVal = stripslashes( htmlentities($rval));

    ?>
        <tr>
            <td><?php $cleanKey ?></td>
            <td><?php $cleanVal?></td>
        </tr>
    <?php
    }
    ?>
</table>