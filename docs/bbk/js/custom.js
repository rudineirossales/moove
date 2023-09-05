
var controleCampo = 1;

function adicionarCampo(){
   controleCampo++;

   document.getElementById('formulario').insertAdjacentHTML
   ('beforeend','<div class="form-group" id="campo' + controleCampo + '"><fieldset class="form-group border p-3"><label>Descrição:</label> <select  class="form-control col-6" id="nome" name="nome[]" required ><option value="CABO 12"  >CABO 12</option><option value="CABO 36"  >CABO 36</option> <option value="CABO 72"  >CABO 72</option><option value="CABO 144"  >CABO 144</option><option value="CABO 288"  >CABO 288</option><option value="CDOE"  >CDOE</option><option value="CAIXA MEIO 1/8"  >CAIXA MEIO 1/8</option><option value="CAIXA MEIO 1/16"  >CAIXA MEIO 1/16</option><option value="CAIXA FIM 1/8"  >CAIXA MEIO 1/8</option><option value="CAIXA FIM 1/16"  >CAIXA MEIO 1/16</option><option value="CAIXA EMENDA 36"  >CAIXA EMENDA 36</option><option value="CAIXA EMENDA 72"  >CAIXA EMENDA 72</option><option value="CEO">CEO</option><option value="KIT DERIVACAO"  >KIT DERIVAÇÃO</option><option value="CEOS">CEOS</option><option value="PLAQUETA V.TAL"  >PLAQUETA V.TAL</option><option value="ASPIRAL"  >ASPIRAL</option><option value="CAPRE PRETA">CAPRE PRETA</option><option value="CAPRE VERMELHA"  >CAPRE VERMELHA</option><option value="CAPRE AZUL"  >CAPRE AZUL</option><option value="CAPRE LARANJA"  >CAPRE LARANJA</option></option><option value="CORDOALHA"  >CORDOALHA</option></option><option value="FIO ESPINAR"  >FIO ESPINAR</option></option><option value="TAMPA CIRCULAR"  >TAMPA CIRCULAR</option></option><option value="TAMPA RETANGULAR"  >TAMPA RETANGULAR</option></option><option value="BAP"  >BAP</option></option><option value="BANDEJA"  >BANDEJA</option></select><label><br>Quantidade:</label><input class="form-control col-6" type="number" name="email[]" id="email"/></br></fieldset><button class="btn btn-primary" type="button" id="' + controleCampo  +'" onclick="removerCampo(' + controleCampo + ')"> - </button></div></br>');
}







function removerCampo(idCampo){
    document.getElementById('campo' + idCampo).remove();
}