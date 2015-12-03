var types = [];

$(document).ready(function() {
    $("#date").datepicker({
        dateFormat: "yy-mm-dd"
    });

    queryDatabase("database/event_types.php", function (data) {types = data; addTypes();});
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
    // console.log(event);
    var html_string = "<li><a href='show_event.php?id=" + event['id'] + "'>" +
        event['date'] + " | " + event['type'] + " | " + event['description'] + "</a>" +
        " Created by " + event['creator'] + "</li>";
    // console.log(html_string);
    element.append(html_string);
}

function addTypes () {
    $(".popup form #type").empty();
    for (var type in types) {
        $(".popup form #type").append("<option>" + types[type] + "</option>");
    }
}

// createUserEvent('quartz');

function showCreateEventPopup() {
    $(".popup").css('display', 'block');
    $(".black_overlay").css('display', 'block');
}

function hideCreateEventPopup() {
    $(".popup").css('display', 'none');
    $(".black_overlay").css('display', 'none');
}

function confirmCreateEvent() {
    var form = $(".popup>form");

    var errors = false;
    form.find("ins").remove(); // Remove warnings

    var re = /^\w+[\s\w+]*\w$/;
    if (!re.test(form.find("input[name='description']").prop('value'))) {
        form.find("input[name='description']").after("<ins class='warning'>Invalid description</ins>");
        errors = true;
    }

    if (!Date.parse(form.find("input[name='date']").prop('value'))) {
        form.find("input[name='date']").after("<ins class='warning'>Invalid date</ins>");
        errors = true;
    }

    if (errors) return false;

    var create_btn = document.createElement("input");
    create_btn.name = "create_btn";
    create_btn.type = "hidden";
    form.append("<input type='hidden' name='create_btn'>");

    form.submit();
}
