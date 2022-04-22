# **API Mercado Pago PHP sem composer**

&nbsp;
&nbsp;

>[!IMPORTANT]
>
>Você precisa estar usando a **versão 7.4 ou posterior do PHP**.

&nbsp;
&nbsp;

## Recomendação para uso:

Estes scripts são recomendado quando seu projeto não utiliza o composer em seu espoco integral, e precisa utilizar a SDK do MP que necessita do composer.

Se você necessita a integração do MP para gerar e receber pagamentos, e não pode utilizar o composer em seu servidor de produção, estes conjuntos de scripts irão facilitar em sua integração.

&nbsp;
&nbsp;

## Instruções:

Para começar você precisa ter o SDK atulizado, para isso na sua máquina local você terá que escolher um diretório expecífico para instalar o composer e realizar o download do SDK do MP.

&nbsp;

>[!NOTE]
>
>Fique tranquilo, o composer só servirá para realizar o download do SDK mais atual.

&nbsp;

### Etapas para baixar o SDK autilizado:

1. Primeiro crie ou escolha um diretório para amarzenar os arquivos
1. Para fazer download para sua máquina local do composer siga as instruções neste [link](https://getcomposer.org/download/)
1. Instale o composer no diretório que foi escolhido na etapa 1
1. Depois de ter instalado o composer e estar no diretório escolhido instale o SDK do MP pelo composer com este código &grave; composer require "mercadopago/dx-php:2.4.5" &grave;
1. Assim que finalizar a instalação copie o diretório vendor para o local de seu projeto

Pronto, você já está com SDK atualizado em mãos.

&nbsp;
&nbsp;

## Executar pagamentos utilizando modal

&nbsp;

>[!TIP]
>
>Para os scrips de gerar pagamento, utilizo um botão que abre um modal e faço uma requisição AJAX para este arquivo e indexo a resposta dele no corpo do modal.

&nbsp;
&nbsp;

### Exemplo de requisição AJAX para indexar a resposta JSON no modal

&nbsp;

>[!IMPORTANT]
>
>Neste caso que estou ultilizando o modal para renderização e necessário o [Bootstrap](https://getbootstrap.com/) juntamente com o [JQuery](https://jquery.com/download/)

&nbsp;
&nbsp;


### Script JavaScript para disparar a requisição AJAX e indexar a resposta por JSON

*Neste exemplo estou chamando o script de pagamento somente por pix.*

&nbsp;

>[!NOTE]
>
>Para mudar o tipo de pagamento, apenas mude a "url" dentro da função AJAX.

&nbsp;


	$.ajax({
		type:"POST",
		url:"modalPix.php",
        dataType: "json",
		beforeSend: function(){
			 $(".modal-body").html("Carregando...");
		  },
		success: function(data){
			$(".modal-body").html("<iframe src='"+data+"' style='width: 100%; height: 80vh; border:none;'>Navegador não compatível</iframe>");
		} 
	})


&nbsp;
&nbsp;

## Índice dos scripts para gerar pagamentos

&nbsp;

| Função | Localização |
|--- |--- |
| Somente PIX | /pagamentos/modalPix.php |
| Somente Cartão | /pagamentos/modalCartao.php |
| Somente Boleto | /pagamentos/modalBoleto.php |
| Todos Pagamentos | /pagamentos/modalTodos.php |

&nbsp;

>[!IMPORTANT]
>
>Lembre-se de sempre de revisar está url de retorno para sua IPN se está correta  $preference->notification_url = *URL do seu arquivo IPN*';

&nbsp;
&nbsp;

## Índice do script para receber pagamentos (IPN)

&nbsp;

| Função | Localização |
|--- |--- |
| IPN | /receber_pagamentos/ipn.php |

&nbsp;

>[!IMPORTANT]
>
>Você tem que apontar a url deste arquivo para receber as notificações IPN, apenas entre no [Painel de notificação IPN](https://www.mercadopago.com.br/developers/panel/notifications/ipn)


&nbsp;
&nbsp;

*Espero que te ajude em seus projetos. Boa sorte!*

&nbsp;
&nbsp;

**Feito por Gabriel Felix**






