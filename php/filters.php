<?php 

/* 

    FILTERS 
        FILTER OPTIONS
            FILTER_VALIDATE_BOOLEAN
            FILTER_VALIDATE_EMAIL
            FILTER_VALIDATE_FLOAT
            FILTER_VALIDATE_INT
            FILTER_VALIDATE_IP
            FILTER_VALIDATE_REGEXP
            FILTER_VALIDATE_URL

        filter_has_var(int $input_type, string $var_name): bool
            example: 
                filter_has_var(INPUT_POST, $email)
                filter_has_var(INPUT_GET, $email)
                
        dont forget that if either reads post or get in the first params

        filter_input_array(int $type, array|int $options = FILTER_DEFAULT, bool $add_empty = true): array|false|null
            takes in an array and/or options, the filters the array index based on the options that is passed with it
            
            ARRAY PARAMS
                filter - determines the filter type
                options - functions that mutates the input
                

    SANITATIONS
        Technically, returns a sanitized/pure version of the variable
        SANITATION OPTIONS
             FILTER_SANITIZE_EMAIL
             FILTER_SANITIZE_ENCODED
             FILTER_SANITIZE_NUMBER_FLOAT
             FILTER_SANITIZE_NUMBER_INT
             FILTER_SANITIZE_SPECIAL_CHARS
             FILTER_SANITIZE_STRING
             FILTER_SANITIZE_URL
*/

// Check for posted data
    $filter = array(
        "data" => FILTER_VALIDATE_EMAIL,
        "data2" => array(
            "filter" => FILTER_VALIDATE_INT,
            "options" => array(
                "min-range" => 1,
                "max-range" => 100
            )
        ),

    );


    // Sample code from the documentation
    $args = array(
        'product_id'   => FILTER_SANITIZE_ENCODED,
        'component'    => array('filter'    => FILTER_VALIDATE_INT,
                                'flags'     => FILTER_REQUIRE_ARRAY, 
                                'options'   => array('min_range' => 1, 'max_range' => 10)
                               ),
        'version'      => FILTER_SANITIZE_ENCODED,
        'doesnotexist' => FILTER_VALIDATE_INT,
        'testscalar'   => array(
                                'filter' => FILTER_VALIDATE_INT,
                                'flags'  => FILTER_REQUIRE_SCALAR,
                               ),
        'testarray'    => array(
                                'filter' => FILTER_VALIDATE_INT,
                                'flags'  => FILTER_REQUIRE_ARRAY,
                               )
    
    );
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<input type="text" name="data">
<button>Submit</button>
</form>