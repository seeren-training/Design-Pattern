# Abstract factory

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

L'Abstract factory fournit un moyen d'encapsuler un groupe de facory individuelles qui ont un thème commun sans spécifier leurs classes concrètes.

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/Abstract_factory.svg)

En utilisation normale, le logiciel client crée une implémentation concrète de la fabrique abstraite puis utilise l'interface générique de la fabrique pour créer les objets concrets qui font partie du thème. Le client ne sait pas (ou ne se soucie pas) quels objets concrets il obtient de chacune de ces usines internes, puisqu'il n'utilise que les interfaces génériques de leurs produits.

Ce modèle sépare les détails de l'implémentation d'un ensemble d'objets de leur utilisation générale et repose sur la composition d'objets, car la création d'objets est implémentée dans des méthodes exposées dans l'interface de l'usine.

___

## 📑 Implémentation

*Fabrique*

```php
interface GUIFactory
{
    public function createButton(): Button;
}

class WinFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new WinButton();
    }
}

class OSXFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new OSXButton();
    }
}
```

*Produits*

```php
interface Button
{
    public function render(): string;
}
 
class WinButton implements Button
{
    public function render(): string
    {
        return "Je suis un WinButton";
    }
}
 
class OSXButton implements Button
{
    public function render(): string
    {
        return "Je suis un OSXButton";
    }
}
```

*Utilisation*

```php
$factory = 'osx' === $sys ? new OSXFactory() : new WinFactory();
echo $factory
    ->createButton()
    ->render();
```