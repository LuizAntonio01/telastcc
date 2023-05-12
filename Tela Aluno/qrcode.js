const container = document.querySelector('.container')
qrInput = container.querySelector('.form input')    //capitura da pagina o valor que irá no Qr Code
generateBtn = container.querySelector('.form button')
qrImg = container.querySelector('.qr-code .img') // Retorna a pagina o Qr Code modificado 

genereteBtn.addEventListener('click', () => {
    let qrValue = qrInput.qrValue
    if(!qrValue){
        alert('Please insert qr value')                 // aviso que não há valor 
        return
    }
    generateBtn.innerText = "Gerando um Qr Code..."
    qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=170x170&data=${qrValue}` //Transforma o valor informado em Qr Code
    qrImg.addEventListener('load', () =>{
        generateBtn.innerText = "Gerar QR Code"                // Carrega a imagem e altera o botão o botão novamente para "Gerar QR Code"
        container.classList.add('active')                       // aumenta o espaço para aparecer a imagem
    })
})

qrInput.addEventListener('keyup', () => {
    if(!qrInput.value){
        container.classList.remove('active')            // Diminue o espaço da imagem
    }
})