# Template Method

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Ce modèle comporte deux parties principales:

* La "méthode modèle" est implémentée en tant que méthode dans une classe de base (généralement une classe abstraite). Cette méthode contient du code pour les parties de l'algorithme global qui sont invariantes. Le modèle garantit que l'algorithme global est toujours suivi. Dans la méthode modèle, des parties de l'algorithme qui peuvent varier sont implémentées en envoyant des messages automatiques qui demandent l'exécution de méthodes d'assistance supplémentaires. Dans la classe de base, ces méthodes d'assistance reçoivent une implémentation par défaut, voire aucune (c'est-à-dire qu'il peut s'agir de méthodes abstraites).
* Les sous-classes de la classe de base "remplissent" les parties vides ou "variantes" du "modèle" avec des algorithmes spécifiques qui varient d'une sous-classe à l'autre. Il est important que les sous-classes ne surchargent pas la méthode modèle elle-même.

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/Template-method.jpg)

___

## 📑 Implémentation

*Template*

```php
abstract class Game
{

    abstract protected function initialize();

    abstract protected function startPlay();

    abstract protected function endPlay();

    public final function play()
    {
        $this->initialize();
        $this->startPlay();
        $this->endPlay();
    }

}
```

*Algo*

```php
class Mario extends Game
{

    protected function initialize()
    {
        echo "Mario Game Initialized! Start playing.", PHP_EOL;
    }

    protected function startPlay()
    {
        echo "Mario Game Started. Enjoy the game!", PHP_EOL;
    }

    protected function endPlay()
    {
        echo "Mario Game Finished!", PHP_EOL;
    }

}

class Tankfight extends Game
{

    protected function initialize()
    {
        echo "Tankfight Game Initialized! Start playing.", PHP_EOL;
    }

    protected function startPlay()
    {
        echo "Tankfight Game Started. Enjoy the game!", PHP_EOL;
    }

    protected function endPlay()
    {
        echo "Tankfight Game Finished!", PHP_EOL;
    }

}
```

*Utilisation*

```php
$game = new Tankfight();
$game->play();
$game = new Mario();
$game->play();
```
