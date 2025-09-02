CREATE DATABASE db_petshop;
USE db_petshop;

CREATE TABLE cliente(
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(15),
    cpf VARCHAR(11) UNIQUE,
    email VARCHAR(100) UNIQUE
);

CREATE TABLE pet(
    id_pet INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    porte VARCHAR(50),
    raca VARCHAR(50),
    nascimento INT,
    id_cliente INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);

CREATE TABLE servico(
    id_servico INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    duracao_min INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

CREATE TABLE agendamento(
    id_agendamento INT PRIMARY KEY AUTO_INCREMENT,
    data_hora DATETIME NOT NULL,
    status VARCHAR(50) NOT NULL,
    observacoes TEXT,
    id_pet INT,
    id_servico INT,
    FOREIGN KEY (id_pet) REFERENCES pet(id_pet),
    FOREIGN KEY (id_servico) REFERENCES servico(id_servico)
);

insert into cliente (nome, telefone, cpf, email) values
('João Silva', '11999999999', '12345678901', 'joao@gmail.com'),
('Maria Oliveira', '21988888888', '10987654321', 'maria@gmail.com'),
('Carlos Souza', '31977777777', '11223344556', 'carlos@gmail.com');

insert into pet (nome, porte, raca, nascimento, id_cliente) values
('Rex', 'Grande', 'Pastor Alemão', 2018, 1),
('Mimi', 'Pequeno', 'Poodle', 2020, 2),
('Tobias', 'Médio', 'Beagle', 2019, 3);

insert into servico (nome, duracao_min, preco) values
('Banho', 30, 50.00),
('Tosa', 45, 80.00),
('Consulta Veterinária', 60, 150.00);

insert into agendamento (data_hora, status, observacoes, id_pet, id_servico) values
('2024-07-01 10:00:00', 'Agendado', 'Levar brinquedo favorito', 1, 1),
('2024-07-02 14:00:00', 'Agendado', 'Cortar unhas também', 2, 2),
('2024-07-03 09:00:00', 'Agendado', 'Vacinação em dia', 3, 3);
