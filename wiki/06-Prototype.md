# Prototype

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Le modèle de prototype est un modèle de conception de création dans le développement de logiciels. Il est utilisé lorsque le type d'objets à créer est déterminé par une instance prototypique, qui est clonée pour produire de nouveaux objets.

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/Prototype.jpg)

Ce modèle est utilisé pour :

* Evitez les sous-classes d'un créateur d'objet dans l'application cliente, comme le fait le modèle de méthode d'usine.
* Eviter le coût inhérent à la création d'un nouvel objet de manière standard (par exemple, en utilisant le mot-clé 'new') lorsqu'il est prohibitif pour une application donnée.

___

## 📑 Implémentation

Protptype

```php
abstract class Prototype
{
    abstract public function __clone();
}

class NissanCar extends Prototype
{

    private int $puissance;

    public function __construct() {
      $this->puissance = 0;
    }

    public function addPuissance(): int
    {
      return $this->puissance += 1;
    }

    public function __clone()
    {
      $this->__construct();
    }
}
```

Utilisation

```php
$carA = new NissanCar();
$carA->addPuissance();
$carA->addPuissance();
$carB = clone $carA;
$carB->addPuissance();
```