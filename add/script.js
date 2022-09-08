function calcularIdade() {
    let userInput = document.getElementById('nascimento').value;
    let data = new Date(userInput);
    
        //calcula a diferença de meses da data atual
        let month_diff = Date.now() - data.getTime();
    
        //converte a diferença calculada pra Date
        let age_dt = new Date(month_diff); 
        
        //pega o ano da data   
        let year = age_dt.getUTCFullYear();
        
        //Calcula a idade
        let idade = Math.abs(year - 1970);
    
        return document.getElementById('idade').value = idade;
    
    
}

function formataTelefone(formId) {
    let str = document.getElementById(formId).value.replace(/\D/g, "");

    return document.getElementById(formId).value = str;
}

function formataTexto(formId) {
    let str = document.getElementById(formId).value.replace(/^a-zA-Z/g, "");

    return document.getElementById(formId).value = str;
}

function pegaSubmit(event) {
    event.preventDefault();

    const dados = new FormData(event.target);
    const valor= Object.fromEntries(dados.entries());

    alert(JSON.stringify(valor, null, 2));
}
