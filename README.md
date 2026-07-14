# 🍽️ Macau D'Ouro

Website desenvolvido para um restaurante fictício inspirado na gastronomia de Macau e Portugal.

O projeto inclui uma área pública para os clientes e um backoffice para administração das reservas e do menu.


# 📌 Funcionalidades

## Área Pública

- Página Inicial
- História do Restaurante
- Menu
- Reservas Online
- Contactos

## Backoffice

- Login de Administrador
- Gestão de Reservas
- Aceitar Reservas
- Cancelar Reservas
- Avisar Cliente
- Pesquisa de Reservas
- Gestão do Menu
- Adicionar Pratos
- Editar Pratos
- Eliminar Pratos
- Terminar Sessão

---

# 🛠️ Tecnologias Utilizadas

- HTML5
- CSS3
- PHP
- MySQL
- PDO
- JavaScript
- XAMPP
- Git
- GitHub

# 💾 Base de Dados

O projeto utiliza uma base de dados MySQL denominada:

```
macau_douro
```

Principais tabelas:
- administradores
- reservas
- menu

# 🔐 Área de Administração

O acesso ao backoffice é protegido através de autenticação.

Depois de iniciar sessão é possível:

- Gerir Reservas
- Alterar o Menu
- Adicionar novos pratos
- Editar pratos existentes
- Remover pratos
- Pesquisar reservas
- Terminar sessão

---

# 📂 Estrutura do Projeto

```
Macau-Douro/

│

├── css/

├── images/

├── backoffice/

│ ├── login.php

│ ├── painel_b.php

│ ├── reservas_b.php

│ ├── menu.php

│ ├── adicionar_prato.php

│ ├── editar_prato.php

│ ├── eliminar_prato.php

│ ├── aviso.php

│ └── logout.php

│

├── index.php

├── historia.php

├── menu.php

├── reservas.php

└── README.md
```

---

# 🚀 Como executar o projeto

1. Clonar o repositório

```
git clone https://github.com/soofiams/Macau-D-ouro.git
```

2. Copiar o projeto para a pasta:

```
xampp/htdocs
```

3. Iniciar:

- Apache
- MySQL

no XAMPP.

4. Criar a base de dados:

```
macau_douro
```

5. Importar as tabelas necessárias através do phpMyAdmin.

6. Aceder ao projeto através de:

```
http://localhost/Macaudouro/
```

---

# 🎓 Objetivo

Este projeto foi desenvolvido no âmbito da aprendizagem de desenvolvimento web, com o objetivo de aplicar conhecimentos de:

- Desenvolvimento Front-End
- PHP
- Bases de Dados MySQL
- CRUD
- Gestão de Sessões
- Versionamento com Git e GitHub

---

# 👩‍💻 Autora

**Micaela Sousa**

GitHub:
https://github.com/soofiams

---

## 📄 Licença

Este projeto foi desenvolvido para fins académicos e de aprendizagem.
