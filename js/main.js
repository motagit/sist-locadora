$(document).ready(function(){
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });
});

$(document).ready(function(){
    $('select').formSelect();
});

$(document).ready(function(){
    $('.modal').modal({
        inDuration: 1000,
    });
});