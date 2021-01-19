

jQuery.validator.addMethod("accept1", function (value, element, param) {
    return value.match(new RegExp("." + param + "$"));
}, "Only Numbers . ,");

jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
});

$.validator.addMethod(
    "product_check",
    function (value, element, arg) {
        return arg !== value;
    },
    "Value must not equal arg."
);
$.validator.addMethod(
    "paymt_check",
    function (value, element, arg) {
        return arg !== value;
    },
    "Value must not equal arg."
);

$("#frmVal").validate({
    // Specify the validation rules
    rules: {
        name: {
            required: true,
            maxlength: 25,
            // fullname: true,
            minlength: 3,
            lettersonly: true
        },
        email: {
            required: true,
            maxlength: 250,
            email: true,
        },
        mobile_no: {
            required: true,
            maxlength: 10,
            accept1: '[0-9\-\(\)\s]+'
        },
        country: {
            required: true,
            maxlength: 15,
            lettersonly: true
        },
        state: {
            required: true,
            maxlength: 25,
            lettersonly: true
        },
        city: {
            required: true,
            maxlength: 25,
            lettersonly: true
        },
        product: {
            required: true,
            product_check: 'none'
        },
        quantity: {
            required: true,
            maxlength: 5,
        },
        payment_mode: {
            required: true,
            paymt_check: 'none'
        },


    },
    // Specify the validation error messages
    messages: {
        name: {
            required: "* Please Enter name .",
            maxlength: '* Please enter  max 25 characters.',
            minlength: '* Please enter  min 3 characters.',
            lettersonly: "please enter characters only",
        },
        email: {
            required: "* Please Enter email .",
            maxlength: '* Please enter  max 250 alphanumeric.',
        },
        mobile_no: {
            required: "* Please Enter mobile number .",
            maxlength: '* Please enter  max 10 digit.',
            accept1: '* Please enter valid number.',
        },
        country: {
            required: "* Please Enter country .",
            maxlength: '* Please enter  max 15 characters.',
            lettersonly: "please enter characters only",
        },
        state: {
            required: "* Please Enter state .",
            maxlength: '* Please enter  max 25 characters.',
            lettersonly: "please enter characters only",
        },
        city: {
            required: "* Please Enter city .",
            maxlength: '* Please enter  max 25 characters.',
            lettersonly: "please enter characters only",
        },
        product: {
            required: "* Please select product .",
            product_check: '* Please select product.',

        },
        quantity: {
            required: "* Please Enter quantity .",
            maxlength: '* Please enter  max 5 digit.',
        },
        payment_mode: {
            required: "* Please Select Payment mode .",
            paymt_check: '* Please select Payment mode.',

            // maxlength: '* Please enter  max 5 digit.',
        },
    },
    submitHandler: function (form) { // <- pass 'form' argument in
        // $(".submit").attr("disabled", true);
        form.submit(); // <- use 'form' argument here.
    }
});

