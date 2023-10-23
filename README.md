## Techsocial CRUD

Um CRUD simples que consiste na criação e exclusão de usuários e pedidos:

## Setup

A aplicação foi criada em laravel utilizando o pacote **Laravel Sail** tendo assim seu ambiente de desenvolvimento totalmente **Dockerizado**.

O Setup inicial pode ser realizado somente por um comando por meio de uma **Makefile** que irá buildar nossos 
containers, rodar nossas migrations e alimentar nossas tabelars por meio dos seeders.

Basta rodar o comando abaixo em seu terminal

```
make build
```

Se preferir o processo pode ser feito manualmente rodando os seguintes comandos em sequência:

```
cp .env.example .env

composer install

./vendor/bin/sail up -d

./vendor/bin/sail yarn

./vendor/bin/sail yarn build

./vendor/bin/sail artisan migrate:refresh --seed
```

Após o setup, a base de dados será preenchida com dados aleatórios, porém é criado um usuário padrão de acesso com as
seguintes credênciais:

```
Usuário: admin@techsocial.test
Senha: password
```

E você pode acessar o site através do endereço: [techsocial.test](techsocial.test)

Ao entrar no sistema você terá um painel com duas páginas, sendo uma de listagem dos usuários (customers) e outra de
listagem dos pedidos, aonde você terá total gerenciamento de ambos (CRUD), seguindo as seguintes regras:

- Um usuário pode gerenciar todas as contas, porém não pode excluir sua própria conta
- Na tabela de usuários haverão 3 botões na última coluna da tabela, sendo um para editar, um para excluir, e um para
- visualizar somente os pedidos feitos por aquele usuário
- A tabela de pedidos segue a mesma lógica, exceto pelo fato que um usuário só pode excluir seus próprios pedidos

## Testes

Para rodar os testes basta digitar o seguinte comando:

```
./vendor/bin/sail artisan test --testsuite=Unit --stop-on-failure
```

## Lint

O projeto usa o pacote **Laravel Pint** construído em cima do PHPCS Fixer para padronização de código, para formatar
os arquivos, basta digitar

```
./vendor/bin/sail pint
```

## Organização de Código

Para uma melhor organização de código, separamos nossa aplicação em algumas camadas seguindo alguns principios de
arquitetura limpa, e DDD.

dentro da pasta ``app`` teremos 3 pastas que se diferem do padrão do Laravel:

- ``Domain``: Pasta contendo nossos Models, DTO's e nossas Actions que contém toda lógica de CRUD, tirando essa responsábilidade do Controller, que passa agir somente como um orquestrador.
- ``App``: Camada da nossa aplicação onde temos nossos FormRequests (Validators), Controllers e chamadas HTTP.
- ``Infra``: Toda configuração do nosso app fica localizado nesta parte.

Tendo em vista que essa não é uma estrutura 100% fiel aos conceitos de Clean Arch e DDD, procurei seguir o que o
framework já nos oferece sem deixar uma organização muito complexa.
