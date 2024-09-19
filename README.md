# projetoDSC

## Sumário

- [Projeto DSC](#ProjetoDSC)
  - [Sumário](#sumário)
    - [Descrição](#descrição)
    - [Sobre](#sobre)
    - [Tecnologias Utilizadas](#tecnologias-utilizadas)
    - [Instalação](#instalação)
    - [Uso](#uso)
  

### Descrição
Esse é um projeto feito na disciplina de desenvolvimento de sistemas cooporativos, do curso Licenciatura em Informática do IFRN, campus Zona Norte.
### Sobre
Consiste me um simples CRUD em duas tabelas de um banco de dados e precisa seguir os seguintes requisitos: 
1 - Está hospedado em algum repositório; <br/>
2 - Está utilizando algum framework; <br/>
3 - Está integrado a algum banco de dados; <br/>
4 - Está realizando pelo menos 2 cruds diferentes de qualquer funcionalidade (exemplo: 1 crud de curso e 1 crud de alunos); <br/>
5 - Possuir um arquivo gerenciando os pacotes instalados (ter pelo menos um pacote dentro dele); <br/>
6 - Possuir componentes de interface: integração de template ou desenvolvido manualmente ou integração com bibliotecas/framework frontend; <br/>
7 - Autenticação;<br/>
8 - Validação de formulário com retorno de mensagem para o usuário;<br/>
9 - Algumas boas práticas de frontend (limitação de digitação de caracteres, campo de formulário já focalizado, campos de números aceitando só números etc);<br/>
10 - Autorização (controle de permissões);<br/>

### Tecnologias Utilizadas

- PHP (Framework Laravel)
- MySQL
- NPM
- Composer
- Bootstrap
- Spatie
- AdminLTE

### Instalação

Passo a passo de como instalar as dependências e rodar a aplicação.


1. Clone o repositório:
    ```bash
    git clone https://github.com/allysonlipe/projeto-dsc.git
    ```

2. Entre na pasta do projeto:
    ```
    cd projeto-dsc
    ```

3. Instale as dependências do PHP/Laravel:
    ```bash
    composer install
    ```

4. Crie um arquivo .env a partir da cópia do arquivo .env.example:
    ```bash
    copy .env.example .env
    ```
5. Gere uma nova chave no seu arquivo .env (APP_KEY):
    ```bash
    php artisan key:generate
    ```

6. Com seu banco de dados iniciado, Rode as migrations para criar as tabelas no banco de dados: 
    ```
    php artisan migrate
    ```
7. Roda as seeders para criar o usuário e as permissões no banco de dados
    ``` 
    php artisan db:seed
    ```


### Uso
1. Execute o projeto com o início do servidor Laravel:
    ```bash
    php artisan serve
    ```


