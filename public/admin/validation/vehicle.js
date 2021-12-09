$(document).ready(function () {
    $("#vehicle_submit").validate({
        rules: {
            brand_id: "required",
            model_id: "required",
            variant_id: "required",
            driver_id: "required",
            manufacture_year: "required",
            manufacture_date: "required",
            vehicle_reg_number: "required",
      


        },
        messages: {
            brand_id: "Enter Brand Name",
            model_id: "Enter Model Name",
            variant_id: "Enter Variant Name",
            driver_id: "Enter Driver Name",
            manufacture_year: "Enter Manufacture Year",
            manufacture_date: "Enter Date",
            vehicle_reg_number: "Enter Vehicle Reg Number",

      
        },
        errorElement: "em",
        errorPlacement: function (error, element) {  console.log(element)
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents(".col-lg-9").addClass("form-group-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element.parent());
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if (!element.parent().parent().next("div")[0]) {
                $("<div class='form-control-feedback'><i class='icon-cross2 text-danger'></i></div>").insertAfter(element);
            }
        },
        success: function (label, element) { console.log(element);
            // Add the span element, if doesn't exists, and apply the icon classes to it.
                if (!$(element).next("div")[0]) { 
                $("<div class='form-control-feedback'><i class='icon-checkmark4 text-success'></i></div>").insertAfter($(element));
            }
        },
        highlight: function (element, errorClass, validClass) {  
            $(element).parent().find('span .input-group-text').addClass("alpha-danger text-danger border-danger ").removeClass("alpha-success text-success border-success");
            $(element).addClass("border-danger").removeClass("border-success");
            $(element).parent().parent().addClass("text-danger").removeClass("text-success");
            $(element).next('div .form-control-feedback').find('i').addClass("icon-cross2 text-danger").removeClass("icon-checkmark4 text-success");
        },
        unhighlight: function (element, errorClass, validClass) { 
            $(element).parent().find('span .input-group-text').addClass("alpha-success text-success border-success").removeClass("alpha-danger text-danger border-danger ");
            $(element).addClass("border-success").removeClass("border-danger");
            $(element).parent().parent().addClass("text-success").removeClass("border-danger");
            $(element).next('div .form-control-feedback').find('i').addClass("icon-checkmark4 text-success").removeClass("icon-cross2 text-danger");
        }
    });
});

