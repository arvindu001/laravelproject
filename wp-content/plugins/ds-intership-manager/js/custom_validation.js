jQuery(document).ready(function() {
    jQuery("#add-information").validate({
        rules: {
            start_date: {required: true},
            start_time: {required: true},
            end_date: {required: true},
            end_time: {required: true},
            newsURL: {required: true},
            newsContent: {required: true}
        },
        messages: {
            start_date: "",
            start_time: "",
            end_date: "",
            end_time: "",
            newsURL: "",
            newsContent: ""
        }
    });
});
