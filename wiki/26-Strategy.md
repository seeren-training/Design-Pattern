# Strategy

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Le patron de conception stratégie est utile pour des situations où il est nécessaire de permuter dynamiquement les algorithmes utilisés dans une application. Le patron stratégie est prévu pour fournir le moyen de définir une famille d'algorithmes, encapsuler chacun d'eux en tant qu'objet, et les rendre interchangeables. Ce patron laisse les algorithmes changer indépendamment des clients qui les emploient.

![image](./resources/Strategy.jpg)

___

## 📑 Implémentation

*Aggregator*

```php
class Warrior implements Weapon
{

    private Weapon $weapon;

    public function setWeapon(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function hit(): int
    {
        return $this->weapon->hit();
    }

}
```

*Strategies*

```php
interface Weapon
{

    public function hit(): int;

}

class Gun implements Weapon
{

    public function hit(): int
    {
        return 100;
    }

}

class Sword implements Weapon
{

    public function hit(): int
    {
        return 20;
    }

}
```

*Utilisation*

```php
$warior = new Warior();
$warior->setWeapon(new Sword());
echo $warior->hit() . PHP_EOF;
$warior->setWeapon(new Gun());
echo $warior->hit() . PHP_EOF;
```
