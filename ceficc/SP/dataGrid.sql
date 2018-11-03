DELIMITER $$

USE `bdcefic`$$

DROP PROCEDURE IF EXISTS `dataGrid`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dataGrid`(
	IN _flag CHAR(1),
	IN _criterio VARCHAR(200),
	IN _pagina INT,
	IN _reg_x_pag INT
    )
BEGIN
		
	DECLARE search VARCHAR(200) DEFAULT '';
	DECLARE _pag_actual INT;
	DECLARE _limit VARCHAR(300) DEFAULT '';
	
	SET _pag_actual=(_pagina - 1) * _reg_x_pag;
	
	IF _criterio != '' THEN
		SET search = CONCAT(' WHERE ubicacionNoticia LIKE "%',_criterio,'%" ');
	END IF;
	
	SET @sentencia = CONCAT('
	SELECT  
		COUNT(*) INTO @countx  
	FROM table_noticia 
	',search,';
	');
	
	PREPARE consulta FROM @sentencia;
	EXECUTE consulta;
	
	DEALLOCATE PREPARE consulta;
	SET @sentencia = NULL;
	
	
	SET _limit = CONCAT('LIMIT ',_pag_actual,',',_reg_x_pag);
	
	IF _flag = 'A' THEN 
		SET _limit = '';
	END IF;
	
	
	SET @sentencia = CONCAT('
	SELECT codigoNoticia,
			codigoDetalleNoticia,
			tituloNoticia,
			introduccion_Noticia,
			mensajeNoticia,
			fotoNoticia,
			@countx AS total 
	FROM table_noticia 
	',search,' 
	',_limit,';
	');
	
	PREPARE consulta FROM @sentencia;
	EXECUTE consulta;
	
	DEALLOCATE PREPARE consulta;
	SET @sentencia = NULL;
    END$$

DELIMITER ;