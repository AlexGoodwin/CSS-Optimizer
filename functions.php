  
<?php
function remove_whitespace($file) {
        
        $feed = file_get_contents($file);
        return trim($feed);

}
?>