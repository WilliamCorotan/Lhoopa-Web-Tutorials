$(function () {
    let leftOperand = 0;
    let rightOperand = 0;
    let operator = '';
    let result = 0;

    function evaluate(num1) {
        return function operation(num2, operation) {
            if(operation === "+"){
                const res = num1 + num2;
                return res;
            }
            else if(operation === "-"){
                const res = num1 - num2;
                return res;
            }
            else if(operation === "*"){
                const res = num1 * num2;
                return res;
            }
            else if(operation === "/"){
                const res = num1 / num2;
                console.log('num1: ' +num1 + typeof num1)
                console.log('num2: ' +num2 + typeof num2)
                console.log('res: ' +res)
                return res;
            }
            else{
                return result;
            }
        }
    }

    $('.number').on('click', function(){
        $('.calculator-screen').val('')

        if(operator){
            console.log('right')
            const $rightOperand = $(this).val();
            rightOperand += ($rightOperand)
            $('.calculator-screen').val(parseFloat(rightOperand))
            return
        }
        console.log('left')
        const $leftOperand = $(this).val();
        leftOperand += ($leftOperand)
        $('.calculator-screen').val(parseFloat(leftOperand))
    })
    
    $('.operator').on('click', function(){
        if(leftOperand && rightOperand){
            const eval = evaluate(parseFloat(leftOperand));
            result = eval(parseFloat(rightOperand), operator);
            $('.calculator-screen').val(parseFloat(result))
            leftOperand = result
            rightOperand = 0
        }
        if($(this).val === "="){
            $('.calculator-screen').val(parseFloat(result))
            leftOperand = result
            rightOperand = 0
        }
        const $operator = $(this).val();
        operator = $operator;
    })

    $('.all-clear').on('click', function(){
        $('.calculator-screen').val('');
        rightOperand = 0;
        leftOperand = 0;
        operator = '';
        result = 0;
        console.log('emptyy')
    })

});