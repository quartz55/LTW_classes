var editMode = false;
var inviteMode = false;

var backup, invitableUsers;
$(document).ready(function() {
    if ($("#privacy").html() == 'Private event') {
        $('#privacy').css('color', 'grey');
    }
    backup = $("#info>form").clone();
    var event = parseInt(getCookie('currEvent'));
    queryDatabase("get_users.php?event="+event, function(users) {
        invitableUsers = users;
        for (var user in users) {
            var html_string = "<input type='checkbox' name='invites[]' value='{0}'> {0}<br>";
            html_string = html_string.format(users[user].username);
            $('#invite_popup').prepend(html_string);
        }
    });
});

function toggleInviteMode() {
    if (inviteMode) {
        $("#invite_popup").css('display', 'none');
    }
    else {
        if (invitableUsers.length > 0)
            $("#invite_popup").css('display', 'block');
        else{
            alert('There are no available users to invite');
            return ;
        }
    }

    inviteMode = !inviteMode;
}

function confirmDelete(url) {
    var conf = window.confirm(
        "Are you sure you want to delete this event?\n" +
            "You cannot undo this operation");
    if (conf) {
        window.location = url;
        return true;
    } else {
        return false;
    }
}

function toggleEditMode() {
    if (editMode) {
        $("#edit_btn>a").html("Edit event");
        $("#confirm_btn").remove();
        $("#info>form").replaceWith(backup);
    } else {
        saveCurrForm();
        $("#edit_btn>a").html("Cancel Edit");
        $("#edit_btn").after("<li id='confirm_btn'><a href='#' onclick='confirmEdit()'>Confirm Edit</a></li>");

        $("#preview").after("<input hidden name='image' id='img_picker' type='file'>");
        $("#preview").wrap("<div class='hover'></div>");
        $(".hover").click(function() {
            $("#img_picker").trigger('click');
        });
        $("#img_picker").change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#preview").attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        var opts = ['Public', 'Private'];
        var privacy = $("#privacy").html().split(" ")[0];
        $("#privacy").html("<select name='privacy'></select> event");
        for (var opt in opts) {
            var html_string = "<option value='"+opts[opt]+"'";
            if (opts[opt] == privacy) html_string += " selected";
            html_string += ">" + opts[opt] + "</option>";
            $("#privacy>select").append(html_string);
        }

        var type = $("#type").html();
        $("#type").html("<select name='type'></select>");
        queryDatabase("database/event_types.php", addTypes);

        var date = $("#date").html();
        $("#date").html("<input type='datetime' name='date' value='" + date + "'>");
        $("#date>input").datepicker({
            dateFormat: "yy-mm-dd"
        });

        var desc = $("#desc").html();
        $("#desc").html("<input type='text' name='desc' value='" + desc + "'>");
    }

    editMode = !editMode;
}

function saveCurrForm() {
    backup = $("#info>form").clone();
}

function confirmEdit() {
    var errors = false;
    $("#info>form ins").remove(); // Remove warnings

    var image = $("#img_picker")[0].files[0];
    if (!image) {
        $("#input[name='image']").after("<ins class='warning'>Event image is required</ins>");
        errors = true;
    }

    if (!Date.parse($("#date>input").prop('value'))) {
        $("#date>input").after("<ins class='warning'>Invalid date</ins>");
        errors = true;
    }

    var re = /^\w+[\s\w+]*\w$/;
    if (!re.test($("#desc>input").prop('value'))) {
        $("#desc>input").after("<ins class='warning'>Invalid description</ins>");
        errors = true;
    }

    if (errors) return false;

    var conf = window.confirm("Are you sure you want to edit this event?");
    if (conf) {
        setRedirect();
        $("#info>form").submit();
        return true;
    }
    return false;
}

function addTypes(types) {
    for (var type in types) {
        var html_str = "<option";
        if (types[type] == backup.find("#type").html())
            html_str += " selected";

        html_str += ">" + types[type] + "</option>";
        $("#type>select").append(html_str);
    }
}

// Misc
String.prototype.format = function() {
    var formatted = this;
    for (var i = 0; i < arguments.length; i++) {
        var regexp = new RegExp('\\{'+i+'\\}', 'gi');
        formatted = formatted.replace(regexp, arguments[i]);
    }
    return formatted;
};
