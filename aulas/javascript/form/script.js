var products = ['ABCD', 'DEFG'];


function loadDocument() {
    var form = document.getElementById("products");
    var firstLine = firstTagChild(form);
    var select = firstNamedChild(firstLine, "select");

    var addButton = document.querySelectorAll("[type=button]")[0];
    addButton.addEventListener("click", addLine);

    retreiveProducts(select);
}

window.addEventListener("load", loadDocument);

function retreiveProducts(select) {
    var req = new XMLHttpRequest();

    req.onload = function(e) {
        products = req.response;
        loadProducts(select);
    };

    req.open("GET", "products.php");
    req.responseType = "json";
    req.send();
}


function addLine() {
    var products = document.getElementById("products");
    var addButton = products.querySelectorAll("[type=button]")[0];

    var line = products.getElementsByClassName("line")[0];
    var duplicate = line.cloneNode(true);

    products.insertBefore(duplicate, addButton);
}

function loadProducts(select) {
    for (var product in products) {
        var option = document.createElement("option");
        option.value = products[product];
        option.text = products[product];
        select.appendChild(option);
    }
}

function firstNamedChild(element, tagname) {
    var child = element.firstChild;
    while (child.nodeType != 1 && child.tagName != tagname && child != null) {
        child = child.nextSibling;
    }

    return child;
}

function firstTagChild(element) {
    var child = element.firstChild;
    while (child.nodeType != 1 && child != null) {
        child = child.nextSibling;
    }

    return child;
}
