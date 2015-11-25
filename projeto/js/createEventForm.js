$(document).ready(function() {
    $("#date").datepicker({
        dateFormat: "yy-mm-dd"
    });
});

$.ajax("database/event_types.php", {
    type: "POST",
    dataType: "json",
    data: "data",
    success: function(data) {
        $("form #type").empty();
        for (var type in data) {
            $("form #type").append("<option>" + data[type] + "</option>");
        }
    }
});

function createEventForm(form) {
    if (form.date.value == '' || form.description.value == '') {
        alert("Please fill all the fields");
        return false;
    }

    var create_btn = document.createElement("input");
    create_btn.name = "create_btn";
    create_btn.type = "hidden";
    form.appendChild(create_btn);

    form.submit();
    return true;
}
