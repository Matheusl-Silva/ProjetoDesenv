const examInputMask = (input) => {
    input.addEventListener('input', function(){
        const regexDecimal = /^\d+[.,]?(\d{1,3})?/;
        const regexDigit = /^\d+$/;
        if(!regexDigit.test(this.value[0])){
            this.value = "";
            return;
        }
        
        const result = regexDecimal.exec(this.value);
        if(result != null && result[0].length < this.value.length){
            this.value = result[0];
        }
    });
}