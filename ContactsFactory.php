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
                $query = $db->prepare('SELECT tc_contactid, tc_firstname, tc_lastname, tc_company,
				tc_phone, tc_email, tc_url, tc_building_number, tc_streetname, tc_townname, tc_region, tc_country
				, tc_postcode, tc_birthday, tc_date FROM t_contacts WHERE tc_contactid = ? ORDER BY tc_lastname');
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
					
					echo $row['tc_townname'];
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
			
		//empty fields should become null. FURTHER VALIDATION .
		ContactsFactory::ensureNull($contact);

		$statement = $db->prepare("INSERT INTO t_contacts(
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
		:firstName,
		:lastName,
		:company,
		:phoneNumber,
		:email,
		:url,
		:buildingNumber,
		:streetName,
		:townName,
		:region,
		:country,
		:postalCode,
		:birthday,
		:date);");
		
			
			$statement->bindParam(':firstName', $contact->getFirstName());
			$statement->bindParam(':lastName', $contact->getLastName());
			$statement->bindParam(':company', $contact->getCompany());
			$statement->bindParam(':phoneNumber', $contact->getPhone());
			$statement->bindParam(':email', $contact->getEmail());
			$statement->bindParam(':url', $contact->getUrl());
			$statement->bindParam(':buildingNumber', $contact->getAddress()->getBuildingNumber());
			$statement->bindParam(':streetName', $contact->getAddress()->getStreetName());
			$statement->bindParam(':townName', $contact->getAddress()->getTownName());
			$statement->bindParam(':region', $contact->getAddress()->getRegion());
			$statement->bindParam(':country', $contact->getAddress()->getCountry());
			$statement->bindParam(':postalCode', $contact->getAddress()->getPostCode());
			$statement->bindParam(':birthday', $contact->getBirthday());
			$statement->bindParam(':date', $contact->getDate());
			$statement->execute();
			

		return null;
		}
		catch (PDOException $e)
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
			
//FURTHER VALIDATION BEFORE THE DATA GOES TO THE DATABASE.
		ContactsFactory::ensureNull($contact);
		
		if (preg_match("/[0-9]+/", $contact->getContactId()) != 1)
		{
			return "The given contact id was not of type integer.\n Contact Id is :".$contact->getContactId();
		}
		
		
		$statement = $db->prepare("UPDATE t_contacts SET 
		tc_firstname = :firstName,
		 tc_lastname = :lastName,
		 tc_company = :company,
		 tc_phone = :phoneNumber,
		 tc_email = :email,
		 tc_url = :url,
		 tc_building_number = :buildingNumber,
		 tc_streetname = :streetName,
		 tc_townname = :townName,
		 tc_region = :region,
		 tc_country = :country,
		 tc_postcode = :postalCode,
		 tc_birthday = :birthday,
		 tc_date = :date
		 
		 WHERE 
		 
		 tc_contactid = :contactId;");
		 
			$statement->bindParam(':firstName', $contact->getFirstName());
			$statement->bindParam(':lastName', $contact->getLastName());
			$statement->bindParam(':company', $contact->getCompany());
			$statement->bindParam(':phoneNumber', $contact->getPhone());
			$statement->bindParam(':email', $contact->getEmail());
			$statement->bindParam(':url', $contact->getUrl());
			$statement->bindParam(':buildingNumber', $contact->getAddress()->getBuildingNumber());
			$statement->bindParam(':streetName', $contact->getAddress()->getStreetName());
			$statement->bindParam(':townName', $contact->getAddress()->getTownName());
			$statement->bindParam(':region', $contact->getAddress()->getRegion());
			$statement->bindParam(':country', $contact->getAddress()->getCountry());
			$statement->bindParam(':postalCode', $contact->getAddress()->getPostCode());
			$statement->bindParam(':birthday', $contact->getBirthday());
			$statement->bindParam(':date', $contact->getDate());
			$statement->bindParam(':contactId', $contact->getContactId());
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
			
		if (ContactsFactory::validSQL($contactId))
		{
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
		}
			catch (Exception $e)
			{
				return $e->getMessage();
			}		
	}

	//Any field within contacts that is set to the empty string is set to null by default.
	public static function ensureNull($contact)
	{
		
		if ($contact->getFirstName() == "")
		{
			$contact->setFirstName(null);
		}
		
		
		if ($contact->getLastName() == "")
		{
			$contact->setLastName(null);
		}
		
		
		if ($contact->getCompany() == "")
		{
			$contact->setCompany(null);
		}
		
		
		if ($contact->getEmail() == "")
		{
			$contact->setEmail(null);
		}	

		if ($contact->getPhone() == "")
		{
			$contact->setPhone(null);
		}
		
		
		if ($contact->getAddress()->getBuildingNumber() == "")
		{
			$contact->getAddress()->setBuildingNumber(null);
		}
		
		
		if ($contact->getAddress()->getStreetName() == "")
		{
			$contact->getAddress()->setStreetName(null);
		}
		
		
		if ($contact->getAddress()->getTownName() == "")
		{
			$contact->getAddress()->setTownName(null);
		}
		
		
		if ($contact->getAddress()->getRegion() == "")
		{
			$contact->getAddress()->setRegion(null);
		}
		
		if ($contact->getAddress()->getCountry() == "")
		{
			$contact->getAddress()->setCountry(null);
		}
		
		
		if ($contact->getAddress()->getPostCode() == "")
		{
			$contact->getAddress()->setPostCode(null);
		}
		
		
		if ($contact->getBirthday() == "")
		{
			$contact->setBirthday(null);
		}
		
		
		if ($contact->getDate() == "")
		{
			$contact->setDate(null);
		}
	}
	
	/*Validates the contact information to ensure that nothing inappropriate leaks into the database
	$contact: The contact to validate.
	checks for semicolons, single quotes, double quotes, and checks the type of the contact id.
	@return null if there were no errors.
			an error message if there was an error.
	*/
	public static function validateContact($contact)
	{
		$errorMessage = null;
		
		if ($contact->getFirstName() == "" || $contact->getFirstName() == null || empty($contact->getFirstName()))
		{
			$errorMessage = $errorMessage."The given first name must not be null or empty.\n";
		}
		
		if (!ContactsFactory::validSQL($contact->getFirstName()))
		{
			$errorMessage = $errorMessage."The first name of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		
		if (!ContactsFactory::validSQL($contact->getLastName()))
		{
			$errorMessage = $errorMessage."The last name of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		
		if (!ContactsFactory::validSQL($contact->getEmail()))
		{
			$errorMessage = $errorMessage."The email of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		
		if (!ContactsFactory::validSQL($contact->getPhone()))
		{
			$errorMessage = $errorMessage."The phone number of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		
		if (!ContactsFactory::validSQL($contact->getBirthday()))
		{
			$errorMessage = $errorMessage."The birthday of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		
		if (!ContactsFactory::validSQL($contact->getDate()))
		{
			$errorMessage = $errorMessage."The date of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		
		if (!ContactsFactory::validSQL($contact->getCompany()))
		{
			$errorMessage = $errorMessage."The company of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		
		if (!ContactsFactory::validSQL($contact->getUrl()))
		{
			$errorMessage = $errorMessage."The url of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		
		if (!ContactsFactory::validSQL($contact->getAddress()->getBuildingNumber()))
		{
			$errorMessage = $errorMessage."The building number of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		
		if (!ContactsFactory::validSQL($contact->getAddress()->getTownName()))
		{
			$errorMessage = $errorMessage."The town name of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		

	
		if (!ContactsFactory::validSQL($contact->getAddress()->getRegion()))
		{
			$errorMessage = $errorMessage."The region of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		if (!ContactsFactory::validSQL($contact->getAddress()->getCountry()))
		{
			$errorMessage = $errorMessage."The country of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		if (!ContactsFactory::validSQL($contact->getAddress()->getPostCode()))
		{
			$errorMessage = $errorMessage."The postal code of the given contact contains erroneous characters that are not alphanumeric"."\n";
		}
		
		return $errorMessage;
	}
	
	/*Checks to see if the given string contains only appropriate characters for an SQL query.
	@return true if the string is ok
			return false if the string is not ok.
			*/
	public static function validSQL($string)
	{
		$expression = "/([a-zA-Z]*[0-9]*-*@*\/*\.*)*/i";
		if ($string == null || $string == "" || empty($string) || preg_match($expression, $string) == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
			
	}
}
