delimiter $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_contas_insert`(
	`parameter_nome` varchar(50),
    `parameter_email` varchar(50),
    `parameter_senha` varchar(64),
    `parameter_url` varchar(255),
    `parameter_tipoconta` varchar(20),
    `parameter_fk_usuario` int(11) 
    )
BEGIN
	INSERT INTO `projetogestordesenhas`.`conta`
	VALUES
	(`default`, `parameter_nome`, `parameter_email`, `parameter_senha`, `parameter_url`, `parameter_tipoconta`, `parameter_fk_usuario`);
	
    SELECT * FROM `projetogestordesenhas`.`conta` where `idConta` = `last_insert_id()`;

END $$
