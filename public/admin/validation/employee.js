$(document).ready(function () {
    $("#employee_submit").validate({
        rules: {
            employee_id: "required",
            first_name: "required",
            last_name: "required",
            address: "required",
            designation_id: "required",
            department_id: "required",
            join_date: "required",
            country_id: "required",
            state: "required",
            city: "required",
            gender: "required",
            dob: "required",
            martial_status: "required",
            religion: "required",
            cast_ethnic: "required",
            salutation_title: "required",
            mobile: "required",
            district: "required",
            municipality_vdc: "required",
            personal_email: "required",
            salary: "required",
        },
        messages: {
            employee_id: "required",
            first_name: "First Name required",
            last_name: "Last name required",
            address: "Suburb required",
            designation_id: "Designation required",
            department_id: "Department required",
            join_date: "required",
            country_id: "Country required",
            state: "State required",
            city: "City required",
            gender: "Gender required",
            dob: "Date Of Birth required",
            martial_status: "required",
            religion: "Religion required",
            cast_ethnic: "Ethnic required",
            salutation_title: "Salutation required",
            mobile: "Mobile required",
            district: "District required",
            municipality_vdc: "Municipality/Vdc required",
            personal_email: "Personal Email required",
            salary: "Please enter salary",
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

