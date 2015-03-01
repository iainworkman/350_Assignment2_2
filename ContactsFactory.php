<?php

require_once 'Contact.php';
/**
 * Class which loads an array of contacts from the database
 *
 * @author Iain Workman 11139430 ipw969
 */
class ContactsFactory {
    
    /**
     * Returns an array of contacts which currently exist in the database, 
     * indexed by their contact id.
     * @param type $db
     * @return \Contact
     */
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
