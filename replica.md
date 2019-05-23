[logo]: http://www.google.com/images/logo.gif

# Escenario Ficticio para master-master

    Para resguardar la información, yo replicaría con el método master-master   agregando XXXX nodos. Lo haría de esta manera porque en este tipo de sistema   distribuido es fundamental una alta disponibilidad de la información. Este   método de replicación permite que los datos esten alojados en distintas   computadoras y actualizados por cualquiera de estas computadoras. De esta   manera cualquier nodo puede responder peticiones de los clientes.  

# Escenario Ficticio para master-slave

    Para resguardar la información, yo replicaría con el método master-slave   agregando XXXX esclavos.  
    La replicación master slave consiste en utilizar una base de datos para la   escritura y otra o varias bases de datos para la lectura.  
    Esto nos permite tener varias copias sincronizas de nuestra base de datos   principal, cualquier cambio en el maestro (master) se replicará  en los   esclavos (slaves), esta configuración nos proporciona escalabilidad y backup,  entre otras cosas, como por ejemplo hacer consultas sobre la réplica sin   afectar a la base de datos principal.  

[logo]