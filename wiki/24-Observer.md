# Observer

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Quels problèmes le design pattern Observer peut-il résoudre ?

* Une dépendance un-à-plusieurs entre les objets doit être définie sans que les objets soient étroitement couplés.
* Il faut s'assurer que lorsqu'un objet change d'état, un nombre illimité d'objets dépendants est mis à jour automatiquement.
* Il devrait être possible qu'un objet puisse notifier un nombre illimité d'autres objets.

![image](./resources/Observer.jpg)

Quelle solution le modèle de conception Observer décrit-il ?

* Définissez les objets Sujet et Observateur de sorte que lorsqu'un sujet change d'état, tous les observateurs enregistrés sont notifiés et mis à jour automatiquement (et probablement de manière asynchrone).

___

## 📑 Implémentation

*Observer*

```php
abstract class Observer
{

    abstract public function update(Subject $subject): void;

}
```

*Subject*

```php
abstract class Subject
{

    private array $observers = [];

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $key = array_search($observer, $this->observers);
        if (false !== $key) {
            array_splice($this->observers, $key, 1);
        }
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

}
```

*Concrete Observer*

```php
class ConcreteLoggerObserver extends Observer
{

    public function update(Subject $subject): void
    {
        echo "Log event:" . (string) $subject . PHP_EOL;
    }

}
```

*Concrete Subject*

```php
class ConcreteFileReaderSubject extends Subject
{

    private int $lineNumber;

    public function readFile($fileName)
    {
        $this->lineNumber = 0;
        $fn = fopen($fileName,"r");
        while(!feof($fn))  {
            $result = fgets($fn);
            $this->lineNumber++;
            $this->notify();
        }
        fclose($fn);
    }

    public function __toString(): string
    {
        return $this->lineNumber . " line read";
    }

}
```

*Utilisation*

```php
$logger = new ConcreteLoggerObserver();
$reader = new ConcreteFileReaderSubject();
$reader->attach($logger);
$reader->readFile(__FILE__);
```
