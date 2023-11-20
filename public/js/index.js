
// Função para deixar links selecionados

const activePage = window.location.pathname;
const LinkEls = document.querySelectorAll('.link').
    forEach(LinkEL => {
        if (LinkEL.href.includes(`${activePage}`)) {
            LinkEL.classList.add('active');
        }
    });


// Função para alternar menu

const submenu = document.getElementById('sub-menu');
const conteudo = document.querySelector('.conteudo');
const button = document.querySelector('.button-menu');

function alternarMenu() {
    submenu.classList.toggle("open");
    conteudo.classList.toggle("space");
    button.classList.toggle("close");
}
button.addEventListener('click', () => {

    alternarMenu();

});


// Função para ocultar e exibir senha

const password = document.querySelector(".password");
const icon = document.querySelector(".icon-image");

function showhide(){
    if (password.type === "password"){
        password.setAttribute("type", "text");
        icon.setAttribute("src", "/images/layout/hide.png")
    }
    else{
        password.setAttribute("type", "password");
        icon.setAttribute("src", "/images/layout/show.png")
    }
}



// Função para selecionar estados e cidades

$(document).ready(function () {
    
    $.getJSON('/js/JSON_estados_cidades.json', function (data) {
        var estados = data;
        var options = '<option value="">Selecione um estado</option>';
        
        $.each(estados, function (key, val) {
            options += '<option value="' + val.nome + '">' + val.nome + '</option>';
        });

        $("#estados").html(options);

        // Ao selecionar um estado, carregar as cidades correspondentes
        $("#estados").change(function () {
            var selectedState = $(this).val();
            var selectedStateObj = estados.find(state => state.nome === selectedState);

            if (selectedStateObj) {
                var cities = selectedStateObj.cidades;
                var citiesOptions = '<option value="">Selecione uma cidade</option>';

                $.each(cities, function (key, val) {
                    citiesOptions += '<option value="' + val + '">' + val + '</option>';
                });

                $("#cidades").html(citiesOptions);
            } else {
                $("#cidades").html('<option value="">Selecione um estado primeiro</option>');
            }
        }).change();
    });
});


// $(document).ready(function () {
		
//     $.getJSON('https://gist.githubusercontent.com/ografael/2037135/raw/5d31e7baaddd0d599b64c3ec04827fc244333447/estados_cidades.json', function (data) {
//         var items = [];
//         var options = '<option value="">Selecione um estado</option>';	
//         $.each(data, function (key, val) {
//             options += '<option value="' + val.nome + '">' + val.nome + '</option>';
//         });					
//         $("#estados").html(options);

//         $("#estados").change(function () {				
        
//             var options_cidades = '';
//             var str = "";					
            
//             $("#estados option:selected").each(function () {
//                 str += $(this).text();
//             });
            
//             $.each(data, function (key, val) {
//                 if(val.nome == str) {							
//                     $.each(val.cidades, function (key_city, val_city) {
//                         options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
//                     });							
//                 }
//             });
//             $("#cidades").html(options_cidades);
            
//         }).change();

//     });

// });




















