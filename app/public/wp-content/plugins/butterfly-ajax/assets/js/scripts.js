(function($) {
    $(document).on('ready', function() {
        /**
         * Create an ajax request when bwp form will be submitted
         * 
         * @since 1.0.0
         * @var data
         */

        $('.bwp-form').on('submit', function(event) {
            event.preventDefault();
            var data = {
                method: "POST",
                url: bwp_obj.ajax_url,
                data: {
                    action  : 'send_form_data',
                    nonce    : bwp_obj.nonce,
                    user_name: 'John Doe',
                }
            }
            $.ajax(data).done(function(response) {
                alert(response.data.message);
            })
        });
    })
})(jQuery)