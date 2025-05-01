<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking Confirmation</title>
    <meta charset="utf-8">
    <meta name="description" content="Rohirrim Booking Confirmation" >
    <meta name="keywords"    content="MiddleEarth, Tours, Rohan" >
    <meta name="author"      content="Grima Wormtongue" />
    <link rel="stylesheet" type="text/css" href="style/style.css" >
    <link rel="stylesheet" type="text/css" href="style/register.css" >    
</head>

<body>
    <header><h1>Rohirrim Tour Booking Confirmation</h1></header>
    <nav>
        <ul>
            <li><a href="construction.html">Home</a></li>
            <li><a href="construction.html">Accommodation</a></li>
            <li><a href="construction.html">Horse Riding</a></li>
            <li><a href="construction.html">Sight Seeing</a></li>
            <li><a href="register.html">Book</a></li>
        </ul>
    </nav>

    <article>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h2>Booking Confirmation</h2>";
            echo "<p>Thank you for your booking with Rohirrim Dude Ranch!</p>";
            
            echo "<h3>Personal Information</h3>";
            echo "<p><strong>Name:</strong> " . htmlspecialchars($_POST['firstname']) . " " . htmlspecialchars($_POST['lastname']) . "</p>";
            echo "<p><strong>Age:</strong> " . htmlspecialchars($_POST['age']) . "</p>";
            
            // Species
            $species = isset($_POST['species']) ? $_POST['species'] : 'M';
            $speciesNames = [
                'M' => 'Human',
                'D' => 'Dwarf',
                'E' => 'Elf',
                'H' => 'Hobbit'
            ];
            echo "<p><strong>Species:</strong> " . $speciesNames[$species] . "</p>";
            
            echo "<h3>Trip Details</h3>";
            
            // Booking options
            $options = [];
            if (isset($_POST['accom'])) $options[] = "Accommodation";
            if (isset($_POST['4day'])) $options[] = "4 Day Tour";
            if (isset($_POST['10day'])) $options[] = "10 Day Tour";
            
            if (!empty($options)) {
                echo "<p><strong>Options Selected:</strong><br>" . implode("<br>", $options) . "</p>";
            } else {
                echo "<p><strong>No tour options selected</strong></p>";
            }
            
            // Food preferences
            $food = isset($_POST['food']) ? $_POST['food'] : 'none';
            $foodNames = [
                'none' => 'None',
                'lembas' => 'Lembas',
                'mushrooms' => 'Mushrooms',
                'ent' => 'Ent Draft',
                'cram' => 'Cram'
            ];
            echo "<p><strong>Menu Preference:</strong> " . $foodNames[$food] . "</p>";
            
            // Date and party size
            echo "<p><strong>Arrival Date:</strong> " . htmlspecialchars($_POST['bookday']) . "</p>";
            echo "<p><strong>Number of Travellers:</strong> " . htmlspecialchars($_POST['partysize']) . "</p>";
            
            echo "<div class='confirmation'>";
            echo "<h3>Your booking has been received!</h3>";
            echo "<p>We'll contact you soon with more details about your adventure in Rohan.</p>";
            echo "</div>";
        } else {
            echo "<div class='error'>";
            echo "<h3>No booking data received</h3>";
            echo "<p>Please go back to our <a href='register.html'>booking form</a> to make your reservation.</p>";
            echo "</div>";
        }
        ?>
    </article>

    <footer>
        <div>
            <h1 class="fineprint">Conditions Apply</h1>
            <p class="fineprint">Rohirrim Dude Ranch management takes no responsiblity for any injury, beheadings, spells (sleeping or otherwise), spider-bites suffered by guests, or for anything whatsoever.</p> 
        </div>
        <p id="contact">Any enquiries please email the <a href="mailto:something@something.com">manager</a></p>
    </footer>
</body>
</html>