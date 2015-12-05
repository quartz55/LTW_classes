var types = [];
var form_backup;

$(document).ready(function() {
    $("#date").datepicker({
        dateFormat: "yy-mm-dd"
    });

    queryDatabase("database/event_types.php", function (data) {types = data; addTypes(); form_backup = $(".popup>form").clone();});
});

function listAllEvents() {
    var func = function(events) {
        $("#events_list").empty();
        if (events.length <= 0) {
            $("#events_list").append("There are no events :(");
        } else {
            for (var event in events) {
                listEvent(events[event], $("#events_list"));
            }
        }
    };
    queryDatabase("get_user_events.php", func);
    return true;
}

function listUserEvents(user) {
    var func = function(events) {
        $("#events_list").empty();
        if (events.length <= 0) {
            $("#events_list").append("You haven't created any event");
        } else {
            for (var event in events) {
                listEvent(events[event], $("#events_list"));
            }
        }
    };
    queryDatabase("get_user_events.php?user=" + user, func);
}

function listAttendingEvents(user) {
    var func = function(events) {
        $("#events_list").empty();
        if (events.length <= 0) {
            $("#events_list").append("You aren't registered in any event");
        } else {
            for (var event in events) {
                listEvent(events[event], $("#events_list"));
            }
        }
    };
    queryDatabase("get_user_events.php?user=" + user + "&attending", func);
}

function listEvent(event, element) {
    var html_string = "<li><a href='show_event.php?id=" + event.id + "'>" +
        event.date + " | " + event.type + " | " + event.description + "</a>" +
        " Created by " + event.creator + "</li>";
    element.append(html_string);
}

function addTypes () {
    var type_opt = $(".popup form #type");
    type_opt.empty();
    type_opt.append("<option disabled selected>Select Type</option>");
    for (var type in types) {
        type_opt.append("<option>" + types[type] + "</option>");
    }
}

function showCreateEventPopup() {
    $(".popup").css('display', 'block');
    $(".black_overlay").css('display', 'block');

    $(".popup #image").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".popup #preview").attr('src', e.target.result);
            };

            reader.readAsDataURL(this.files[0]);
        }
    });
}

function cancelCreateEventPopup() {
    hideCreateEventPopup();
    $(".popup>form").replaceWith(form_backup);
}

function hideCreateEventPopup() {
    $(".popup").css('display', 'none');
    $(".black_overlay").css('display', 'none');
}

function confirmCreateEvent() {
    var form = $(".popup form");

    var errors = false;
    form.find("ins").remove(); // Remove warnings

    var image = form.find("#image")[0].files[0];
    if (!image) {
        form.find("#image").after("<ins class='warning'>Event image is required</ins>");
        errors = true;
    }

    if (form.find("#type").prop('value') == 'Select Type') {
        form.find("#type").after("<ins class='warning'>Event type is required</ins>");
        errors = true;
    }

    if (!Date.parse(form.find("#date").prop('value'))) {
        form.find("#date").after("<ins class='warning'>Invalid date</ins>");
        errors = true;
    }

    var re = /^\w+[\s\w+]*\w$/;
    if (!re.test(form.find("#description").prop('value'))) {
        form.find("#description").after("<ins class='warning'>Invalid description</ins>");
        errors = true;
    }

    if (errors) return false;

    var create_btn = document.createElement("input");
    create_btn.name = "create_btn";
    create_btn.type = "hidden";
    form.append("<input type='hidden' name='create_btn'>");

    form.submit();
    return true;
}
