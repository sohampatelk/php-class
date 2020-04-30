<?php  // include_once is used to ensure this code is not included/ run multiple times.
//inthis case 
include_once dirname(__FILE__) . '/Snack.Class.php';
class Snacks
{
    //properties
    private $allSnacks = array();

    //Methods
    function __construct($jasonFilePath = '')
    {   //check if th efile exists...
        if (file_exists($jasonFilePath)) {   //will retrieve the file contects as a string
            $jasonString = file_get_contents($jasonFilePath);

            //conver the JSON string to the php object.
            $jsonObject = json_decode($jasonString);

            //Check if the snacks are an array
            if (is_array($jsonObject->snacks)) {   //store the array in our property
                $this->allSnacks = $jsonObject->snacks;
            }
            // If snacks are NOT an array.
            else { // Show a warning in the browser.
                echo '<p>WARNING: The snacks appear to be malformed!</p>';
            }
        }
        // If file doesn't exist.
        else { // Show a warning in the browser.
            echo '<p>WARNING: Your file doesn\'t exist!</p>';
        }
    }

    // Output all of the snacks.
    public function output()
    { // If there ARE snacks.
        if (is_array($this->allSnacks) && !empty($this->allSnacks)) { // Heading, and open our unordered list.
            echo '<h2>Snacks List</h2><ul>';
            // Loop through the snacks!
            foreach ($this->allSnacks as $i) { // Create an instance of our OTHER class: Snack! Pass in the values.
                $newSnack = new Snack($i->name, $i->price, $i->type);
                // Echo out our result.
                echo '<li>' . $newSnack->output(FALSE) . '</li>';
            } // Close the unordered list.
            echo '</ul>';
        }
    }


    // Find a particular snack.
    public function findSnackByIndex($id = FALSE)
    { // Check if the submission is a number (integer.)
        if (is_integer($id)) { // Check if the snack at this INDEX even EXISTS!?
            if (isset($this->allSnacks[$id])) { // Retrieve that snack from the array!
                $foundSnack = new Snack(
                    $this->allSnacks[$id]->name,
                    $this->allSnacks[$id]->price,
                    $this->allSnacks[$id]->type
                );
                // Output that snack!
                $foundSnack->output();
            }
            // If the Snack is not found...
            else {
                echo '<p>Sorry, we couldn\'t find a snack at ID:' . $id . '!</p>';
            }
        }
        // No ID, or an invalid ID was passed.
        else {
            echo '<p>No ID, or an invalid ID was passed; unable to find snack for ID: ' . $id . '.</p>';
        }
    }
}
