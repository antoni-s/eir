CREATE TABLE unidade
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    -- status CHAR(1) NOT NULL DEFAULT 1,
    -- preco DOUBLE(10,2) NOT NULL,
    -- unidade VARCHAR(30) NOT NULL,
    idu BIGINT NOT NULL,
    horaAbertura TIME NOT NULL,
    horaFechamento TIME NOT NULL,
    -- descricao TEXT,
    logradouro VARCHAR(100) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    cep VARCHAR(8) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    uf VARCHAR(2) NOT NULL,
    complemento VARCHAR(150) NOT NULL,
    dataCadastro DATETIME DEFAULT NOW()
);

CREATE TABLE atendente
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    -- status CHAR(1) NOT NULL DEFAULT 1,
    -- preco DOUBLE(10,2) NOT NULL,
    -- unidade VARCHAR(30) NOT NULL,
    cpf BIGINT NOT NULL,
    matricula BIGINT NOT NULL,
    -- descricao TEXT,
    telefone VARCHAR(11) NOT NULL,
    email VARCHAR(50) NOT NULL,
    logradouro VARCHAR(100) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    cep VARCHAR(8) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    uf VARCHAR(2) NOT NULL,
    complemento VARCHAR(150) NOT NULL,
    dataCadastro DATETIME DEFAULT NOW()
);

CREATE TABLE medicamento
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    codigoBarras BIGINT NOT NULL,
    composicao VARCHAR(200) NOT NULL,
    tipo VARCHAR(30) NOT NULL,
    dose VARCHAR(100) NOT NULL,
    informacoes VARCHAR(200) NOT NULL,
    dataAtualizacao DATETIME DEFAULT NOW()
);


INSERT INTO unidade (nome,idu,horaAbertura,horaFechamento,logradouro,bairro,cep,cidade,uf,complemento,dataCadastro) VALUES
('Drogaria São José','3334567891011','07:30','18:00','Rua J','Itapoã','74940510','Aparecida de Goiânia','GO','Vazio',NOW()),
('Drogaria José','3334567891010','09:30','20:00','Rua M','Itapoã','74940521','Aparecida de Goiânia','GO','Vazio',NOW());
