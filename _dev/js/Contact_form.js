Main.Contact_form = {
    init:function(){
        Main.Contact_form.submit_event();
    },
    submit_event:function(){
        $(".quiet_form").submit(function(e){
            e.preventDefault();
            var form_object = $(this).serializeArray(),
                required_fields = "";

            $(this).find("*").each(function(){
                var $this = $(this),
                    this_requirement = $this.attr("data-required"),
                    this_val = $this.val();

                if(this_requirement == "true"){
                    if(this_val == ""){
                        required_fields += "undefined, ";
                    }else{
                        required_fields += $this.val() + ", ";
                    }
                }
            });

            Main.Contact_form.post_event(  form_object , required_fields);

        });
    },
    post_event:function(message_array, required_fields){
        console.log(ajax_object.ajax_url);
        var data = {
            'action': 'send_contact_form_email',
            'the_message': message_array,
            'required_fields': required_fields
        };

        $.post(ajax_object.ajax_url, data,function(response){
            //console.log(response);
            Main.Contact_form.handle_response(response);
        });

    },
    handle_response:function(response){
        response = JSON.parse(response);


        var icon = '<i class="fa fa-bullhorn" aria-hidden="true"></i>',
            title = "Message",
            status = response.status;

        if(status == "incomplete"){
            setTimeout(function(){
                $('[data-required="true"]').each(function(){
                    if($(this).val() == ""){
                        $(this).addClass("error");
                    }
                });
            }, 5050);
            setTimeout(function(){
                $('[data-required="true"]').removeClass("error");
            }, 8050);
        }
        if(response.title.length > 0){
            title = response.title;
        }
        if(response.icon.length > 0){
            icon = response.icon;
        }
        Main.quiet_pop_up(icon, title, response.message, response.exit_button, 5000);
    }
}
