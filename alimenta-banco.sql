USE `app_inscricao`;

INSERT INTO `edital` (`id`, `nome`, `numero`, `responsavel`, `descricao`, `dataInicial`, `dataFinal`, `link`, `ativo`) VALUES
	(1, 'Edital Processo Seletivo Simplificado da Saúde', '01/2021', 'Secretaria Municipal da Saúde', 'Edital Processo Seletivo Simplificado da Saúde Edital Processo Seletivo Simplificado da Saúde Edital Processo \n    Seletivo Simplificado da Saúde Edital Processo Seletivo Simplificado da Saúde Edital Processo Seletivo \n    Simplificado da Saúde', '2021-02-02', '2021-02-06', 'Edital Processo Seletivo Simplificado da Saúde', 1);
	
INSERT INTO `grupo-ocupacional` (`id`, `nome`, `ativo`, `edital_id`) VALUES
	(1, 'PEDAGÓGICO ESCOLAR', 1, 1),
	(2, 'APOIO ESCOLAR', 1, 1);

INSERT INTO `local-cargo` (`id`, `nome`, `ativo`, `edital_id`) VALUES
	(1, 'ESCOLAS SEDE', 1, 1),
	(2, 'ESCOLAS INDÍGENAS - XOHÃ', 1, 1),
	(3, 'ESCOLAS INDÍGENA - MAROXI', 1, 1),
	(4, 'ESCOLA INDÍGENA - MURÃRIWATÁ', 1, 1),
	(5, 'ESCOLAS INDÍGENA - KIJETXAWÊ', 1, 1),
	(6, 'ESCOLAS CAMPO', 1, 1);

INSERT INTO `requisito` (`id`, `nome`, `quantidade`, `pontos`, `ativo`, `edital_id`) VALUES
	(1, 'ENSINO FUNDAMENTAL COMPLETO', 1, 1.00, 1, 1),
	(2, 'ENSINO MÉDIO COMPLETO', 1, 1.00, 1, 1),
	(3, 'GRADUAÇÃO COM LICENCIATURA PLENA EM CIÊNCIAS BIOLÓGICAS', 1, 1.00, 1, 1),
	(4, 'GRADUAÇÃO COM LICENCIATURA PLENA EM EDUCAÇÃO FÍSICA', 1, 1.00, 1, 1),
	(5, 'GRADUAÇÃO COM LICENCIATURA PLENA EM GEOGRAFIA OU CIÊNCIAS SOCIAIS', 1, 1.00, 1, 1),
	(6, 'GRADUAÇÃO COM LICENCIATURA PLENA EM HISTÓRIA OU CIÊNCIAS SOCIAIS', 1, 1.00, 1, 1),
	(7, 'GRADUAÇÃO COM LICENCIATURA PLENA EM LETRAS COM HABILITAÇÃO EM LÍNGUA INGLESA', 1, 1.00, 1, 1),
	(8, 'GRADUAÇÃO COM LICENCIATURA PLENA EM PEDAGOGIA', 1, 1.00, 1, 1),
	(9, 'GRADUAÇÃO COM LICENCIATURA PLENA EM LETRAS COM HABILITAÇÃO EM LÍNGUA PORTUGUESA', 1, 1.00, 1, 1),
	(10, 'CNH D', 1, 1.00, 1, 1),
	(11, 'CONHECIMENTO BÁSICO EM INFORMÁTICA', 1, 1.00, 1, 1),
	(12, 'MAGISTÉRIO E/OU MAGISTÉRIO INDÍGENA NA MODALIDADE DE ENSINO MÉDIO', 1, 1.00, 1, 1),
	(13, 'CONHECIMENTO EM PATXOHÃ', 1, 1.00, 1, 1);

INSERT INTO `tipo-cargo` (`id`, `nome`, `ativo`, `edital_id`) VALUES
	(1, 'AMPLA CONCORRÊNCIA', 1, 1),
	(2, 'CADASTRO RESERVA', 1, 1),
	(3, 'PORTADOR DE NECESSIDADES ESPECIAIS', 1, 1);

INSERT INTO `titulo` (`id`, `nome`, `quantidade`, `pontos`, `qtd_max`, `ativo`, `edital_id`) VALUES
	(1, 'DOUTORADO', 1, 5.00, 0, 1, 1),
	(2, 'PÓS GRADUAÇÃO STRICTO SENSUS - MESTRADO', 1, 3.00, 0, 1, 1),
	(3, 'PÓS GRADUAÇÃO LATUS SENSU - ESPECIALIZAÇÃO', 1, 2.00, 0, 1, 1),
	(4, 'GRADUAÇÃO', 1, 1.00, 0, 1, 1),
	(5, 'CURSO DE APERFEIÇOAMENTO', 4, 0.50, 1, 1, 1);
	
INSERT INTO `cargo` (`id`, `nome`, `cargaHoraria`, `quantidade`, `salario`, `ativo`, `tipo_cargo_id`, `local_cargo_id`, `grupo_ocupacional_id`, `edital_id`) VALUES (1, 'ASSISTENTE ADMINISTRATIVO ESCOLAR', 40, 70, 1333.00, 1, 1, 1, 1, 1);