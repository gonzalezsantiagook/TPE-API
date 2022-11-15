
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
    



 



## Authors

- [@santiago gonzalez](https://github.com/gonzalezsantiagook/TPE-API.git)

- En caso de consultas comunicarse al mail siguiente:

            gonzalezsantiagook@gmail.com
![Logo](https://www.unicen.edu.ar/sites/default/files/imagenes/actualidad/2011-01/UNICEN_0.jpg)

