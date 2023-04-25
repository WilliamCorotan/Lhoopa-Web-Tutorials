<?php

/*

    CONDITIONALS
        if else
        switch

    LOGICAL OPERATORS
        && and
        || or 
        xor (one needs to be true but not both)
*/

// generic if else statements
$student1 = 12;
$student2 = 44;

function scoreChecker(int $score):string{
    if($score  >= 25 && $score <= 50){
        return "You have passed";
    }
    else{
        return "You have failed";
    }
}

echo scoreChecker($student1);
echo scoreChecker($student2);


function dayChecker(string $day):string{
    
    switch(strtolower($day)){
        case "monday":
            $result = "Today is Monday!";
            break;
        case "tuesday":
            $result = "Today is Tuesday!";
            break;
        case "wednesday":
            $result = "Today is Wednesday!";
            break;
        case "thursday":
            $result = "Today is Thursday!";
            break;
        case "friday":
            $result = "Today is Friday!";
            break;
        case "saturday":
            $result = "Today is Saturday!";
            break;
        case "sunday":
            $result = "Today is Sunday!";
            break;
        default:
            $result = "Invalid input!!";
    }
    return $result;
}

echo dayChecker("MONdaY");
echo dayChecker("Tuesday");
echo dayChecker("wednesday");
echo dayChecker("thursday");
echo dayChecker("holiday");
?>