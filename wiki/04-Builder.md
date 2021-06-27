# Builder

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Le modèle de conception Builder résout des problèmes tels que :

* Comment une classe (le même processus de construction) peut-elle créer différentes représentations d'un objet complexe ?
* Comment simplifier une classe qui inclut la création d'un objet complexe ?

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/Builder.jpg)

Créer et assembler les parties d'un objet complexe directement dans une classe est inflexible. Il engage la classe à créer une représentation particulière de l'objet complexe et rend impossible la modification ultérieure de la représentation indépendamment (sans avoir à changer) la classe.

Le modèle de conception Builder décrit comment résoudre de tels problèmes :

* Encapsulez la création et l'assemblage des parties d'un objet complexe dans un objet Builder distinct.
* Une classe délègue la création d'objets à un objet Builder au lieu de créer les objets directement.

Une classe peut déléguer à différents objets Builder pour créer différentes représentations d'un objet complexe.

___

## 📑 Implémentation

Monteur abstrait

```php
abstract class MonteurPizza
{
    protected Pizza $pizza;

    abstract public function monterPate(): void;

    abstract public function monterSauce(): void;

    abstract public function monterGarniture(): void;

    public function getPizza(): Pizza
    { 
      return $this->pizza; 
    }

    public function creerNouvellePizza()
    {
      $this->pizza = new Pizza(); 
    }

}
```

Monteur concret

```php

class MonteurPizzaReine extends MonteurPizza
{

  public function monterPate(): void
  {
    $this->pizza->setPate("croisée"); 
  }

  public function monterSauce(): void
  {
    $this->pizza->setSauce("douce"); 
  }

  public function monterGarniture(): void
  { 
    $this->pizza->setGarniture("jambon+champignon"); 
  }

}
```

Utilisation

```php
$monteurPizza = new MonteurPizzaReine();
$monteurPizza->creerNouvellePizza();
$monteurPizza->monterPate();
$monteurPizza->monterSauce();
$monteurPizza->monterGarniture();
$pizza = $monteurPizza->getPizza();
```