Requerimiento 

1. Necesito sincronices con el api la información de productos. Este api se consultar por php en formato get con los valores que ya van en la url.

https://pequeayuda.com/wp-json/wc/v3/products?category=1093&status=publish&consumer_key=ck_96cbe25fad52a90cce5affbba5c8e00a5f9642f4&consumer_secret=cs_40d99fdb836714364928d989827f9d743b1f44e8

2. Al tener los resultados debes colocar los campos de respuesta en la base de datos, los campos que no sincronizas son (meta_data, yoast_head, yoast_head_json, _links) el resto debe quedar guardado por columna en tu base de datos.

3. En un archivo php debes crear 2 botones y 1 tabla de resultados. El boton 1 debe llamarse "Sincronizar productos" el cual se conectará al paso 1 y sincronizará y agrega los productos a la base de datos, el botón 2 se llamará "Eliminar productos" el cual elimina todos los registros de la base de datos. La tabla a mostrar serán todos los campos del producto y tendrá un único buscador por sku del producto.

--- Solucion 

Esta es una aplicación web que conecta a través de php con una base de datos en mysql. Utilice arquitectura de desarrollo Modelo Vista Controlador, teniendo en cuenta que ayuda a mantener la legibilidad en el código y hace más fácil el mantenimiento  o la escalabilidad del mismo.

NOTA: Dentro de la carpeta database hay dos archivos el archivo test_soluweb.sql es la base de datos que se ha exportado utilizando phpmyadmin  la base de datos debe estar en blanco o vacía.
