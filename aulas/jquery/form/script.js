var products = ['ABCD', 'DEFG'];

$(document).ready(function() {
    // window.alert("Hello world!");

    var form = $("form");
    // window.alert(form_html.html());

    var form_firstchild = $("form:first-child .line");
    // window.alert(form_firstchild.html());

    var form_firstselect = $("form:first-child .line select");
    // window.alert(form_firstselect.html());

    loadProducts(form_firstselect);
    updateSpan();
});

function loadProducts(select) {
    select.empty();
    for (var product in products) {
        select.append("<option>" + products[product] + "</option>");
    }
}

function deleteLine(line) {
    console.log("removed");
    line.remove();
}

function updateSpan() {
    var total = 0;
    $("form .line input[type='number']").each(function() {
        total += $(this).val();
    });
    $("#total").html(total);
    console.log(total);
}

$("form input[value='Delete']").click(function() {
    deleteLine($(event.target).parent());
});

$("form .line input[type='text']").change(function() {updateSpan();});

$("form input[value='Add'][type='button']").click(function() {
    console.log("Added");
    var copy = $("form:first-child .line:first-child").clone();
    $("form:first-child > input").before(copy);
    copy.find("> input[value='Delete']").click(function() {deleteLine(copy); });
});

$.ajax("products.php", {
    type: "POST",
    dataType: "json",
    data: "data",
    success: function(data) {
        products = data;
        loadProducts($("form:first-child .line select"));
    }
});
