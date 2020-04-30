<?php
//class declaration
class Snack
{
    //properties with default values
    public $name = '';
    public $price = 0.00;
    public $type = '';

    //methods
    function __construct($name = 'No name', $price = 0.00, $type = 'uncategorized')
    {
        if (is_string($name) && !empty($name)) {
            $this->name = $name;
        }
        if (is_float($price) && !empty($price)) {
            $this->price = $price;
        }
        if (is_string($type) && !empty($type)) {
            $this->type = $type;
        }
    }

    public function output($echo = TRUE)
    {
        $output = '';
        ob_start(); // Begins an output buffer.
?>
        <dl>
            <dt>Name</dt>
            <dd><?php echo $this->name; ?></dd>
            <dt>Price</dt>
            <dd><?php echo $this->price; ?></dd>
            <dt>Type</dt>
            <dd><?php echo $this->type; ?></dd>
        </dl>
<?php   // ob_get_clean() clears the output buffer, and returns what the string was.
        $output = ob_get_clean(); // We now have the buffered (echo'd) string contents saved in a variable.
        if ($echo === TRUE) echo $output; // Output, if our argument tells us to.
        return $output; // Return the string.
    }
}
?>