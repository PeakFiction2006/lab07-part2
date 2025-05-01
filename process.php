<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking Confirmation</title>
	<meta charset="utf-8">
	<meta name="description" content="Rohirrim Booking Form" >
	<meta name="keywords"    content="MiddleEarth, Tours, Rohan" >
	<meta name="author"      content="Grima Wormtongue" />
    <!-- Place the general style sheet before specific CSS so the specific overides the general formatting-->
	<link rel="stylesheet" type="text/css" href="style/style.css" >
	<link rel="stylesheet" type="text/css" href="style/register.css" >	
</head>

<body>
  <h1>Rohirrim Tour Booking Confirmation</h1>
  <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h2>Your Details</h2>";
            echo "<p><strong>First Name:</strong> " . htmlspecialchars($_POST['firstname']) . "</p>";
            echo "<p><strong>Last Name:</strong> " . htmlspecialchars($_POST['lastname']) . "</p>";
            echo "<p><strong>Age:</strong> " . htmlspecialchars($_POST['age']) . "</p>";
            
            // Species
            if (isset($_POST['species'])) {
                $species = $_POST['species'];
                $speciesName = "";
                switch ($species) {
                    case 'M': $speciesName = "Human"; break;
                    case 'D': $speciesName = "Dwarf"; break;
                    case 'E': $speciesName = "Elf"; break;
                    case 'H': $speciesName = "Hobbit"; break;
                    default: $speciesName = "Unknown";
                }
                echo "<p><strong>Species:</strong> $speciesName</p>";
            }
            
            echo "<h2>Your Trip Details</h2>";
            
            // Booking options
            $options = [];
            if (isset($_POST['accom'])) $options[] = "Accommodation";
            if (isset($_POST['4day'])) $options[] = "4 Day Tour";
            if (isset($_POST['10day'])) $options[] = "10 Day Tour";
            
            if (!empty($options)) {
                echo "<p><strong>Booking Options:</strong> " . implode(", ", $options) . "</p>";
            } else {
                echo "<p><strong>Booking Options:</strong> None selected</p>";
            }
            
            // Food preferences
            if (isset($_POST['food'])) {
                $food = htmlspecialchars($_POST['food']);
                $foodName = "";
                switch ($food) {
                    case 'none': $foodName = "None"; break;
                    case 'lembas': $foodName = "Lembas"; break;
                    case 'mushrooms': $foodName = "Mushrooms"; break;
                    case 'ent': $foodName = "Ent Draft"; break;
                    case 'cram': $foodName = "Cram"; break;
                    default: $foodName = "Unknown";
                }
                echo "<p><strong>Menu Preferences:</strong> $foodName</p>";
            }
            
            // Date and party size
            echo "<p><strong>Date:</strong> " . (isset($_POST['bookday']) ? htmlspecialchars($_POST['bookday']) : "Not specified") . "</p>";
            echo "<p><strong>Number of Travellers:</strong> " . (isset($_POST['partysize']) ? htmlspecialchars($_POST['partysize']) : "Not specified") . "</p>";
            
            echo "<h3>Thank you for your booking!</h3>";
        } else {
            echo "<p>No form data was submitted. Please go back to the <a href='register.html'>booking form</a>.</p>";
        }
        ?>
</body>
</html>