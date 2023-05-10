function num1(num1) {
    return function operation(num2, operation) {
        if(operation === "+"){
        result = num1 + num2;
        num1 = result;
        return result;
        }
        else if(operation === "-"){
            result = num1 - num2;
            num1 = result;
            return result;
        }
        else if(operation === "*"){
            result = num1 * num2;
            num1 = result;
            return result;
        }
        else if(operation === "/"){
            result = num1 / num2;
            num1 = result;
            return result;
        }
    }
}

const a = num1(1);
console.log(a(2,"+"))
console.log(a(2,"-"))
console.log(a(2,"+"))


$.ajax({
    type: "method",
    url: "url",
    data: "data",
    dataType: "dataType",
    success: function (response) {
        
    }
});

$(selector).html();

$(selector).on(events, function () {
    
});