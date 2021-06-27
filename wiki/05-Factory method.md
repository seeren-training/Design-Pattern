# Factory method

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Dans la programmation basée sur les classes, le modèle de méthode d'usine est un modèle de création qui utilise des méthodes d'usine pour résoudre le problème de la création d'objets sans avoir à spécifier la classe exacte de l'objet qui sera créé. Cela se fait en créant des objets en appelant une méthode de fabrique, soit spécifiée dans une interface et implémentée par des classes enfants, soit implémentée dans une classe de base et éventuellement remplacée par des classes dérivées, plutôt qu'en appelant un constructeur.

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/factory-method.jpg)

___

## 📑 Implémentation

Fabrique

```php
interface CarFactoryInterface
{
    public function makeCar(): Car;
}

class CarFactory implements CarFactoryInterface
{

    const VOLVO = 0;

    const BMW = 1;

    const NISSAN = 2;

    public function makeCar(int $type = self::VOLVO): Car
    {
      switch (type) {
        case self::BMW: return new BMWCar();
        case self::NISSAN: return new NissanCar();
        default: return new VolvoCar();
      }
    }
}
```

Utilisation

```php
$usine = new CarFactory();
$car = $usine->makeCar(CarFactory::NISSAN);
```