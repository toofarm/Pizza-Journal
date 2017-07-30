$("#tasty").click(function () {
    
var mylist = $('#pcHolder');
var listitems = mylist.children("div");
listitems.sort(function(a, b) {
   var compA = $(a).data("score");
   var compB = $(b).data("score");
   return (compA < compB) ? 1 : (compA > compB) ? -1 : 0;
})
$(mylist).append(listitems);
    
$("#date").removeClass("sortActive");
$("#tasty").addClass("sortActive");
    

});

$("#date").click(function () {
    
var mylist = $('#pcHolder');
var listitems = mylist.children("div");
listitems.sort(function(a, b) {
   var compA = $(a).data("date");
   var compB = $(b).data("date");
   return (compA < compB) ? 1 : (compA > compB) ? -1 : 0;
})
$(mylist).append(listitems);
    
$("#tasty").removeClass("sortActive");
$("#date").addClass("sortActive");
    
});
