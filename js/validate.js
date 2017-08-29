function check_required(value){
    if (value && value != '' && value != undefined){
        return true;
    }
    return false;
}

function check_email(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function check_minlength(string, value){
    if (string.length > value)
        return true;
    return false;
}

function check_maxlength(string, value){
    if (string.length < value)
        return true;
    return false;
}

function check_equalTo(string, id){
    if (string == jQuery(id).val() )
        return true;
    return false;
}

function check_error(field_value, rules){
    error = null;
    $.each(rules, function(rule_key, rule_value){
        if (!error){
            switch(rule_key){
                case 'required':
                    if (rule_value == true && !check_required(field_value)){
                        error = rule_key;
                    }
                    break;
                case 'email':
                    if (rule_value == true && !check_email(field_value)){
                        error = rule_key;
                    }
                    break;
                case 'minlength':
                    if (field_value != '' && !check_minlength(field_value, rule_value)){
                        error = rule_key;
                    }
                    break;
                case 'maxlength':
                    if (field_value != '' && !check_maxlength(field_value, rule_value)){
                        error = rule_key;
                    }
                    break;
                case 'equalTo':
                    if (!check_equalTo(field_value, rule_value)){
                        error = rule_key;
                    }
                default:
                    break;
            }
        }
    });
    return error;
}

function display_error(form, element, message){
    jQuery(form).find('#'+element).parent().find('.input-error').remove();
    jQuery(form).find('#'+element).addClass('invalid');
    jQuery(form).find('#'+element).after('<div class="input-error">'+message+'</div>');
}

function remove_error(form, element){
    jQuery(form).find('#'+element).parent().find('.input-error').remove();
    jQuery(form).find('#'+element).removeClass('invalid');
}

function validate_form(form_name, validation_rules){
    $valid = true;
    $.each(validation_rules['rules'], function(key, value) {
        var error_type = check_error(jQuery(form_name).find('#'+key).val(), value);
        if (error_type){
            $valid = false;
            if (validation_rules['messages'][key] != undefined && validation_rules['messages'][key][error_type] != undefined){
                display_error(form_name, key, validation_rules['messages'][key][error_type]);
            }
            else {
                if (validation_rules['messages']['default'] != undefined && validation_rules['messages']['default'][error_type] != undefined){
                    display_error(form_name, key, validation_rules['messages']['default'][error_type]);
                }
                else {
                    display_error(form_name, key, 'Ce champs est incorrect.');
                }

            }

        }
        else {
            remove_error(form_name, key);
        }
    });
    return $valid;
}
