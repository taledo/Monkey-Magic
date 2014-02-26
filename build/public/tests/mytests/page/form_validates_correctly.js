registerTest ('Form Tests', {
    setup: function() {
        //Storing our test strings in a jSON object
        this.tests =
        [
            { 
                "test": "The form can't be submitted with empty fields, right?",
                "message": "The form cannot be submitted if any of the required fields are empty" },
            { 
                "test": "The form can't be submitted if conditional fields exist",
                "message":  "The form cannot be submitted if the enquiry type is 'Product complaint' and any of the following fields are empty: product name, product size, use-by date or batch code." 
            }
        ]


        this.errorsDiv = "#errors";
        this.formElement = "form";
    },
    load:function() {
        var self = this;

        self

        .waitForPageLoadAfter(function($) {
            //Go
            $(this.formElement).submit();
        })

        .test( this.tests[0].test, function($) {
            equal($(this.errorsDiv).length, 1, this.tests[0].message);
        })

        //Technically the following isn't necessary, as the Laravel validation is very strict and takes care of all the conditionals
        .waitForPageLoadAfter(function($) {
            $( "input[required*='required']" ).val( "1" ); //Will also satisfy some numeric validation
            $( "input#email" ).val( "a@b.c" );
            $( "select#state").val("NSW");
            $("select#subject").val("Complaint");
            //Go
            $(this.formElement).submit();
        })

        .test(this.tests[1].test, function($) {
            equal($(this.errorsDiv).length, 1, this.tests[1].message);
        })

    }
});
