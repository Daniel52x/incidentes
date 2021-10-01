# Incidentes
- Modelo Entidade Relacionamento [https://github.com/Daniel52x/incidentes/blob/main/public/modelo_relacional.jpg]
- Colection Insomnia [https://github.com/Daniel52x/incidentes/blob/main/Insomnia_Incidentes]
## Passos para execução do sistema:
- 1 - Clone o projeto.
- 2 - Crie um banco de dados MySQL, sugiro que seja com o nome "incidente_teste".
- 3 - Em seu arquivo ".env" coloque suas credencias de acesso ao banco de dados criado no passo anterior, e também insira o nome do banco na variável "DB_DATABASE".
- 4 - Execute o comando "php artisan migrate" para criação da estrutura do banco de dados.
- 5 - Execute o comando "php artisan db:seed" para preencher as tabelas com dados básicos para o funcionamento do projeto.
- [OPCIONAL] 5.1 - Caso deseje executar os testes unitários utilize o comando "php artisan test".
- 6 - Execute o comando "php artisan serve" para iniciar a aplicação.
- 7 - Por fim, acesse o endpoint que o laravel irá disponibilizar para a execução da aplicação. 
