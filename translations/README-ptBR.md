# TRIP COMPANY

> Status: Concluído ✔️

_Ler isso em outros idiomas:_  
[_English_](../README.md)

## Sobre o projeto

Este projeto faz parte de uma atividade proposta pela disciplina de Fundamentos de Programação Web. O sistema, chamado Trip Company, é uma plataforma web projetada para gerenciar e organizar planos de viagem, permitindo que os usuários criem viagens, adicionem destinos para visitar e convidem participantes.

A plataforma inclui uma interface do lado cliente desenvolvida com HTML, CSS e JavaScript, e um backend do lado servidor construído com PHP. Os dados são armazenados e gerenciados utilizando um banco de dados MySQL.

### Funcionalidades

- **Registro e Login de Usuário**: Sistema seguro de autenticação de usuários para acessar funcionalidades relacionadas às viagens.

- **Criação de Viagens**: Os usuários podem criar viagens com título, descrição e datas planejadas.

- **Adição de Destinos**: Os usuários podem listar os lugares para visitar em cada viagem.

- **Adição de Participantes**: Os usuários podem adicionar participantes à sua viagem.

- **Funcionalidades CRUD**: Suporte completo para criar, ler, atualizar e excluir viagens, destinos e participantes.

## Tecnologias Usadas e Dependências

<table>
  <tr>
    <td>Php</td>
    <td>Javascript</td>
  </tr>
  <tr>
    <td>^8.1</td>
    <td>^ES6+</td>
  </tr>
</table>

## Como Usar

Siga esses passos para configurar e rodar o projeto **Trip Company**:  

### Pré-requisitos  

- Instale o **XAMPP** (certifique-se de que inclui a versão do PHP 8.1 e MySQL).  
- Um navegador moderno (por exemplo, Chrome, Firefox).  
- Git instalado na sua máquina.  

## Passo a Passo  

1. **Clone o Repositório**  
   - Abra um terminal ou prompt de comando.  
   - Navegue até o diretório onde deseja armazenar o projeto.  
   - Execute o seguinte comando para clonar o repositório:  

     ```bash
     git clone https://github.com/eriksgda/WEB-trip-company.git
     ```  

2. **Configure o XAMPP**  
   - Abra o XAMPP e inicie os serviços **Apache** e **MySQL**.  

3. **Configure o Banco de Dados**  
   - Acesse o painel phpMyAdmin navegando até `http://localhost/phpmyadmin` no seu navegador.  
   - Importe o arquivo SQL incluído no projeto (`database.sql`) para criar as tabelas e os dados necessários.  

4. **Coloque os Arquivos do Projeto**  
   - Copie a pasta do projeto clonado para o diretório `htdocs` da instalação do XAMPP (por exemplo, `C:/xampp/htdocs/tripCompany`).

5. **Execute a Aplicação**  
   - Abra o navegador e acesse `http://localhost/tripCompany`.  
   - Você será direcionado para a página inicial ou página de login.  

6. **Crie uma Conta**  
   - Registre-se como um novo usuário para começar a usar a plataforma.  

7. **Comece a Criar Viagens**  
   - Após o login, você poderá criar viagens, adicionar destinos e convidar participantes.  

### Notas  

- Certifique-se de que o XAMPP está em execução enquanto usa a aplicação.

## Licença

Este projeto está sob a licença [MIT](../LICENSE).
