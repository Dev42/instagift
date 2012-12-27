$(document).ready(function(){

    $(".select_box").live("change",function(){
        $(this).parent().find("span").html($(this).find("option:selected").text());
    });
    
    $(".uniform").live("change", function(){
        $(this).parent().find(".filename").html($(this).val());
    });

    $(".lineClone").click(function(){
        
        invLine = $(this).attr("id")+"_inv";
        
        newLine = $("#"+invLine).clone();
        
        numPossibilidades = 90231290523432 - 1
        aleat = Math.random() * numPossibilidades
        aleat = Math.floor(aleat)
        
        newLineId = parseInt(1) + aleat;
        
        newLine.attr("style","");
        newLine.attr("class","");
        newLine.attr("id",newLineId);
        newLine.attr("style", "height: 30px");
        newLine.appendTo("#tbody_"+$(this).attr("id"));
        
        imgEle = newLine.find("img").attr("id","rm_"+newLineId+"_"+$(this).attr("id"));
        
    });
    
    $(".lineRemove").live("click",function(){
        
        slices = $(this).attr("id");
        slices = slices.split("_");
        
        if ($("#tbody_"+slices[2]+"_"+slices[3]+" tr").length > 2){
            $("#"+slices[1]).remove();
        }
        
    });
    
    $(".imageRemove").click(function(){
        if(confirm("Deseja deletar a foto?")) {
            $.ajax({
                type: "POST",
                url: "http://instagift.com.br/painel/modules/produto/action/ajaxProduto.php",
                data: {photoId : $(this).attr("id")},
                success: function(data){
                    alert("Imagem deletada com sucesso!");
                }
            });
            $("#"+$(this).attr("id")).remove();
            //ajax(aux_id, "ajax_cad_pro", "dadosprojeto");
            //dadoprojeto();
        }
    });
    
});