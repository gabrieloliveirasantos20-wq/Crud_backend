-- Banco de dados: db_produtos
-- Execute este script no phpMyAdmin (XAMPP) para criar o banco e a tabela.

CREATE DATABASE IF NOT EXISTS db_produtos
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE db_produtos;

CREATE TABLE IF NOT EXISTS produtos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(150) NOT NULL,
  descricao TEXT NOT NULL,
  categoria VARCHAR(100) NOT NULL,
  quantidade INT NOT NULL DEFAULT 0,
  preco DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  data_cadastro DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dados de exemplo (opcional)
INSERT INTO produtos (nome, descricao, categoria, quantidade, preco, data_cadastro) VALUES
('Caderno 200 folhas', 'Caderno espiral capa dura', 'Papelaria', 50, 18.90, CURDATE()),
('Caneta Azul', 'Caneta esferográfica azul', 'Papelaria', 200, 2.50, CURDATE()),
('Mouse USB', 'Mouse óptico USB 1000dpi', 'Informática', 30, 39.90, CURDATE());
