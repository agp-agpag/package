<p align="center"><a href="https://www.agapesolucoes.com.br/" target="_blank"><img src="https://www.agpag.com.br/media/AGPAG/logos/svg/default-blue-md.svg" width="400"></a></p>

<br>

<p align="center">
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

<br>

# AGPAG SDK for PHP

Essa biblioteca fornece aos desenvolvedores um conjunto simples de ligações para ajudá-lo a integrar a API do AGPAG a um site e começar a receber pagamentos.

## ⚠️ Dependências

PHP 7.2 ou superior

## 🛠 Instalação

Primeira vez usando o Mercado Pago? Crie sua conta no Mercado Pago, caso ainda não tenha uma.

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) if not already installed
2. No diretório do seu projeto execute na linha de comando `composer require "agp/agpag"`.
3. Solicite o client_secret e substitua SEU_CLIENT_SECRET por ele.

Pronto! O pacote foi instalado com sucesso.

## 🚀 Getting Started

### Criando uma transação

```php
<?php
        
        // Configuração da loja em modo sandbox
        new Agp\Agpag\Store("SEU_CLIENT_SECRET", Agp\Agpag\Environment::sandbox());

        // Configuração da loja em modo produção
        //new Agp\Agpag\Store("SEU_CLIENT_SECRET", Agp\Agpag\Environment::production());

        $transacao = new Agp\Agpag\Transacao();
        $transacao->descricao = "teste";
        $transacao->parcela = "1";
        $transacao->valor = 10.00;

        $pessoa = new Agp\Agpag\Pessoa();
        $pessoa->id = 3;

        $perfilPagamento = new Agp\Agpag\PerfilPagamento();
        
        // Tipo do pagamento "cartao", "pix" ou "boleto"
        $perfilPagamento->tipo = "cartao";
        $perfilPagamento->numero = "5448280000000007";
        $perfilPagamento->titular = "Mastercard";
        $perfilPagamento->validade = "02/28";
        $perfilPagamento->cvv = "123";
        $perfilPagamento->binary_mode = true; //Indica que deve obter a resposta de aprovação na hora. Se false, fica em análise. Default true.
        
        //ou 
        
        $perfilPagamento->tipo = "pix";
        $perfilPagamento->doc = "000.000.000-00"; //CPF ou CNPJ do titular. Obrigatorio se pessoa nao possui documento cadastrado
        $perfilPagamento->vencimento = "2020-12-01"; //Indica o vencimento do qrcode. Opcional, se nao informado vencimento é pra d+2

        // ou 
        
        $perfilPagamento->tipo = "boleto";
        $perfilPagamento->doc = "000.000.000-00"; //CPF ou CNPJ do titular. Obrigatorio se pessoa nao possui documento cadastrado
        $perfilPagamento->vencimento = "2020-12-01"; //Indica o vencimento do qrcode. Opcional, se nao informado vencimento é pra d+2

        $transacao->pessoa = $pessoa;
        $transacao->profile = $perfilPagamento;

        $res = $transacao->create();
```

### Consultando uma transação pelo ID

```php
<?php
        
        // Configuração da loja em modo sandbox
        new Agp\Agpag\Store("SEU_CLIENT_SECRET", Agp\Agpag\Environment::sandbox());

        // Configuração da loja em modo produção
        //new Agp\Agpag\Store("SEU_CLIENT_SECRET", Agp\Agpag\Environment::production());

        $res = (new Agp\Agpag\Transacao())->get("123");
```

### Cancelando uma transação

```php
<?php
        
        // Configuração da loja em modo sandbox
        new Agp\Agpag\Store("SEU_CLIENT_SECRET", Agp\Agpag\Environment::sandbox());

        // Configuração da loja em modo produção
        //new Agp\Agpag\Store("SEU_CLIENT_SECRET", Agp\Agpag\Environment::production());

        $refund = new Agp\Agpag\Refund();
        $refund->id = "123";
        $refund->metodo = "CREDIT_CARD";
        $refund->data = "0-0";

        $res = $refund->save();
```

## 💙 Support

Se você precisar de suporte técnico, entre em contato com nossa equipe de suporte em [agpag.com.br](https://agpag.com.br/).

## ℹ️ License

```
MIT license. Copyright (c) 2022 - AGP / AGPAG
```
