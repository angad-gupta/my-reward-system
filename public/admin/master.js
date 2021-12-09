$('document').ready(function() {

    $('.numeric').keyup(function() {
        if (this.value.match(/[^0-9.]/g)) {
            this.value = this.value.replace(/[^0-9.]/g, '');
        }
    });

    $('.numeric-dash').keyup(function() {
        if (this.value.match(/[^0-9.-]/g)) {
            this.value = this.value.replace(/[^0-9.-]/g, '');
        }
    });

    // $.validator.addMethod("greaterThan",function(value, element, params) {

    //         if (!/Invalid|NaN/.test(new Date(value))) {
    //             return new Date(value) > new Date($(params).val());
    //         }

    //         return isNaN(value) && isNaN($(params).val()) 
    //         || (Number(value) > Number($(params).val())); 
    //     },'This Date Must be Higher.');
    
});