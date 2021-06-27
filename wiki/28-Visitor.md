# Visitor

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Quels problèmes le modèle de conception Visitor peut-il résoudre?

* Il devrait être possible de définir une nouvelle opération pour certaines classes d'une structure d'objet sans changer les classes.
* Lorsque de nouvelles opérations sont fréquemment nécessaires et que la structure de l'objet se compose de nombreuses classes non liées, il est inflexible d'ajouter de nouvelles sous-classes à chaque fois qu'une nouvelle opération est requise car la distribution de toutes ces opérations sur les différentes classes de nœuds conduit à un système difficile comprendre, maintenir et changer."

![image](./resources/Visitor.jpg)

Quelle solution le modèle de conception Visitor décrit-il ?

* Définissez un objet (visiteur) distinct qui implémente une opération à effectuer sur les éléments d'une structure d'objet.
* Les clients traversent la structure de l'objet et appellent une opération de répartition accept (visiteur) sur un élément
    * — qui "répartit" (délègue) la demande à "l'objet visiteur accepté". L'objet visiteur effectue alors l'opération sur l'élément (« visite l'élément »).

Cela permet de créer de nouvelles opérations indépendamment des classes d'une structure d'objets en ajoutant de nouveaux objets visiteurs.

___

## 📑 Implémentation

*Subject*

```php
abstract class InputValue
{

    private $value;

    public function __construct($value)
    {
        $this->set($value);
    }

    public function set($value)
    {
        $this->value = $value;
    }

    public function get()
    {
        return $this->value;
    }

    public abstract function acceptVisitor(InputVisitor $visitor);

}

class SingleInputValue extends InputValue
{
    public function acceptVisitor(InputVisitor $visitor)
    {
        $visitor->visitSingleInputValue($this);
    }
}

class MultipleInputValue extends InputValue
{
    public function acceptVisitor(InputVisitor $visitor)
    {
        $visitor->visitMultipleInputValue($this);
    }
}
```

*Visitor*

```php
interface InputVisitor
{

    public function visitSingleInputValue(SingleInputValue $inputValue);

    public function visitMultipleInputValue(MultipleInputValue $inputValue);

}

class IntFilter implements InputVisitor
{

    public function visitSingleInputValue(SingleInputValue $inputValue)
    {
        $inputValue->set((int) $inputValue->get());
    }

    public function visitMultipleInputValue(MultipleInputValue $inputValue)
    {
        $newValues = array();
        foreach ($inputValue->get() as $index => $value) {
            $newValues[$index] = (int) $value;
        }
        $inputValue->set($newValues);
    }

}

class AscendingSort implements Visitor
{

    public function visitSingleInputValue(SingleInputValue $inputValue)
    { }

    public function visitMultipleInputValue(MultipleInputValue $inputValue)
    {
        $values = $inputValue->get();
        asort($values);
        $inputValue->set($values);
    }

}

```

*Utilisation*

```php
$userId = new SingleInputValue("42");
$categories = new MultipleInputValue([
    'hated' => 16, 
    'ordinary' => 23,
    'preferred' => 15
]);
$userId->acceptVisitor(new IntFilter);
$categories->acceptVisitor(new AscendingSort);
var_dump($userId->get());
var_dump($categories->get());
```
