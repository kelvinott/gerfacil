$(document).ready(function(){
    /* #imagem é o id do input, ao alterar o conteudo do input execurará a função baixo */
    $('#imagem').change('change',function(){        
        $('#formulario').ajaxForm({
            target:'#visualizar', // o callback será no elemento com o id #visualizar
            success: function() {
                alert("Callback!");
            }    
        }).submit();
    });
})