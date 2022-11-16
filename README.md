
# Tudai tpe 2 API REST año 2022
         UNICEN-TUDAI
# La estructura basica de url para trabajar sera la siguiente:
                http://localhost/web2/Api/api/garden

# Metodos/Endpoint utiles en este proyecto

- traer todos los productos de la tabla, con el metodo GET:
            
            /web2/Api/api/garden

- Traer un producto en especifico de la tabla con su id, metodo GET/ID:

            /web2/Api/api/garden/9

- Eliminar un producto por id, metodo DELETE/ID:

            /web2/Api/api/garden/9

- Modificar un producto por id, metodo PUT:

    SE TIENE QUE RESPETAR LOS CAMPOS DE LA CARGA PARA MODIFICAR,
     DE LO CONTRARIO NO SE MODIFICARA.

            /web2/Api/api/garden/9

- Agregar un producto, metodo POST:

            /web2/Api/api/garden

    SE DEBE ENVIAR TODOS LOS CAMPOS PARA UNA CARGAR CORRECTA.
        - NAME,PRICE,STOCK,SIZE,TYPE(NUMERO DEL 1 AL 4 DEPENDIENDO SU TIPO)

- LOS NUMEROS DE TIPOS HACEN REFERENCIA A LOS SIGUIENTES:

        .1: FRUTALES/PRIMAVERA
        .2: FRUTALES/INVIERNO
        .3: ARBUSTO/VERANO
        .4 ARBUSTO/INVIERNO

- FILTRO:
    
    Para aplicar filtro a los productos, en este caso se filtra por tipos. Se va a utilizar el endpoint

            /web2/Api/api/garden?type=frutales    (ej: frutales, arbusto)

    En este caso la variable se aplica luego de /garden?type= y detallamos el tipo de planta que queremos filtar.

-ORDENADO:
        para aplicar un ordenado ascendente o descendente de los productos, en este caso se filtra por el stock de los mismos.

         /web2/Api/api/garden?order=asc     ('asc' para ascendente y 'des' para descendente)

        en este caso va a traer los productos ordenador por stock de forma ascendente.
-PAGINADO:
        Para traer productos en formato pagina, paso por url la pagina que quiero traer y la longitud(cantidad) de los productos que quiero mostrar.

        /web2/Api/api/garden?page=2&long=5  (ejemplo: en este caso trae de la pagina 2 de prodcutos y muestra en la pagina 5 productos)

        'page'-> aclaro la pagina.     'long'-> aclaro la longitud de la pagina.

        ACLARACION:
        En caso que se pida la ultima pagina de productos (donde quedan 3 productos por ejemplo), y se determine longitud mayor a 3. se van a mostrar unicamente esos 3 productos finales ya que no tiene mas para mostrar.

 



## Desarrollador

- [@santiago gonzalez](https://github.com/gonzalezsantiagook/TPE-API.git)

- En caso de consultas comunicarse al siguiente mail:

            gonzalezsantiagook@gmail.com
![Logo](https://www.unicen.edu.ar/sites/default/files/imagenes/actualidad/2011-01/UNICEN_0.jpg)

