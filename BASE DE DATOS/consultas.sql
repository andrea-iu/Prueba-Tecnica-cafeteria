Realizar una consulta que permita conocer cuál es el producto que más stock tiene.

SELECT id,referencia,nombre_producto,precio,peso,id_categoria,inventariable,cantidad_sold,id_unidad,estado,fecha_reg, MAX(stock_min) FROM `productos`


Realizar una consulta que permita conocer cuál es el producto más vendido
SELECT id,referencia,nombre_producto,precio,peso,id_categoria,inventariable,id_unidad,estado,fecha_reg,stock_min, MAX(cantidad_sold) FROM `productos`