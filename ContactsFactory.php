<?php

require_once 'Contact.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class which loads an array of contacts from the database
 *
 * @author Iain Workman 11139430 ipw969
 */
class ContactsFactory {

    public static function getContacts($db) {

        $returnArray = [];
        $query = $db->query('SELECT * FROM t_contacts ORDER BY tc_lastname');

        $fetch = $query->fetchAll();
        foreach ($fetch as $row) {
            $contactId = $row['tc_contactid'];
            $currentContact = new Contact($row['tc_contactid'], 
                    $row['tc_firstname'], $row['tc_lastname'],
                    $row['tc_company'], $row['tc_phone'], $row['tc_email'], 
                    $row['tc_url'], $row['tc_building_number'], 
                    $row['tc_streetname'], $row['tc_townname'], 
                    $row['tc_region'], $row['tc_country'], 
                    $row['tc_postcode'], $row['tc_birthday'], $row['tc_date']);
            $returnArray[$contactId] = $currentContact;
        }
        return $returnArray;
    }

}
