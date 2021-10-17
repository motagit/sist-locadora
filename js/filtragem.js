function filtrarNomeLocacao() {
    var input, filter, ul, div, li, a, i, txtValue;
    input = document.getElementById("inputFiltroControle");
    filter = input.value.toUpperCase();
    ul = document.getElementsByClassName("ul_locacao");
    var array = [];
    for (x = 0; x < ul.length; x++) {
        var y = ul[x];
        var z = y.getElementsByClassName("retirada");
        for (m = 0; m < z.length; m++) {
            var div_li = z[m];
            array.push(div_li)
        }
    }
    
    for (i = 0; i < array.length; i++) {
        p = array[i].getElementsByTagName("p")[0];
        txtValue = p.textContent || p.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            array[i].style.display = "";
        } else {
            array[i].style.display = "none";
        }
    }
}

function filtrarNome() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("inputFiltro");
    filter = input.value.toUpperCase();
    ul = document.getElementById("ul_clientes_titulos");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        p = li[i].getElementsByTagName("p")[1];
        txtValue = p.textContent || p.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}