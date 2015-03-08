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
    
    public static function getContact($db, $contactId) {
                $query = $db->prepare('SELECT * FROM t_contacts WHERE tc_contactid = ? ORDER BY tc_lastname');
        $query->bindParam(1, $contactId, PDO::PARAM_INT);
        
        $query->execute();
        $fetch = $query->fetchAll();
        foreach ($fetch as $row) {
            return new Contact($row['tc_contactid'], 
                    $row['tc_firstname'], $row['tc_lastname'],
                    $row['tc_company'], $row['tc_phone'], $row['tc_email'], 
                    $row['tc_url'], $row['tc_building_number'], 
                    $row['tc_streetname'], $row['tc_townname'], 
                    $row['tc_region'], $row['tc_country'], 
                    $row['tc_postcode'], $row['tc_birthday'], $row['tc_date']);
        }
        return null;
    }

	
	/*Saves the given contact to the database.
	$contact: The contact to save to the database.
	$db: The database to save the contact to.
	return: null if no error occurred, else a string containing the error. 
	TODO: Validate input somehow. Do with a validate contact function?
		: Ensure there is not already someone in the databse with the same information?
	*/
	public static function saveContact($db, $contact)
	{
		try
		{
			
		//Also need to update the contact's contactID.
		#validateSave($db, $contact);
		$query = "insert into t_contacts(
		tc_firstname,
		tc_lastname,
		tc_company,
		tc_phone,
		tc_email,
		tc_url,
		tc_building_number,
		tc_streetname,
		tc_townname,
		tc_region,
		tc_country,
		tc_postcode,
		tc_birthday,
		tc_date
		)
		
		VALUES(
		'".$contact->getFirstName()."',
		'".$contact->getLastName()."',
		'".$contact->getCompany()."',
		'".$contact->getPhone()."',
		'".$contact->getEmail()."',
		'".$contact->getUrl()."',
		'".$contact->getAddress()->getBuildingNumber()."',
		'".$contact->getAddress()->getStreetName()."',
		'".$contact->getAddress()->getTownName()."',
		'".$contact->getAddress()->getRegion()."',
		'".$contact->getAddress()->getCountry()."',
		'".$contact->getAddress()->getPostCode()."',
		'".$contact->getBirthday()."',
		'".$contact->getDate()."');
		";
		
		$type = $_SESSION['type'];	
		if ($type == "MySQL") //the database we are executing on is of type MySQL.
		{
				
		}
		else if ($type == "Azure")
		{
			
		}
		$statement = $db->prepare($query);
		$statement->execute();
		
		return null;
		}
		catch (Exception $e)
		{
			return $e->getMessage();
		}		
	}
	
	/**Used to update the given contact via the given id. \
	**/
	public static function updateContact($db, $contact)
	{
		try
		{
			
		$query = "UPDATE t_contacts set 
		tc_firstname = '".$contact->getFirstName()."',
		 tc_lastname = '".$contact->getLastName()."',
		 tc_company = '".$contact->getCompany()."',
		 tc_phone = '".$contact->getPhone()."',
		 tc_email = '".$contact->getEmail()."',
		 tc_url = '".$contact->getUrl()."',
		 tc_building_number = '".$contact->getAddress()->getBuildingNumber()."',
		 tc_streetname = '".$contact->getAddress()->getStreetName()."',
		 tc_townname = '".$contact->getAddress()->getTownName()."',
		 tc_region = '".$contact->getAddress()->getRegion()."',
		 tc_country = '".$contact->getAddress()->getCountry()."',
		 tc_postcode = '".$contact->getAddress()->getPostCode()."',
		 tc_birthday = '".$contact->getBirthday()."',
		 tc_date = '".$contact->getDate()."'
		 
		 WHERE 
		 
		 tc_contactid = ".$contact->getContactId().";";
		 
		echo "contact id:".$contact->getContactId()."\n";
		$type = $_SESSION['type'];	
		if ($type == "MySQL") //the database we are executing on is of type MySQL.
		{
				
		}
		else if ($type == "Azure")
		{
			
		}
		$statement = $db->prepare($query);
		$statement->execute();
		
		return null;
		}
		catch (Exception $e)
		{
			return $e->getMessage();
		}		
	}
	
	/**Used to delete the contact with the given id.*/
	public static function deleteContact($db, $contactId)
	{
		try
		{
			
		#validateSave($db, $contact);
		$query = "DELETE FROM t_contacts WHERE tc_contactId = ".$contactId.";";
		 
		 
		
		$type = $_SESSION['type'];	
		if ($type == "MySQL") //the database we are executing on is of type MySQL.
		{
				
		}
		else if ($type == "Azure")
		{
			
		}
		$statement = $db->prepare($query);
		$statement->execute();
		
		return null;
		}
		catch (Exception $e)
		{
			return $e->getMessage();
		}		
	}
	
}
