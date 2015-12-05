var editMode = false;

var backup;

$(document).ready(function() {
    backup = $("#info>form").clone();
});

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
