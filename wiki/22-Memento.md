# Memento

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Quels problèmes le design pattern Memento peut-il résoudre ?

* L'état interne d'un objet doit être enregistré en externe afin que l'objet puisse être restauré à cet état ultérieurement.
* L'encapsulation de l'objet ne doit pas être violée.

Le problème est qu'un objet bien conçu est encapsulé de sorte que sa représentation soit cachée à l'intérieur de l'objet et ne soit pas accessible de l'extérieur de l'objet.

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/Memento.jpg)

Quelle solution le modèle de conception Memento décrit-il ?

* Rendre un objet (initiateur) lui-même responsable d'enregistrer son état interne dans un objet (mémento) et restaurer à un état antérieur à partir d'un objet (mémento).

___

## 📑 Implémentation

*Originator*

```php
public class Originator
{

   private string $state;

   public function setState(string $state){
      $this->state = $state;
   }

   public function getState(): string
   {
      return $this->state;
   }

   public function saveStateToMemento(): Memento
   {
      return new Memento(state);
   }

   public function getStateFromMemento(Memento $memento)
   {
      $this->state = $memento->getState();
   }

}
```

*Memento*

```php
class Memento
{

    private string $state;

    public function __construct(string $state)
    {
        this.state = state;
    }

    public function getState(): string
    {
        return $this->state;
    }

}
```

*Sujet*

```php
class CareTaker
{
   private $mementoList = [];

   public function add(Memento state): void
   {
      $this->mementoList.add(state);
   }

   public function get(int $index): Memento
   {
      return $this->mementoList[$index];
   }

}
```

*Utilisation*

```php
$originator = new Originator();
$careTaker = new CareTaker();

$originator->setState("State #1");
$originator->setState("State #2");
$careTaker->add(originator.saveStateToMemento());
$originator->setState("State #3");
$careTaker->add(originator.saveStateToMemento());
$originator->setState("State #4");

$originator->getStateFromMemento($careTaker->get(0));
echo "First saved State: " . $originator->getState());
$originator->getStateFromMemento($careTaker->get(1));
echo "Second saved State: " . $originator->getState());
```