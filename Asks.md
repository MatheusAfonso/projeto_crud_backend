## Perguntas

- Qual o maior problema técnico que você resolveu? Como?
O maior problema foi a configuração do ambiente backend (PHP e Mysql) no Mac M1, resolvi instalando os packages usando Brew.
- Qual maior problema técnico que você não conseguiu resolver?
Foi a questão do CORS, não sei por qual motivo, métodos HTTP PUT e DELETE não eram permitidos,
mesmo colocando-os manualmente.
- Qual o projeto atual que você está trabalhando, quais problemas enfrenta e como você os resolveria?
Atualmente estou trabalhando num projeto de telemedicina em Flutter, já enfrentei alguns problemas para emular uma VM android, por ter o processador M1 no Mac e resolvia da seguinte forma, gerava um .apk para teste e enviava para um ftp para ser testado.
- Se hoje você tivesse a missão de desenvolver um sistema fiscal, como você faria? Desde o entendimento do domínio até a decisão de tecnologias.
Primeiramente, faria uma api bem sólida, flexível e escalável, em sequência, utilizaria um framework frontend que seguisse o mesmo princípio, o foco seria a interoperabilidade.
- Como funciona o processo de uma requisição HTTP?
O browser como cliente, se conecta ao servidor e envia uma requisição HTTP através da URL (endereço do site), o servidor por sua vez, recebe essa requisição e identifica o verbo (GET, POST, PUT, DELETE entre outros) desse modo, o servidor se encarrega de encontrar a página ou recurso e devolve ao browser contendo as mensagens de status sendo as mais comuns: 200, 404 e 500
- Quais tecnologias você domina?
HTML5
CSS3
JavaScript
PHP
SQL
Delphi
Flutter
Python
- Utiliza testes unitários no seu dia a dia?
Sim, faço os testes unitários de tudo o que desenvolvo, desde API`s até funções da aplicação que estou desenvolvendo.
- Conhece os principios S.O.L.I.D, clean code e clean architecture?
    - Como você utiliza inversão de dependencias no dia a dia?
    Procuro deixar as classes ou componentes mais simples possível, a fim os tornar reaproveitáveis.
    - Como você define responsabilidade única?
    Este é um princípio que foca no papel de execução de uma classe / função e assegurar que ela desempenham sua função de forma eficiente.
    - Por que você acha clean architecture uma boa abordagem?
    Por tornar as coisas versáteis, um exemplo é na independência do frontend, não importa qual interface de consumo, CLI ou REST o que importa é a escalabilidade, manutenção e evolução dos códigos como um todo. Dividindo a aplicação em camadas, é possível fazer atualizações e preservar o core do projeto.

- Quais os seus conhecimentos em infraestrutura?
    - Como você faz o deploy de suas aplicações?
    Atualmente, no projeto que estou engajado não temos nenhum projeto publicado, é feita o deploy de builds em fase de testes. Em projetos com empresas anteriores, era feito usando releases semanais, onde publicávamos nossas tarefas testadas e documentadas para serem empacotadas juntas (via Tortoise)
    - Quais plataformas você tem conhecimento (aws, azure, google cloud)?
    Por enquanto, não tive contato com nenhuma delas.
    - Orquestrador de containers já utilizou algum?
    No momento, Docker.
- Que assuntos e com qual frequencia você estuda?
Geralmente estudo sobre python e inteligência artificial no tratamento de imagens.
## Seniors

- Como você faria o processo de migração de um contexto do monolíto para micro serviço?
- Qual sua experiencia com deploy's?
- Já usou alguma ferramenta de monitoramento?
