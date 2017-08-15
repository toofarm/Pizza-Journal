$('#pcFormSubmit').on("click", function () {
    var idDate = Date.now();

    var newid = $('#pcForm input[name=pizzaName]').val().replace(/\s/g, '') + idDate;
    
    var score = $('#pcForm input[name=pizzaScore]');
    
    var nc = $("<div>", {id: newid, class: "pizzaCard", data-score: score, data-date: idDate});

    alert(iDate + " " + newid + " " + score + " ");
    
    $('#pcHolder').append(nc);
});

