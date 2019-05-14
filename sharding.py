class Persona:

    def __init__(self, dni, nombre, email, telefono):
        self.dni = dni
        self.nombre = nombre
        self.email = email
        self.telefono = telefono
    
    def getDni(self):
        return self.dni
    
    def getName(self):
        return self.nombre

    
class DB:

    def __init__(self):
        self.dbs = {}
        self.id = 0
    
    def addDb(self):
        self.dbs[self.id]=[]
        self.id += 1
                    
    def llenarDb(self, personas):
        mod = len(self.dbs)
        for i in personas:
            self.dbs[i.getDni() % mod].append(i)
    
    def addDbAndResharding(self, numServidores):
        for x in range(numServidores):
            self.addDb()
        mod = len(self.dbs)
        for base in self.dbs:
            if not self.dbs[base]:
                print('Base =', base , ' vacio')
                pass
            else:
                for y in self.dbs[base]:
                    if y.getDni() % mod != base:
                        self.dbs[y.getDni() % mod].append(y)
                        self.dbs[base].remove(y)
    
    def imprimirBases(self):
        for base in self.dbs:
            print('Base = ', base)
            for y in self.dbs[base]:
                print('DNI: ', y.getDni(), 'Nombre: ', y.getName())
        print('-----------------------------------------------------')
                    


base = DB()
base.addDb()
base.addDb()
base.addDb()
personas = {
    Persona(20, 'cacho', 'cacho@gmail.com', 1156694418),
    Persona(21, 'tito', 'tito@gmail.com', 1156693418),
    Persona(22, 'lolo', 'lolo@gmail.com', 1156594418),
    Persona(26, 'lili', 'cacho@gmail.com', 1156694418),
    Persona(23, 'lelo', 'tito@gmail.com', 1156693418),
    Persona(24, 'lulu', 'lolo@gmail.com', 1156594418),
    Persona(25, 'pedro', 'lolo@gmail.com', 1156594418),

}
base.llenarDb(personas)
base.imprimirBases()
base.addDbAndResharding(1)
base.imprimirBases()