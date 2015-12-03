function queryDatabase(url, successHandler, errorHandler) {
    successHandler = successHandler || function() {};
    errorHandler = errorHandler || function() {};

    console.log("query: " + url);
    $.ajax(url, {
        type: "POST",
        dataType: "json",
        data: "data",
        success: function(data) {
            successHandler(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('jqXHR:');
            console.log(jqXHR);
            console.log('textStatus:');
            console.log(textStatus);
            console.log('errorThrown:');
            console.log(errorThrown);
            errorHandler();
        }
    });
}
