BEGIN
		
	DECLARE search VARCHAR(200) DEFAULT '';
	DECLARE _pag_actual INT;
	DECLARE _limit VARCHAR(300) DEFAULT '';
	
	SET _pag_actual=(_pagina - 1) * _reg_x_pag;
	
	IF _criterio != '' THEN
		SET search = CONCAT(' where ubicacionNoticia LIKE "%',_criterio,'%"');
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
	FROM table_noticia  WHERE ubicacionNoticia LIKE "%',_pagUbicacion,'%"
	',_limit,';
	');
	
	PREPARE consulta FROM @sentencia;
	EXECUTE consulta;
	
	DEALLOCATE PREPARE consulta;
	SET @sentencia = NULL;
    END