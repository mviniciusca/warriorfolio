# <p align="center"> Warriorfolio 2 - work in progress  </p>

<p align="center">
  <img src="https://raw.githubusercontent.com/mviniciusca/warriorfolio/v2-dev-master/public/img/gif/app.gif"  alt="Warriorfolio 2">
</p>

Este projeto ainda está em desenvolvimento e pode sofrer alterações a qualquer momento.

Esta documentação ainda está em desenvolvimento e pode sofrer alterações a qualquer momento. 
Pode conter erros de português, gramática e formatação. 

Ainda não passou por revisão.

### Fast Documentation
- [ Warriorfolio 2 - work in progress  ](#-warriorfolio-2---work-in-progress--)
    - [Fast Documentation](#fast-documentation)
    - [Apresentando Warriorfolio 2](#apresentando-warriorfolio-2)
    - [Features](#features)
    - [Engrenagem \& Core](#engrenagem--core)
    - [Requisitos](#requisitos)
    - [Instalação e Configuração](#instalação-e-configuração)
    - [Hora de voar](#hora-de-voar)
    - [O Pós-Build: Conhecendo melhor o Warriorfolio 2](#o-pós-build-conhecendo-melhor-o-warriorfolio-2)
      - [Mudando a cor padrão do tema](#mudando-a-cor-padrão-do-tema)
      - [Editando os textos públicos do seu app](#editando-os-textos-públicos-do-seu-app)
      - [Editando o hightlight do seu app](#editando-o-hightlight-do-seu-app)
      - [Criando Slideshow de Imagens](#criando-slideshow-de-imagens)
      - [Módulo de Newsletter ou E-mail Catacher](#módulo-de-newsletter-ou-e-mail-catacher)
      - [Editando as informações do seu SEO](#editando-as-informações-do-seu-seo)
      - [Organizando a Ordem dos Módulos](#organizando-a-ordem-dos-módulos)
    - [Warriorfolio 2 em Produção](#warriorfolio-2-em-produção)
      - [Erro 403 Forbidden](#erro-403-forbidden)
    - [Quick: Wiki, Tips \& FAQ](#quick-wiki-tips--faq)
    - [Contribuições, Feedbacks e Bugs Report](#contribuições-feedbacks-e-bugs-report)
    - [Supote](#supote)
    - [Agradecimentos](#agradecimentos)
    - [Licença](#licença)
  

### Apresentando Warriorfolio 2
Warriorfolio tem a proposta de ser simples, rápído e eficaz na criação de Landing Page para o seu portfolio. Chega em sua nova versão mais robusto, mais inteligente, flexível e com novos recursos intuitivos. Pensado no conceito modular, você pode escolher com extrema facilidade a ordem que a sua página será montada e exibida ao público.

Projetado para ser 100% administrado pelo Painel de Controle, sem a necessidade de conhecimentos técnicos profundos em programação, PHP e nem mesmo em Laravel.

Sinta-se livre para contribuir com o projeto e fazer o seu fork, mas não esqueça de dar os créditos aos criadores do Laravel, Filament e Livewire.

E a mim, claro! 😁 

### Features 
- Painel de Controle Robusto e Flexível;
- Módulos Flexíveis, Customizáveis e Ordenáveis;
- Galeria de Imagens do Portfolio;
- Slideshow de Imagens;
- Showcase de Clientes;
- Display de Habilidades;
- E-mail catcher para captura de leads;
- Integração com o Google Analytics;
- Curriculo em PDF para download;
- Ícone de Open to Work;
- Biografia, Certificados e Cursos;
- Contato via WhatsApp;
- Formulário de contato;
- Painel de Leitura de Mensagens Recebidas;

e mais...

### Engrenagem & Core
Este é um aplicativo em PHP e que tem o Laravel e o Filament no seu Core. O Filament é um conjunto de ferramentas que permite a criação de panel de cotrole ou gerenciador de conteúdos para o Laravel. Idealizado por Dan Harrin, Zep Fietje e por toda comunidade PHP. O Filament está em constante evolução e é um produto altamente testado, seguro, robusto, escalável e com uma documentação completa e de fácil entendimento. 

O Filament é movido com a tecnologia Livewire, que é um framework para o Laravel que permite a criação de aplicações em tempo real, sem a necessidade de conhecimentos profundos em JavaScript. O Livewire é um produto de Caleb Porzio, criador do AlpineJs. 

Warriorfolio 2 está também sob a guarda de um dos maiores frameworks do mundo, o Laravel. Criado por Taylor Otwell, o Laravel é um framework robusto, seguro, escalável e com uma documentação completa e de fácil entendimento. O Laravel é um framework que está em constante evolução e é um produto altamente testado e com uma comunidade ativa e engajada.

### Requisitos 
- PHP 8.0 ou superior;
- Banco de dados como MySQL, PostgreSQL ou SQLite;
- Composer 2.0 ou superior;
- NPM;
- 500MB de espaço em disco ou superior;

### Instalação e Configuração
Para instalar este aplicativo, seguimos a instalação padrão do Laravel. Caso você já saiba utilizar o Laravel, pode pular esta parte e comece a ler no item 11 deste documento.

Se você não tem familiaridade com o Laravel ou quer conferir como o Warriorfolio 2 funciona, siga os passos abaixo:

- **Clone este repositório:**
```
git clone git@github.com:mviniciusca/warriorfolio.git
```

- **No terminal, rode o comando abaixo para instalar as dependências do Core do projeto:**
```
composer install
```
- **Agora instale as dependências do NPM:**
```
npm install
```
- **Copie o arquivo `.env.example` e renomeie para `.env` e rode o comando abaixo para gerar a chave do seu app:**
```
php artisan key:generate
```
- **Depois dê o sync entre os arquivos públicos de armazenamento:**
```
php artisan storage:link
```

- **No arquivo `.ENV`, configure o banco de dados e a URL do seu app:**
    > *Se você não tem familiaridade com o Laravel, siga os passos abaixo:*
    > *Abra o arquivo `.env` e procure pelas linhas abaixo:*
    > *DB_CONNECTION=mysql*
    > *DB_HOST=

    > *Se for usar o SQLite, não esqueça de criar o arquivo `database.sqlite`na raíz da pasta database*

- No **`APP_URL`**, coloque o endereço do seu site, exemplo: http://localhost:8080 ou https://meusite.com       
    > *Este app precisa da URL completa para funcionar corretamente em ambiente de desenvolvimento e produção. Em local, não esqueça de colocar a porta ou até mesmo utilizar seu IP 127.0.0.1:8080*    

- **Rode o comando abaixo para criar as tabelas e popular o banco de dados:**
*Neste comando, todo sistema será montado, e seu app estará quase pronto para uso!*

```
php artisan migrate:fresh --seed
```
🤞 
- **Se tudo ocorreu bem, rode o comando abaixo para iniciar o servidor e o compilador de assets do Laravel:**
```
php artisan serve && npm run dev
```
### Hora de voar
Acesse o endereço (geralmente http://127.0.0.1:8080) e veja o seu app rodando (é lindão né?)!

Agora é só acessar o painel de controle e começar a criar o seu portfolio. Para acessar o painel de controle, acesse a URL do seu app e adicione `/admin` no final e entre com as credenciais abaixo:

```
Usuário: warriorfolio@test.dev
Senha: password
```
É altamente recomandável que você mude esta senha e o e-mail, para que você possa ter mais segurança principalmente em ambiente de produção. 

### O Pós-Build: Conhecendo melhor o Warriorfolio 2

Legal, você está com seu aplicativo rodando e já está logado no painel de controle. Agora é hora de conhecer melhor o Warriorfolio 2 e começar a criar o seu portfolio. Talvez você queira fazer algumas customizações avançadas, ou até mesmo mudar a cor padrão do tema. Vamos lá?

#### Mudando a cor padrão do tema
Warriorfolio 2 é criado com Tailwind CSS através do Vite. 

Na raiz do projeto, você vai encontrar um arquivo chamado `tailwind.config.js`. Neste arquivo, você pode editar a cor padrão do tema. Procure por esta linha de código:

```
  theme: {
      extend: {
          colors: {
              primary: colors.purple,
              secondary: colors.zinc,
              tertiary: colors.rose,
        }
    },
```

Entenda que, uma vez modificada, essas alterações são globais. As cores padrões do tema são: `primary`, `secondary` e `tertiary` e representadas pelas cores `purple`, `zinc` e `rose`.

Você pode editar as cores do tema, ou até mesmo adicionar novas cores, mas obedecenbdo o padrão do Tailwind. Para saber mais sobre o Tailwind CSS, acesse a documentação oficial em: https://tailwindcss.com/docs

#### Editando os textos públicos do seu app
Diferente da versão anterior, o Warriorfolio 2 permite que você edite os textos públicos do seu app através do Painel de Controle. Eles são representados por módulos e você pode editá-los a qualquer momento. Os módulos e os textos para edição estão em **App Sections**.

#### Editando o hightlight do seu app
Temos um lindíssimo highlight no Warriorfolio 2. Ele é o destaque do texto de cada seção e pode ser utilizado em demais áreas do app. Ele obedece em partes as cores primárias do tema.

Para editar o highlight para algo mais customzado você deve fazer o seguinte passo:

Na pasta `resources/css`, você vai encontrar um arquivo chamado `app.css`. Neste arquivo, você pode editar o highlight para algo mais customizado. 

Procure pelo código:
```
/** Highlighted text **/

.text-highlight {
    @apply text-transparent 
    bg-clip-text bg-gradient-to-r 
    to-primary-600 from-rose-400 
    font-bold;
}
```

#### Criando Slideshow de Imagens
É muito simples, basta clicar em **Slideshow** no painel de controle e adicionar as imagens que desejar. E escolher em qual módulo deseja exibir o slideshow.

Por se tratar de uma Landing Page, só será exibido um slideshow por módulo e o mais recente criado.

#### Módulo de Newsletter ou E-mail Catacher
Você pode ativar ou desativar o módulo de captura de e-mails. Está denominado como newsltter, mas por enquanto, a sua funcionalidade é apenas de captura de e-mails. Você pode exportar os e-mails capturados em formato CSV e usar em sua campanha de e-mail marketing.

#### Editando as informações do seu SEO
Para editar as informações do seu SEO, acesse o painel de controle e clique em **SEO**. Você verá o seu SEO. Clique em **Editar** e edite as informações que desejar.

#### Organizando a Ordem dos Módulos
Warriorfolio 2 é modular e esse conceito se aplica também na edição do conteúdo. Como padrão, ele obedece uma ordem de exibição, mas você pode mudar a ordem dos módulos a qualquer momento. Para isso, clique em `Pages/Home` e escolha a ordem dos módulos. 
Por padrão, é composto desta seguinte maneira:

```
1 - Header
2 - Hero Section
3 - Projects
4 - Courses
5 - Customers
6 - Footer
```

### Warriorfolio 2 em Produção

>⚠️
>Crie uma senha forte para o seu app.
>Ao colocar o app para rodar em produção, é altamente recomendável que você mude a senha do painel de controle e o e-mail de acesso. 

#### Erro 403 Forbidden
Se você implantou seu painel de administração Filament em um ambiente não local e está recebendo erros 403 Forbidden ao tentar acessá-lo, é provável que você tenha esquecido de configurar seu modelo de usuário para acessar o Filament.

**Você deve implementar o contrato FilamentUser:**

```
<?php
 
namespace App\Models;
 
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class User extends Authenticatable implements FilamentUser
{
    // ...
 
    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
    }
}
```

The canAccessPanel() method returns true or false depending on whether the user is allowed to access the $panel. In this example, we check if the user's email ends with @yourdomain.com and if they have verified their email address.

> Você pode achar esta informação na Documentação do Filament em: https://filamentphp.com/docs/3.x/panels/users#authorizing-access-to-the-panel


### Quick: Wiki, Tips & FAQ
Nesta seção, você vai encontrar algumas dicas, perguntas e respostas rápidas sobre o Warriorfolio 2.

- **Evite criar usuários. Warriorfolio 2 não é criado para multi-usuários.**
  > *Warriorfolio 2 é um app criado para ser simples e rápido. Não é um app para multi-usuários. Se você precisa de um app para multi-usuários, use o WordPress. Ainda não há planos para adicão de multi-usuários. Em alguns casos, o arquivo ou a informação obtida será gerada a partir do primeiro ou do último usuário padrão do sistema. Você poode acabar quebrando ou tendo que fazer o reboot da aplicação*
 - **Não altere o nome das pastas e nem dos arquivos.**
   > *A menos que você saiba exatamente o que está fazendo, não é indicado a alteração do nome das pastas dos arquivos. Warriorfolio 2 é um sistema fechado e seguindo o padrão do Larvel.*
- **Por que o limite de 12 projetos no Warriorfolio 2 ?** 
  > *Por se tratar de uma Landing Page, acredito que até 12 ítens de exibição são suficientes para deixar o carregamento rápido e dinâmico. Lembrando que você pode cadastrar quantos projetos quiser e até mesmo mudar esta configuração de exibição.*
- **Preciso pagar para usar o Warriorfolio 2 ?**
    > *Não. Warriorfolio 2 é um app Open Source e está sob a licença MIT. Você pode usar, modificar e até mesmo vender o seu app. Mas não esqueça de dar os créditos se possível aos criadores do Laravel, Filament e Livewire. E a mim né :) <3 
- **Posso usar o Warriorfolio 2 para fins comerciais ?**
    > *Sim. Você pode usar o Warriorfolio 2 para fins comerciais. Lembrando que ele é um app Open Source e está sob a licença MIT. Você pode usar, modificar e até mesmo vender o seu app. Mas não esqueça de dar os créditos se possível aos criadores do Laravel, Filament e Livewire. E a mim né :) <3
- **Posso usar o Warriorfolio 2 para fins pessoais ?**
    > *Sim. Você pode usar o Warriorfolio 2 para fins pessoais. Foi pra isso que ele foi criado. Para que você possa ter um portfolio simples, rápido e eficaz.*
- **Onde encontro a Documentação do Filament ?**
  > https://filamentphp.com/docs aqui você encontra a documentação completa do Filament. 
- **Onde encontro a Documentação do Livewire ?**
  > https://laravel-livewire.com/docs aqui você encontra a documentação completa do Livewire. 
- **Onde encontro a Documentação do Laravel ?**
  > https://laravel.com/docs aqui você encontra a documentação completa do Laravel.

### Contribuições, Feedbacks e Bugs Report
Se você encontrou algum bug, ou quer contribuir com o projeto, ou até mesmo dar um feedback, fique a vontade para abrir uma issue ou um pull request.

Sinta-se livre para contribuir, fazer seu fork e deixar o seu feedback.

### Supote
Sinta-se livre para abrir uma issue ou um pull request. Seu feedback é muito importante para mim.

### Agradecimentos
- Aos usuários do Warriorfolio 1;
- Aos feedbacks e contribuições dos usuários do Warriorfolio 1;
- Taylor Otwell, criador do Laravel;
- Dan Harrin, Zep Fietje e toda comunidade PHP, criadores do Filament;
- Caleb Porzio, criador do Livewire;]
- A toda comunidade PHP e Laravel;

### Licença
Warriorfolio 2 é um aplicativo Open Source e está sob a licença MIT.
