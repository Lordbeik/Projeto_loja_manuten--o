# Sistema de Manutenção Eletrônica

## Visão Geral

Este projeto tem como objetivo desenvolver um sistema web robusto e eficiente para gerenciar o fluxo de trabalho de manutenção eletrônica. Ele abrange desde o cadastro de entidades cruciais como clientes e técnicos, passando pela geração controlada de códigos de acesso para técnicos, até a futura gestão de aparelhos e serviços. A meta é criar uma plataforma centralizada que otimize processos, melhore a comunicação e garanta a segurança das informações.

## Funcionalidades Atuais

As seguintes funcionalidades foram implementadas até o momento:

1.  **Página Principal (`index.html`):** Ponto de partida do sistema, oferecendo navegação clara para as diversas seções através de botões intuitivos.
2.  **Cadastro de Cliente (`cadastro_cliente.html`):** Permite o registro de novos clientes no sistema.
3.  **Cadastro de Técnico (`cadastro_tecnico.html`):** Um processo de cadastro seguro para técnicos, exigindo um código único gerado pelo sistema para acesso.
4.  **Geração de Códigos de Técnico (`gerar_codigos_page.html`):** Ferramenta administrativa para gerar códigos únicos que serão utilizados no cadastro de novos técnicos.
5.  **Exportação de Códigos:** Capacidade de exportar a lista de códigos gerados para um arquivo de texto (`.txt`) para facilitar o gerenciamento.
6.  **Processamento de Cadastro de Técnico (`processar_cadastro_tecnico.php`):** Lógica de back-end para validar o código de técnico fornecido e registrar o novo técnico no banco de dados.
7.  **Processamento de Geração de Códigos (`processar_gerar_codigos.php`):** Script PHP responsável por gerar os códigos únicos, armazená-los no banco de dados e disponibilizá-los para exportação.
8.  **Navegação:** Botões de "Voltar à Página Principal" foram adicionados às páginas de cadastro para melhorar a usabilidade.
9.  **Estrutura de Listagem (Front-end):** Botões na página principal para acessar futuras páginas de listagem de clientes e técnicos.
10. **Modelagem Inicial do Banco de Dados:** Criação das tabelas `codigos_tecnicos` (para armazenar os códigos gerados) e `usuarios_tecnicos` (para registrar os técnicos).

## Próximos Passos e Melhorias Planejadas

A evolução do projeto prevê a implementação das seguintes funcionalidades:

1.  **Listagem de Clientes e Aparelhos:** Uma seção para visualizar os clientes cadastrados e os aparelhos associados a cada um.
2.  **Listagem de Técnicos:** Uma página para exibir a lista de técnicos registrados no sistema.
3.  **Cadastro e Gerenciamento de Aparelhos:** Funcionalidade para registrar informações sobre os aparelhos que serão submetidos à manutenção.
4.  **Cadastro e Gerenciamento de Serviços:** Módulo para definir os tipos de serviços de manutenção oferecidos.
5.  **Relacionamento de Dados:** Estabelecer relações claras no banco de dados entre clientes, aparelhos e serviços para um rastreamento eficiente.
6.  **Melhorias na Validação de Formulários:** Implementar validações mais robustas no front-end (JavaScript) e no back-end (PHP) para garantir a integridade dos dados.
7.  **Aprimoramento do Tratamento de Erros:** Fornecer feedback mais claro e informativo aos usuários em caso de erros.
8.  **Implementação de Autenticação e Autorização:** Desenvolver um sistema de login seguro para diferentes perfis de usuários (administradores, técnicos), com controle de acesso a funcionalidades específicas.
9.  **Gerenciamento de Ordens de Serviço:** Uma funcionalidade para criar, acompanhar e gerenciar as ordens de serviço de manutenção.
10. **Utilização de AJAX:** Considerar o uso de AJAX para tornar as interações mais dinâmicas e melhorar a experiência do usuário, evitando recarregamentos de página.


 ## Estrutura do Projeto (Arquivos Principais)
.
├── index.html                  # Página principal
├── cadastro_cliente.html       # Formulário de cadastro de cliente
├── cadastro_tecnico.html       # Formulário de cadastro de técnico
├── gerar_codigos_page.html     # Página para gerar códigos de técnico
├── processar_cadastro_tecnico.php # Script PHP para processar cadastro de técnico
├── processar_gerar_codigos.php   # Script PHP para processar geração de códigos
├── listar_clientes_aparelhos.html # (Futuro) Página para listar clientes e aparelhos
├── listar_tecnicos.html        # (Futuro) Página para listar técnicos
└── README.md                   # Este arquivo




