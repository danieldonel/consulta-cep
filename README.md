# Consulta CEP

Este é um projeto incrível que faz coisas incríveis. Para começar, você precisará instalar o XAMPP. Siga estas etapas para fazer isso:

## Passo a Passo para Instalar o XAMPP:

1. **Baixe o XAMPP**: Vá para o site [XAMPP](https://www.apachefriends.org/index.html) e faça o download do instalador apropriado para o seu sistema operacional.

2. **Instale o XAMPP**: Execute o arquivo baixado e siga as instruções do assistente de instalação.

3. **Inicie o XAMPP**: Após a instalação, inicie o XAMPP e certifique-se de que os serviços Apache e MySQL estejam em execução. Para isso, na interface principal do XAMPP, clique nos botões "Start" ao lado do Apache e do MySQL.

4. **Acesse o phpMyAdmin**: Abra um navegador da web e vá para `http://localhost/phpmyadmin`. Aqui você pode configurar seu banco de dados MySQL conforme necessário para o projeto.

5. **Crie a database**: No phpMyAdmin, crie uma nova database com o nome `consulta_cep_db`.

6. **Importe a database do repositório**: No phpMyAdmin, vá para a database `consulta_cep_db` e selecione a opção "Importar". Escolha o arquivo SQL da database que está no repositório e importe-o para a database recém-criada.

7. **Clone este repositório**: Abra o terminal (no Windows, você pode usar o Git Bash que vem com o Git) e clone este repositório na pasta `htdocs` do XAMPP com o seguinte comando:

   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/danieldonel/consulta-cep.git

8. **Abra o navegador**:  Digite localhost/consulta-cep na barra de endereço do seu navegador para acessar o projeto.

9. **Pronto!**:  Agora você está pronto para utilizar o projeto.
