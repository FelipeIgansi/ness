CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_usuarios_insert`(
    parameter_nome varchar(50),
    parameter_email varchar(100),
    parameter_senha varchar(64)

)
BEGIN

	insert into usuario
    values(default, parameter_nome, parameter_email,parameter_senha);
    
    insert into log_usuario
    values(default, parameter_nome, parameter_email,parameter_senha);
    
    select * from usuario where idUsuario = last_insert_id();


END