$('#pcFormSubmit').on("click", function () {
    var idDate = Date.now();

    var newid = $('#pcForm input[name=pizzaName]').val().replace(/\s/g, '') + idDate;

    alert("<div class='pizzaCard' id='" + newid + "'></div>");
    
    $('#pcHolder').append("<div class='pizzaCard' id='" + newid + "'></div>");
});

