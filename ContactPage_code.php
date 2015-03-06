<?php

function buildWell($contactId, $firstName, $lastName) {
    echo '<tr>';
    echo '<td class="contact-label" style="padding-top:20px; width:90%">' . $firstName . ', ' . $lastName . '</td>';
    echo '<td style="padding-top:20px;"><a href="UpdateContact.php?ContactId=' . $contactId . '" class="btn btn-success">Edit</a></td>';
    echo '<td style="padding-top:20px;"><button type="button" class="btn btn-danger">Remove</button></td>';
    echo '</tr>';
    
}
