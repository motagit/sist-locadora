$(document).ready(function(){
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        i18n: {
            months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            weekdays: ["Domingo","Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
            weekdaysShort: ["Dom","Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
            weekdaysAbbrev: ["D","S", "T", "Q", "Q", "S", "S"]
        }
    });
});

$(document).ready(function(){
    $('select').formSelect();
});

$(document).ready(function(){
    $('.modal').modal();
});