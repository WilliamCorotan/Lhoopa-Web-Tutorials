$(function () {
    // Variable Declaration
    let leftOperand = '';
    let rightOperand = '';
    let operator = '';
    let result = '';
    let displayText = '';

    
/**
 * Takes the left operand as parameter 
 */
    function evaluate(num1) {

        /**
         * returns a function that takes right hand operand and operation as parameter and returns the result
         */
        return function operation(num2, operation) {
            switch (operation) {
                case "+":
                    return num1 + num2;
                case "-":
                    return num1 - num2;
                case "*":
                    return num1 * num2;
                case "/":
                    return num1 / num2;
                default:
                    return result;
            }
        }
    }

    /**
     * Click event for number buttons
     */ 
    $('.number').on('click', function(){
        $('.calculator-screen').val('')

        /**
         * Stores value to the right operand if an operator exists
         */
        if(operator){
            const $rightOperand = $(this).val();
            rightOperand += ($rightOperand)
            displayText += $rightOperand     
            $('.calculator-screen').val(displayText)
            return
        }
        
        /**
         * Stores value to the left operand 
         */
        const $leftOperand = $(this).val();
        leftOperand += ($leftOperand)
        displayText = leftOperand;
        $('.calculator-screen').val(displayText)
    })
    
    /**
     * Click event for operator buttons 
     */
    $('.operator').on('click', function(){

        /**
         * Checks if left and right operands has values
        */ 
       if(leftOperand && rightOperand ){
           const eval = evaluate(parseFloat(leftOperand));
           result = eval(parseFloat(rightOperand),operator);
           displayText = result + $(this).val()

           /**
            * Removes equals sign (=) from end of the displayed text 
            */
            if($(this).val() === '='){
                displayText = displayText.slice(0,-1)
            }

           $('.calculator-screen').val(displayText)
           leftOperand = result.toString()
           rightOperand = ''
            
        }
        
        /**
         * Checks if the operation is equals (=)
        */
       if($(this).val == "="){
           displayText = result
           $('.calculator-screen').val(displayText)
           leftOperand = result.toString()
           rightOperand = ''
        }        

        const $operator = $(this).val();
        operator = $operator;

        /**
         * Replaces previous operator with the updated operator chosen
         */
        if(displayText.slice(-1) === '+' || displayText.slice(-1) === '-' || displayText.slice(-1) === '*' || displayText.slice(-1) === '/'){
            displayText = displayText.slice(0, -1) + operator
            $('.calculator-screen').val(displayText)
        }
        else{
            if(operator === '=') {
                $('.calculator-screen').val(displayText)
                return
            }
            displayText += operator
            $('.calculator-screen').val(displayText)
        }
    })

    /**
     * Click event for all clear button
     */
    $('.all-clear').on('click', function(){
        $('.calculator-screen').val('');
        rightOperand = '';
        leftOperand = '';
        operator = '';
        result = '';
    })

    /**
     * Click event for decimal button
     */
    $('.decimal').on('click', function() {

        /**
         * Early returns if the left operand has an existing period and has no operator
         */
        if(leftOperand.includes('.') && !operator){
            return
        }

        /**
         * Early Returns if the right operand has an existing period
         */
        if(rightOperand.includes('.')) {
            return
        }

        /**
         * Appends a period to the right operand if an operator exists
         */
        if(operator){
            const $decimal = $(this).val();
            rightOperand += ($decimal)
            displayText += $decimal
            $('.calculator-screen').val(displayText)
            return
        }

        /**
         * Appends a period to the left operand 
         */
        const $decimal = $(this).val();
        leftOperand += ($decimal)
        $('.calculator-screen').val(leftOperand)

    })

});