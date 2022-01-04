<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Email</title>
</head>
<body>
    
<?php

    $emailAddresses = array("jogn.smith@php.test", 
                            "mary.smith.mail.php.example", 
                            "john.jones@php.invalid", 
                            "alan.smithee@test", 
                            "jsmith456@example.com", 
                            "jsmith456@test", 
                            "mjones@example", 
                            "mjones@example.net", 
                            "jane.a.doe@example.org");
    
    function validateAddress($address)
    {   
        if(strpos($address, '@') !== false && strpos($address, '.') !== false)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function sortAddresses($address)
    {
        $sortedAddresses = array();

        $ilimit = count($address)-1; //set upper limit for out loop
        $jlimit = count($address); //set upper limit for inner loop

        for($i = 0; $i <$ilimit; ++$i)
        {
            $currentAddress = $address[$i];
            for($j = $i+1; $j<$jlimit; ++$j)
            {
                if($currentAddress > $address[$j])
                {
                    $tempVal = $address[$j];
                    $address[$j] = $currentAddress;
                    $currentAddress = $tempVal;
                }
            }
            $sortedAddresses[] = $currentAddress;
        }
        return($sortedAddresses);
    }

    $sortedAddress = sortAddresses($emailAddresses);
    $sortedAddressList = implode(", ", $sortedAddress);
    echo "<p>Sorted Addresses: $sortedAddressList</p>\n";

    foreach($sortedAddress as $address)
    {
        if(validateAddress($address) == false)
        {
            echo "<p> The e-mail address <em>$address</em> does not appear to be valid.</p>";
        }
    }
?>
</body>
</html>