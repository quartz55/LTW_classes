$(document).ready(function() {
    $("#date").datepicker({
        dateFormat: "dd/mm/yy"
    });
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
